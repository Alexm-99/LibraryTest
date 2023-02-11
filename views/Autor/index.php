<?php

use app\models\Autor;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\AutorBuscar $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Autors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="autor-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Autor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_autor',
            'nombre',
            'apellido',
            'id_libro_FK',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Autor $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_autor' => $model->id_autor]);
                 }
            ],
        ],
    ]); ?>


</div>
