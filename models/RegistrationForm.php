<?php

namespace app\models;

use yii\base\Model;
use Yii;


class RegistrationForm extends Model
{   
    public $username;
    public $email;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            ['email', 'email'],
        ];
    }

    public function SaveDB($password){
        Yii::$app->db->createCommand("INSERT INTO users (username, password, email_address) 
        VALUES ('$this->username', '$password', '$this->email');")->queryAll();
    }


    public function getMail()
    {
        return $this->email;
    }
}
