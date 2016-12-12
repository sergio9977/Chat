<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Amigos */

$this->title = 'Update Amigos: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Amigos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="amigos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
