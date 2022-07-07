<?php
include_once('./db.php');
$data=$_POST;

// print_r($file);
if(!empty($data)){
    // print_r($data);
    $reg_name=$data['reg_name'];
    $reg_pass=$data['reg_pass'];
    $roots=1;
    $sql="select * from `tb_admin` where `uname` = '$reg_name' ";
    $query=mysqli_query($link,$sql);
    //获取查询结果
    $result=mysqli_fetch_assoc($query);
    // print_r($result);
    if($result){
        echo json_encode(array('code'=>1,'msg'=>'用户名已存在'));
        die;
    }else{
        $reg_pass=md5($reg_pass);

       $insert="insert into `tb_admin` (`uname`,`password`,`root`) value ('$reg_name','$reg_pass','$roots') ";
    //    echo $insert;
    //    die;
        $query=mysqli_query($link,$insert);
        $num = mysqli_affected_rows($link);
        if($num){
            echo json_encode(array('code'=>200,'msg'=>'注册成功'));
            die;
        }else{
            echo json_encode(array('code'=>403,'msg'=>'注册失败'));
            die;
        }
    }
    
}




?>