<?php
#---------------------------------------------------------------
#---------------------------------------------------------------
//if( !$_SERVER['PHP_AUTH_USER'] || !$_SERVER['PHP_AUTH_PW'] ){
//	header("HTTP/1.0 404 Not Found"); exit();
//}
#-------------------------------------------------------------
#-------------------------------------------------------------
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>VIET VANG JSC</title>
<link href="access_style.css" rel="stylesheet" type="text/css">
<script language="JavaScript" type="text/JavaScript">
<!--
function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function closs(){
	var popW = document.getElementById('keyword');
	popW.style.visibility="hidden";
}


function popWin(){
	// alert(window.event.screenX + ":" + window.event.screenY);
	var popW = document.getElementById('keyword');
	popW.style.visibility = 'visible';
}

//-->
</script>
<?php if(count($fetch) > LOGFILE_SIZE_MAX ):?>
<script language="JavaScript" type="text/javascript">
<!--
window.alert("")
//-->
</script>
<?php endif; ?>
</head>
<center>
<body onLoad="MM_preloadImages('images/menu_01_on.jpg','images/menu_02_on.jpg','images/menu_03_on.jpg','images/menu_04_on.jpg','images/menu_05_on.jpg','images/menu_on_01.jpg','images/menu_on_02.jpg','images/menu_on_03.jpg','images/menu_on_04.jpg','images/menu_on_05.jpg','images/menu_on_ip.jpg')">
<div class="topnav" id="myTopnav">
    <a href="" class="active">LOG ACCESS</a>
    <a href="../fmanager/">FILE MANAGE</a>
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
<br>
<table width="770" border="0" cellspacing="0" cellpadding="0">
	<tr>
		<td colspan="2">
            <img src="images/header.jpg" width="770" height="97" hspace="0" vspace="0" alt="dsd">
            <div class="top-left"><?php echo NAME_COMPANY?></div>
        </td>
	</tr>
	<tr>
		<td width="178" valign="top" height="100%" background="images/bk.gif">
		<table border="0" cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td width="178" height="25"><img src="images/menu.gif" width="178" height="25" border="0"></td>
			</tr>
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			<tr>
				<?php if($_POST["mode"]=="day"|| empty($_POST["mode"])):?>
				<td width="178" height="30"><img src="images/menu_01_on.jpg" name="Image1" width="178" height="30" id="Image1"></td>
				<?php else:?>
				<td width="178" height="30"><input type="image" src="images/menu_01_off.jpg" name="Image1" width="178" height="30" id="Image1" onMouseOver="MM_swapImage('Image1','','images/menu_01_on.jpg',1)" onMouseOut="MM_swapImgRestore()"></td>
				<?php endif;?>
			</tr>
			<input type="hidden" name="mode" value="day">
			</form>
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <tr>
                <?php if($_POST["mode"]=="month"):?>
                    <td width="178" height="24"><img src="images/menu_02_on.jpg" name="Image2" width="178" height="24" id="Image2"></td>
                <?php else:?>
                    <td width="178" height="24"><input type="image" src="images/menu_02_off.jpg" name="Image2" width="178" height="24" id="Image2" onMouseOver="MM_swapImage('Image2','','images/menu_02_on.jpg',1)" onMouseOut="MM_swapImgRestore()"></td>
                <?php endif;?>
                </tr>
			<input type="hidden" name="mode" value="month">
			</form>
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			<tr>
				<?php if($_POST["mode"]=="hour"):?>
				<td width="178" height="22"><img src="images/menu_03_on.jpg" name="Image3" width="178" height="22" id="Image3"></td>
				<?php else:?>
				<td width="178" height="22"><input type="image" src="images/menu_03_off.jpg" name="Image3" width="178" height="22" onMouseOver="MM_swapImage('Image3','','images/menu_03_on.jpg',1)" onMouseOut="MM_swapImgRestore()" id="Image3"></td>
				<?php endif;?>
			</tr>
			<input type="hidden" name="mode" value="hour">
			</form>
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			<tr>
				<?php if($_POST["mode"]=="youbi"):?>
				<td width="178" height="23"><img src="images/menu_04_on.jpg" name="Image4" width="178" height="23" id="Image4"></td>
				<?php else:?>
				<td width="178" height="23"><input type="image" src="images/menu_04_off.jpg" name="Image4" width="178" height="23" id="Image4" onMouseOver="MM_swapImage('Image4','','images/menu_04_on.jpg',1)" onMouseOut="MM_swapImgRestore()"></td>
				<?php endif;?>
			</tr>
			<input type="hidden" name="mode" value="youbi">
			</form>
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			<tr>
				<?php if($_POST["mode"]=="page"):?>
				<td width="178" height="22"><img src="images/menu_05_on.jpg" name="Image5" width="178" height="22" border="0" id="Image5"></td>
				<?php else:?>
				<td width="178" height="22"><input type="image" src="images/menu_05_off.jpg" name="Image5" width="178" height="22" border="0" id="Image5" onMouseOver="MM_swapImage('Image5','','images/menu_05_on.jpg',1)" onMouseOut="MM_swapImgRestore()"></td>
				<?php endif;?>
			</tr>
			<input type="hidden" name="mode" value="page">
			</form>
            <?php
            if((VARSION_CONFIG == 2)){
            ?>
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			<tr>
				<?php if($_POST["mode"]=="engine"):?>
				<td width="178" height="22"><img src="images/menu_on_01.jpg" name="Image6" width="178" height="22" border="0" id="Image6"></td>
				<?php else:?>
				<td width="178" height="22"><input type="image" src="images/menu_off_01.jpg" name="Image6" width="178" height="22" border="0" id="Image6" onMouseOver="MM_swapImage('Image6','','images/menu_on_01.jpg',1)" onMouseOut="MM_swapImgRestore()"></td>
				<?php endif;?>
			</tr>
			<input type="hidden" name="mode" value="engine">
			</form>
<!--			<form method="post" action="--><?php //echo $_SERVER["PHP_SELF"];?><!--">-->
<!--			<tr>-->
<!--				--><?php //if($_POST["mode"]=="query"):?>
<!--				<td width="178" height="23"><img src="images/menu_on_02.jpg" name="Image7" width="178" height="23" border="0" id="Image7"></td>-->
<!--				--><?php //else:?>
<!--				<td width="178" height="23"><input type="image" src="images/menu_off_02.jpg" name="Image7" width="178" height="23" border="0" id="Image7" onMouseOver="MM_swapImage('Image7','','images/menu_on_02.jpg',1)" onMouseOut="MM_swapImgRestore()"></td>-->
<!--				--><?php //endif;?>
<!--			</tr>-->
<!--			<input type="hidden" name="mode" value="query">-->
<!--			</form>-->
            <?php } ?>
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			<tr>
				<?php if($_POST["mode"]=="bro"):?>
				<td width="178" height="22"><img src="images/menu_on_03.jpg" name="Image8" width="178" height="22" border="0" id="Image8"></td>
				<?php else:?>
				<td width="178" height="22"><input type="image" src="images/menu_off_03.jpg" name="Image8" width="178" height="22" border="0" id="Image8" onMouseOver="MM_swapImage('Image8','','images/menu_on_03.jpg',1)" onMouseOut="MM_swapImgRestore()"></td>
				<?php endif;?>
			</tr>
			<input type="hidden" name="mode" value="bro">
			</form>
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			<tr>
				<?php if($_POST["mode"]=="os"):?>
				<td width="178" height="23"><img src="images/menu_on_04.jpg" name="Image9" width="178" height="23" border="0" id="Image9"></td>
				<?php else:?>
				<td width="178" height="23"><input type="image" src="images/menu_off_04.jpg" name="Image9" width="178" height="23" border="0" id="Image9" onMouseOver="MM_swapImage('Image9','','images/menu_on_04.jpg',1)" onMouseOut="MM_swapImgRestore()"></td>
				<?php endif;?>
			</tr>
			<input type="hidden" name="mode" value="os">
			</form>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                <tr>
                    <?php if($_POST["mode"]=="ip"):?>
                        <td width="178" height="23"><img src="images/menu_on_ip.jpg" name="Image99" width="178" height="23" border="0" id="Image19"></td>
                    <?php else:?>
                        <td width="178" height="23"><input type="image" src="images/menu_off_ip.jpg" name="Image99" width="178" height="23" border="0" id="Image99" onMouseOver="MM_swapImage('Image19','','images/menu_on_ip.jpg',1)" onMouseOut="MM_swapImgRestore()"></td>
                    <?php endif;?>
                </tr>
                <input type="hidden" name="mode" value="ip">
            </form>
			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			<tr>
				<?php if($_POST["mode"]=="ref"):?>
				<td width="178" height="34"><img src="images/menu_on_05.jpg" name="Image11" width="178" height="34" border="0" id="Image11"></td>
				<?php else:?>
				<td width="178" height="34"><input type="image" src="images/menu_off_05.jpg" name="Image11" width="178" height="34" border="0" id="Image11" onMouseOver="MM_swapImage('Image11','','images/menu_on_05.jpg',1)" onMouseOut="MM_swapImgRestore()"></td>
				<?php endif;?>
			</tr>
			<input type="hidden" name="mode" value="ref">
			</form>

			<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
			<tr>
				<?php if($_POST["mode"]=="all"):?>
				<td width="178" height="36"><img src="images/menu_07_on.gif" name="Image10" width="178" height="36" id="Image10"></td>
				<?php else:?>
				<td width="178" height="36"><input type="image" src="images/menu_07_off.gif" name="Image10" width="178" height="36" id="Image10" onMouseOver="MM_swapImage('Image10','','images/menu_07_on.gif',1)" onMouseOut="MM_swapImgRestore()"></td>
				<?php endif;?>
			</tr>
			<input type="hidden" name="mode" value="all">
			</form>
			<tr>

		  <td height="30" align="center" background="images/m_d_access_back.gif">
              <?php
              $date=date('Y_m', strtotime('-6 month', strtotime(date('Y-m'))));
              ?>
              <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                  <img src="images/m_access1.jpg" width="178" height="28"> <br>
                  (6 tháng gần nhất)<br>
                  <select name="term" id="term">
                      <?php
                      $dir = opendir(ACCESS_PATH);
                      while($strfile[] = readdir($dir));
                      rsort($strfile);
                      reset($strfile);
                      closedir($dir);
                      foreach($strfile as $v){
                          if(strstr($v,"access_log_db")){
                              $db_fname = explode("_",$v);
                              $filedate = $db_fname[0]."_".$db_fname[1];
                              if ($filedate >= $date) {
                                  echo "<option value=\"" . $filedate . "\">" . $db_fname[0] . '_' . $db_fname[1] . "</option>\n";
                              }
                          }
                      }
                      ?>
                  </select>&nbsp;&nbsp;&nbsp;<input type="submit" name="reg" value="XEM">
                  <br><br>
              </form>
              &nbsp;&nbsp;&nbsp;&nbsp;SỐ LƯỢT XEM TRANG: <b><font color="#003399" size="3"><?php echo count($fetch);?></font></b><br>
              &nbsp;&nbsp;SỐ LƯỢT TRUY CẬP : <b><font color="#003399" size="3"><?php echo count($fetch_uu)?></font></b>
			</td>
			</tr>
			<tr>
				<td width="178" height="19"><img src="images/day_access.gif" width="178" height="19"></td>
			</tr>
			<tr>

		  <td height="30" align="center" background="images/m_d_access_back.gif">
			<b><font color="#003399" size="2">Lượt Xem Trang: <?php echo count($TodayCnt);?></font></b>&nbsp;&nbsp;
			</td>
			</tr>
            <?php
            $date=date('Y_m', strtotime('-6 month', strtotime(date('Y-m'))));
            ?>
			<form>
			<tr>
				<td width="178" height="158" background="images/menu_under_01.gif" align="right" valign="top" style="padding-right:5px;">
				<select style="display: none">
            <?php
            $dir = opendir(ACCESS_PATH);
            while($strfile[] = readdir($dir));
            rsort($strfile);
            reset($strfile);
            closedir($dir);
            foreach($strfile as $v){
                if(strstr($v,"access_log_db")){
                    $db_fname = explode("_",$v);
                    $filedate = $db_fname[0]."_".$db_fname[1];
                    if ($filedate >= $date) {
                        echo "<option value=\"" . $filedate . "\">" . $db_fname[0] . '_' . $db_fname[1] . "</option>\n";
                    }
                }
            }
            ?>
				</select>
				<br><br>
				</td>
			</tr>
			</form>
		</table>
		</td>
		<td width="622" align="center" class="right_bar" valign="top">
		<?php if(!empty($error_mes)):?>
		<br>
		<p class="err"><?php echo $error_mes;?></p>
		<?php endif;?>
		<br>
		<table width="250" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
			<tr bgcolor="#FFFFFF">
				<td align="left" style="padding:5px;"><img src="images/bar.gif" width="50" height="10" align="absmiddle"> SỐ LƯỢT XEM TRANG<br><img src="images/bar_uu.gif" width="50" height="10" align="absmiddle"> SỐ LƯỢT TRUY CẬP</td>
			</tr>
		</table>
		<?php if(!empty($fetch_day)):?>
		<?php
			$fetch_max = 0;
			for($i=0;$i<count($fetch_day);$i++){
				if($fetch_max <= $fetch_day[$i]['CNT'])$fetch_max = $fetch_day[$i]['CNT'];
			}
			?>
		<br>
		<table width="553" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
			<tr bgcolor="white">
             <td align="left" colspan="2">
                 <img src="images/menu_01_on.jpg">
             </td>
			</tr>
			<?php for($i=0;$i<count($fetch_day);$i++):?>
			<tr bgcolor="#FFFFFF">
				<td width="10%" align="center" height="25">
				<?php echo $fetch_day[$i]["D"];?>-<?php echo $fetch_day[$i]["M"];?>
				</td>

	 <td align="left" style="padding-top:2px;">
	  <?php
					$width = @round($fetch_day[$i]['CNT']/$fetch_max * 100);
					$width_uu = @round($fetch_day_uu[$i]['CNT']/$fetch_max * 100);?>
	  <img src="images/bar.gif" width="<?php echo $width*3;?>" height="10" align="left">&nbsp;
	  <?php echo "(".$fetch_day[$i]['CNT']." Lượt)";?><br>
	  <img src="images/bar_uu.gif" width="<?php echo $width_uu*3;?>" height="10" align="absmiddle">&nbsp;
	  <?php echo "(".$fetch_day_uu[$i]['CNT']." Lượt)";?><br>
	   </td>
			</tr>
			<?php endfor;?>
		</table>
		<?php endif;?>
            <?php
            if (isset($get_day_access)):
            ?>
            <br>
            <table width="553" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
                <tr bgcolor="white">
                    <td align="left" colspan="4"><b style=" text-align:center;color:#0B0D60;font-size: 15px;font-family: Avenir, Helvetica, sans-serif">1000 LƯỢT TRUY CẬP MỚI NHẤT TRONG NGÀY <?php echo date('d-m') ?></b></td>
                </tr>
                    <th bgcolor="white">IP ADDRESS</th>
                    <th bgcolor="white">COUNTRY/ CITY</th>
                    <th bgcolor="white">PAGE URL</th>
                    <th bgcolor="white">TIME</th>
                <?php
                foreach ($get_day_access as $row_day):
                    if ($row_day['INS_DATE']==date('Y-m-d')) {
                        ?>
                        <tr bgcolor="white" style="height: 35px">
                            <td><a href="https://whatismyipaddress.com/ip/<?php echo $row_day['REMOTE_ADDR']?>"><?php echo $row_day['REMOTE_ADDR']  ?></a></td>
                            <td><?php echo $row_day['COUNTRY'].' / '. $row_day['CITY']?></td>
                            <td><a href="<?php echo $row_day['PAGE_URL'] ?>"><?php echo $row_day['PAGE_URL'] ?></a></td>
                            <td><?php echo $row_day['TIME'].'  ' ?></td>
                        </tr>
                        <?php
                    }
                endforeach;
                ?>
            </table>
            <?php
            endif;
            ?>
		<?php if(!empty($MonCnt)):?>
		<br>
		<table width="553" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
			<tr bgcolor="white">
				<td colspan="2" align="left"><img src="images/menu_02_on.jpg"></td>
			</tr>
			<?php
			$year_mon = $date_name;
			$ym_date = explode("_",$year_mon);
			$mon =$ym_date[1];
			?>
			<tr bgcolor="#FFFFFF">
				<td width="10%" align="center" height="25">
				<?php echo $mon.'-'.$ym_date[0];?>
				</td>
				<td align="left" style="padding-top:2px;">
				<?php
				$num = count($fetch);
				$width = @round($MonCnt[$mon]['CNT']/$num * 100);
				$width_uu = @round($MonCnt_uu[$mon]['CNT']/$num * 100);
				if($width > 0):
				?>
				<img src="images/bar.gif" width="<?php echo $width*3;?>" height="10" align="left">&nbsp;
				<?php echo ($MonCnt[$mon])?"(".$MonCnt[$mon]['CNT']." Lượt)":"";?><br>
				<img src="images/bar_uu.gif" width="<?php echo $width_uu*3;?>" height="10" align="absmiddle">&nbsp;
				<?php echo ($MonCnt_uu[$mon])?"(".$MonCnt_uu[$mon]['CNT']." Lượt)":"";?>
				<?php endif;?>
				</td>
			</tr>
			<?php ?>
		</table>
            <br/>
		<?php endif;?>
            <?php
            if(!empty($Mon_top))
            {
            ?>
                <table width="553" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
                    <thead style="color: white">
                    <th>IP ADDRESS</th>
                    <th>COUNTRY/ CITY</th>
                    <th>PAGE URL</th>
                    <th>TIME - DAY</th>
                    </thead>
                <?php
                foreach ($Mon_top as $row) {
                ?>
                <tr bgcolor="#FFFFFF" style="height: 30px">
                    <td><a href="https://whatismyipaddress.com/ip/<?php echo $row['REMOTE_ADDR']?>"><?php echo $row['REMOTE_ADDR']  ?></a></td>
                    <td><?php echo $row['COUNTRY'].' / '.$row['CITY']  ?></td>
                    <td><a href="<?php echo $row['PAGE_URL'] ?>" target="_blank"><?php echo $row['PAGE_URL'] ?></a></td>
                    <td><?php echo $row['TIME'].'  '.date("d-m-Y", strtotime($row['INS_DATE'])); ?></td>
                        <?php
                    }
                    ?>
                </tr>
            </table>
            <?php
            }
            ?>
		<?php if(!empty($fetch_time)):?>
		<?php
			$fetch_max = 0;
			for($i=0;$i<23;$i++) {
                if (isset($fetch_time[$i])) {
                    $i = sprintf("%02d", $i);
                    if ($fetch_max <= $fetch_time[$i]['CNT'])
                        $fetch_max = $fetch_time[$i]['CNT'];
                }
            }
			?>
		<br>
		<table width="553" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
			<tr bgcolor="white">
				<td align="left" colspan="2"><img src="images/menu_03_on.jpg"></td>
			</tr>
			<?php for($i=0;$i<=23;$i++):
