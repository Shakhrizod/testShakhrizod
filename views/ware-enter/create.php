<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WareEnter */

$this->title = 'Создание прихода';
$this->params['breadcrumbs'][] = ['label' => 'Приходы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ware-enter-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
