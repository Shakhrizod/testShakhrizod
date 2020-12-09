<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ware_exit".
 *
 * @property int $id
 * @property int $product_id
 * @property int $sell_price
 * @property int $amount
 * @property string $date
 * @property string|null $number
 * @property int $ware_enter_id
 * @property string $created_at
 * @property string $updated_at
 */
class WareExit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ware_exit';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'sell_price', 'amount', 'date'], 'required'],
            [['product_id', 'sell_price', 'amount','ware_enter_id'], 'integer'],
            ['amount', 'validateAmount'],
            [['date', 'created_at', 'updated_at'], 'safe'],
            [['date'], 'default', 'value' => date('d-m-Y')],
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
            'sell_price' => 'Цена продажи',
            'amount' => 'Количество',
            'date' => 'Дата продажи',
            'number' => 'Номер партии товара',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function validateAmount($attribute, $params, $validator)
    {
        if ($this->$attribute < 0) {
            $this->addError($attribute, 'Количество должно быть больше нуля');
            return false;
        }
        $query = WareEnter::find()->where(['product_id' => $this->product_id]);
        if ($this->number) {
            $query = $query->andWhere(['number' => $this->number]);
            $message = "В выбренном партии нету {$this->$attribute} шт. товара. Попробуйте очистить поля номер партии товара";
        } else {
            $message = "В складе нету {$this->$attribute} шт. товара";
        }
        $model = $query->orderBy('date ASC')->one();
        /** @var WareEnter $model */
        if ($model) {
            if ($this->$attribute >= $model->amount) {
                $this->addError($attribute, $message . " в складе {$model->amount} шт.");
                return false;
            }
        } else {
            $this->addError($attribute, 'smth went wrong');
            return false;
        }
    }

    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert)) {
            $query = WareEnter::find()->where(['product_id' => $this->product_id]);
            if ($this->number) {
                $query->andWhere(['number' => $this->number]);
            }
            $model = $query->orderBy('date ASC')->one();
            /** @var WareEnter $model */
            $model->amount -= (int)$this->amount;
            $model->save();
            $this->ware_enter_id = $model->id;
            return true;
        }
        return false;
    }

    public function getProducts()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
