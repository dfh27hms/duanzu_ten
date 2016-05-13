<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <th style="width: 20px"><input type="checkbox"/></th>
            <th style="width: 20px">ID</th>
            <th style="width: 130px">标题</th>
            <th style="width: 130px">图</th>
            <th style="width: 60px">推荐位</th>
            <th style="width: 130px">url</th>
            <th style="width: 80px">开始时间</th>
            <th style="width: 80px">结束时间</th>
            <th style="width: 64px">优先级</th>
            <th style="width: 58px">状态</th>
            <th style="width: 120px">操作</th>
        </tr>
        <?php foreach($list as $key=>$val){?>
        <tr style="height: 60px">
            <td><input type="checkbox"/></td>
            <td><?php echo $val['id'];?></td>
            <td><?php echo $val['title'];?></td>
            <td><img src="./<?php echo $val["my_files"]?>" width="60px"/></td>
            <td><?php echo $val['address'];?></td>
            <td><?php echo $val['url'];?></td>
            <td><?php echo $val['time_state'];?></td>
            <td><?php echo $val['time_stop'];?></td>
            <td><?php echo $val['states'];?></td>
            <td>正常</td>
            <td>
                <a href="">禁用</a>
                <a href="">编辑</a>
                <a href="">删除</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>