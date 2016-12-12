<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Amigos */

$this->title = 'Create Amigos';
$this->params['breadcrumbs'][] = ['label' => 'Amigos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="amigos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
