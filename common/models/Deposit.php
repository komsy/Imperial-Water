<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%deposit}}".
 *
 * @property int $transId
 * @property string|null $MerchantRequestId
 * @property int $orderId
 * @property float $transAmount
 * @property int|null $phoneCode
 * @property int $mpesaNumber
 * @property string|null $details
 * @property string|null $reciept
 * @property string $transDate
 * @property int $createdBy
 * @property int|null $status
 */
class Deposit extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%deposit}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderId', 'transAmount', 'mpesaNumber', 'createdBy'], 'required'],
            [['orderId', 'phoneCode', 'mpesaNumber', 'createdBy', 'status'], 'integer'],
            [['transAmount'], 'number'],
            [['details'], 'string'],
            [['transDate'], 'safe'],
            [['MerchantRequestId', 'reciept'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'transId' => 'Trans ID',
            'MerchantRequestId' => 'Merchant Request ID',
            'orderId' => 'Order ID',
            'transAmount' => 'Trans Amount',
            'phoneCode' => 'Phone Code',
            'mpesaNumber' => 'Mpesa Number',
            'details' => 'Details',
            'reciept' => 'Reciept',
            'transDate' => 'Trans Date',
            'createdBy' => 'Created By',
            'status' => 'Status',
        ];
    }
}
