<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "coments".
 *
 * @property integer $post_id
 * @property string $description
 *
 * @property Post $post
 */
class Coments extends ActiveRecord
{
    public $postId;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id'], 'integer'],
            [['create_as'], 'string'],
            [['description'], 'string'],
            [['post_id','create_as','description'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'post_id' => 'Post ID',
            'description' => 'Coment',
            'create_as' => 'Create as',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }
}
