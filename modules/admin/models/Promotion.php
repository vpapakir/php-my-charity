<?php

namespace app\modules\admin\models;

use Yii;
use app\modules\admin\models\Cause;
use app\modules\admin\models\Ngo;
use app\modules\volunteer\models\Volunteer;

/**
 * This is the model class for table "{{%tbl_promotion}}".
 *
 * @property integer $Id
 * @property integer $CuaseId
 * @property integer $Promoter
 * @property string $Status
 * @property string $ApprovedOn
 * @property string $EnteredOn
 * @property integer $FlagNgo
 * @property integer $FlagAdmin
 *
 * @property TblVolunteer $promoter
 * @property TblCause $cuase
 */
class Promotion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_promotion}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CauseId', 'Promoter', 'FlagNgo', 'FlagAdmin'], 'integer'],
           // [['Status', 'FlagNgo', 'FlagAdmin'], 'required'],
            [['ApprovedOn', 'EnteredOn'], 'safe'],
            [['Status','Unique'], 'string', 'max' => 50],
			['Unique','unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'CauseId' => 'Cause ID',
            'Promoter' => 'Promoter',
            'Status' => 'Status',
            'ApprovedOn' => 'Approved On',
            'EnteredOn' => 'Entered On',
            'FlagNgo' => 'Flag Ngo',
            'FlagAdmin' => 'Flag Admin',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPromoter()
    {
        return $this->hasOne(Volunteer::className(), ['Id' => 'Promoter']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCause()
    {
        return $this->hasOne(Cause::className(), ['CauseId' => 'CauseId']);
    }

     public function getNgo($data)
    {   
       

        $Cause = Cause::find()->where(['CauseId'=> $data->CauseId])->One();

        $ngo = Ngo::find()->where(['Id'=>$Cause['NgoName']])->One();

        return $ngo['NgoName'];
        
    }


    public function getPromoters($data)
    {   
       

        $promoters = Promotion::find()->where(['CauseId'=>$data->CauseId])->count();

        return $promoters;
        
    }
}
