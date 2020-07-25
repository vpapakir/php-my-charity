<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_reason}}".
 *
 * @property integer $ReasonId
 * @property string $Reason
 */
class Reason extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_reason}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Reason'], 'required'],
            [['Reason'], 'string', 'max' => 255],
            [['Reason'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ReasonId' => 'Reason ID',
            'Reason' => 'Reason',
        ];
    }
}
