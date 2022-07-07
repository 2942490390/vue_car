<?php
include_once('./db.php');
$origin = ['http://localhost:8080','http://localhost:8081'];
$AllowOrigin = 'http://localhost:3000';
if(in_array($_SERVER["HTTP_ORIGIN"],$origin))
{
    $AllowOrigin = $_SERVER["HTTP_ORIGIN"];
}
// header("Access-Control-Allow-Origin: ".$AllowOrigin );

$data=$_POST;
if(!empty($data)){
    // print_r($data);
    // die;
    $id=$data['id'];
    $uname=$data['uname'];
    $password=$data['password'];
    //密码加密
    $password=md5($password);
    $sql="update `tb_admin` set  `uname`='$uname',`password`='$password'  where  `id`=$id ";
        // print_r($sql);
        $query=mysqli_query($link,$sql);
        $num = mysqli_affected_rows($link);
        if($num>0){
            echo json_encode(array('code'=>200,'msg'=>'修改成功'));
        die;
        }else{
        echo json_encode(array('code'=>403,'msg'=>'修改失败'));
        die;
  }
}
?>