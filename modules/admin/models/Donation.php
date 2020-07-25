<?php

namespace app\modules\admin\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "{{%tbl_donation}}".
 *
 * @property integer $DonationId
 * @property string $DonationAmount
 * @property integer $CauseId
 * @property integer $DonationBy
 * @property string $DonationOn
 * @property string $DonationIp
 * @property string $DonationMode
 */
class Donation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_donation}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DonationAmount', 'CauseId', 'DonationBy', 'DonationIp', 'DonationMode'], 'required'],
            [['DonationAmount'], 'number'],
            [['CauseId', 'DonationBy'], 'integer'],
            [['DonationOn'], 'safe'],
            [['DonationIp', 'DonationMode'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DonationId' => 'Donation ID',
            'DonationAmount' => 'Donation Amount',
            'CauseId' => 'Cause ID',
            'DonationBy' => 'Donation By',
            'DonationOn' => 'Donation On',
            'DonationIp' => 'Donation Ip',
            'DonationMode' => 'Donation Mode',
        ];
    }

    public function getCauseId()
    {
        return $this->hasOne(Cause::className(), ['CauseId' => 'CauseId']);
    }

    public function getDonationBy()
    {
        return $this->hasOne(User::className(), ['id' => 'DonationBy']);
    }
}
