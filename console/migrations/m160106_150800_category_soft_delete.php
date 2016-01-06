<?php

use yii\db\Schema;
use yii\db\Migration;

class m160106_150800_category_soft_delete extends Migration
{
    public function up()
    {
        $this->addColumn('category', 'active', $this->boolean()->defaultValue(true));
    }
    public function down()
    {
        $this->dropColumn('category', 'active');
    }
}
