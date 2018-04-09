<?php
require_once("../common/logconfig.php");
require_once("util_lib.php");
require_once("sqlite3Ope.php");

#---------------------------------------------------------------
//if( !$_SERVER['PHP_AUTH_USER'] || !$_SERVER['PHP_AUTH_PW'] ){
//    header("HTTP/1.0 404 Not Found"); exit();
//}

$db=new utilLib();
extract($db->getRequestParams("post",array(8,7,1,4),true));

$db_filepath = ACCESS_PATH.$filename;

$dbh = new sqlite3Ope();
$create=$dbh->sqlite3Ope(ACCESS_PATH.$filename,CREATE_SQL1);


$total_sql ='SELECT * FROM `ACCESS_LOG`';

$fetch = $dbh->fetch($total_sql);

$total_u_sql = $total_sql."WHERE (UNIQUE_FLG == '1')";


//foreach ($fetch as $row)
//{
//    $fetch_u=array();
//    $i=0;
//    if ($row['UNIQUE_FLG']==1)
//    {
//        $fetch_u[$i]['UNIQUE_FLG']=$row['UNIQUE_FLG'];
//        $i++;
//    }
//}
//print_r($fetch_u);
//die();
$fetch_u = $dbh->fetch($total_u_sql);



$total_uu_sql = $total_sql."WHERE (USER_FLG == '1')";

$fetch_uu = $dbh->fetch($total_uu_sql);


$counts = array();
foreach ($fetch as $key=>$subarr) {
    // Add to the current group count if it exists
    if (isset($counts[$subarr['INS_DATE']])) {
        $counts[$subarr['INS_DATE']]++;
    }
    // or initialize to 1 if it doesn't exist
    else $counts[$subarr['INS_DATE']] = 1;

    // Or the ternary one-liner version
    // instead of the preceding if/else block
    $counts[$subarr['INS_DATE']] = isset($counts[$subarr['INS_DATE']]) ? $counts[$subarr['INS_DATE']]++ : 1;
    $fetch_a = array();
    $i=0;
    foreach ($counts as $key_1 => $row)
    {
        $fetch_a[$i]['INS_DATE']=$key_1;
        $fetch_a[$i]['CNT']=$row;
        $fetch_a[$i]['D']= strftime('%d', strtotime($key_1));
        $fetch_a[$i]['M']= strftime('%m', strtotime($key_1));
        $fetch_a[$i]['Y']= strftime('%Y', strtotime($key_1));
        $i++;
    }
}
$fetch_day=$fetch_a;


$counts_1 = array();
foreach ($fetch as $key=>$subarr) {
    if ($subarr['UNIQUE_FLG']==1) {
        if (isset($counts_1[$subarr['INS_DATE']])) {
            $counts_1[$subarr['INS_DATE']]++;
        } // or initialize to 1 if it doesn't exist
        else $counts_1[$subarr['INS_DATE']] = 1;

        $counts_1[$subarr['INS_DATE']] = isset($counts_1[$subarr['INS_DATE']]) ? $counts_1[$subarr['INS_DATE']]++ : 1;
        $fetch_b = array();
        $i = 0;
        foreach ($counts_1 as $key_1 => $row) {
            $fetch_b[$i]['INS_DATE'] = $key_1;
            $fetch_b[$i]['CNT'] = $row;
            $fetch_b[$i]['D'] = strftime('%d', strtotime($key_1));
            $fetch_b[$i]['M'] = strftime('%m', strtotime($key_1));
            $fetch_b[$i]['Y'] = strftime('%Y', strtotime($key_1));
            $i++;
        }
    }
}
$fetch_day_u=$fetch_b;

