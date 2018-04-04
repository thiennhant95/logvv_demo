<?php
#---------------------------------------------------------------
#---------------------------------------------------------------
//if( !$_SERVER['PHP_AUTH_USER'] || !$_SERVER['PHP_AUTH_PW'] ){
//	header("HTTP/1.0 404 Not Found"); exit();
//}
//if(!$injustice_access_chk){
//	header("HTTP/1.0 404 Not Found"); exit();
//}

$db=new  utilLib();
extract($db->getRequestParams("post",array(8,7,1,4),true));

if(!strstr($filename,"access_log_db")||empty($filename)){
	die("Not found.<br>{$res_id}");
}

////////////////////////////////////////////////////////////////
// �����ե�����δ������

	// ���ե�����κ��
	if(file_exists(ACCESS_PATH.$filename)){
		unlink(ACCESS_PATH.$filename) or die("Deleted");
	}


?>