<?php

use yii\db\Schema;
use yii\db\Migration;

class m160110_144905_user_active extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'active', $this->boolean()->defaultValue(false));
    }
    public function down()
    {
        $this->dropColumn('user', 'active');
    }
}
