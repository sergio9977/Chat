<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\SessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Session Frontend Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-frontend-user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'user_id',
            //'ip',
            //'expire',
            //'data',
            [
              'attribute'=>'user_id',
              'label'=>'Amigos Conectados',
              'value'=>  function ($model){
                  $conectados = User::findOne($model->user_id);
                  return $conectados->username;
                },
                //'filter' => yii\helpers\ArrayHelper::map(User::find()->all(), 'id', 'username'),
            ],

            ['class' => 'yii\grid\ActionColumn',
                
                'template' =>'{agregarchat}',
                
                'buttons' =>[
                    'agregarchat'=>  function ($url,$model,$key){
                        $sql = "SELECT * FROM amigos";  // sentencia sql
                        $link = mysqli_connect("localhost","root","","chatusip");
                        $result = mysqli_query($link,$sql);
                        $numero = mysqli_num_rows($result); // obtenemos el n�mero de filas
                        $rows = mysqli_fetch_array($result);
                        $id = $model->user_id;
                        $cont = 0;
                        do
                            {
                              if($rows['Id_Usuario'] == \Yii::$app->User->getId()){
                                   // $id = $rows['Id'];
                                  //$cont++;
                                    return $model->agregarchat == '' ? Html::a(
                                    Html::a('Eliminar amigo' ,['view', 'id' => $model->id], ['class' => 'btn btn-primary']),
                                    $model->agregarchat) : '';
                              }
                              else {
                                  //$id = $rows['Id'];
                                  return $model->agregarchat == '' ? Html::a(
                                    Html::a('Agregar amigo' ,['view', 'id' => $model->id], ['class' => 'btn btn-primary']),
                                    $model->agregarchat) : '';
                              }
                            }
                    while( $rows = mysqli_fetch_array($result));
                    },
                    ],
        ], 
      ],
    ]); ?>
     <?php 
     function algo($id){
         $model5 = new Adopcion;
        $sql = "SELECT * FROM amigos";  // sentencia sql
        $link = mysqli_connect("localhost","root","","chatusip");
            $result = mysqli_query($link,$sql);
            $numero = mysqli_num_rows($result); // obtenemos el n�mero de filas
            $row = mysqli_fetch_array($result);
            while( $rows = mysqli_fetch_array($result) )
                {
                  if($id == $rows['Id_Amigo']){
                        $id = $rows['Id'];
                  }
                }
        return $id;
     }
    ?>
</div>
