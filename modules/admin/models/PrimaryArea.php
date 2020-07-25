<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_primary_area}}".
 *
 * @property integer $AreaId
 * @property string $AreaName
 * @property string $Status
 */
class PrimaryArea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_primary_area}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AreaName'], 'required'],
            [['AreaName'], 'string', 'max' => 255],
            [['Status'], 'string', 'max' => 20],
            [['AreaName'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AreaId' => 'Aera ID',
            'AreaName' => 'Area Name',
            'Status' => 'Status',
        ];
    }
}
