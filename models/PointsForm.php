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
class PointsForm extends Model
{
    public $username;
    public $email;
    public $id;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'email'], 'required'],
            [['email'], 'email'],
        ];
    }
}
