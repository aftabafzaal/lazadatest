<?php

namespace api\modules\v1\controllers;

use yii\rest\ActiveController;
use api\modules\v1\models\Posts;



class PostsController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Posts';
    
    
    
    
    public function actionSearch()
    {
    	if(isset($_GET['tags'])){
    		$model = Posts::getPostByTags();
    		//$model->count=count($model);
    		return $model;
    	}else
    	{
    		//Yii::$app->response->statusCode = 455;
    		return false;
    	}
    }
    
    public function actionCount()
    {
    	if(isset($_GET['tags'])){
    		$model = Posts::getPostByTags();
    		//$model->count=count($model);
    		return count($model);
    	}else
    	{
    		//Yii::$app->response->statusCode = 455;
    		return false;
    	}
    }
    
}


