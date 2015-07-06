<?php

namespace api\modules\v1\models;
use \yii\db\ActiveRecord;

use Yii;

/**
 * This is the model class for table "logs".
 *
 * @property integer $id
 * @property string $model
 * @property integer $model_id
 * @property string $description
 * @property string $created
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model', 'model_id', 'description', 'created'], 'required'],
            [['model_id'], 'integer'],
            [['description'], 'string'],
            [['created'], 'safe'],
            [['model'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'model_id' => 'Model ID',
            'description' => 'Description',
            'created' => 'Created',
        ];
    }
}
