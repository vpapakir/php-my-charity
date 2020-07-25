<?php

namespace app\modules\users\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_users}}".
 *
 * @property integer $Id
 * @property string $FirstName
 * @property string $LastName
 * @property integer $Country
 * @property string $State
 * @property string $City
 * @property string $Email
 * @property string $Address
 * @property string $Pincode
 * @property string $ProfilePic
 * @property string $EnteredOn
 * @property integer $UserId
 */
class Users extends \yii\db\ActiveRecord
{
    public $password;
	public $repeatpassword;
	public $file;
	public $oldpassword;
	/**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FirstName', 'Email',], 'required'],
            [['Country', 'UserId'], 'integer'],
            [['EnteredOn'], 'safe'],
            [['FirstName', 'LastName', 'State', 'City', 'Email', 'Address', 'ProfilePic'], 'string', 'max' => 255],
            [['Pincode'], 'string', 'max' => 50],
			['password', 'string', 'min' => 6],
			['Email', 'email'],
			['repeatpassword','compare','compareAttribute'=>'password'],
			[['password','repeatpassword'],'required','on'=>'register'],
			[['repeatpassword','oldpassword','password'], 'string', 'max' => 255],
			['file','file'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'FirstName' => 'First Name',
            'LastName' => 'Last Name',
            'Country' => 'Country',
            'State' => 'State',
            'City' => 'City',
            'Email' => 'Email',
            'Address' => 'Address',
            'Pincode' => 'Pincode',
            'ProfilePic' => 'Profile Pic',
            'EnteredOn' => 'Entered On',
            'UserId' => 'User ID',
        ];
    }
}
