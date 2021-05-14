<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%mpesaC2bCallbacks}}".
 *
 * @property string $MerchantRequestID
 * @property string $CheckoutRequestID
 * @property string $request
 * @property int $ResultCode
 * @property string $ResultDesc
 * @property float|null $transAmount
 * @property string|null $MpesaReceiptNumber
 * @property string|null $TransactionDate
 * @property string|null $PhoneNumber
 * @property string $createdAt
 * @property string $updatedAt
 */
class MpesaC2bCallbacks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%mpesaC2bCallbacks}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['MerchantRequestID', 'CheckoutRequestID', 'request', 'ResultCode', 'ResultDesc'], 'required'],
            [['request'], 'string'],
            [['ResultCode'], 'integer'],
            [['transAmount'], 'number'],
            [['createdAt', 'updatedAt'], 'safe'],
            [['MerchantRequestID', 'CheckoutRequestID', 'ResultDesc', 'TransactionDate', 'PhoneNumber'], 'string', 'max' => 191],
            [['MpesaReceiptNumber'], 'string', 'max' => 50],
            [['MerchantRequestID'], 'unique'],
            [['CheckoutRequestID'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'MerchantRequestID' => 'Merchant Request ID',
            'CheckoutRequestID' => 'Checkout Request ID',
            'request' => 'Request',
            'ResultCode' => 'Result Code',
            'ResultDesc' => 'Result Desc',
            'transAmount' => 'Trans Amount',
            'MpesaReceiptNumber' => 'Mpesa Receipt Number',
            'TransactionDate' => 'Transaction Date',
            'PhoneNumber' => 'Phone Number',
            'createdAt' => 'Created At',
            'updatedAt' => 'Updated At',
        ];
    }
}
