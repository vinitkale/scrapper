<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\DeniedSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Denieds';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="denied-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Denied', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
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
            // 'loan_number',
            // 'loan_product',
            // 'bid_percent',
            // 'app_submitted_by',
            // 'promos:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
