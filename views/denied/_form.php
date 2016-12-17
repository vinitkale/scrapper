<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\denied */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="denied-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'application')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approval_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_product')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bid_percent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'app_submitted_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'promos')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
