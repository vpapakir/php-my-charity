<?php

namespace app\modules\ngo\models;

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
 * @property string $MinDonation
 * @property string $DonerList
 * @property string $PageMessage
 * @property string $ThanksMessage
 * @property string $RaiseExtra
 * @property string $RegisterOn
 * @property integer $Reason
 * @property string $StartDate
 * @property string $EndDate
 * @property string $ApprovedOn
 * @property string $Status
 * @property string $Featured
 * @property string $DonationRequired
 *
 * @property TblPromotion[] $tblPromotions
 */
class Cause extends \yii\db\ActiveRecord
{
    public $file;
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
            [['CauseTitle', 'CauseDescription', 'MinDonation', 'DonationRequired', 'DonerList', 'PageMessage', 'ThanksMessage', 'RaiseExtra', 'StartDate', 'EndDate','PrimaryArea'], 'required'],
            [['CauseDescription', 'DonerList', 'PageMessage', 'ThanksMessage', 'RaiseExtra', 'Status', 'Featured'], 'string'],
            [['NgoName', 'RegisterBy', 'Reason','PrimaryArea'], 'integer'],
            [['DonationCollected', 'MinDonation', 'DonationRequired'], 'number'],
            [['RegisterOn', 'StartDate', 'EndDate', 'ApprovedOn'], 'safe'],
            [['CauseTitle', 'Image', 'RegisterType', 'Promoters'], 'string', 'max' => 255],
            ['file','file']
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
            'file'=>'Image',
            'NgoName' => 'Ngo Name',
            'RegisterBy' => 'Register By',
            'RegisterType' => 'Register Type',
            'Promoters' => 'Promoters',
            'DonationCollected' => 'Donation Collected',
            'MinDonation' => 'Minimum Donation Amount',
            'DonerList' => 'Show Doner List on Page',
            'PageMessage' => 'Page Message',
            'ThanksMessage' => 'Thank You Message',
            'RaiseExtra' => 'Raise Extra Donation',
            'RegisterOn' => 'Register On',
            'Reason' => 'Reason',
            'StartDate' => 'Start Date',
            'EndDate' => 'End Date',
            'ApprovedOn' => 'Approved On',
            'Status' => 'Status',
            'Featured' => 'Featured',
            'DonationRequired' => 'Donation Required',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPromotions()
    {
        return $this->hasMany(TblPromotion::className(), ['CuaseId' => 'CauseId']);
    }
}
