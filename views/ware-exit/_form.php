<?php

use kartik\date\DatePicker;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\WareExit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ware-exit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')->widget(Select2::classname(), [

        'data' => \yii\helpers\ArrayHelper::map(\app\models\Products::find()->asArray()->all(), 'id', 'name'),
        'options' => [
            'id' => 'product_id',
            'placeholder' => 'Выберите продукт',
        ],
        'language' => 'ru',
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'sell_price')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <?= $form->field($model, 'date')->widget(DatePicker::classname(), [
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd',
            'today' => true
        ]
    ]); ?>

    <?= $form->field($model, 'number')->widget(DepDrop::classname(), [
        'options' => ['id' => 'series'],
        'type' => DepDrop::TYPE_SELECT2,
        'pluginOptions' => [
            'depends' => ['product_id'],
            'placeholder' => '-------',
            'url' => Url::to(['/ware-enter/get-series-by-product']),
            'initialize' => true
        ]
    ]); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
