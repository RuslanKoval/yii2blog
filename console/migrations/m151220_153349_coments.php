<?php

use yii\db\Schema;
use yii\db\Migration;

class m151220_153349_coments extends Migration
{
    public function up()
    {
        $this->createTable('coments', [
            'id' => $this->primaryKey(),
            'post_id' => $this->integer(),
            'create_as' => $this->string(50),
            'description' => $this->text(),
        ]);
        $this->addForeignKey("fk_coments", "coments", "post_id", "post", "id",$delete = "CASCADE");
    }

    public function down()
    {
        $this->dropTable("coments");
    }

}
