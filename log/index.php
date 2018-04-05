<?php
#---------------------------------------------------------------
#---------------------------------------------------------------
//if( !$_SERVER['PHP_AUTH_USER'] || !$_SERVER['PHP_AUTH_PW'] ){
//	header("HTTP/1.0 404 Not Found"); exit();
//}

require_once("../common/logconfig.php");
require_once("util_lib.php");
require_once("sqlite3Ope.php");


#-------------------------------------------------------------------
#------------------------------------------------------------------
session_start();
if (!isset($_SESSION['term']))
{
    $_SESSION['term']=date('Y_m');
    $term=$_SESSION['term'];
}
else if ($_SESSION['term']!=null)
{
    if (isset($_POST['term']))
    {
        $_SESSION['term']=$_POST['term'];
        $term=$_SESSION['term'];
    }
    else
    {
        $term=$_SESSION['term'];
    }
}
else if($_SESSION['term']==null)
{
    $_SESSION['term']=date('Y_m');
    $term=$_SESSION['term'];
}

include("./LGC_getDBlog.php");
include("./DISP_data.php");

?>