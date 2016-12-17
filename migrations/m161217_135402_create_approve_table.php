<?php

use yii\db\Migration;

/**
 * Handles the creation of table `approve`.
 */
class m161217_135402_create_approve_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('approve', [
            'id' => $this->primaryKey(),
            'mail_id' => $this->integer(),
            'from' => $this->string(256),
            'subject' => $this->string(256),
            'application' => $this->string(256),
            'approval_date' => $this->string(256),
            'customer_name' => $this->string(256),
            'customer_address' => $this->string(256),
            'co_applicant_name' => $this->string(256),
            'loan_number' => $this->string(256),
            'loan_product' => $this->string(256),
            'cehi_approval_term' => $this->string(256),
            'bid_percent' => $this->string(256),
            'approval_amount' => $this->string(256),
            'required_down_payment' => $this->string(256),
            'approval_expiration_date' => $this->string(256),
            'app_submitted_by' => $this->string(256),
            'promos' => $this->text(),
            'stipulation1' => $this->text(),
            'stipulation2' => $this->text(),
            'stipulation3' => $this->text(),
            'approval_term_1' => $this->text(),
            'approval_term_2' => $this->text(),
            'approval_term_3' => $this->text(),
            'approval_term_4' => $this->text(),
            'approval_term_5' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('approve');
    }
}