$counts_2 = array();
foreach ($fetch as $key=>$subarr) {
    if ($subarr['USER_FLG']==1) {
        if (isset($counts_2[$subarr['INS_DATE']])) {
            $counts_2[$subarr['INS_DATE']]++;
        } // or initialize to 1 if it doesn't exist
        else $counts_2[$subarr['INS_DATE']] = 1;

        $counts_2[$subarr['INS_DATE']] = isset($counts_2[$subarr['INS_DATE']]) ? $counts_2[$subarr['INS_DATE']]++ : 1;
        $fetch_c = array();
        $i = 0;
        foreach ($counts_2 as $key_1 => $row) {
            $fetch_c[$i]['INS_DATE'] = $key_1;
            $fetch_c[$i]['CNT'] = $row;
            $fetch_c[$i]['D'] = strftime('%d', strtotime($key_1));
            $fetch_c[$i]['M'] = strftime('%m', strtotime($key_1));
            $fetch_c[$i]['Y'] = strftime('%Y', strtotime($key_1));
            $i++;
        }
    }
}
$fetch_day_uu=$fetch_c;



$counts_3 = array();
foreach ($fetch as $key=>$subarr) {
        if (isset($counts_3[strftime('%H', strtotime($subarr['TIME']))])) {
            $counts_3[strftime('%H', strtotime($subarr['TIME']))]++;
        } // or initialize to 1 if it doesn't exist
        else $counts_3[strftime('%H', strtotime($subarr['TIME']))] = 1;

        $counts_3[strftime('%H', strtotime($subarr['TIME']))] = isset($counts_3[strftime('%H', strtotime($subarr['TIME']))]) ? $counts_3[strftime('%H', strtotime($subarr['TIME']))]++ : 1;
        $fetch_d = array();
        $i = 0;
        foreach ($counts_3 as $key_1 => $row) {
            $fetch_d[$key_1]['CNT'] = $row;
            $fetch_d[$key_1]['H'] = $key_1;
            $i++;
    }
}
$fetch_time=$fetch_d;

$counts_4 = array();
foreach ($fetch as $key=>$subarr) {
    if ($subarr['UNIQUE_FLG'] == 1) {
        if (isset($counts_4[strftime('%H', strtotime($subarr['TIME']))])) {
            $counts_4[strftime('%H', strtotime($subarr['TIME']))]++;
        } // or initialize to 1 if it doesn't exist
        else $counts_4[strftime('%H', strtotime($subarr['TIME']))] = 1;

        $counts_4[strftime('%H', strtotime($subarr['TIME']))] = isset($counts_4[strftime('%H', strtotime($subarr['TIME']))]) ? $counts_4[strftime('%H', strtotime($subarr['TIME']))]++ : 1;
        $fetch_e = array();
        $i = 0;
        foreach ($counts_4 as $key_1 => $row) {
            $fetch_e[$key_1]['CNT'] = $row;
            $fetch_e[$key_1]['H'] = $key_1;
            $i++;
        }
    }
}
$fetch_time_u=$fetch_e;

$counts_5= array();
foreach ($fetch as $key=>$subarr) {
    if ($subarr['USER_FLG'] == 1) {
        if (isset($counts_5[strftime('%H', strtotime($subarr['TIME']))])) {
            $counts_5[strftime('%H', strtotime($subarr['TIME']))]++;
        } // or initialize to 1 if it doesn't exist
        else $counts_5[strftime('%H', strtotime($subarr['TIME']))] = 1;

        $counts_5[strftime('%H', strtotime($subarr['TIME']))] = isset($counts_5[strftime('%H', strtotime($subarr['TIME']))]) ? $counts_5[strftime('%H', strtotime($subarr['TIME']))]++ : 1;
        $fetch_f = array();
        $i = 0;
        foreach ($counts_5 as $key_1 => $row) {
            $fetch_f[$key_1]['CNT'] = $row;
            $fetch_f[$key_1]['H'] = $key_1;
            $i++;
        }
    }
}
$fetch_time_uu=$fetch_f;

