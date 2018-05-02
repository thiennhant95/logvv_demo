<?php
if ($_POST['username']!=null && $_POST['password']!=null)
{
    $filename = "account.txt";
    $myfile = fopen($filename, "r") or die("Unable to open file!");
    if(filesize($filename) > 0) {
       $account= fread($myfile, filesize($filename));
    }
    fclose($myfile);
    $account=explode('_',$account);
    if ($account[0]==$_POST['username'] && md5($_POST['password'])==$account[1])
    {
        session_start();
        $_SESSION['account']=$_POST['username'];
        header('Location: ../fmanager/index.php');
    }
    else if ($account[0]!=$_POST['username'])
    {
        session_start();
       $_SESSION['message']='Sai Tài Khoản!';
        header('Location: index.php');
    }
    else if ($account[1]!=md5($_POST['password']))
    {
        session_start();
        $_SESSION['message']='Sai Mật khẩu!';
        header('Location: index.php');
    }

}
?>