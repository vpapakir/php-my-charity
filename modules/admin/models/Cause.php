<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_cause}}".
 *
 * @property integer $CauseId
 * @property string $CauseTitle
 * @property string $CauseDescription
 * @property string $Image
 * @property integer $NgoName
 * @property integer $RegisterBy
 * @property string $RegisterType
 * @property string $Promoters
 * @property string $DonationCollected
 * @property string $RegisterOn
 * @property integer $Reason
 * @property string $ApprovedOn
 * @property string $Status
 * @property string $DonationRequired
 * @property string $EndDate
 */
class Cause extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_cause}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CauseTitle', 'CauseDescription', 'NgoName', 'Reason', 'Status'], 'required'],
            [['CauseDescription'], 'string'],
            [['NgoName', 'RegisterBy', 'Reason','PrimaryArea'], 'integer'],
            [['DonationCollected', 'DonationRequired'], 'number'],
            [['RegisterOn', 'ApprovedOn', 'EndDate','Featured'], 'safe'],
            [['CauseTitle', 'Image', 'RegisterType', 'Promoters', 'Status'], 'string', 'max' => 255],
			['Status','required','on'=>'deleted']
			
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CauseId' => 'Cause ID',
            'CauseTitle' => 'Cause Title',
            'CauseDescription' => 'Cause Description',
            'Image' => 'Image',
            'NgoName' => 'Ngo Name',
            'RegisterBy' => 'Register By',
            'RegisterType' => 'Register Type',
            'Promoters' => 'Promoters',
            'DonationCollected' => 'Donation Collected',
            'RegisterOn' => 'Register On',
            'Reason' => 'Reason',
            'ApprovedOn' => 'Approved On',
            'Status' => 'Status',
            'DonationRequired' => 'Donation Required',
            'EndDate' => 'End Date',
        ];
    }

    public function getNgoName()
    {
        return $this->hasOne(Ngo::className(), ['Id' => 'NgoName']);
    }

    public function getReason()
    {
        return $this->hasOne(Reason::className(), ['ReasonId' => 'Reason']);
    }
}
