<?php

use yii\db\Migration;

/**
 * Handles the creation of table `denied`.
 */
class m161217_134909_create_denied_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('denied', [
            'id' => $this->primaryKey(),
            'mail_id' => $this->integer(),
            'from' => $this->string(256),
            'subject' => $this->string(256),
            'application' => $this->string(256),
            'approval_date' => $this->string(256),
            'customer_name' => $this->string(256),
            'customer_address' => $this->string(256),
            'loan_number' => $this->string(256),
            'loan_product' => $this->string(256),
            'bid_percent' => $this->string(256),
            'app_submitted_by' => $this->string(256),
            'promos' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('denied');
    }
}
