<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\WareExit */

$this->title = 'Create Ware Exit';
$this->params['breadcrumbs'][] = ['label' => 'Ware Exits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ware-exit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
