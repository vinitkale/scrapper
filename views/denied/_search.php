<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DeniedSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="denied-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'from') ?>

    <?= $form->field($model, 'subject') ?>

    <?= $form->field($model, 'application') ?>

    <?= $form->field($model, 'approval_date') ?>

    <?php // echo $form->field($model, 'customer_name') ?>

    <?php // echo $form->field($model, 'customer_address') ?>

    <?php // echo $form->field($model, 'loan_number') ?>

    <?php // echo $form->field($model, 'loan_product') ?>

    <?php // echo $form->field($model, 'bid_percent') ?>

    <?php // echo $form->field($model, 'app_submitted_by') ?>

    <?php // echo $form->field($model, 'promos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
