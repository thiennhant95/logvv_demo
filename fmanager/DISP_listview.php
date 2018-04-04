<?php
$db=new utilLib();
$db->httpHeadersPrint("UTF-8",true,false,true,true);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
</head>
<body>
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