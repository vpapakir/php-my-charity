<?php

namespace app\modules\ngo\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_ngo}}".
 *
 * @property integer $Id
 * @property string $NgoName
 * @property string $Name
 * @property integer $Country
 * @property string $State
 * @property string $City
 * @property string $Email
 * @property string $Address
 * @property string $Pincode
 * @property string $EnteredOn
 * @property integer $UserId
 */
class Ngo extends \yii\db\ActiveRecord
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
        return '{{%tbl_ngo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NgoName', 'Name','Email'], 'required'],
            [['Country', 'UserId'], 'integer'],
            [['EnteredOn'], 'safe'],
            [['NgoName', 'Name', 'State', 'City', 'Email', 'Address','ProfilePic'], 'string', 'max' => 255],
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
            'NgoName' => 'NGO Name',
            'Name' => 'Name',
            'Country' => 'Country',
            'State' => 'State',
            'City' => 'City',
            'Email' => 'Email',
            'Address' => 'Address',
            'Pincode' => 'Pincode',
            'EnteredOn' => 'Entered On',
            'UserId' => 'User ID',
        ];
    }
}
