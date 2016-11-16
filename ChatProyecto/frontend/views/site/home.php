<?php
use sjaakp\telex\Telex;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use frontend\models\Comentario;
use common\models\User;
use yii\bootstrap\ActiveForm;
use yii\data\Pagination;
/*use kartik\rating\StarRating;*/

$date = new \DateTime('now', new \DateTimeZone('UTC'));

$this->title= 'Noticias de la pagina';

$posts=(new \yii\db\Query())
->select(['idNoticia','nombreNoticia'])
->from('noticia')
->orderBy(['idNoticia'=>SORT_DESC])
->limit(5)
->all();
?>
<div class="site-index">


   <div class="body-content">
      <div class="row">
         <h3>Ultimas noticias</h3>
         <?php 
         $noticias=array(
           'options'=>array(
           'messages'=>array(),
           'duration'=> 17500,
           'pauseOnHover'=> true,
            ),
           'htmlOptions'=>array()
             
           );
           foreach ($posts as $p) {
            $noticias['options']['messages'][]= array('id' => 'm'.$p['idNoticia'], 'class'=>'msg-lightgreen',
                'content'=> $p['nombreNoticia']);

           }
           echo Telex::widget($noticias);
           ?>
      </div>
      <h1>Noticias</h1>
      <?php
      foreach($noti as $not): ?>
        <div class="panel panel-prinary">
           <div class="panel-heading">
              <div class="panel-title">
                  <?= User::findOne($not['idUser'])['username'].": <strong>".Html::encode("$not->nombreNoticia"). "</strong>" ?>
                  <div class="pull-right">
                     <p>Fecha de publicacion: <?= $not->fechaAlta?></p>
                
                  </div>
              </div>  
           </div>


           <div class="panel.body">
              <div class="container-fluid">
                 <div class="col-md-6">
                    <p><?= $not->cuerpoNoticia ?></p>
                 </div>
                 <div class="col-md-6">
                    <?= Html::img('@web/'.$not->imgNoticia,['alt'=>$not->nombreNoticia, 'class'=>'img-
                    responsive','style'=>'width:200px; margin:0 auto;']); ?>
                 </div>
              </div>
<!-- muestra el comentario que se deslisa hacia abajo con el scripts y jquery-->
              <button class="btn btn-primary" onclick="verComentarios(<?=$not->idNoticia?>)"> Ver comentarios 
              </button> 
              <button type="button" class="btn btn-success" onclick="agregarNoticia(<?=$not->idNoticia?>)"
                data-toggle="modal" data-target="#myModal">Agregar comentario</button>
              <div id="comentarios<?=$not->idNoticia?>" style="display: none;">
                <hr>
                <?php
                $query = Comentario::find()->where(['idNoticia'=>$not->idNoticia])->all();
                if(count($query)==0){
                   echo "Sin comentarios";
                }else{
                   foreach($query as $q){
                      echo "<strong>".User::findOne($q['idUser'])['username']."</strong><br>";
                      echo $q['comentario'];
                      echo "<br>".$q['fechaComentario'];
                      echo "<hr>";
                 }}

                 ?>
               </div>
            </div>
        </div>
      <?php endforeach; ?>

      <?= LinkPager::widget(['pagination' => $pagination]) ?>

   </div>
</div>

<!-- recuadro modal esta relacionado con el agregar comentario-->

<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">

      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"> Agregar un comentario </h4> 
         </div>
         <div class="modal-body">
           <?php
           $modeloComentario=new Comentario();
          
           $form = ActiveForm::begin(['action' => ['comentario/create']]); ?>
           <?= $form->field($modeloComentario, 'idUser')->hiddenInput(['readonly' => true,'value'=>Yii::$app
           ->user->id])->label(false) ?>
           <?= $form->field($modeloComentario, 'IdNoticia')->hiddenInput()->label(false) ?>
           <?= $form->field($modeloComentario, 'comentario')->textarea() ?>
           <?= $form->field($modeloComentario, 'fechaComentario')->textInput(['readonly' => true, 'value' =>
             $date->format('Y-m-d') ])->label('Fecha') ?>

     
       
           <div class="form-group">
               <?= Html::submitButton('Comentar',['class'=> 'btn btn-primary']) ?>
           </div>

           <?php
      
           ActiveForm::end();  ?>

         </div>

         <div class="modal-footer">
           <button type="button" class="btn btn-default" data-dismiss="modal"> Close </button>
         </div>
      </div>


   </div>
 </div>

    