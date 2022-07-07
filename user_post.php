<?php
include_once('./db.php');
$id=$_GET['id'];
// sql找出当前id的数据
$sql="select * from tb_user where id=$id";
$result=mysqli_query($link,$sql);
//单条值
$row=$result->fetch_assoc();
//输出API接口格式
echo json_encode($row);
//关闭连接
mysqli_close($link);
die;
?>