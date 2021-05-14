<?php

namespace common\models;

use Yii;
use common\models\User;

/**
 * This is the model class for table "{{%cans}}".
 *
 * @property int $canId
 * @property int $productId
 * @property string $type
 * @property int $amount
 * @property string $canImage
 * @property int $status
 * @property string|null $createdAt
 * @property int $createdBy
 *
 * @property Products $product
 * @property User $createdBy0
 */
class Cans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%cans}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productId', 'type', 'amount', 'canStatus', 'createdBy'], 'required'],
            [['productId', 'amount', 'canStatus', 'createdBy'], 'integer'],
            [['createdAt'], 'safe'],
            [['type'], 'string', 'max' => 100],
            [['canImage'], 'string', 'max' => 2000],
            [['productId'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['productId' => 'id']],
            [['createdBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['createdBy' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'canId' => 'Can ID',
            'productId' => 'Product ID',
            'type' => 'Type',
            'amount' => 'Amount',
            'canImage' => 'Can Image',
            'canStatus' => 'Published',
            'createdAt' => 'Created At',
            'createdBy' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ProductsQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productId']);
    }

    /**
     * Gets query for [[CreatedBy0]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy0()
    {
        return $this->hasOne(User::className(), ['id' => 'createdBy']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CansQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CansQuery(get_called_class());
    }

     public function getImageUrl()
    {
        return self::formatImageUrl($this->canImage);
    }

    public static function formatImageUrl($imagePath)
    {
        if ($imagePath) {
            return Yii::$app->params['frontendUrl'] . '/storage/' . $imagePath;
        }

        return Yii::$app->params['frontendUrl'] . '/img/no_image_available.png';
    }
}