//                if (isset($fetch_time[$i]) || isset($fetch_time_uu[$i])):
                ?>
			<tr bgcolor="#FFFFFF">
				<td width="10%" align="center" height="25">
				<?php echo $i;?> Giờ
				</td>
				<td align="left" style="padding-top:2px;">
				<?php
				$num = count($fetch);
				$i = sprintf("%02d",$i);
				$width = @round($fetch_time[$i]['CNT']/$fetch_max * 100);
				if($width > 0):
				?>
				<img src="images/bar.gif" width="<?php echo $width*3;?>" height="10" align="left">&nbsp;
				<?php endif; ?>
				<?php if (isset($fetch_time[$i]['CNT'])) echo ($fetch_time[$i]['CNT'])? "(".$fetch_time[$i]['CNT']." Lượt)":"";?><br>
				<?php
				$width_uu = @round($fetch_time_uu[$i]['CNT']/$fetch_max * 100 );
				if($width_uu > 0):
				?>
				<img src="images/bar_uu.gif" width="<?php echo $width_uu*3;?>" height="10" align="absmiddle">&nbsp;
				<?php endif;?>
				<?php if (isset($fetch_time_uu[$i]['CNT']))  echo ($fetch_time_uu[$i]['CNT'])?"(".$fetch_time_uu[$i]['CNT']." Lượt)":"";?><br>
				</td>
			</tr>
			<?php
