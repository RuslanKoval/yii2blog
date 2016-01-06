<?php

use yii\db\Migration;

class m160106_150440_post_soft_delete extends Migration
{
    public function up()
    {
        $this->addColumn('post', 'active', $this->boolean()->defaultValue(true));
    }
    public function down()
    {
        $this->dropColumn('post', 'active');
    }
}
