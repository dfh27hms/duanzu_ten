<?php  
namespace backend\controllers;  
  
use Yii;  
use yii\filters\AccessControl;  
use yii\web\Controller;  
use common\models\LoginForm;  
use yii\filters\VerbFilter;  
  
/** 
 * Site controller 
 */  
class TestController extends Controller
{
	 public function actions(){
		return [     
				'uploadify' => [
						'class' => 'backend\controllers\test\UploadifyAction',  
				],  
				'upload' => [     
						'class' => 'backend\controllers\test\UploadAction',  
				],
        ];
	 }  
 }  