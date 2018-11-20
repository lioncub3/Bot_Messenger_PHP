<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * Product
 */
class Product extends ActiveRecord{
    public static function tableName(){
        return "{{product}}";
    }
    public function getData(){
        return array("name"=>$this->name,
                    "content"=>$this->content,
                    "category"=>$this->category,
                    "price"=>$this->price,
                    "path"=>$this->path,
                    "idbot"=>$this->idbot);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [           
            [['name','category','content','price','path', "idbot"], 'required'],      
            [['content','name','category','path'], 'string'], 
            [['price', "idbot"],'integer'],
            ];
    }
}