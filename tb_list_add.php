<?php
include_once('./db.php');
$data = $_POST;
if(!empty($data)){
    // print_r($data);
    // die;
    $fitting_id=$data['fitting_id'];
    $fitting=$data['fitting'];
    $order_id=$data['order_id'];
    $price=$data['price'];
    $add_time=$data['add_time'];
    $status=$data['status'];
    $cs=$data['cs'];
    $sql="insert into `tb_list` (`fitting_id`,`fitting`,`order_id`,`price`,`add_time`,`status`,`cs`)
     value ('$fitting_id','$fitting','$order_id','$price','$add_time','$status','$cs') ";
    $result=mysqli_query($link,$sql);
    //获取受影响的行数
    $rows=mysqli_affected_rows($link);
    if($rows>0){
        //输出API接口格式
        echo json_encode(['code'=>200,'msg'=>'添加成功']);
        die;
    }else{
        echo json_encode(array('code'=>404,'msg'=>'添加失败'));
        die;
    }

}

?>