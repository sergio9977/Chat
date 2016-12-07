<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SessionFrontendUser */

$this->title = 'Update Session Frontend User: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Session Frontend Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="session-frontend-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
