<?php
namespace app\models;

use app\models\User;
use app\models\AuthAssignment;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class AddUser extends Model
{
    public $username;
    public $email;
    public $password;
    public $repeatpassword;
    public $fullname;
    public $Role;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass' => 'app\models\User', 'message' => 'This email address has already been taken.'],

            [['password', 'repeatpassword'] , 'required'],
            ['password', 'string', 'min' => 6],
            [['fullname','Role'],'string','max'=>50],
			['repeatpassword','compare','compareAttribute'=>'password'],
			
        ];
    }

     public function attributeLabels()
    {
        return [
            'username' => 'User Name',
            'repeatpassword'=>'Repeat Password',
            'fullname'=>'Full Name',
            'Role'=>'User Group'
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function adduser()
    {
       
	    if ($this->validate()) {
            $user = new User();
            $user->username = $this->username;
            $user->email = $this->email;
			$user->status = 0;
            $user->fullname =   $this->fullname;
            $user->setPassword($this->password);
            $user->generateAuthKey();
            $user->save();
				
				$id	= $user->id;
                $assignment = new AuthAssignment();
                $assignment->user_id    =   $user->id;
                if($this->Role ==''){
                    $role  ='user';
                }else{

                    $role  = $this->Role;
                }
                $assignment->item_name  =   $role;
                $assignment->save();
            
                return $user;
            }
        

        return null;
    }
	
	
}
