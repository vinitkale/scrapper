<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "denied".
 *
 * @property integer $id
 * @property string $from
 * @property string $subject
 * @property string $application
 * @property string $approval_date
 * @property string $customer_name
 * @property string $customer_address
 * @property string $loan_number
 * @property string $loan_product
 * @property string $bid_percent
 * @property string $app_submitted_by
 * @property string $promos
 */
class Denied extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'denied';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['promos'], 'string'],
            [['from', 'subject', 'application', 'approval_date', 'customer_name', 'customer_address', 'loan_number', 'loan_product', 'bid_percent', 'app_submitted_by'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from' => 'From',
            'subject' => 'Subject',
            'application' => 'Application',
            'approval_date' => 'Approval Date',
            'customer_name' => 'Customer Name',
            'customer_address' => 'Customer Address',
            'loan_number' => 'Loan Number',
            'loan_product' => 'Loan Product',
            'bid_percent' => 'Bid Percent',
            'app_submitted_by' => 'App Submitted By',
            'promos' => 'Promos',
        ];
    }

    /**
     * @inheritdoc
     * @return DeniedQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DeniedQuery(get_called_class());
    }
}
