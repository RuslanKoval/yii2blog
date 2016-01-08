<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\Html;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $title
 * @property string $discription
 * @property string $createad_at
 * @property Category[] $categories
 * @property Coments[] $comments
 * @property integer $active
 *
 *
 *
 */
class Post extends ActiveRecord
{
    public $categoriesId = 1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'discription', 'createad_at'], 'required'],
            [['discription'], 'string'],
            [['createad_at'], 'safe'],
            [['categoriesId'], 'required'],
            [['title'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'discription' => 'Описание',
            'createad_at' => 'Createad At',
            'active' => 'Опубликовать',
        ];
    }

    public function allComments()
    {
        $string = "";
        foreach($this->comments as $key => $value) {
            $user = \common\models\User::find()->where(['id' => $value->create_as])->one();
            $string.= "<p>".$value->description."</p>";
            $string.= "<h6> leave a comment : ".$user->username."</h6><hr>";
        }

        return $string;
    }

    public function allCategories()
    {
        $string = "";
        foreach($this->categories as $category) {
            if ($category) {
                $string[] = Html::a($category->name, ['cat', 'id' => $category->id]);
            }
        }

        return implode(', ', $string);
    }

    public function getCategories()
    {
        return $this->hasMany(Category::className(), ['id' => 'category_id'])
            ->viaTable('post_category', ['post_id' => 'id']);
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Coments::className(), ['post_id' => 'id']);
    }
}
