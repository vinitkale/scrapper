<?php

namespace app\controllers;

use Yii;
use app\models\denied;
use app\models\DeniedSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DeniedController implements the CRUD actions for denied model.
 */
class DeniedController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all denied models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DeniedSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single denied model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new denied model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new denied();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing denied model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing denied model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the denied model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return denied the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = denied::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionSyncdenied()
    {
        $mailbox = new \unyii2\imap\Mailbox(yii::$app->imap->connection);
        $mailIds = $mailbox->searchMailBox('TEXT "A loan application has been denied"');// Prints all Mail ids.
        echo "<pre>";
        $arrFinalDenied = array();

        foreach($mailIds as $mailId)
        {
            if (($model = denied::findOne($mailId)) !== null) {
                $model = $this->findModel($mailId);
            }else{
                $model = new denied();
            }

            // Returns Mail contents
            $mail = $mailbox->getMail($mailId);

            // Use, if $mailbox->readMailParts = false;
            // Read mail parts (plain body, html body and attachments
            $mail = $mailbox->getMailParts($mail);
            $arrstrBody = explode(PHP_EOL, $mail->textPlain );

            $arrstrApplication = explode('--',$mail->subject);
            $model->setAttribute('from',$mail->fromAddress);
            $model->setAttribute('subject','Denied');
            $model->setAttribute('application','');
            $model->save();
//            $arrFinalDenied[$mailId]['From'] = $mail->fromAddress;
            $arrFinalDenied[$mailId]['Subject'] = 'Denied';
            $arrFinalDenied[$mailId]['Application'] = '';

            if (true == isset($arrstrApplication[1]))
                $arrFinalDenied[$mailId]['Application'] = $arrstrApplication[1];

            foreach ( $arrstrBody as $strBody ){
                $strBody = trim($strBody);

                if( 'APPROVAL TERMS:' == $strBody )
                    break;

                if( true == strlen($strBody) ){
                    $arrKeyValue = explode(":",$strBody);
                    if( 2 == count($arrKeyValue) )
                        $arrFinalDenied[$mailId][trim($arrKeyValue[0])] = trim( $arrKeyValue[1] );
                    elseif( true == strstr (trim( $arrKeyValue[0] ), 'A loan application has been denied on' ))
                        $arrFinalDenied[$mailId]['Approval Date'] = trim(str_replace('.','', preg_replace("/A loan application has been denied on/", "", $arrKeyValue[0]) ) );
                }
            }
        }

    }
}
