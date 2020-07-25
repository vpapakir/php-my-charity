<?php

namespace app\modules\admin\models;

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
 * @property string $ProfilePic
 * @property string $EnteredOn
 * @property integer $UserId
 */
class Ngo extends \yii\db\ActiveRecord
{
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
            [['NgoName', 'Name', 'State', 'City', 'Email', 'Address', 'Pincode'], 'required'],
            [['Country', 'UserId'], 'integer'],
            [['EnteredOn'], 'safe'],
            [['NgoName', 'Name', 'State', 'City', 'Email', 'Address', 'ProfilePic'], 'string', 'max' => 255],
            [['Pincode'], 'string', 'max' => 50]
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
            'Name' => 'Name',
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
