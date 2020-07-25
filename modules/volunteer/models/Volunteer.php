<?php

namespace app\modules\volunteer\models;

use Yii;
use app\modules\admin\models\State;
/**
 * This is the model class for table "{{%tbl_volunteer}}".
 *
 * @property integer $Id
 * @property string $FirstName
 * @property string $LastName
 * @property string $State
 * @property string $City
 * @property string $Email
 * @property string $Address
 * @property string $Pincode
 * @property string $EnteredOn
 * @property integer $UserId
 *

 */
class Volunteer extends \yii\db\ActiveRecord
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
        return '{{%tbl_volunteer}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FirstName', 'LastName', 'Email'], 'required'],
            [['UserId'], 'integer'],
            [['EnteredOn'], 'safe'],
            [['FirstName', 'LastName', 'State', 'City', 'Email', 'Address','ProfilePic'], 'string', 'max' => 255],
            [['Pincode','Mobile','Pan'], 'string', 'max' => 50],
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
            
            'State' => 'State',
            'City' => 'City',
            'Email' => 'Email',
            'Address' => 'Address',
            'Pincode' => 'Pincode',
            'EnteredOn' => 'Entered On',
            'UserId' => 'User ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['StateId' => 'State']);
    }
}
