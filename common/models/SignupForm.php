<?php

namespace common\models;

use common\rbac\models\Role;
use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends \yii\db\ActiveRecord
{
    public $password;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            ['username', 'trim'],
//            ['username', 'required'],
//            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
//            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            [['status'], 'integer'],
            [['email', 'rule'], 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],
            ['password', 'required'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return bool whether the creating new account was successful and email was sent
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        $user = new User();
        $role = new Role();
        $rule = !empty($this->rule) ? $this->rule : 'Drektor';
        $status = !empty($this->status) ? $this->status : 10;
        $user->username = $this->email;
        $user->email = $this->email;
        $user->status = $status;
        $user->rule = $rule;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if ($user->save()){
            $role->user_id = $user->getId();
            $role->item_name = $rule;
            $role->save();
        }
        return $user->getId();
    }

    public function user_update($id)
    {
        if (!$this->validate()) {
            return null;
        }
        $user = User::findOne($id);
        $role = Role::findOne(['user_id'=>$id]);
        $user->username = $this->email;
        $user->email = $this->email;
        $user->status = $this->status;
        $user->rule = $this->rule;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        if ($user->save()){
            $role->item_name = $this->rule;
            $role->save();
        }
        return true;
    }
}
