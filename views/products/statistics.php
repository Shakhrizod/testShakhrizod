<?php

use app\models\WareEnter;
use app\models\WareExit;
use kartik\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\WareExit */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = "Статистика";
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class'=>'kartik\grid\SerialColumn',
                'contentOptions'=>['class'=>'kartik-sheet-style'],
                'width'=>'36px',
                'pageSummary'=>'Всего',
                'pageSummaryOptions' => ['colspan' => 3],
                'header'=>'',
                'headerOptions'=>['class'=>'kartik-sheet-style']
            ],
            'date',
            [
                'attribute' => 'product_id',
                'value' => function (WareExit $model) {
                    return $model->products->name;
                },
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Products::find()->asArray()->all(), 'id', 'name'),
            ],
            [
                'label' => 'Выручка',
                'value' => function ($model) {
                    return $model->amount * $model->sell_price;
                },
                'hAlign' => 'right',
                'vAlign' => 'middle',
                'pageSummary' => true,
            ],
            [
                'label' => 'Себестоимость',
                'value' => function (WareExit $model) {
                    $wareEnter = WareEnter::findOne($model->ware_enter_id);
                    if ($wareEnter) {
                        $coming_price = $wareEnter->coming_price;
                        return $coming_price * $model->amount;
                    }
                    return 0;
                },
                'hAlign' => 'right',
                'vAlign' => 'middle',
                'pageSummary' => true
            ],
            [
                'label' => 'Прибыль',
                'value' => function (WareExit $model) {
                    $wareEnter = WareEnter::findOne($model->ware_enter_id);
                    $cost_price = 0;
                    if ($wareEnter) {
                        $coming_price = $wareEnter->coming_price;
                        $cost_price = $coming_price * $model->amount;
                    }
                    $money = $model->amount * $model->sell_price;
                    return $money - $cost_price;
                },
                'hAlign' => 'right',
                'vAlign' => 'middle',
                'pageSummary' => true
            ],
        ],
        'showPageSummary' => true
    ]); ?>

    <?php Pjax::end(); ?>

</div>
