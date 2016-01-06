<?php

use yii\db\Migration;

class m160106_150528_post_date_added extends Migration
{
    public function up()
    {
        $this->addColumn('post', 'date_added', $this->timestamp()->notNull());
    }
    public function down()
    {
        $this->dropColumn('post', 'date_added');
    }
}
