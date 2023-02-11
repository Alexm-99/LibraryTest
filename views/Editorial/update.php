<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Editorial $model */

$this->title = 'Update Editorial: ' . $model->id_editorial;
$this->params['breadcrumbs'][] = ['label' => 'Editorials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_editorial, 'url' => ['view', 'id_editorial' => $model->id_editorial]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="editorial-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