//			endif;
			endfor;?>
		</table>
		<?php endif;?>
		<?php if(!empty($fetch_dayofweek)):?>
		<?php
			$fetch_max = 0;
			for($i=0;$i<=6;$i++) {
                if (isset($fetch_dayofweek[$i])) {
                    if ($fetch_max <= $fetch_dayofweek[$i]['CNT'])
                        $fetch_max = $fetch_dayofweek[$i]['CNT'];
                }
            }
			?>
		<br>
		<table width="553" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
			<tr bgcolor="white">
				<td align="left" colspan="2"><img src="images/menu_04_on.jpg"></td>
			</tr>
			<?php for($i=0;$i<=6;$i++):
                if (isset($fetch_dayofweek[$i]['CNT']) || isset($fetch_dayofweek_uu[$i]['CNT'])):
                ?>
			<tr bgcolor="#FFFFFF">
				<td width="10%" align="center" height="25">
				<?php
				switch ($i):
					case 0:
						echo " Sunday";
						break;
					case 1:
						echo " Monday";
						break;
					case 2:
						echo " Tuesday";
						break;
					case 3:
						echo " Wednesday";
						break;
					case 4:
						echo " Thursday";
						break;
					case 5:
						echo " Friday";
						break;
					case 6:
						echo " Saturday";
						break;
				endswitch;
				?>
				</td>
				<td align="left" style="padding-top:2px;">
				<?php
				$width = @round($fetch_dayofweek[$i]['CNT']/$fetch_max * 100);
				if($width > 0):
				?>
				<!--<img src="images/bar_u.gif" width="<?php echo $width_u*3;?>" height="10" align="left">-->
				<img src="images/bar.gif" width="<?php echo $width*3;?>" height="10" align="left">&nbsp;
				<?php endif;?>
				<?php if (isset($fetch_dayofweek[$i]['CNT'])) echo ($fetch_dayofweek[$i]['CNT'])?"(".$fetch_dayofweek[$i]['CNT']." Lượt)":"";?><br>
				<?php
				$width_uu = @round($fetch_dayofweek_uu[$i]['CNT']/$fetch_max * 100 );
				if($width_uu > 0):
				?>
				<img src="images/bar_uu.gif" width="<?php echo $width_uu*3;?>" height="10" align="absmiddle">
				<?php endif;?>
				<?php if (isset($fetch_dayofweek_uu[$i]['CNT'])) echo ($fetch_dayofweek_uu[$i])?"(".$fetch_dayofweek_uu[$i]['CNT']." Lượt)":"";?><br>
				</td>
			</tr>
			<?php
			endif;
			endfor;?>
		</table>
		<?php endif;?>
		<?php if(!empty($fetchURL)):?>
		<?php
			$fetch_max = 0;
			for($i=0;$i<=count($fetchURL);$i++){
			    if (isset($fetchURL[$i]['CNT']))
				if($fetch_max <= $fetchURL[$i]['CNT'])$fetch_max = $fetchURL[$i]['CNT'];
			}
			$fetch_sum = 0;
			for($i=0;$i<=count($fetchURL);$i++){
                if (isset($fetchURL[$i]['CNT']))
				$fetch_sum += $fetchURL[$i]['CNT'];
			}

            $fetch_max_u = 0;
            for($i=0;$i<=count($fetchURL_u);$i++){
                if (isset($fetchURL_u[$i]['CNT']))
                    if($fetch_max_u <= $fetchURL_u[$i]['CNT'])$fetch_max_u = $fetchURL_u[$i]['CNT'];
            }
            $fetch_sum_u = 0;
            for($i=0;$i<=count($fetchURL_u);$i++){
                if (isset($fetchURL_u[$i]['CNT']))
                    $fetch_sum_u += $fetchURL_u[$i]['CNT'];
            }
			?>
		<br>
		<table width="553" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
			<tr bgcolor="white">
				<td align="left"><img src="images/menu_05_on.jpg"></td>
			</tr>
			<?php for($i=0;$i<count($fetchURL);$i++):?>
			<tr bgcolor="#FFFFFF">
				<td align="left" height="20">
				&nbsp;<b><?php echo $i+1;?></b>&nbsp;
				<a href="<?php echo $fetchURL[$i]['PAGE_URL'];?>" target="_blank">
				<?php echo $fetchURL[$i]['PAGE_URL'];?>
				</a>
				</td>
			</tr>
			<tr bgcolor="#FAFAFA">
				<td height="25" align="left" bgcolor="#FAFAFA">
                    <br>
				<?php
					$width = @round($fetchURL[$i]['CNT']/$fetch_max * 100);
				?>
				<img src="images/bar.gif" width="<?php echo $width*3;?>" height="10" align="left">&nbsp;
				<?php echo round($fetchURL[$i]['CNT']/$fetch_sum * 100);?>%
				<?php echo "(".$fetchURL[$i]['CNT']." Lượt)";?>
                    <?php
                    if (isset($fetchURL_u[$i])):
                    ?>
                    <br>
                    <?php
                    $width = @round($fetchURL_u[$i]['CNT']/$fetch_max * 100);
                    ?>
                    <img src="images/bar_uu.gif" width="<?php echo $width*3;?>" height="10" align="left">&nbsp;
                    <?php echo round($fetchURL_u[$i]['CNT']/$fetch_sum_u * 100);?>%
                    <?php echo "(".$fetchURL_u[$i]['CNT']." Lượt)";?>
                    <?php
                    endif;
                    ?>
                    <br>
                    <br>
				</td>
			</tr>
			<?php endfor;?>
		</table>
		<?php endif;?>