//
$counts_6 = array();
foreach ($fetch as $key=>$subarr) {
    if (isset($counts_6[strftime('%w', strtotime($subarr['INS_DATE']))])) {
        $counts_6[strftime('%w', strtotime($subarr['INS_DATE']))]++;
    } // or initialize to 1 if it doesn't exist
    else $counts_6[strftime('%w', strtotime($subarr['INS_DATE']))] = 1;

    $counts_6[strftime('%w', strtotime($subarr['INS_DATE']))] = isset($counts_6[strftime('%w', strtotime($subarr['INS_DATE']))]) ? $counts_6[strftime('%w', strtotime($subarr['INS_DATE']))]++ : 1;
    $fetch_week = array();
    $i = 0;
    foreach ($counts_6 as $key_1 => $row) {
        $fetch_week[$key_1]['CNT'] = $row;
        $fetch_week[$key_1]['W'] = $key_1;
        $i++;
    }
}
$fetch_dayofweek =$fetch_week;


$counts_7= array();
foreach ($fetch as $key=>$subarr) {
    if ($subarr['UNIQUE_FLG'] == 1) {
        if (isset($counts_7[strftime('%w', strtotime($subarr['INS_DATE']))])) {
            $counts_7[strftime('%w', strtotime($subarr['INS_DATE']))]++;
        } // or initialize to 1 if it doesn't exist
        else $counts_7[strftime('%w', strtotime($subarr['INS_DATE']))] = 1;

        $counts_7[strftime('%w', strtotime($subarr['INS_DATE']))] = isset($counts_7[strftime('%w', strtotime($subarr['INS_DATE']))]) ? $counts_7[strftime('%w', strtotime($subarr['INS_DATE']))]++ : 1;
        $fetch_week_u = array();
        $i = 0;
        foreach ($counts_7 as $key_1 => $row) {
            $fetch_week_u[$key_1]['CNT'] = $row;
            $fetch_week_u[$key_1]['H'] = $key_1;
            $i++;
        }
    }
}
$fetch_dayofweek_u=$fetch_week_u;

//
$counts_8= array();
foreach ($fetch as $key=>$subarr) {
    if ($subarr['USER_FLG'] == 1) {
        if (isset($counts_8[strftime('%w', strtotime($subarr['INS_DATE']))])) {
            $counts_8[strftime('%w', strtotime($subarr['INS_DATE']))]++;
        } // or initialize to 1 if it doesn't exist
        else $counts_8[strftime('%w', strtotime($subarr['INS_DATE']))] = 1;

        $counts_8[strftime('%w', strtotime($subarr['INS_DATE']))] = isset($counts_8[strftime('%w', strtotime($subarr['INS_DATE']))]) ? $counts_8[strftime('%w', strtotime($subarr['INS_DATE']))]++ : 1;
        $fetch_week_uu = array();
        $i = 0;
        foreach ($counts_8 as $key_1 => $row) {
            $fetch_week_uu[$key_1]['CNT'] = $row;
            $fetch_week_uu[$key_1]['H'] = $key_1;
            $i++;
        }
    }
}
$fetch_dayofweek_uu=$fetch_week_uu ;


$engine_array= array();
foreach ($fetch as $key_fetch => $row_fetch) {
    if ($row_fetch['ENGINE'] != '') {
        // Add to the current group count if it exists
        if (isset($engine_array[$row_fetch['ENGINE']])) {
            $engine_array[$row_fetch['ENGINE']]++;
        } // or initialize to 1 if it doesn't exist
        else $engine_array[$row_fetch['ENGINE']] = 1;

        // Or the ternary one-liner version
        // instead of the preceding if/else block
        $engine_array[$row_fetch['ENGINE']] = isset($engine_array[$row_fetch['ENGINE']]) ? $engine_array[$row_fetch['ENGINE']]++ : 1;
        arsort($engine_array);
        $engine = array();
        $i=0;
        foreach ($engine_array as $key_1 => $row)
        {
            $engine[$i]['ENGINE']=$key_1;
            $engine[$i]['CNT']=$row;
            $i++;
        }
    }
}

$engine=array_slice($engine, 0, 5);
$fetchENGINE = $engine;

