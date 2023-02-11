<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Editorial $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="editorial-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_editorial')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