<?php
#--------------------------------------
	if((VARSION_CONFIG == 2)){
?>
		<?php if(!empty($fetchENGINE)):?>
		<?php
			$fetch_max = $fetchENGINE[0]['CNT'];
			$fetch_sum = 0;
			for($i=0;$i<=count($fetchENGINE);$i++){
			    if (isset($fetchENGINE[$i]['CNT']))
				$fetch_sum += $fetchENGINE[$i]['CNT'];
			}
            $fetch_sum_u = 0;
            for($i=0;$i<=count($fetchENGINE_u);$i++){
                if (isset($fetchENGINE_u[$i]['CNT']))
                    $fetch_sum_u += $fetchENGINE_u[$i]['CNT'];
            }
			?>
		<br>
		<table width="553" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
			<tr bgcolor="white">
				<td align="left" height="26"><img src="images/menu_on_01.jpg"></td>
			</tr>
			<?php for($i=0;$i<count($fetchENGINE);$i++):?>
			<tr bgcolor="#FFFFFF">
				<td align="left" height="20">
				&nbsp;<b><?php echo $i+1;?></b>&nbsp;
				 <a href="<?php echo $fetchENGINE[$i]['ENGINE'];?>" target="_blank">
				<?php echo $fetchENGINE[$i]['ENGINE'];?>
				</td>
			</tr>
			<tr bgcolor="#FAFAFA">
				<td height="25" align="left" bgcolor="#FAFAFA"><br>
				<?php
					$width = @round($fetchENGINE[$i]['CNT']/$fetch_max * 100);
				?>
				<img src="images/bar.gif" width="<?php echo $width*3;?>" height="10" align="absmiddle">&nbsp;
				<?php echo round($fetchENGINE[$i]['CNT']/$fetch_sum * 100);?>%<?php echo "(".$fetchENGINE[$i]['CNT']." Lượt)";?>
                 <br>
                    <?php
                    $width = @round($fetchENGINE_u[$i]['CNT']/$fetch_max * 100);
                    ?>
                    <img src="images/bar_uu.gif" width="<?php echo $width*3;?>" height="10" align="absmiddle">&nbsp;
                    <?php echo round($fetchENGINE_u[$i]['CNT']/$fetch_sum_u * 100);?>%<?php echo "(".$fetchENGINE_u[$i]['CNT']." Lượt)";?>
                    <br><br>
                </td>
			</tr>
			<?php endfor;?>
		</table>
		<?php endif;?>

		<?php if(!empty($fetchQuery)):?>
		<?php
			$fetch_max = $fetchQuery[0]['CNT'];
			$fetch_sum = 0;
			for($i=0;$i<=count($fetchQuery);$i++){
			    if (isset($fetchQuery[$i]['CNT']))
				$fetch_sum += $fetchQuery[$i]['CNT'];
			}
			?>
		<br>
		<form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
		<input type="hidden" name="mode" value="<?php echo $_POST["mode"];?>"><input type="hidden" name="term" value="">
		<table width="553" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
<!--			<tr bgcolor="#FFFFFF">-->
<!--				<td align="left" height="20">-->
<!--				Hiện thị: <input type="radio" name="kensu" value="1" onClick="javascript:submit();" checked>&nbsp;100<input type="radio" name="kensu" value="2" onClick="javascript:submit();">&nbsp;200&nbsp;<input type="radio" name="kensu" value="3"  onClick="javascript:submit();">&nbsp;300-->
<!--				</td>-->
<!--			</tr>-->
		</table>
		</form>
		<table width="553" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
			<tr bgcolor="white">
				<td align="left" height="26"><img src="images/menu_on_02.jpg"></td>
			</tr>
			<?php for($i=0;$i<count($fetchQuery);$i++):?>
			<tr bgcolor="#FFFFFF">
				<td align="left" height="20">
				&nbsp;<b><?php echo $i+1;?></b>&nbsp;
				<?php echo "<b>".''/*$fetchQuery[$i]['ENGINE']*/."</b>".$fetchQuery[$i]['QUERY_STRING'];?>
				</td>
			</tr>
			<tr bgcolor="#FAFAFA">
				<td height="25" align="left" bgcolor="#FAFAFA">
				<?php
					$width = @round($fetchQuery[$i]['CNT']/$fetch_max * 100);
				?>
				<img src="images/bar.gif" width="<?php echo $width*3;?>" height="10" align="absmiddle">&nbsp;
				<?php echo round($fetchQuery[$i]['CNT']/$fetch_sum * 100);?>%<?php echo "(".$fetchQuery[$i]['CNT']." Lượt)";?>
				</td>
			</tr>
			<?php endfor;?>
		</table>
		<?php endif;?>
<?php
	}
