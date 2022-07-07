<?php
	/*
	*向数据表新增数据
	* $link 连接数据库的资源集变量
	*$table_name 需要插入数据的数据表名称
	*$data 数据数组(一维),数组的元素下标，对应表的字段名称，元素的值是对应需要插入数据的字段值
	*核心，构造出相应的插入命令 insert into
	*/
	function insert($link,$table_name,$data){
		
		$filed_string = '';
		$value_string = '';
		foreach($data as $key=>$val){
			
			$filed_string .=  '`'.$key.'`,'; // 组装字段列表的字符串
			$value_string .= "'".$val."',";
		}
		$filed_string = substr($filed_string,0,-1);
		$value_string = substr($value_string,0,-1);
		
		 $sql = "insert into $table_name ($filed_string) values($value_string) ";
		
		$result = mysqli_query($link,$sql);
		return	$nums = mysqli_affected_rows($link); //上面执行的sql影响数据表的行数 1
	}
	/*
	*修改数据表的数据
	*$link 连接数据库的资源集变量
	*$table_name 需要插入数据的数据表名称
	*$data 数据数组(一维),数组的元素下标，对应表的字段名称，元素的值是对应需要修改数据的字段值
	*$where 按什么条件去修改
	*核心，构造出相应的修改命令 update
	*/
	function update($link,$table_name,$data,$where){
		$string = '';
		foreach($data as $key=>$val){
		$string .= 	'`'.$key.'`'.'='."'".$val."'".',';
			
		}
		$string = substr($string,0,-1);
		
		 $sql = "update $table_name set $string where $where ";
		
		
		$result = mysqli_query($link,$sql);
		return	$nums = mysqli_affected_rows($link); //上面执行的sql影响数据表的行数
	}
	
	/*
	*删除数据
	*$link 连接数据库的资源集变量
	*$table_name 需要删除数据的数据表名称
	*$where 按什么条件去删除
	*/
   function delete($link,$table_name,$where){
   	
   	$sql = "delete from $table_name where $where ";
    $result = mysqli_query($link,$sql);
	return $nums = mysqli_affected_rows($link); //上面执行的sql影响数据表的行数
   	
   }
   
   /*
   	*删除数据
   	*$link 连接数据库的资源集变量
   	*$table_name 需要删除数据的数据表名称
   	*$where 按什么条件去删除
   	*/
   function deleteById($link,$table_name,$id){
   	
   	$sql = "delete from $table_name where id='$id' ";
   	return $result = mysqli_query($link,$sql);
   	
   }
   
   /*
	* 根据sql命令，查询返回查询列表
	*$link 链接数据库的资源
	$sql 对于的数据库查询命令
	返回 查询命令查询到的数据结果(二维数组)
   */
  function selectBysql($link,$sql){
	  
	  $query = mysqli_query($link,$sql); //得到的是一个资源集的数据
	  $list = [];
	  while($row = mysqli_fetch_assoc($query)){
	  	$list[] = $row; //将每一条数据的数组，放入一个数组里面，得到一个二维数组
	  }
	  
	  return $list;
  }
  /*
  	* 根据表名称和条件查询
  	*$link 链接数据库的资源
  	 $table_name 对于的数据表名称
	 $where 查询条件
  	返回 查询命令查询到的数据结果(二维数组)
  */
 function getList($link,$table_name,$where= ' 1 '){
	 $sql = "select * from $table_name where $where ";
	 $query = mysqli_query($link,$sql); //得到的是一个资源集的数据
	 $list = [];
	 while($row = mysqli_fetch_assoc($query)){
	 	$list[] = $row; //将每一条数据的数组，放入一个数组里面，得到一个二维数组
	 }
	 
	 return $list;
	 
 }
 
 /*
 * 查询一条记录
 */
  function getOne($link,$sql){
	  $query = mysqli_query($link,$sql); //得到一个资源数据
	  return mysqli_fetch_assoc($query);
  }
  
/*
* 查询一条记录 根据Id查询
*/
  function getOnebyId($link,$table_name,$id){
	  $sql = "select * from $table_name where id ='$id'"; 
	  $query = mysqli_query($link,$sql); //得到一个资源数据
	  return mysqli_fetch_assoc($query);
  }
  
  /*
  *查询一条记录 根据查询条件
  */
 function find($link,$table_name,$where=1){
	 $sql = "select * from $table_name where $where ";
	 $query = mysqli_query($link,$sql); //得到一个资源数据
	 return mysqli_fetch_assoc($query);
 }
   
	
?>