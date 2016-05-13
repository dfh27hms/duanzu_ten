<pre name="code" class="php">
<?php  
$this->registerJsFile('res/js/jquery.uploadify.min.js', ['depends' => 'yii\web\YiiAsset']);  
?>
<link rel="stylesheet" type="text/css" href="res/css/uploadify.css">
<form method="post" action="index.php?r=test/upload" enctype="multipart/form-data">
    <input type="hidden" name="_csrf" value="<?php echo Yii::$app->request->csrfToken; ?>"/>
    <table>
        <tr>
            <td>
                标题(请输入标题)<br/>
                <input type="text" name="title"/>
            </td>
        </tr>
        <tr>
            <td>
                推荐位置<br/>
                <input type="text" name="address"/>
            </td>
        </tr>
        <tr>
            <td>
                广告图片(请上传广告图片)<br/>
                <input id="file_upload" name="file_upload" type="file" multiple="true">
            </td>
        </tr>
        <tr>
            <td>
                外销地址(请填写带http://的全路径)<br/>
                <input type="text" name="url"/>
            </td>
        </tr>
        <tr>
            <td>
                开始时间<br/>
                <input type="text" name="time_state"/>
            </td>
        </tr>
        <tr>
            <td>
                结束时间<br/>
                <input type="text" name="time_stop"/>
            </td>
        </tr>
        <tr>
            <td>
                优先级<br/>
                <input type="text" name="states"/>
            </td>
        </tr>
        <tr>
            <td>
                <input type="submit" value="确定"/><input type="reset" value="重置"/>

            </td>
        </tr>
    </table>
</form>
<?php
$csrfParam = Yii::$app->request->csrfParam;  
$csrfToken = Yii::$app->request->csrfToken;  
$uploadUrl = Yii::$app->urlManager->createUrl('/test/upload');  
$this->registerJs("  
	$('#file_upload').uploadify({  
		'debug'    : true,  
		'multi'    : false,单图和多图参数设置
		'height'   : 50,  
		'width'    :150,  
		'buttonText': '上传图片',
		'fileExt': '*.jpg;*.jpeg;*.gif;*.png',  
		'formData': {  
			'{$csrfParam}': '{$csrfToken}',  
		},  
		'swf': 'res/js/uploadify.swf',  
		'uploader': '{$uploadUrl}',  
		'onUploadSuccess' : function(file, data, response) {  
			$('#tu').val(data);  
			 console.log(data);  
			 var dataObj = eval('('+data+')');  
			 console.log(dataObj);  
		},  
		  
	});  
");  
?>  