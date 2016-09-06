<?php 

	//ham thiet lap da dang nhap
	function set_logged($username,$level)
	{
		session_set('ss_user_token',array(
			'username' => $username,
			'level'=> $level));
	}

	//ham thiet lap dang xuat
	function set_logout()
	{
		session_delete('ss_user_token');
	}

	//ham kiem tra trang thai nguoi dang da dang nhap chua
	function is_logged()
	{
		$user=session_get('ss_user_token');
		return $user;
	}

	//Ham kiem tra co phai admin hay khong
	function is_admin()
	{
		$user=is_logged();
		if(!empty($user['level']) && $user['level']=='1')
		{
			return true;
		}
		return false;
	}
 ?>