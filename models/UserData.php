<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

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
        ];
    }
}
