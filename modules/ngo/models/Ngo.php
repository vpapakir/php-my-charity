<?php

namespace app\modules\ngo\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_ngo}}".
 *
 * @property integer $Id
 * @property string $NgoName
 * @property string $City
 * @property string $State
 * @property string $Website
 * @property string $FirstName
 * @property string $LastName
 * @property string $Mobile
 * @property string $Email
 * @property string $RegistrationType
 * @property string $Valid12A
 * @property string $PanNumber
 * @property integer $Beneficiaries
 * @property integer $Expenditure
 * @property integer $PrimaryArea
 * @property integer $OperatingState
 * @property string $ProfilePic
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
            [['NgoName', 'FirstName', 'Email'], 'required'],
            [['RegistrationType', 'Valid12A'], 'string'],
            [['Beneficiaries', 'Expenditure', 'PrimaryArea', 'UserId'], 'integer'],
            [['EnteredOn'], 'safe'],
            [['NgoName', 'City', 'State', 'Website', 'FirstName', 'LastName', 'Email', 'ProfilePic'], 'string', 'max' => 255],
            [['Mobile', 'PanNumber'], 'string', 'max' => 20],
            ['repeatpassword','compare','compareAttribute'=>'password'],
            [['password','repeatpassword'],'required','on'=>'register'],
             [['repeatpassword','oldpassword','password'], 'string', 'max' => 255],
             ['file','file'],
			 ['OperatingState','safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'NgoName' => 'Ngo Name',
            'City' => 'City',
            'State' => 'State',
            'Website' => 'Website',
            'FirstName' => 'First Name',
            'LastName' => 'Last Name',
            'Mobile' => 'Mobile',
            'Email' => 'Email',
            'RegistrationType' => 'Registration Type',
            'Valid12A' => 'Do you have a valid 12A ?',
            'PanNumber' => 'Pan Number',
            'Beneficiaries' => 'Beneficiaries',
            'Expenditure' => 'Expenditure',
            'PrimaryArea' => 'Primary Area',
            'OperatingState' => 'Operating State',
            'ProfilePic' => 'Profile Pic',
            'EnteredOn' => 'Entered On',
            'UserId' => 'User ID',
        ];
    }
}