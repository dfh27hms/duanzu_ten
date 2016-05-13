<?php

namespace backend\controllers;


use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use common\models\LoginForm;
use common\models\Upload;
use yii\filters\VerbFilter;

use yii\base\Exception;
use yii\helpers\Json;
use yii\helpers\FileHelper;

class UploadController extends \yii\web\Controller
{
    public function actionUpload()
    {
        return $this->render('upload');
    }
    //添加
    public function actionUpload_add()
    {
        $targetFolder = \Yii::$app->basePath.'/web/Uploads/';
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
            $uploadfile_path = 'Uploads/'.$randName;
            $callback['url'] = $uploadfile_path;
            $callback['filename'] = $fileParts['filename'];
            $callback['randName'] = $random;
            if (in_array($fileParts['extension'],$fileTypes)) {
                move_uploaded_file($tempFile,$targetFile);

                $nn->my_files="$uploadfile_path";
                $sql=$nn->save();
                if($sql){
                    return $this->redirect(['/upload/upload_show']);
                }else{
                    return $this->redirect(['/upload/upload']);
                }
            } else {
                echo '不能上传后缀为'.$fileParts['extension'].'文件';
            }
        }else{
            echo "没有上传文件";
        }
    }
    //展示
    public function actionUpload_show()
    {
        $nn=Yii::$app->db->createCommand("SELECT * FROM lx_3_tu");
        $posts = $nn->queryAll();
        return $this->render('list',array("list"=>$posts));
    }
    //添加用户、角色
    public function actionUser()
    {
        return $this->render('user_rule');
    }
}
