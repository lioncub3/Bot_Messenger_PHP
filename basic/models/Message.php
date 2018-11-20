<?php
namespace app\models;
use Yii;
use yii\db\ActiveRecord;
/**
 * Messege
 */
class Message extends ActiveRecord{
    public static function tableName(){
        return "{{message}}";
    }
    public function getData(){
        return array(
            "time"=>$this->time,
            "senderid"=>$this->senderid,
            "recipientid"=>$this->recipientid,
            "timestamp"=>$this->timestamp,
            "text"=>$this->text);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [           
            [['time', 'senderid', 'recipientid','timestamp','text'], 'required'],      
            [['text'], 'string'],
            ];
    }
}