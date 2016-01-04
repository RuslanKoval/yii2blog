<?php
/**
 * Created by PhpStorm.
 * User: ruslan
 * Date: 04.01.16
 * Time: 10:18
 */

namespace common\widgets;


use yii\base\Widget;
use yii\helpers\Html;

class HelloWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if ($this->message === null) {
            $this->message = 'Hello World';
        }
    }

    public function run()
    {
//        return Html::encode($this->message);


        foreach($this->message as $key){
            foreach($key as $value){
                return '<p>'.'efef'.'</p>';
            }
        }
    }
}