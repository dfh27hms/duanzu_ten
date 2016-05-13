<?php    
namespace backend\controllers\test;    

use Yii;  
use yii\web\Controller;  
use yii\web\NotFoundHttpException;  
use common\models\Model;
use yii\web\UploadedFile;  
use yii\helpers\Json;  

class UploadifyAction extends \yii\base\Action {    
	public function run() {    
		return $this->controller->render('uploadify');
	}    
}    