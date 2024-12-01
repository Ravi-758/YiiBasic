<?php
namespace app\model;
use Yii\base\Model;
class EntryForm extends Model{
public $name;
public $email;
public $image_upload;

public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
            ['image_upload','image_upload'],
        ];
    }

}
