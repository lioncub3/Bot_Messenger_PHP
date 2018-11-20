<?php
namespace app\models;
use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
/**
 * Product form
 */
class ProductForm extends Model {
  
    public $name;
    public $content;
    public $price;
    public $category;
    public $path;
  
    public function rules()
    {
        return [           
            [['name','category','content','price'], 'required'],      
            [['content','name','category'], 'string'], 
            [['price'],'integer'],
            [['path'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
             
    
        ];
    }
    public function upload()
    {
            $this->path->saveAs('../uploads/' . $this->path->baseName . '.' . $this->path->extension);
            return true;
        
            return false;     
    }
}