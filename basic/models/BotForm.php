<?php
namespace app\models;

use Yii;
use yii\base\Model;
/**
 * Ad form
 */
class ProductForm extends Model {
  
    public $name;
    public $iduser;
  
    public function rules()
    {
        return [           
            [['name','iduser'], 'required'],      
            [['name'], 'string'],
            [['price'],'integer'],
        ];
    }
    public function upload()
    {     
            $this->path->saveAs('../../uploads/' . $this->path->baseName . '.' . $this->path->extension);
            return true;
        
            return false;     
    }
 
}