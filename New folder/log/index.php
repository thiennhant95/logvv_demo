<?php
if (!isset($_SESSION)) {
    session_start();
}
else
    {
        session_destroy();
        session_start();
}
#---------------------------------------------------------------
#---------------------------------------------------------------
if (!isset($_SESSION['account']))
{
    header('Location:../login/');
}
require_once("../common/logconfig.php");
require_once("util_lib.php");
require_once("sqlite3Ope.php");


#-------------------------------------------------------------------
#------------------------------------------------------------------
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