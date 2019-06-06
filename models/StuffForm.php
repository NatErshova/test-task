<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class StuffForm extends Model
{
    public $username;
    public $email;
    public $address;
    public $id;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'email', 'address'], 'required'],
            [['email'], 'email'],
        ];
    }
}
