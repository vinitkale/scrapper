<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\denied */

$this->title = 'Create Denied';
$this->params['breadcrumbs'][] = ['label' => 'Denieds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="denied-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
