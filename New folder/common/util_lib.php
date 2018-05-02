<?php
//echo phpinfo();
/**********************************************************************************************************
**********************************************************************************************************/
class utilLib{


#-----------------------------------------------------------------
#-----------------------------------------------------------------
function errorDisp($error){

echo "<html><head><title>Error!!</title></head>";
echo "<body bgcolor=\"#FFFFFF\">";
echo "<h2 align=\"center\">";

	echo "<font color=\"red\">$error</font>"; 

echo "</h2><h2 align=\"center\"></h2>";
echo "<p></p><p align=\"center\">";
echo "<form><div align=\"center\">";
echo "<input type=\"button\" value=\"���\" onClick=\"history.back()\"></div>";
echo "</form>";
echo "<p></p><h2 align=\"center\"></h2>";
echo "</body></html>";

}
#-------------------------------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------------------------------
function strRep($str,$mode){

	switch($mode):
	
		case 0:
			
			if(!empty($str)){
				if(is_array($str)):
					for($i=0;$i<count($str);$i++):
						$str[$i] = @ereg_replace("\\\\","",$str[$i]);
						$str[$i] = @ereg_replace("\|","",$str[$i]);
						$str[$i] = @ereg_replace("&","",$str[$i]);
						$str[$i] = @ereg_replace("\@","",$str[$i]);
						$str[$i] = @ereg_replace(";","",$str[$i]);
						$str[$i] = @ereg_replace("`","",$str[$i]);
					endfor;
				else:
					$str = @ereg_replace("\\\\","",$str);
					$str = @ereg_replace("\|","",$str);
					$str = @ereg_replace("&","",$str);
					$str = @ereg_replace("\@","",$str);
					$str = @ereg_replace(";","",$str);
					$str = @ereg_replace("`","",$str);
					
				endif;
			}
			
			break;
		case 1:
		
			if(!empty($str)){
				if(is_array($str)):
					for($i=0;$i<count($str);$i++)$str[$i] = htmlspecialchars($str[$i]);
				else:
					$str = htmlspecialchars($str);
				endif;
			}

			break;	
		case 2:

			if(!empty($str)){
				if(is_array($str)):
					for($i=0;$i<count($str);$i++)$str[$i] = @ereg_replace("[\r\n]","",$str[$i]);
				else:
					$str = @ereg_replace("[\r\n]","",$str);
				endif;
			}

			break;
		case 3:
			
			if(!empty($str)){
				if(is_array($str)):
					for($i=0;$i<count($str);$i++)$str[$i] = @ereg_replace("[\r\n]","<br>",$str[$i]);
				else:
					@ereg_replace("[\r\n]","<br>",$str);
				endif;
			}

			break;
		case 4:
		
			if(!empty($str) && get_magic_quotes_gpc()){
				if(is_array($str)):
					for($i=0;$i<count($str);$i++)$str[$i] = stripslashes($str[$i]);
				else:
					$str = stripslashes($str);
				endif;
			}
			break;	
		case 5:

			if(!empty($str)){
				if(is_array($str)):
					for($i=0;$i<count($str);$i++)$str[$i] = addslashes($str[$i]);
				else:
					$str = addslashes($str);
				endif;
			}

			break;
		case 6:

			if(!empty($str)){
				if(is_array($str)):
					for($i=0;$i<count($str);$i++)$str[$i] = str_replace(",","&#44;",$str[$i]);
				else:
					$str = str_replace(",","&#44;",$str);
				endif;
			}

			break;
		case 7:

			if(!empty($str)):
				if(is_array($str)){
					for($i=0;$i<count($str);$i++):
						$str[$i] = @ereg_replace("^[[:space:]]{0,}","",$str[$i]);
						$str[$i] = @ereg_replace("[[:space:]]{0,}$","",$str[$i]);
						$str[$i] = mb_ereg_replace("^(��){0,}","",$str[$i]);
						$str[$i] = mb_ereg_replace("(��){0,}$","",$str[$i]);
						$str[$i] = trim($str[$i]);	# �Ǹ�˥���ȥ��륳���ɤ�����
					endfor;
				}
				else{
					$str = @ereg_replace("^[[:space:]]{0,}","",$str);
					$str = @ereg_replace("[[:space:]]{0,}$","",$str);
					$str = mb_ereg_replace("^(��){0,}","",$str);
					$str = mb_ereg_replace("(��){0,}$","",$str);
					$str = trim($str);	# �Ǹ�˥���ȥ��륳���ɤ�����
				}
			endif;

			break;
		case 8:

			if(!empty($str)){
				if(is_array($str)):
					for($i=0;$i<count($str);$i++)$str[$i] = strip_tags($str[$i]);
				else:
					$str = strip_tags($str);
				endif;
			}
	
			break;
	endswitch;

	return $str;

}
#--------------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------------
function strCheck($str,$mode,$mes){
	
	$errmes = "";
	switch($mode):
	
		case 0:
			if($str == ""){$errmes .= "{$mes}<br>\n";}
			break;
		case 1:
			if(ereg("[[:blank:]]|[[:space:]]",$str)){$errmes .= "{$mes}<br>\n";}
			break;
		case 2:
			if(ereg("[^0-9]",$str)){$errmes .= "{$mes}<br>\n";}
			break;
		case 3:
			if(ereg("[^_a-zA-Z0-9]",$str)){$errmes .= "{$mes}<br>\n";}
			break;
		case 4:
			if(ereg("\.$|\/$|\@$|,$",$str)){$errmes .= "{$mes}<br>\n";}
			break;
		case 5:
			if(preg_match("/\||&|\/|\"|\\\/",$str)){$errmes .= "{$mes}<br>\n";}
			break;
		case 6:
			if(!ereg("^(.+)@(.+)\\.(.+)$",$str)){$errmes .= "{$mes}<br>\n";}
			break;
		case 7:
			if($str == true){$errmes .= "{$mes}<br>\n";}
			break;
		case 8:
			if($str == false){$errmes .= "{$mes}<br>\n";}
			break;
		case 9:
			if($str == null){$errmes .= "{$mes}<br>\n";}
			break;

	endswitch;

	return $errmes;

}
#------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
function httpHeadersPrint($charset="",$css_js_flg=false,$time_flg=false,$cache_flg=false,$robot_flg=false){

	if(!$charset)$charset = "UTF-8";
	header("Content-Type: text/html; charset={$charset}");
	header("Content-Language: jp");

	if($css_js_flg){
		header("Content-Style-Type: text/css");
		header("Content-Script-Type: text/javascript");
	}

	if($time_flg){
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	}

	if($cache_flg){
		header("Cache-Control: no-store, no-cache, must-revalidate");
		header("Cache-Control: post-check=0, pre-check=0", false);
		header("Cache-Control: no-cache, no-store");
		header("Pragma: no-cache");
	}

	if($robot_flg){
		header("Robots: noindex,nofollow");
		header("Robots: noarchive");
	}

}
#--------------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------------
function  browserChk(){
	$ua_chk = $_SERVER['HTTP_USER_AGENT'];
		
	if(stristr($ua_chk,"MSIE")){$result = false;}
	elseif(stristr($ua_chk,"Opera")){$result = false;}
	elseif(stristr($ua_chk,"Netscape")){$result = false;}
	elseif(stristr($ua_chk,"Safari")){$result = false;}
	elseif(stristr($ua_chk,"Gecko")){$result = false;}
	else{$result = true;}

	return $result;
}
#-------------------------------------------------------------------------------------------------------------
#-------------------------------------------------------------------------------------------------------------
function limitExec($start_arr,$end_arr=""){

	if(empty($start_arr)){die("");}
	elseif(is_array($start_arr)){$st = sprintf("%04d",$start_arr[0]);for($i=1;$i<=5;$i++)$st .= sprintf("%02d",$start_arr[$i]);}
	else{die("");}

	/**/
	if(!empty($end_arr)):
		if(is_array($end_arr)){$et = sprintf("%04d",$end_arr[0]);for($i=1;$i<=5;$i++)$et .= sprintf("%02d",$end_arr[$i]);}
		else{die("");}
	endif;
	$nt = date("YmdHis");
	if(empty($end_arr)):

		$result = ($nt > $st)?true:false;
		return $result;

	else:
	
		$result = (($nt > $st) && ($nt < $et))?true:false;
		return $result;
	
	endif;

}
#------------------------------------------------------------------------------------------------------------------------------
#------------------------------------------------------------------------------------------------------------------------------
function getRequestParams($type = "",$rep_mode = array(),$HanToZen = true){

	$method_type = array();
	$param = array();

	switch($type):
		case "get": $method_type = $_GET;break;
		case "GET": $method_type = $_GET;break;
		case "post": $method_type = $_POST;break;
		case "POST": $method_type = $_POST;break;
		default: $method_type = $_POST;
	endswitch;

	foreach($method_type as $k=>$e):

        if(!empty($rep_mode))foreach($rep_mode as $mode)utilLib::strRep($e,$mode);

	if(is_string($e) && $HanToZen):
			switch($HanToZen):
				case "m":$e = mb_convert_kana($e,"KV");break;
				case "i":$e = i18n_ja_jp_hantozen($e,"KV");break;
				default:$e = mb_convert_kana($e,"KV");break;
			endswitch;
		endif;

		$params[$k] = $e;
	endforeach;

	return $params;
}


#--------------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------------
function getEasyUserAgent() {
	$ua_chk = $_SERVER['HTTP_USER_AGENT'];

	$easy_user_agent = '';
	if(stristr($ua_chk,"Opera")){$easy_user_agent = 'opera';}
	elseif(stristr($ua_chk,"MSIE")){$easy_user_agent = 'msie';}
	elseif(stristr($ua_chk,"Trident")){$easy_user_agent = 'trident';}
	elseif(stristr($ua_chk,"Chrome")){$easy_user_agent = 'chrome';}
	elseif(stristr($ua_chk,"Netscape")){$easy_user_agent = 'netscape';}
	elseif(stristr($ua_chk,"Safari")){$easy_user_agent = 'safari';}
	elseif(stristr($ua_chk,"Firefox")){$easy_user_agent = 'firefox';}

	return $easy_user_agent;
}


#--------------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------------
function isUserAgent($user_agent_list) {
	if(!is_array($user_agent_list)) {
		$user_agent_list = array($user_agent_list);
	}

	$check_list = array();
	foreach ($user_agent_list as $user_agent_data) {
		$check_list[] = strtolower($user_agent_data);
	}

	return in_array(utilLib::getEasyUserAgent(), $check_list);
}
}
?>