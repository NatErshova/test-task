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
class MoneyForm extends Model
{
    public $username;
    public $email;
    public $bank_account;
    public $id;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'bank_account'], 'required'],
            [['email'], 'email'],
        ];
    }
}
