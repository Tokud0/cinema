<?php

namespace app\models;

use Yii;
use yii\base\Exception;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $first_name
 * @property string $second_name
 * @property string $auth_key
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['username', 'password', 'email', 'first_name', 'second_name', 'auth_key'], 'required'],
            [['username', 'password', 'email', 'first_name', 'second_name', 'auth_key'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'password' => Yii::t('app', 'Password'),
            'email' => Yii::t('app', 'Email'),
            'first_name' => Yii::t('app', 'First Name'),
            'second_name' => Yii::t('app', 'Second Name'),
            'auth_key' => Yii::t('app', 'Auth Key'),
        ];
    }
    /**
     * @param $id
     * @return Users|IdentityInterface|null
     */
    public static function findIdentity($id): ?IdentityInterface
    {
        return static::findOne($id);
    }

    /**
     * @param $token
     * @param @type
     * @return void
     * @throws NotSupportedException
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException(Yii::t('app','"findIdentityByAccessToken"is not implemented'));
    }
    public static function findByUsername(string $username): Users{
        return static::findOne(['username'=>$username]);
    }

    /**
     * @return int|string
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int|string
     */
    public function getAuthKey(): string
    {
        return $this->auth_key;
    }

    /**
     * @param $authKey
     * @return bool|null
     */
    public function validateAuthKey($authKey): bool
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword(string $password) :bool
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    /**

     * @throws Exception
     */
    public function beforeSave($insert): bool
    {
        if (parent::beforeSave($insert)) {
            if($this->isNewRecord) {
                $this->auth_key = Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }

}
