<?php

use app\models\Editorial;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\EditorialBuscar $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Editorials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="editorial-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Editorial', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id_editorial',
            'nombre',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Editorial $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_editorial' => $model->id_editorial]);
                 }
            ],
        ],
    ]); ?>


</div>
