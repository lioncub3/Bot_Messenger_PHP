<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
/**
 * Order
 */
class Order extends ActiveRecord
{
    public static function tableName(){
        return "{{order}}";
    }
    public function getData(){
        return array("iduser"=>$this->iduser);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [           
            [[ 'iduser'], 'required'],
            [[ 'iduser'], 'integer'],
           
        ];
    }
}