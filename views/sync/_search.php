<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ApproveSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="approve-search">

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

    <?php // echo $form->field($model, 'co_applicant_name') ?>

    <?php // echo $form->field($model, 'loan_number') ?>

    <?php // echo $form->field($model, 'loan_product') ?>

    <?php // echo $form->field($model, 'cehi_approval_term') ?>

    <?php // echo $form->field($model, 'bid_percent') ?>

    <?php // echo $form->field($model, 'approval_amount') ?>

    <?php // echo $form->field($model, 'required_down_payment') ?>

    <?php // echo $form->field($model, 'approval_expiration_date') ?>

    <?php // echo $form->field($model, 'app_submitted_by') ?>

    <?php // echo $form->field($model, 'promos') ?>

    <?php // echo $form->field($model, 'stipulation1') ?>

    <?php // echo $form->field($model, 'stipulation2') ?>

    <?php // echo $form->field($model, 'stipulation3') ?>

    <?php // echo $form->field($model, 'approval_term_1') ?>

    <?php // echo $form->field($model, 'approval_term_2') ?>

    <?php // echo $form->field($model, 'approval_term_3') ?>

    <?php // echo $form->field($model, 'approval_term_4') ?>

    <?php // echo $form->field($model, 'approval_term_5') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
