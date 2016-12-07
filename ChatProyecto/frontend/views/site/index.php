<?php

use common\models\User;
use yii\grid\GridView;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido</h1>

        <p class="lead">Crea tu chat</p>

        <p> <?= Html::a('Crear chat grupal', ['create'], ['class' => 'btn btn-success']) ?></p>
        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Crear chat individual</a></p>
      
    </div>

</div>
