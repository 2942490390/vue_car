<?php
include_once('./db.php');
$data=$_POST;
// print_r($_POST);
if(!empty($data)){
    // print_r($data);
    // die;
    $username=$data['username'];
    $sql="select username from `tb_user` where username='$username'";
    // echo $sql;
    // die;
    $result=mysqli_query($link,$sql);
    $rows=mysqli_num_rows($result);
    if($rows>0){
        echo json_encode(['code'=>404,'msg'=>'用户名已存在']);
        die;
    }
}

?>