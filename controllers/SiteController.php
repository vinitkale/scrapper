<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use unyii2;
use app\models\denied;
use app\models\approve;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionDeniedsync()
    {
        $mailbox = new \unyii2\imap\Mailbox(yii::$app->imap->connection);
        $mailIds = $mailbox->searchMailBox('TEXT "A loan application has been denied"');// Prints all Mail ids.

        $arrConstanArr = array(
          'Approval Date'=> 'approval_date',
          'Customer Name'=> 'customer_name',
          'Customer Address'=>'customer_address',
          'Loan Number'=>'loan_number',
          'Loan Product'=>'loan_product',
          'Bid Percent'=>'bid_percent',
          'App Submitted By'=>'app_submitted_by',
          '-PROMOS'=>'promos'
        );

        $arrFinalDenied = array();

        foreach($mailIds as $mailId)
        {
            $sql = 'SELECT * FROM denied where mail_id =' . $mailId;

            if (($model = denied::findBySql($sql)->one()) !== null) {

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
            $model->setAttribute('mail_id',$mailId);

            if (true == isset($arrstrApplication[1]))
                $model->setAttribute('application',$arrstrApplication[1]);

            foreach ( $arrstrBody as $strBody ){
                $strBody = trim($strBody);

                if( 'APPROVAL TERMS:' == $strBody )
                    break;

                if( true == strlen($strBody) ){
                    $arrKeyValue = explode(":",$strBody);
                    if( 2 == count($arrKeyValue)){
                        $model->setAttribute($arrConstanArr[$arrKeyValue[0]],$arrKeyValue[1]);}
                    elseif( true == strstr (trim( $arrKeyValue[0] ), 'A loan application has been denied on' ))
                        $model->setAttribute('approval_date',trim(str_replace('.','', preg_replace("/A loan application has been denied on/", "", $arrKeyValue[0]) ) ));
                }
            }

            $model->save();
        }

    }


    public function actionApprovesync()
    {
        $mailbox = new \unyii2\imap\Mailbox(yii::$app->imap->connection);
        $mailIds = $mailbox->searchMailBox('SUBJECT "Approved Application"');// Prints all Mail ids.

        $arrConstanArr = array(
            'Approval Date'=> 'approval_date',
            'Co-Applicant Name'=>'co_applicant_name',
            'CEHI Approval Term'=>'cehi_approval_term',
            'Approval Amount'=>'approval_amount',
            'Required down payment'=>'required_down_payment',
            'Approval   Expiration Date'=>'approval_expiration_date',
            'Stipulation1'=>'stipulation1',
            'Stipulation2'=>'stipulation2',
            'Stipulation3'=>'stipulation3',
            'Customer Name'=> 'customer_name',
            'Customer Address'=>'customer_address',
            'Loan Number'=>'loan_number',
            'Loan Product'=>'loan_product',
            'Bid Percent'=>'bid_percent',
            'App Submitted By'=>'app_submitted_by',
            '-PROMOS'=>'promos'
        );

        $arrFinalDenied = array();

        foreach($mailIds as $mailId)
        {
            $sql = 'SELECT * FROM approve where mail_id =' . $mailId;

            if (($model = approve::findBySql($sql)->one()) !== null) {

            }else{
                $model = new approve();
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
            $model->setAttribute('mail_id',$mailId);
            $model->setAttribute('approval_term_1','This bid/approval is good until the approval expiration date shown above.Loans not funded before that date may be re-decisioned or be returned unfunded at our discretion.');
            $model->setAttribute('approval_term_2','Per section 1 (e) of the Master Dealer Agreement, you are required to have all necessary licenses, bonding and permits required for each job.FFC may verify or request copies of any required items at any time.FFC reserves the right to refuse funding on any loans not complying with these requirements.');
            $model->setAttribute('approval_term_3','The bid% is the percent of the net amount financed that we will pay you for the loan.You may not pass the discount percent on to the borrower.   If you use a promotional plan that has a fee, the promotional   fee is IN ADDITION to any risk discount shown on this approval.');
            $model->setAttribute('approval_term_4','The bid is based on the information listed on the credit app and loan documents being accurate.If we find Out during verification or any other time that something is not correct,we may decrease our bid,request additional documentation or reject the loan.');
            $model->setAttribute('approval_term_5','SPLIT FINANCING/SPLIT  TICKETS:  Split  tickets between  Foundation  Finance  Company  and another finance  company  must be disclosed  at the time  of the  application.   Sales that are found to be partially financed');

            if (true == isset($arrstrApplication[1]))
                $model->setAttribute('application',$arrstrApplication[1]);

            $intCount = 1;
            $intApprovalCount = 1;
            $boolApproval = false;
            foreach ( $arrstrBody as $strBody ){
                $strBody = trim($strBody);

                if( 'APPROVAL TERMS:' == $strBody )
                    break;

                if( true == strlen($strBody) ){
                    $arrKeyValue = explode(":",$strBody);
                    var_dump($arrKeyValue);
                    if( 2 == count($arrKeyValue) && true == isset( $arrConstanArr[$arrKeyValue[0]]) ){
                        $model->setAttribute($arrConstanArr[$arrKeyValue[0]],$arrKeyValue[1]);
                    }elseif( true == strstr (trim( $arrKeyValue[0] ), 'A loan application has been approved on' )) {
                        $model->setAttribute('approval_date', trim(str_replace('.', '', preg_replace("/A loan application has been approved on/", "", $arrKeyValue[0]))));
                    }elseif ( 'Stipulation' == $arrKeyValue[0] && 3 >= $intCount ){
                        $model->setAttribute($arrConstanArr[$arrKeyValue[0].$intCount],$arrKeyValue[1]);
                        $intCount++;
                    }
                }
            }

            $model->save();
        }

    }
}
