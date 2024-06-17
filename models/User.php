<?php

namespace app\models;

use Yii;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id;
    public $username;
    public $password;
    public $authKey;
    public $accessToken;

    private static $users ;


    public function __construct(){
        self::$users = Yii::$app->db->createCommand('SELECT * FROM users;')->queryAll();
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        if(!self::$users){
            self::$users = Yii::$app->db->createCommand('SELECT * FROM users;')->queryAll();
        }
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        if(!self::$users){
            self::$users = Yii::$app->db->createCommand('SELECT * FROM users;')->queryAll();
        }
        
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);;
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public static function validatePassword($password)
    {
        if(!self::$users){
            self::$users = Yii::$app->db->createCommand('SELECT * FROM users;')->queryAll();
        }
        
        foreach (self::$users as $user) {
            if (strcasecmp($user['password'], $password) === 0) {
                return true;
            }
        }

        return false;
    }
}
