<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ware_enter".
 *
 * @property int $id
 * @property int $product_id
 * @property int $coming_price
 * @property int $amount
 * @property string $date
 * @property string|null $number
 * @property string $created_at
 * @property string $updated_at
 */
class WareEnter extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ware_enter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'coming_price', 'amount', 'date'], 'required'],
            [['product_id', 'coming_price', 'amount'], 'integer'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['date'], 'default' , 'value' => date('Y-m-d')],
            [['number'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Название продукта',
            'coming_price' => 'Приходная цена',
            'amount' => 'Количество',
            'date' => 'Дата прихода',
            'number' => 'Номер партии товара',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getProducts()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
