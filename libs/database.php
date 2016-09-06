<?php
	$conn = null;

	//Ham ket noi
	function db_connect()
	{
		global $conn;
		if(!$conn)
		{
			$conn=mysqli_connect('localhost','root','','php_example') or die("Cann't connect to DB");
			mysqli_set_char($conn,'utf8');
		}
	}

	//Ham ngat ket noi
	function db_disconnect()
	{
		global $conn;
		if($conn)
		{
			mysqli_close($conn);
		}
	}

	//Ham lay danh sach, ket qua luu ve trong 1 bang
	function db_get_list($sql)
	{
		db_connect();
		global $conn;
		$data = array();
		$result = mysqli_query($conn,$sql);
		while($row=mysqli_fetch_assoc($result))
		{
			$data[]=$row;
		}
		return $data;
	}

	//Ham lay chi tiet, dung select theo ID va tra ve 1 record
	function db_get_row($sql)
	{
		db_connect();
		global $conn;
		$result=mysql_query($conn,$sql);
		$row=array();
		if(mysqli_num_rows($result)>0)
		{
			$row=mysqli_fetch_assoc($result);
		}
		return $row;
	}

	//Ham thuc thi cau truy van insert,update,delete
	function db_execute($sql)
	{
		db_connect();
		global $conn;
		return mysqli_query($conn,$sql);
	}

 ?>