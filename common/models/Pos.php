<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%pos}}".
 *
 * @property int $posId
 * @property string $productName
 * @property int $quantity
 * @property float $price
 * @property float|null $discountPercentage
 * @property float $totalAmount
 * @property int $status
 * @property int $createdBy
 * @property string $createdAt
 */
class Pos extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%pos}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productName', 'quantity', 'price', 'totalAmount', 'createdBy'], 'required'],
            [['quantity', 'status', 'createdBy'], 'integer'],
            [['price', 'discountPercentage', 'totalAmount'], 'number'],
            [['createdAt'], 'safe'],
            [['productName'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'posId' => 'Pos ID',
            'productName' => 'Product Name',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'discountPercentage' => 'Discount Percentage',
            'totalAmount' => 'Total Amount',
            'status' => 'Status',
            'createdBy' => 'Created By',
            'createdAt' => 'Created At',
        ];
    }
}
