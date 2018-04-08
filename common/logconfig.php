<?php
set_include_path(get_include_path() . PATH_SEPARATOR . dirname(__FILE__));

#===================================================================================
define('VARSION_CONFIG',2);

#=================================================================================
define('NAME_COMPANY','NAME COMPANY');
#=================================================================================
#=================================================================================
define('LOGFILE_SIZE_MAX',100000);

#=================================================================================
#=================================================================================
define('ALERT_MAIL_SEND',1);

#=================================================================================
#=================================================================================
$date_name = date('Y_m');

define('ACCESS_PATH',$_SERVER['DOCUMENT_ROOT']."/logvv_demo/");
define('DB_FILEPATH',ACCESS_PATH.$date_name."_access_log_db");
define('CREATE_SQL',"CREATE TABLE ACCESS_LOG(ID INTEGER PRIMARY KEY,REMOTE_ADDR,USER_AGENT,REFERER,QUERY_STRING,ENGINE,OS,BROWSER,PAGE_URL,UNIQUE_FLG,USER_FLG,INS_DATE,TIME,DEL_FLG DEFAULT 0);");
define('CREATE_SQL1','create table if not exists `ACCESS_LOG` (
`ID` INTEGER PRIMARY KEY, 
`REMOTE_ADDR` VARCHAR(128), 
`USER_AGENT` VARCHAR (128),
`QUERY_STRING` VARCHAR (128),
`REFERER` VARCHAR (128),
`ENGINE` VARCHAR (128),
`OS` VARCHAR (128),
`BROWSER` VARCHAR (128),
`PAGE_URL` VARCHAR (128),
`UNIQUE_FLG` VARCHAR (128),
`USER_FLG` VARCHAR (128),
`INS_DATE` VARCHAR (128),
`TIME` VARCHAR (128),
`DEL_FLG` DEFAULT 0,
`COUNTRY` VARCHAR(128) ,
`CITY` VARCHAR(128)
)');

#==================================================================================
#==================================================================================

function setting_read($uri){
    if(file_exists($uri)){
        if($arr_exclude = @file($uri)){
            $arr_exclude = @array_unique($arr_exclude);
            foreach($arr_exclude as $k => $v){
                $arr_exclude[$k] = trim($v);
            }
            return $arr_exclude;
        }
    }
}


function get_keyword($query ,$query_key){
    global $google_cache;
    $keyword = "";
    foreach(explode("&", $query) as $tmp){
        unset($k,$v);
        list($k,$v) = explode("=", $tmp);
        $k = @eregi_replace('amp;', '', $k);
        if($k == $query_key){
            if(trim($v) == "") continue;
            $v = urldecode($v);
            if(function_exists('mb_convert_encoding')){
                $v = @mb_convert_encoding($v, "EUC", "auto");
            }else{
                $v = jcode_convert_encoding($v,'euc-jp');
            }
            $v = str_replace('+', ' ', $v);
            if(function_exists('mb_ereg_replace')){
                $v = @mb_ereg_replace('　', ' ', $v);
            }else{
                $v = jstr_replace('　', ' ', $v);
            }
            $v = @ereg_replace(" {2,}", " ", $v);
            $v = trim($v);

            if($google_cache && ereg('^cache:',$v)) continue;
            if($v == "") continue;

            $v = "［".@ereg_replace(' ', '］&nbsp;［', $v)."］";

            $keyword = $v;
            break;
        }
    }
    return $keyword;
}


?>