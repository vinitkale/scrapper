<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\approve */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Approves', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="approve-view">

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
            'co_applicant_name',
            'loan_number',
            'loan_product',
            'cehi_approval_term',
            'bid_percent',
            'approval_amount',
            'required_down_payment',
            'approval_expiration_date',
            'app_submitted_by',
            'promos:ntext',
            'stipulation1:ntext',
            'stipulation2:ntext',
            'stipulation3:ntext',
            'approval_term_1:ntext',
            'approval_term_2:ntext',
            'approval_term_3:ntext',
            'approval_term_4:ntext',
            'approval_term_5:ntext',
        ],
    ]) ?>

</div>
