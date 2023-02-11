<?php

use app\models\Libros;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\LibrosBuscar $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Libros';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="libros-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Libros', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_libro',
            'nombre',
            'detalle',
            'id_editorial_fk',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Libros $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_libro' => $model->id_libro]);
                 }
            ],
        ],
    ]); ?>


</div>
