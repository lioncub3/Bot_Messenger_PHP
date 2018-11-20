<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * OrderProduct
 */
class OrderProduct extends ActiveRecord{
    public static function tableName(){
        return "{{orderProduct}}";
    }
    public function getData(){
        return array("idproduct"=>$this->idproduct,"idorder"=>$this->idorder);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [           
            [[ 'idproduct','idorder'], 'required'],      
            [[ 'idproduct','idorder'], 'integer'], 
           
        ];
    }
}