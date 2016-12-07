<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AmigosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Amigos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amigos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!--<?= Html::a('Create Amigos', ['create'], ['class' => 'btn btn-success']) ?>-->
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
              'attribute'=>'Id_Amigo',
              'label'=>'Amigos',
              'value'=>  function ($model){
                  $conectados = User::findOne($model->Id_Amigo);
                  return $conectados->username;
                },
                //'filter' => yii\helpers\ArrayHelper::map(User::find()->all(), 'id', 'username'),
            ],

            ['class' => 'yii\grid\ActionColumn',
                
                'template' =>'{agregarchat}',
                
                'buttons' =>[
                    'agregarchat'=>  function ($url,$model,$key){
                        return $model->agregarchat == '' ? Html::a(
                               Html::a('Agregar al chat' ,['testqr', 'id' => $model->Id], ['class' => 'btn btn-primary']),
                                $model->agregarchat) : '';
                        
                    },
                    ],
        ],
      ],
    ]); ?>
        <?php echo \sintret\chat\ChatRoom::widget([
            'url' => \yii\helpers\Url::to(['/chat/send-chat']),
            'userModel'=>  \common\models\User::className(),
            'userField' => 'avatarImage'
                ]); ?>
</div>
