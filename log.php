<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once("./common/logconfig.php");
require_once("util_lib.php");
require_once("sqlite3Ope.php");
require_once("envOpe.php");
require_once ("Browser.php");
require_once ("detectOS.php");
#---------------------------------------------------------------------------------
#---------------------------------------------------------------------------------
$browser = new Browser();
$ip = $_SERVER["REMOTE_ADDR"];
//$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
//$country=$details->country;
//$city=$details->city;

$country='VN';
$city='HCM City';

$agent = $_SERVER["HTTP_USER_AGENT"];

$e = new UA_Info();
$result = $e->getNavInfo();

//$os = getOS($_SERVER['HTTP_USER_AGENT']);
$os =$browser->getPlatform();

$browser = $browser->getBrowser();

#-------------------------------------------------------------------------------------------------------
#--------------------------------------------------------------------------------------------------------

$host_addr = $_SERVER["HTTP_HOST"];
//$_GET["referrer"]="https://coccoc.com/search#query=viet+vang";
//$_GET["referrer"]="https://vn.search.yahoo.com/search?p=muinetrips.com&fr=yfp-t&fp=1&toggle=1&cop=mss&ei=UTF-8";

//$host_addr = "all-internet.jp";

$ref_info	= parse_url($_GET["referrer"]);

if(!empty($_GET["referrer"])){
    $ref_url	= $ref_info["scheme"]."://".$ref_info["host"].$ref_info["path"];

    $str = strstr($ref_url , $host_addr);

    if($str)$ref_url = "";
    if ($ref_url=='m.facebook.com/')
    {
        $ref_url='m.facebook.com';
    }
}

#----------------------------------------------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------------------------------
//$_SERVER['HTTP_REFERER']='http://www.google.com/search?hl=en&q=learn+php+2&client=firefox';
$file_info	= parse_url($_SERVER['HTTP_REFERER']);
//$file_info = isset($_SERVER['HTTP_REFERER']) ? parse_url($_SERVER['HTTP_REFERER']) : '';

$file_path = str_replace("/index.html","/",$file_info["path"]);
$file_path = str_replace("/index.php","/",$file_path);
$file_path = str_replace("/index.cfm","/",$file_path);

$fname		= $file_info["scheme"]."://".$file_info["host"].$file_path;

$filename = str_replace(".","_",$fname);

$refe = $_GET["referrer"];

$query = mb_convert_encoding(urldecode($ref_info["query"]),"UTF-8","auto");

/*
$str     = @file_get_contents($fname);
eregi("<title>(.+)</title>",$str,$title);
$title = mb_convert_encoding($title[1],"EUC-JP",auto);
*/

#----------------------------------------------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------------------------------

if($_COOKIE[$filename]!=$filename){
    $value = $filename;
    $expire = time() + 3600*3;
    setcookie($filename, $value, $expire);
    $unique = 1;
}else{
    $unique = 2;
}

#----------------------------------------------------------------------------------------------------------------------
#----------------------------------------------------------------------------------------------------------------------
if(!isset($_COOKIE["UNIQUE_USER"])){
    $cookie = "UNIQUE_USER";
    $value = "visited";
    $expire = time() + 3600*3;
    setcookie($cookie, $value, $expire);
    $unique_user = 1;
}else{
    $unique_user = 2;
}

#============================================
#============================================

$list_fn = "./list/engine.txt";
if(file_exists($list_fn))
    $engine_list = setting_read($list_fn);
unset($list_fn);

#====================================================================================
#====================================================================================
foreach($engine_list as $list){

    unset($eng);

    list($eng["name"],$eng["q"],$eng["uri"]) = explode("||",$list);
    if(@eregi("($eng[uri])",$refe)){

        $keyword = get_keyword($query ,$eng["q"]);

        $engine = $eng["name"];
    }
}

$query = $keyword;

#=================================================================================
#=================================================================================
//$engine='';
//ALTER TABLE ACCESS_LOG ADD ENGINE VARCHAR(255);
$db=new utilLib();
$date_now = date('Y-m-d');
//$date_now = '2018-04-02';

$time_now = date("H:i:s");

//$time_now='21:44:40';

$sql_ins = "
	INSERT INTO ACCESS_LOG(
		REMOTE_ADDR,
		USER_AGENT,
		REFERER,
		QUERY_STRING,
		ENGINE,
		OS,
		BROWSER,
		PAGE_URL,
		UNIQUE_FLG,
		USER_FLG,
		INS_DATE,
		TIME,
		COUNTRY,
		CITY
	)
	VALUES(
			'".$db->strRep($ip,5)."',
		'".$db->strRep($agent,5)."',
		'".$db->strRep($ref_url,5)."',
		'".$db->strRep($query,5)."',
		'".$db->strRep($engine,5)."',
		'".$db->strRep($os,5)."',
		'".$db->strRep($browser,5)."',
		'".$db->strRep($fname,5)."',
		'".$db->strRep($unique,5)."',
		'".$db->strRep($unique_user,5)."',
		'$date_now',
		'$time_now',
		'$country',
		'$city'
	)
	";
print_r($sql_ins);
if(!empty($sql_ins)){
    $dbh = new sqlite3Ope(SQLITE3_OPEN_READWRITE);
    $create=$dbh->sqlite3Ope(DB_FILEPATH,CREATE_SQL1);
//    $db_result = $dbh->add();
    $db_result = $dbh->regist($sql_ins);
    if($db_result)die("ABCD<hr>{$db_result}");
}
?>