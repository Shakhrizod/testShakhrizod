<?php

use app\models\WareEnter;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\WareEnterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Приход товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ware-enter-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать приход', ['create'], ['class' => 'btn btn-success']) ?>
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
                'value' => function(WareEnter $model){
                    return $model->products->name;
                },
                'filter'=> \yii\helpers\ArrayHelper::map(\app\models\Products::find()->asArray()->all(),'id','name'),
            ],
            'coming_price',
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
