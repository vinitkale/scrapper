<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ApproveSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Approves';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approve-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Approve', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'from',
            'subject',
            'application',
            'approval_date',
            // 'customer_name',
            // 'customer_address',
            // 'co_applicant_name',
            // 'loan_number',
            // 'loan_product',
            // 'cehi_approval_term',
            // 'bid_percent',
            // 'approval_amount',
            // 'required_down_payment',
            // 'approval_expiration_date',
            // 'app_submitted_by',
            // 'promos:ntext',
            // 'stipulation1:ntext',
            // 'stipulation2:ntext',
            // 'stipulation3:ntext',
            // 'approval_term_1:ntext',
            // 'approval_term_2:ntext',
            // 'approval_term_3:ntext',
            // 'approval_term_4:ntext',
            // 'approval_term_5:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