#--------------------------------------------------
$query_array= array();
foreach ($fetch as $key_fetch => $row_fetch) {
    if ($row_fetch['QUERY_STRING'] != '') {
        // Add to the current group count if it exists
        if (isset($query_array[$row_fetch['QUERY_STRING']])) {
            $query_array[$row_fetch['QUERY_STRING']]++;
        } // or initialize to 1 if it doesn't exist
        else $query_array[$row_fetch['QUERY_STRING']] = 1;

        // Or the ternary one-liner version
        // instead of the preceding if/else block
        $query_array[$row_fetch['QUERY_STRING']] = isset($query_array[$row_fetch['QUERY_STRING']]) ? $query_array[$row_fetch['QUERY_STRING']]++ : 1;
        arsort($query_array);

        $query = array();
        $i=0;
        foreach ($query_array as $key_1 => $row)
        {
            $query[$i]['QUERY_STRING']=$key_1;
            $query[$i]['CNT']=$row;
            $i++;
        }
    }
}

$query=array_slice($query, 0, 10);
$fetchQuery = $query;

$browser_array= array();
foreach ($fetch as $key_fetch => $row_fetch) {
    if ($row_fetch['BROWSER'] != '') {
        // Add to the current group count if it exists
        if (isset($browser_array[$row_fetch['BROWSER']])) {
            $browser_array[$row_fetch['BROWSER']]++;
        } // or initialize to 1 if it doesn't exist
        else $browser_array[$row_fetch['BROWSER']] = 1;

        // Or the ternary one-liner version
        // instead of the preceding if/else block
        $browser_array[$row_fetch['BROWSER']] = isset($browser_array[$row_fetch['BROWSER']]) ? $browser_array[$row_fetch['BROWSER']]++ : 1;
        arsort($browser_array);

        $browser = array();
        $i=0;
        foreach ($browser_array as $key_1 => $row)
        {
            $browser[$i]['BROWSER']=$key_1;
            $browser[$i]['CNT']=$row;
            $i++;
        }
    }
}

$browser=array_slice($browser, 0, 3);
$fetch_bro =  $browser;

#------------------------------------------------------
$os_array= array();
foreach ($fetch as $key_fetch => $row_fetch) {
    if ($row_fetch['OS'] != '') {
        // Add to the current group count if it exists
        if (isset($os_array[$row_fetch['OS']])) {
            $os_array[$row_fetch['OS']]++;
        } // or initialize to 1 if it doesn't exist
        else $os_array[$row_fetch['OS']] = 1;

        // Or the ternary one-liner version
        // instead of the preceding if/else block
        $os_array[$row_fetch['OS']] = isset($os_array[$row_fetch['OS']]) ? $os_array[$row_fetch['OS']]++ : 1;

        arsort($os_array);

        $os = array();
        $i=0;
        foreach ($os_array as $key_1 => $row)
        {
            $os[$i]['OS']=$key_1;
            $os[$i]['CNT']=$row;
            $i++;
        }
    }
}
$os=array_slice($os, 0, 3);
$fetch_os = $os;

#-------------------------
$page_url_array= array();
foreach ($fetch as $key_fetch => $row_fetch) {
    if ($row_fetch['PAGE_URL'] != '') {
        // Add to the current group count if it exists
        if (isset($page_url_array[$row_fetch['PAGE_URL']])) {
            $page_url_array[$row_fetch['PAGE_URL']]++;
        } // or initialize to 1 if it doesn't exist
        else $page_url_array[$row_fetch['PAGE_URL']] = 1;

        // Or the ternary one-liner version
        // instead of the preceding if/else block
        $page_url_array[$row_fetch['PAGE_URL']] = isset($page_url_array[$row_fetch['PAGE_URL']]) ? $page_url_array[$row_fetch['PAGE_URL']]++ : 1;
        arsort($page_url_array);
        $page_url = array();
        $i=0;
        foreach ($page_url_array as $key_1 => $row)
        {
            $page_url[$i]['PAGE_URL']=$key_1;
            $page_url[$i]['CNT']=$row;
            $i++;
        }
    }
}

$page_url=array_slice($page_url, 0, 3);
$fetchURL_b = $page_url;

