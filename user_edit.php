<?php
include_once('./db.php');
// print_r($_POST);
// die;
$id=$_POST['id'];
 $sql="select * from tb_user where `id` =$id";
$result=mysqli_query($link,$sql);
$row=$result->fetch_assoc();

//获取前端axios传递的数据
// print_r($_POST);
// die;
$username=$_POST['username'];
$tel=$_POST['tel'];
$password=$_POST['password'];
//密码加密
$password=md5($password);
// die;
$sql2="update tb_user set `username`='$username',`tel`='$tel',`password`='$password'  where `id`=$id ";
$query=mysqli_query($link,$sql2);
//获取影响行数
$num=mysqli_affected_rows($link);
if($num>0){
    echo 1;
    die;
}else{
    echo 0;
    die;
}
?>