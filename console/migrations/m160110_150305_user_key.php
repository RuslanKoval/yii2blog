<?php

use yii\db\Schema;
use yii\db\Migration;

class m160110_150305_user_key extends Migration
{
    public function up()
    {
        $this->addColumn('user', 'active_key', $this->string());
    }
    public function down()
    {
        $this->dropColumn('user', 'active_key');
    }
}
