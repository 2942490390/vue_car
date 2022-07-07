<?php
include_once('./db.php');
$add_time=$_GET['add_time'];
// sql找出当前id的数据
$sql="select * from tb_list where add_time='$add_time' ";

$result=mysqli_query($link,$sql);
//转成数组

$row=mysqli_fetch_assoc($result);

//输出API接口格式
echo json_encode($row);
//关闭连接
mysqli_close($link);
?>