<?php
$db=new utilLib();
$db->httpHeadersPrint("UTF-8",true,false,true,true);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Phân Tích Truy Cập - File Manager</title>
</head>
<body>
<div class="topnav" id="myTopnav">
    <a href="../log/" class="active">LOG ACCESS</a>
    <a href="">FILE MANAGE</a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>
<div class="header"></div>
<p class="page_title"><b>Phân Tích Truy Cập - File Manager</b></p>
<p class="explanation">
    ▼<strong>XÓA</strong> Click vào nút xóa để xóa File.<br>
    ▼<strong>Các tập tin xóa không thể khôi phục.</strong> Hãy cẩn thận khi xử lý.<br><br>
    ▼<strong>Báo Cáo</strong> <br>
    ▼ <strong>Export CSV </strong>Nên Export CSV trước khi Delete<br>
</p>
<table width="600" border="1" cellpadding="2" cellspacing="0">
	<tr class="tdcolored">
		<th width="15%" nowrap>Month</th>
		<th nowrap>Name</th>
		<th width="5%" nowrap>Capacity</th>
		<th width="10%" nowrap>View Report</th>
		<th width="10%" nowrap>Export</th>
	    <th width="5%" nowrap>Delete</th>
	</tr>
<?php 
$dir = opendir(ACCESS_PATH);
while($strfile[] = readdir($dir));
rsort($strfile);
reset($strfile);
closedir($dir);
?>
	<?php $i=6; foreach($strfile as $v):?>
	<?php if(strstr($v,"access_log_db")):?>
	<tr class="<?php echo (($i % 2)==0)?"other-td":"otherColTd";?>">
		<td align="center">&nbsp;<?php $db_fname = explode("_",$v);
										echo $db_fname[0]."/".$db_fname[1]."";?></td>
		<td align="center">&nbsp;<?php echo $v;?></td>
		<td align="center">&nbsp;<?php echo round(filesize(ACCESS_PATH.$v)/(1024 * 1024),2)."MB";?></td>
		<td align="center">
		<form method="post" action="file.php" style="margin:0;">
		<input type="submit" value="View Report">
		<input type="hidden" name="filename" value="<?php echo $v;?>">
		</form>
		</td>
		<td align="center">
		<form method="post" action="csv.php" style="margin:0;">
		<input type="submit" value="Export CSV">
		<input type="hidden" name="filename" value="<?php echo $v;?>">
		</form>
		</td>
		<td align="center">
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>" style="margin:0;" onSubmit="return confirm('Are you sure about that?');">
		<input type="submit" value="Delete">
		<input type="hidden" name="filename" value="<?php echo $v;?>">
		<input type="hidden" name="action" value="del_file">
		</form>
		</td>
	</tr>
	<?php endif; ?>
	<?php endforeach;?>
</table>
<div class="footer" style="margin-top:5em;"><?php echo "Copyright © VietVang JSC. All Rights Reserved."?></div>
</body>
</html>
<style>
    body {
        margin: 0;
        font-family: Arial, Helvetica, sans-serif;
    }

    .topnav a{
        font-weight: bold;
    }
    .topnav {
        overflow: hidden;
        background-color: #1e83c9;
    }

    .topnav a {
        float: left;
        display: block;
        color: #f2f2f2;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
    }

    .topnav a:hover {
        background-color: #d53239;
        color:  white;
    }

    .active {
        background-color: #1e83c9;
        color: white;
    }

    .topnav .icon {
        display: none;
    }

    @media screen and (max-width: 600px) {
        .topnav a:not(:first-child) {display: none;}
        .topnav a.icon {
            float: right;
            display: block;
        }
    }

    @media screen and (max-width: 600px) {
        .topnav.responsive {position: relative;}
        .topnav.responsive .icon {
            position: absolute;
            right: 0;
            top: 0;
        }
        .topnav.responsive a {
            float: none;
            display: block;
            text-align: left;
        }
    }
</style>