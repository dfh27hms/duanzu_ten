<?php    
namespace backend\controllers\test;    
  
use Yii;  
use yii\web\Controller;  
use yii\base\Exception;  
use yii\helpers\Json;
use common\models\Upload;
use yii\helpers\FileHelper;

  
class UploadAction extends \yii\base\Action {
	public function run(){  
		$targetFolder = \Yii::$app->basePath.'/web/Uploads/'.date('Y/md');   
		$file = new \yii\helpers\FileHelper();
		$file->createDirectory($targetFolder);
		if (!empty($_FILES)){

            $title=isset($_POST["title"])?$_POST["title"]:"";
            $address=isset($_POST["address"])?$_POST["address"]:"";
            $url=isset($_POST["url"])?$_POST["url"]:"";
            $time_state=isset($_POST["time_state"])?$_POST["time_state"]:"";
            $time_stop=isset($_POST["time_stop"])?$_POST["time_stop"]:"";
            $states=isset($_POST["states"])?$_POST["states"]:"";
            $nn=new Upload();
            $nn->title="$title";
            $nn->address="$address";
            $nn->url="$url";
            $nn->time_state="$time_state";
            $nn->time_stop="$time_stop";
            $nn->states="$states";

			$tempFile = $_FILES['file_upload']['tmp_name'];
			$fileParts = pathinfo($_FILES['file_upload']['name']);
			$extension = $fileParts['extension'];  
			$random = time() . rand(1000, 9999);
			$randName = $random . "." . $extension;  
			$targetFile = rtrim($targetFolder,'/') . '/' . $randName;
			$fileTypes = array('jpg','jpeg','gif','png');
			$uploadfile_path = 'Uploads/'.date('Y/md').'/'.$randName;  
			$callback['url'] = $uploadfile_path;  
			$callback['filename'] = $fileParts['filename'];  
			$callback['randName'] = $random;  
			if (in_array($fileParts['extension'],$fileTypes)) {  
				move_uploaded_file($tempFile,$targetFile);
                //在这做入库
                //echo $targetFile;die;
                //$sql=Yii::$app->db->createCommand()->INSERT("lx_3_tu",["my_files"=>$targetFile])->execute();
                $nn->my_files="$targetFile";
                $sql=$nn->save();
                if($sql){
                    return $this->redirect(['/upload/upload_show']);
                }else{
                    return $this->redirect(['/test/uploadify']);
                }
			} else {
                echo '不能上传后缀为'.$fileParts['extension'].'文件';
			}  
		}else{  
			echo "没有上传文件";
		}         
	}  
}    