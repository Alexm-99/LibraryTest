<?php 

namespace app\Controllers;
use Yii;
use yii\filters\AccessController;
use yii\web\Controller;


class SitioController extends Controller{

    public function actionInicio(){

        
        return $this->render('inicio');
    }
}


 
?>
