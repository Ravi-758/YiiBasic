<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;
class UserData extends ActiveRecord
{
    public static function tableName()
    {
        return 'user_data';
    }

    public function rules()
    {
        return [
            [['name', 'email'], 'required'],
            ['email', 'email'],
            [['name', 'email'], 'string', 'max' => 255],
            [['image_upload'], 'string', 'max'=> 255],
        ];
    }
    public function upload()
    {
        if ($this->validate()) {
            $filePath = 'uploads/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs($filePath);
            return $filePath;  // Return the file path for storage in the database
        } else {
            return false;
        }
    }
}