?>
            <?php
            if(!empty($fetch_bro_u)):
            $sum_bro_u=0;
            for ($i=0;$i<=count($fetch_bro_u);$i++)
            {
                if (isset($fetch_bro_u[$i]['CNT']))
                    $sum_bro_u += $fetch_bro_u[$i]['CNT'];
            }
            endif;
            ?>
		<?php if(!empty($fetch_bro)):?>
		<?php $fetch_max = $fetch_bro[0]['CNT'];?>
		<br>
		<table width="553" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
			<tr bgcolor="white">
				<td align="left" height="26"><img src="images/menu_on_03.jpg"></td>
			</tr>
			<?php for($i=0;$i<count($fetch_bro);$i++):?>
			<tr bgcolor="#FFFFFF">
				<td align="left" height="20">
				&nbsp;<b><?php echo $i+1;?></b>&nbsp;
				<?php echo $fetch_bro[$i]['BROWSER'];?>
				</td>
			</tr>
			<tr bgcolor="#FAFAFA">
				<td height="25" align="left" bgcolor="#FAFAFA"> <br/>

				<?php
					$width = @round($fetch_bro[$i]['CNT']/$fetch_max * 100);
				?>
				<img src="images/bar.gif" width="<?php echo $width*3;?>" height="10" align="absmiddle">&nbsp;
				<?php echo round($fetch_bro[$i]['CNT']/count($fetch) * 100);?>%<?php echo "(".$fetch_bro[$i]['CNT']." Lượt)";?>
                    <br/>
                    <?php
                    if (isset($fetch_bro_u[$i])):
                    $width = @round($fetch_bro_u[$i]['CNT']/$fetch_max * 100);
                    ?>
                    <img src="images/bar_uu.gif" width="<?php echo $width*3;?>" height="10" align="absmiddle">&nbsp;
                    <?php echo round($fetch_bro_u[$i]['CNT']/$sum_bro_u * 100);?>%<?php echo "(".$fetch_bro_u[$i]['CNT']." Lượt)";?>
                    <?php
                    endif;
                    ?>
                    <br/>    <br/>
				</td>
			</tr>
			<?php endfor;?>
		</table>
		<?php endif;?>

            <?php
            if(!empty($fetch_os_u)):
                $sum_os_u=0;
                for ($i=0;$i<=count($fetch_os_u);$i++)
                {
                    if (isset($fetch_os_u[$i]['CNT']))
                        $sum_os_u += $fetch_os_u[$i]['CNT'];
                }
            endif;
            ?>
		<?php if(!empty($fetch_os)):?>
		<?php $fetch_max = $fetch_os[0]['CNT'];?>
		<br>
		<table width="553" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
			<tr bgcolor="white">
				<td align="left" height="26"><img src="images/menu_on_04.jpg"></td>
			</tr>
			<?php for($i=0;$i<count($fetch_os);$i++):?>
			<tr bgcolor="#FFFFFF">
				<td align="left" height="20">
				&nbsp;<b><?php echo $i+1;?></b>&nbsp;
				<?php echo $fetch_os[$i]['OS'];?>
				</td>
			</tr>
			<tr bgcolor="#FAFAFA">
				<td height="25" align="left" bgcolor="#FAFAFA"> <br>
				<?php
					$width = @round($fetch_os[$i]['CNT']/$fetch_max * 100);
				?>
				<img src="images/bar.gif" width="<?php echo $width*3;?>" height="10" align="absmiddle">&nbsp;
				<?php echo round($fetch_os[$i]['CNT']/count($fetch) * 100);?>%<?php echo "(".$fetch_os[$i]['CNT']." Lượt)";?>
                    <?php
                    if (isset($fetch_os_u[$i]))
                    {
                        ?>
                        <br>
                        <?php
                        $width = @round($fetch_os_u[$i]['CNT']/$fetch_max * 100);
                        ?>
                        <img src="images/bar_uu.gif" width="<?php echo $width*3;?>" height="10" align="absmiddle">&nbsp;
                        <?php echo round($fetch_os_u[$i]['CNT']/$sum_os_u * 100);?>%<?php echo "(".$fetch_os_u[$i]['CNT']." Lượt)";?>
                    <?php
                    }
                    ?>
                    <br><br>
				</td>
			</tr>
			<?php endfor;?>
		</table>
		<?php endif;?>
		<?php if(!empty($fetch_ref)):?>
		<?php
			$fetch_max = $fetch_ref[0]['CNT'];
			$fetch_sum = 0;
			for($i=0;$i<count($fetch_ref);$i++){
				$fetch_sum += $fetch_ref[$i]['CNT'];
			}
            $fetch_sum_u = 0;
            for($i=0;$i<count($fetch_ref_u);$i++){
                $fetch_sum_u += $fetch_ref_u[$i]['CNT'];
            }
			?>
		<br>
		<table width="553" cellpadding="0" cellspacing="1" border="0" bgcolor="#000000">
			<tr bgcolor="white">
				<td align="left" height="26"><img src="images/menu_on_05.jpg"></td>
			</tr>
			<?php for($i=0;$i<count($fetch_ref);$i++):?>
			<tr bgcolor="#FFFFFF">
				<td align="left" width="553" height="20">
				&nbsp;<b><?php echo $i+1;?></b>&nbsp;
				<a href="<?php echo $fetch_ref[$i]['REFERER'];?>" target="_blank"><?php echo $fetch_ref[$i]['REFERER'];?></a>
				</td>
			</tr>
			<tr bgcolor="#FAFAFA">
				<td height="25" align="left" bgcolor="#FAFAFA">
                    <br>
				<?php
					$width = @round($fetch_ref[$i]['CNT']/$fetch_max * 100);
				?>
				<img src="images/bar.gif" width="<?php echo $width*3;?>" height="10" align="absmiddle">&nbsp;
				<?php echo round($fetch_ref[$i]['CNT']/$fetch_sum * 100);?>%<?php echo "(".$fetch_ref[$i]['CNT']." Lượt)";?>
                    <br>
                    <?php
                    if (isset($fetch_ref_u[$i])):
                    $width = @round($fetch_ref_u[$i]['CNT']/$fetch_max * 100);
                    ?>
                    <img src="images/bar_uu.gif" width="<?php echo $width*3;?>" height="10" align="absmiddle">&nbsp;
                    <?php echo round($fetch_ref_u[$i]['CNT']/$fetch_sum_u * 100);?>%<?php echo "(".$fetch_ref_u[$i]['CNT']." Lượt)";?>
                    <?php
                    endif;
                    ?>
                    <br>
                    <br>
                </td>
			</tr>
			<?php endfor;?>
		</table>
		<?php endif;?>
		<br>
		</td>
	</tr>
	<tr>
		<td colspan="2"><a href="https://vietvang.net" target="_blank"><img src="images/foder.jpg" width="770"></a></td>
	</tr>
</table>
</body>
</center>
</html>
<script type="text/javascript">
    document.getElementById("term").value = "<?php echo $_SESSION['term']?>";
</script>
<style>
    .top-left {
        position: absolute;
        top: 8px;
        color: #ffffff;
        padding-top: 80px;
        padding-left: 20px;
        text-align: center;
        font-weight: bold;
        font-size: 30px;
        font-family: Arial, Helvetica, sans-serif;
    }
    body{
        font-family: Arial, Helvetica, sans-serif;
    }
    th{
        background-color: #0a0a0a;
        color: white;
    }
</style>
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
        color: white;
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