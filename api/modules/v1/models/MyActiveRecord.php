<?php 
namespace api\modules\v1\models;
use \yii\db\ActiveRecord;
use \yii\db\Query;
use \api\modules\v1\models\Logs;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

class MyActiveRecord extends \yii\db\ActiveRecord
{
	
	public function behaviors()
	{
		return [
		[
		'class' => TimestampBehavior::className(),
		'createdAtAttribute' => 'created',
		'updatedAtAttribute' => 'modified',
		'value' => new Expression('NOW()')
		],
		];
	}
	
}