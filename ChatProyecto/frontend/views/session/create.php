<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\SessionFrontendUser */

$this->title = 'Create Session Frontend User';
$this->params['breadcrumbs'][] = ['label' => 'Session Frontend Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-frontend-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
