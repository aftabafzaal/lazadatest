<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $username
 * @property string $email
 * @property string $created
 * @property string $modfied
 *
 * @property PostsTags[] $postsTags
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'username', 'email'], 'required'],
            [['description'], 'string'],
            [['created', 'modfied'], 'safe'],
            [['title', 'username'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'username' => 'Username',
            'email' => 'Email',
            'created' => 'Created',
            'modfied' => 'Modfied',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostsTags()
    {
        return $this->hasMany(PostsTags::className(), ['post_id' => 'id']);
    }
}
