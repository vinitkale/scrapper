<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Approve]].
 *
 * @see Approve
 */
class ApproveQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Approve[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Approve|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
