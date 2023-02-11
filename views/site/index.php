<div class="site-login">
  <H1>NOMBRE DE LOS LIBROS QUE TENGAN UN SOLO AUTOR Y MOSTRAR EL AUTOR</H1>
</div>


<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;



$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;



$dataProvider = new ActiveDataProvider([
    'query' => (new \yii\db\Query())
        ->select(['autor.nombre AS nombre', 'autor.apellido AS apellido', 'libros.nombre AS libro'])
        ->from('autor')
        ->innerJoin('libros', 'autor.id_libro_FK = libros.id_libro')
        ->groupBy('libros.nombre')
        ->having('COUNT(autor.id_autor) = 1'),
    'pagination' => false
]);

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'nombre',
        'apellido',
        'libro',
    ],
]);

?>
