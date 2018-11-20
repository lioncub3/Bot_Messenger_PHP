<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * Bot
 */
class Bot extends ActiveRecord{
    public static function tableName(){
        return "{{bot}}";
    }
    public function getData(){
        return array("name"=>$this->name,
                    "iduser"=>$this->iduser);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [           
            [['name'], 'required'],      
            [['name'], 'string'], 
            [['iduser'],'integer'],
            ];
    }
}