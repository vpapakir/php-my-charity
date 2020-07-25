<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_state}}".
 *
 * @property integer $StateId
 * @property string $StateName
 */
class State extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_state}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['StateName'], 'required'],
            [['StateName'], 'string', 'max' => 255],
            [['StateName'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'StateId' => 'State ID',
            'StateName' => 'State Name',
        ];
    }
}
