<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\denied */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Denieds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="denied-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'from',
            'subject',
            'application',
            'approval_date',
            'customer_name',
            'customer_address',
            'loan_number',
            'loan_product',
            'bid_percent',
            'app_submitted_by',
            'promos:ntext',
        ],
    ]) ?>

</div>
