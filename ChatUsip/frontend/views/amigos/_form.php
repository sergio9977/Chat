<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Amigos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="amigos-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Id_Amigo')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
