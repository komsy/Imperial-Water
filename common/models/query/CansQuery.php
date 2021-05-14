<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Cans]].
 *
 * @see \common\models\Cans
 */
class CansQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Cans[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Cans|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
