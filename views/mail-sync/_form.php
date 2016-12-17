<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\approve */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="approve-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'from')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'application')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approval_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'customer_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'co_applicant_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loan_product')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cehi_approval_term')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bid_percent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approval_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'required_down_payment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'approval_expiration_date')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'app_submitted_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'promos')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'stipulation1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'stipulation2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'stipulation3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'approval_term_1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'approval_term_2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'approval_term_3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'approval_term_4')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'approval_term_5')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
