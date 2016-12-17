<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "approve".
 *
 * @property integer $id
 * @property string $from
 * @property string $subject
 * @property string $application
 * @property string $approval_date
 * @property string $customer_name
 * @property string $customer_address
 * @property string $co_applicant_name
 * @property string $loan_number
 * @property string $loan_product
 * @property string $cehi_approval_term
 * @property string $bid_percent
 * @property string $approval_amount
 * @property string $required_down_payment
 * @property string $approval_expiration_date
 * @property string $app_submitted_by
 * @property string $promos
 * @property string $stipulation1
 * @property string $stipulation2
 * @property string $stipulation3
 * @property string $approval_term_1
 * @property string $approval_term_2
 * @property string $approval_term_3
 * @property string $approval_term_4
 * @property string $approval_term_5
 */
class Approve extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'approve';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['promos', 'stipulation1', 'stipulation2', 'stipulation3', 'approval_term_1', 'approval_term_2', 'approval_term_3', 'approval_term_4', 'approval_term_5'], 'string'],
            [['from', 'subject', 'application', 'approval_date', 'customer_name', 'customer_address', 'co_applicant_name', 'loan_number', 'loan_product', 'cehi_approval_term', 'bid_percent', 'approval_amount', 'required_down_payment', 'approval_expiration_date', 'app_submitted_by'], 'string', 'max' => 256],
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
            'co_applicant_name' => 'Co Applicant Name',
            'loan_number' => 'Loan Number',
            'loan_product' => 'Loan Product',
            'cehi_approval_term' => 'Cehi Approval Term',
            'bid_percent' => 'Bid Percent',
            'approval_amount' => 'Approval Amount',
            'required_down_payment' => 'Required Down Payment',
            'approval_expiration_date' => 'Approval Expiration Date',
            'app_submitted_by' => 'App Submitted By',
            'promos' => 'Promos',
            'stipulation1' => 'Stipulation1',
            'stipulation2' => 'Stipulation2',
            'stipulation3' => 'Stipulation3',
            'approval_term_1' => 'Approval Term 1',
            'approval_term_2' => 'Approval Term 2',
            'approval_term_3' => 'Approval Term 3',
            'approval_term_4' => 'Approval Term 4',
            'approval_term_5' => 'Approval Term 5',
        ];
    }

    /**
     * @inheritdoc
     * @return ApproveQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ApproveQuery(get_called_class());
    }
}
