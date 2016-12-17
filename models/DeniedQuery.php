<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Denied]].
 *
 * @see Denied
 */
class DeniedQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Denied[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Denied|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