$page_url_array_w= array();
foreach ($fetch as $key_fetch => $row_fetch) {
    if ($row_fetch['PAGE_URL'] != '') {
        // Add to the current group count if it exists
        if (isset($page_url_array_w[$row_fetch['PAGE_URL']])) {
            $page_url_array_w[$row_fetch['PAGE_URL']]++;
        } // or initialize to 1 if it doesn't exist
        else $page_url_array_w[$row_fetch['PAGE_URL']] = 1;

        // Or the ternary one-liner version
        // instead of the preceding if/else block
        $page_url_array_w[$row_fetch['PAGE_URL']] = isset($page_url_array_w[$row_fetch['PAGE_URL']]) ? $page_url_array_w[$row_fetch['PAGE_URL']]++ : 1;
        asort($page_url_array_w);
        $page_url_w = array();
        $i=0;
        foreach ($page_url_array_w as $key_1 => $row)
        {
            $page_url_w[$i]['PAGE_URL']=$key_1;
            $page_url_w[$i]['CNT']=$row;
            $i++;
        }
    }
}
$page_url_w=array_slice($page_url_w, 0, 3);
$fetchURL_w = $page_url_w;

#--------------------------------------------------------
$referen_array= array();
foreach ($fetch as $key_fetch => $row_fetch) {
    if ($row_fetch['REFERER'] != '') {
        // Add to the current group count if it exists
        if (isset($referen_array[$row_fetch['REFERER']])) {
            $referen_array[$row_fetch['REFERER']]++;
        } // or initialize to 1 if it doesn't exist
        else $referen_array[$row_fetch['REFERER']] = 1;

        // Or the ternary one-liner version
        // instead of the preceding if/else block
        $referen_array[$row_fetch['REFERER']] = isset($referen_array[$row_fetch['REFERER']]) ? $referen_array[$row_fetch['REFERER']]++ : 1;
        arsort($referen_array);
        $referen= array();
        $i=0;
        foreach ($referen_array as $key_1 => $row)
        {
            $referen[$i]['REFERER']=$key_1;
            $referen[$i]['CNT']=$row;
            $i++;
        }
    }
}
$referen=array_slice($referen, 0, 3);
$fetch_ref = $referen;

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>BÁO CÁO PHÂN TÍCH TRUY CẬP</title>
    <style type="text/css">
        <!--
        .style1 {font-size: 11px}
        .style2 {font-size: 12px}
        .style3 {font-size: 14px}
        .table1 {
            border: 1px solid #000000;
        }
        .style4 {
            font-size: 10px;
            color: #0000CC;
        }
        .paper_seo {font-size: 12px;  height: 940px; width: 640px; left: 0px; top: 0px; border: ridge 1px black;}
        .titles {font-size: 24px; text-align: center; font-weight: bold;}
        -->
    </style>
</head>

