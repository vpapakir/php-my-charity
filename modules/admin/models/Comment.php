<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "{{%tbl_comment}}".
 *
 * @property integer $id
 * @property string $content
 * @property string $status
 * @property string $create_time
 * @property string $author
 * @property string $email
 * @property string $url
 * @property integer $post_id
 */
class Comment extends \yii\db\ActiveRecord
{
    
     public $verifyCode;
     public $url;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tbl_comment}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'author', 'email',], 'required'],
            [['content'], 'string'],
            [['create_time'], 'safe'],
            ['email','email'],
            [['post_id'], 'integer'],
            [['status'], 'string', 'max' => 50],
            [['author', 'email', 'url'], 'string', 'max' => 128],
             ['verifyCode', 'captcha'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Content',
            'status' => 'Status',
            'create_time' => 'Create Time',
            'author' => 'Author',
            'email' => 'Email',
            'url' => 'Url',
            'post_id' => 'Post ID',
        ];
    }
}
