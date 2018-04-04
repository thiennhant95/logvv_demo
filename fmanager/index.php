<?php
#---------------------------------------------------------------
#---------------------------------------------------------------
//if( !$_SERVER['PHP_AUTH_USER'] || !$_SERVER['PHP_AUTH_PW'] ){
//	header("HTTP/1.0 404 Not Found"); exit();
//}

$injustice_access_chk = 1;

require_once("../common/logconfig.php");
require_once("util_lib.php");
require_once("sqlite3Ope.php");

#===============================================================================
#===============================================================================
if (!isset($_POST["action"]))$_POST["action"]='';
switch($_POST["action"]):
case "del_file":
	include("LGC_delfile.php");
	header("Location: {$_SERVER['PHP_SELF']}");
	break;

default:

include("./DISP_listview.php");

endswitch;

?>