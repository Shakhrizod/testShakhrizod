<?php

use app\models\WareEnter;
use app\models\WareExit;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\search\WareExitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Проданные товары';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="ware-exit-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Ware Exit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'product_id',
                'value' => function(WareExit $model){
                    return $model->products->name;
                },
                'filter'=> \yii\helpers\ArrayHelper::map(\app\models\Products::find()->asArray()->all(),'id','name'),
            ],
            'sell_price',
            'amount',
            'date',
            'number',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
