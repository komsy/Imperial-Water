<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%cashier}}".
 *
 * @property int $cashierId
 * @property int $userId
 * @property string $fullName
 * @property int $contactNumber
 * @property int $alternativeNumber
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property int $role
 */
class Cashier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cashier}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'fullName', 'contactNumber', 'alternativeNumber', 'address1', 'address2', 'city', 'state'], 'required'],
            [['userId', 'contactNumber', 'alternativeNumber', 'role'], 'integer'],
            [['fullName'], 'string', 'max' => 255],
            [['address1', 'address2', 'city', 'state'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cashierId' => 'Cashier ID',
            'userId' => 'User ID',
            'fullName' => 'Full Name',
            'contactNumber' => 'Contact Number',
            'alternativeNumber' => 'Alternative Number',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'city' => 'City',
            'state' => 'State',
            'role' => 'Role',
        ];
    }
    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'userId']);
    }
}