<center>
<body>
<div class="head_button">
<a href="index.php"><input type="button" id="return" name="button" value="QUAY LẠI"></a>
<input type="button" id="printPageButton" name="button" value="IN BÁO CÁO" onClick="window.print();">
</div>
<table class="paper_seo">
    <tr>
        <td width="640" valign="top" height="902">
            <table width="100%" height="290">
                <tr>
                    <td>
                        <table width="100%" border="0" height="25">
                            <tr>
                                <td width="350"><span class="style2"><u><?php echo date('Y.m.d', mktime(0,0,0,(date("n")),date("j"),date("Y")));?></span></td>
                            </tr>
                        </table>
                        <br>
                        <?php $db_fname = explode("_",$filename);?>
                        <table width="100%" class="titles" cellpadding="5">
                            <tr>
                                <td class="titles">Báo cáo phân tích truy cập tháng &nbsp;<?php echo $db_fname[1];?>/<?php echo $db_fname[0];?></td>
                            </tr>
                        </table>
                        <br>
                        <table width="100%" border="0">
                            <tr>
                                <td align="left" valign="bottom" colspan="3"><span class="style2"><strong>SỐ LẦN XEM TRANG：</strong><?php echo count($fetch);?><br><!--<strong>ユニークPV：</strong><?php //echo count($fetch_u);?><br>--><strong>SỐ LẦN TRUY CẬP:</strong><?php echo count($fetch_uu);?></span></td>
                                <!--<td>&nbsp;</td>-->
                            </tr>
                            <tr style="margin-top:10px;">

                                <td width="33%" valign="top"><span class="style2"><strong>TRUY CẬP THEO NGÀY：</strong></span>
                                    <?php
                                    $fetch_max = 0;
                                    for($i=0;$i<count($fetch_day);$i++){
                                        if($fetch_max <= $fetch_day[$i]['CNT'])$fetch_max = $fetch_day[$i]['CNT'];
                                    }
                                    $fetch_u_max = 0;
                                    for($i=0;$i<count($fetch_day_u);$i++){
                                        if($fetch_u_max <= $fetch_day_u[$i]['CNT'])$fetch_u_max = $fetch_day_u[$i]['CNT'];
                                    }
                                    ?>
                                    <table>
                                        <?php for($i=0;$i<count($fetch_day);$i++):?>
                                            <tr style="margin:0px;padding:0px;">
                                                <td width="40" class="style1" style="margin:0px;padding:0px;">Ngày&nbsp;<?php echo $fetch_day[$i]["D"];?></td>
                                                <td width="200" style="margin:0px;padding:0px;">
                                                    <?php $width_uu = @round($fetch_day_uu[$i]['CNT']/$fetch_max * 100 );?>
                                                    <img style="padding-top: 4px" src="images/bar_uu.gif" width="<?php echo $width_uu*0.8;?>" height="8" align="left">
<!--                                                    --><?php //$width_u = @round($fetch_day_u[$i]['CNT']/$fetch_max * 100 );?>
<!--                                                    <img src="images/bar_u.gif" width="--><?//=($width_u - $width_uu)*0.8;?><!--" height="8" align="left">-->
                                                    <?php $width = @round($fetch_day[$i]['CNT']/$fetch_max * 100);?>
                                                    <img style="padding-top: 4px"  src="images/bar.gif" width="<?php echo ($width - $width_uu)*0.8;?>" height="8" align="left">
                                                    &nbsp;<span style="color:#0000EE;font-size:10px;"><?php// echo $fetch_day_uu[$i]['CNT'];?></span>&nbsp<span style="color:#0000EE;font-size:10px;"><?php if (isset($fetch_day_u[$i]['CNT']))echo $fetch_day_u[$i]['CNT'];?></span>&nbsp;<span style="color:#FF00FF;font-size:10px;"><?php echo $fetch_day[$i]['CNT'];?></span>&nbsp;
                                                </td>
                                            </tr>
                                        <?php endfor; ?>
                                    </table>
                                </td>
                                <td width="33%" valign="top"><span class="style2"><strong>TRUY CẬP THEO GIỜ：</strong></span>
                                <?php
                                    $fetch_max = 0;
                                    for($i=0;$i<23;$i++){
                                        if (isset($fetch_time[$i])) {
                                            if ($fetch_max <= $fetch_time[$i]['CNT']) $fetch_max = $fetch_time[$i]['CNT'];
                                        }
                                    }
                                    $fetch_u_max = 0;
                                    for($i=0;$i<23;$i++) {
                                        if (isset($fetch_time_u[$i])) {
                                            if ($fetch_u_max <= $fetch_time_u[$i]['CNT']) $fetch_u_max = $fetch_time_u[$i]['CNT'];
                                        }
                                    }
                                    ?>
                                    <table>
                                        <?php for($i=0;$i<=23;$i++):?>
                                            <tr>
                                                <td width="40" class="style1" style="margin:0px;padding:0px;">&nbsp;<?php echo $i;?>&nbsp;Giờ</td>
                                                <td width="200" style="margin:0px;padding:0px;"><?php $i = sprintf("%02d",$i);?>
                                                    <?php $width_uu = @round($fetch_time_uu[$i]['CNT']/$fetch_max * 100 );?>
                                                    <img style="padding-top: 4px" src="images/bar_uu.gif" width="<?php echo $width_uu*0.8;?>" height="8" align="left">
