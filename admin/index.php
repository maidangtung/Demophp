<?php

//Dinh nghia mot hang so bao ve project
define("IN_SITE",true);

	//Lay module va action tren URL
	$module= isset($_GET['m'])? $_GET['m']:'';
	$action= isset($_GET['a'])? $_GET['a']:'';

	//TH khong truyen module va action thi mac dinh module=common va action=login
	if(empty($module) || empty($action))
	{
		$module='common';
		$action='login';
	}

	//Tao duong dan va luu vao bien PATH
	$path='modules/'.$module.'/'.$action.'.php';

	//Truong hop URL chay dung
	if(file_exists($path))
	{
		include_once('../libs/session.php');
		include_once('../libs/database.php');
		include_once('../libs/role.php');
		include_once('../libs/helper.php');
		include_once($path);
	}
	else
	{
		//truong hop URL chay sai
		include_once('modules/common/404.php');
	}
 ?>