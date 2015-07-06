<?php

namespace api\modules\v1\models;
use \yii\db\Query;
use \api\modules\v1\models\Logs;
use api\modules\v1\models\MyActiveRecord;
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
 * @property string $modified
 *
 * @property PostsTags[] $postsTags
 */
class Posts extends MyActiveRecord
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
            [['created', 'modified'], 'safe'],
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
            'modified' => 'modified',
        ];
    }
    
    public static function getPostByTags()
    {
    	$query = new Query;
    	$query
    	->from('tags')
    	->join('JOIN','posts_tags','posts_tags.tag_id = tags.id')
    	->join('JOIN','posts','posts_tags.post_id = posts.id')
    	->where(['tags.name' => $_GET['tags']]);
    	$rows = $query->all();
    	return $rows;
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostsTags()
    {
        return $this->hasMany(PostsTags::className(), ['post_id' => 'id']);
    }
    
    public function beforeDelete()
    {
    	parent::beforeDelete();
    	
    	$count = Posts::findOne($this->id);
    	
    	
    	$model=new Logs();
    	$model->model_id=$this->id;
    	$model->model='Posts';
    	$model->description=serialize($count->attributes);
    	$model->created=date("Y-m-d H:i:s");
    	
    	
    	if($model->save(false)){
    	
    	$body="<p>Post Id: ".$count->id."</p>";
    	$body.="<p>Log Id: ".$model->id."</p>";
    	$body.="<p>Title: ".$count->title."</p>";
    	$body.="<p>Deleted On: ".$model->created."</p>";
    	
    	Yii::$app->mailer->compose()
    	->setFrom(Yii::$app->params['adminEmail'])
    	->setTo(Yii::$app->params['deleteEmail'])
    	->setSubject('Post Deleted')
    	->setTextBody("Log Id: ".$model->id)
    	->setHtmlBody($body)
    	->send();
    	return true;
    	}
    	
    }
    
}