<!--                                                    --><?php //$width_u = @round($fetch_time_u[$i]['CNT']/$fetch_max * 100 );?>
<!--                                                    <img style="padding-top: 4px" src="images/bar_u.gif" width="--><?php //echo ($width_u - $width_uu)*0.8;?><!--" height="8" align="left">-->
                                                    <?php $width = @round($fetch_time[$i]['CNT']/$fetch_max * 100);?>
                                                    <img style="padding-top: 4px" src="images/bar.gif" width="<?php echo ($width - $width_uu)*0.8;?>" height="8" align="left">
                                                    &nbsp;<span style="color:#0000EE;font-size:10px;"><?php if (isset($fetch_time_uu[$i]['CNT'])) echo $fetch_time_uu[$i]['CNT'];?></span>&nbsp;<!--<span style="color:#0000EE;font-size:10px;"><?php //echo $fetch_time_u[$i];?></span>&nbsp;--><span style="color:#FF00FF;font-size:10px;"><?php if (isset($fetch_time[$i]))echo $fetch_time[$i]['CNT'];?></span>&nbsp;

                                                </td>
                                            </tr>
                                        <?php endfor; ?>
                                    </table>
                                </td>

                                <td rowspan="2" width="33%" valign="top"><span class="style2"><strong>TRUY CẬP THEO TUẦN：</strong></span>
                                    <?php
                                    $fetch_max = 0;
                                    for($i=0;$i<=6;$i++) {
                                        if (isset($fetch_dayofweek[$i])) {
                                            if ($fetch_max <= $fetch_dayofweek[$i]['CNT'])
                                                $fetch_max = $fetch_dayofweek[$i]['CNT'];
                                        }
                                    }
                                    $fetch_u_max = 0;
                                    for($i=0;$i<=6;$i++) {
                                        if (isset($fetch_dayofweek_u[$i])) {
                                            if ($fetch_u_max <= $fetch_dayofweek_u[$i]['CNT']) $fetch_u_max = $fetch_dayofweek_u[$i]['CNT'];
                                        }
                                    }
                                    ?>
                                    <table>
                                        <?php for($i=0;$i<=6;$i++):?>
                                            <tr>
                                                <td width="25" class="style1" style="margin:0px;padding:0px;">
                                                    <?php
                                                    switch ($i):
                                                        case 0:
                                                            echo "Sunday";
                                                            break;
                                                        case 1:
                                                            echo "Monday";
                                                            break;
                                                        case 2:
                                                            echo "Tuesday";
                                                            break;
                                                        case 3:
                                                            echo "Wednesday";
                                                            break;
                                                        case 4:
                                                            echo "Thursday";
                                                            break;
                                                        case 5:
                                                            echo "Friday";
                                                            break;
                                                        case 6:
                                                            echo "Saturday";
                                                            break;
                                                    endswitch;
                                                    ?>
                                                </td>
                                                <td width="200" style="margin:0px;padding:0px;">
                                                    <?php $width_uu = @round($fetch_dayofweek_uu[$i]['CNT']/$fetch_max * 100 );?>
                                                    <img style="padding-top: 4px" src="images/bar_uu.gif" width="<?php echo $width_uu*0.8;?>" height="8" align="left">
                                                    <?php $width = @round($fetch_dayofweek[$i]['CNT']/$fetch_max * 100);?>
                                                    <img style="padding-top: 4px" src="images/bar.gif" width="<?php echo ($width - $width_uu)*0.8;?>" height="8" align="left">
                                                    &nbsp;<span style="color:#0000EE;font-size:10px;"><?php if (isset($fetch_dayofweek_uu[$i])) echo $fetch_dayofweek_uu[$i]['CNT'];?></span>&nbsp;<!--<span style="color:#0000EE;font-size:10px;"><?php //echo $fetch_dayofweek_u[$i];?></span>&nbsp;--><span style="color:#FF00FF;font-size:10px;"><?php if (isset($fetch_dayofweek[$i])) echo $fetch_dayofweek[$i]['CNT'];?></span>&nbsp; </td>
                                            </tr>
                                        <?php endfor; ?>
                                    </table>
                                    <br>
                                    <span class="style2"><strong>TOP 5 CÔNG CỤ TÌM KIẾM</strong></span><br><br>
                                    <?php for($i=0;$i<count($fetchENGINE);$i++):?>
                                        <?php echo ($i + 1);?>：<?php echo $fetchENGINE[$i]['ENGINE'];?>（<?php echo $fetchENGINE[$i]['CNT'];?> Lượt）<br>
                                    <?php endfor;?>
                                    <br>
                                    <span class="style2"><strong>TOP 10 TỪ KHÓA</strong></span><br><br>
                                    <?php for($i=0;$i<count($fetchQuery);$i++):?>
                                        <?php echo ($i + 1);?>：<?php echo $fetchQuery[$i]['QUERY_STRING'];?>（<?php echo $fetchQuery[$i]['CNT'];?> Lượt）<br>
                                    <?php endfor;?>
                                    <br>
                                    <span class="style2"><strong>TOP 3 TRÌNH DUYỆT</strong></span><br><br>
                                    <?php for($i=0;$i<count($fetch_bro);$i++):?>
                                        <?php echo ($i + 1);?>：<?php echo $fetch_bro[$i]['BROWSER'];?>（<?php echo $fetch_bro[$i]['CNT'];?> Lượt）<br>
                                    <?php endfor;?>
                                    <br>
                                    <span class="style2"><strong>TOP 3 HỆ ĐIỀU HÀNH</strong></span><br><br>
                                    <?php for($i=0;$i<count($fetch_os);$i++):?>
                                        <?php echo ($i + 1);?>：<?php echo $fetch_os[$i]['OS'];?>（<?php echo $fetch_os[$i]['CNT'];?> Lượt）<br>
                                    <?php endfor;?>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="style2"><strong>TOP 3 TRANG TRUY CẬP NHIỀU NHẤT</strong></span><br><br>
                                    <?php for($i=0;$i<count($fetchURL_b);$i++):?>
                                        <?php echo ($i + 1);?>：<?php echo $fetchURL_b[$i]['PAGE_URL'];?>（<?php echo $fetchURL_b[$i]['CNT'];?> Lượt）<br>
                                    <?php endfor;?>
                                    <br>
                                    <span class="style2"><strong>TOP 3 TRANG TRUY CẬP ÍT NHẤT</strong></span><br><br>
                                    <?php for($i=0;$i<count($fetchURL_w);$i++):?>
                                        <?php echo ($i + 1);?>：<?php echo $fetchURL_w[$i]['PAGE_URL'];?>（<?php echo $fetchURL_w[$i]['CNT'];?> Lượt）<br>
                                    <?php endfor;?>
                                </td>
                            </tr>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="style2"><strong>TOP 3 WEB TÌM KIẾM:</strong></span><br><br>
                        <?php for($i=0;$i<count($fetch_ref);$i++):?>
                            <?php echo ($i + 1);?>：<?php echo $fetch_ref[$i]['REFERER'];?>（<?php echo $fetch_ref[$i]['CNT'];?> Lượt）<br>
                        <?php endfor;?>
                    </td>
                </tr>
            </table>
            <br>
            LIÊN HỆ&nbsp;&nbsp;           CÔNG TY PHẦN MỀM VIỆT VANG<br>
            SỐ 7 Trần Xuân Hòa, Quận 5, TP.HCM<br>
            Website: vietvang.net <br>
            TEL:+84(0)28 6265 1411　　EMAIL: info@vietvang.net
        </td>
    </tr>
</table>
</center>
</body>
<div class="footer" id="footer" style="margin-top:5em;"><?php echo "Copyright © VietVang JSC. All Rights Reserved."?></div>
</html>

<style>
    @media print {
        #printPageButton {
            display: none;
        }
        #footer {
            display: none;
        }
        #return{
            display: none;
        }
    }
    .head_button
    {
        margin-bottom: 5px;
    }
</style>