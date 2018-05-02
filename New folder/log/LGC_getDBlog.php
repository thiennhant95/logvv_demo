<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
#*******************************************************************************/

$db=new utilLib();
if($_POST)extract($db->getRequestParams("post",array(8,7,1,4),true));
if(empty($term)){

    $dbh = new sqlite3Ope(SQLITE3_OPEN_READWRITE);
    $create=$dbh->sqlite3Ope(DB_FILEPATH,CREATE_SQL1);

}else{

    $db_filepath = ACCESS_PATH.$term."_access_log_db";
    $dbh = new sqlite3Ope(SQLITE3_OPEN_READWRITE);
    $create=$dbh->sqlite3Ope($db_filepath,CREATE_SQL1);
}

#---------------------------------------------------------------
$i = 4;
while(1){
	$DEL_limit = date('Y_m', mktime(0,0,0,(date("n")-$i),date("j"),date("Y")));

	if(file_exists(ACCESS_PATH.$DEL_limit."_access_log_db")){
		unlink(ACCESS_PATH.$DEL_limit."_access_log_db") or die("");
	}
	else{
		break;
	}
	$i++;
}
#---------------------------------------------------------------

$total_sql = 'SELECT `ID` FROM `ACCESS_LOG`';

$fetch = $dbh->fetch($total_sql);

$total_uu_sql = $total_sql."WHERE (USER_FLG == '1')";
$fetch_uu = $dbh->fetch($total_uu_sql);
$today_day_time = date('Ymd', mktime(0,0,0,date("n"),date("j"),date("Y")));

//$today_sql = "
//SELECT
//	ID
//FROM
// ACCESS_LOG
//WHERE
//	( strftime('%Y%m%d', INS_DATE) = '".$today_day_time."')
//";
//$TodayCnt = $dbh->fetch($today_sql);

#---------------------------------------------------------------
function access()
{
    global $term;
    $db_name=$term!=null?$term:date('Y_m');
//    $db_name='2018_04';
    $db_filepath = ACCESS_PATH.$db_name."_access_log_db";
    $dbh = new sqlite3Ope(SQLITE3_OPEN_READWRITE);
    $dbh->sqlite3Ope($db_filepath,CREATE_SQL1);
    $total_sql = 'SELECT * FROM `ACCESS_LOG`';
    return $fetch = $dbh->fetch($total_sql);
}
#--------------------------------------------------------------------
function today(){

    $referen_array= array();
    $fetch=access();
    $today_day_time = date('Y-m-d', mktime(0,0,0,date("n"),date("j"),date("Y")));
    foreach ($fetch as $key_fetch => $row_fetch) {
//        echo $row_fetch['INS_DATE'];
//        echo "<pre>";
//        echo $today_day_time;
        if ($row_fetch['INS_DATE']==$today_day_time) {

            $referen_array[]['ID']=$row_fetch['ID'];
        }
    }
    return $referen_array;
}
$TodayCnt = today();
#--------------------------------------------------------------------
function day_access(){

$counts = array();
$access_query=access();
foreach ($access_query as $key=>$subarr) {
    // Add to the current group count if it exists
    if (isset($counts[$subarr['INS_DATE']])) {
        $counts[$subarr['INS_DATE']]++;
    }
    // or initialize to 1 if it doesn't exist
    else $counts[$subarr['INS_DATE']] = 1;

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
return $fetch_a;
}

#-------------------------------------

function array_sort($array, $on, $order=SORT_ASC){

    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}
function get_day_access()
{
    return array_slice(array_sort(access(),'ID',SORT_DESC), 0, 100);
}
function day_u_access(){

    $counts_1 = array();
    $fetch=access();
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
    return $fetch_b;
}

#-----------------------
function day_uu_access(){
    $counts_1 = array();
    $fetch=access();
    foreach ($fetch as $key=>$subarr) {
        if ($subarr['USER_FLG']==1) {
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
    return $fetch_b;

}

#----------------------------------------------------
function mon_access(){

    $counts_3 = array();
    $fetch=access();
    foreach ($fetch as $key=>$subarr) {
        if (isset($counts_3[strftime('%m', strtotime($subarr['INS_DATE']))])) {
            $counts_3[strftime('%m', strtotime($subarr['INS_DATE']))]++;
        } // or initialize to 1 if it doesn't exist
        else $counts_3[strftime('%m', strtotime($subarr['INS_DATE']))] = 1;

        $counts_3[strftime('%m', strtotime($subarr['INS_DATE']))] = isset($counts_3[strftime('%m', strtotime($subarr['INS_DATE']))]) ? $counts_3[strftime('%m', strtotime($subarr['INS_DATE']))]++ : 1;
        $fetch_d = array();
        $i = 0;
        foreach ($counts_3 as $key_1 => $row) {
            $fetch_d[$key_1]['CNT'] = $row;
            $fetch_d[$key_1]['M'] = $key_1;
            $i++;
        }
    }
  return $fetch_d;
}

#----------------------------------------------------
function mon_u_access(){

    $counts_3 = array();
    $fetch=access();
    foreach ($fetch as $key=>$subarr) {
        if ($subarr['UNIQUE_FLG'] == 1) {
            if (isset($counts_3[strftime('%m', strtotime($subarr['INS_DATE']))])) {
                $counts_3[strftime('%m', strtotime($subarr['INS_DATE']))]++;
            } // or initialize to 1 if it doesn't exist
            else $counts_3[strftime('%m', strtotime($subarr['INS_DATE']))] = 1;

            $counts_3[strftime('%m', strtotime($subarr['INS_DATE']))] = isset($counts_3[strftime('%m', strtotime($subarr['INS_DATE']))]) ? $counts_3[strftime('%m', strtotime($subarr['INS_DATE']))]++ : 1;
            $fetch_d = array();
            $i = 0;
            foreach ($counts_3 as $key_1 => $row) {
                $fetch_d[$key_1]['CNT'] = $row;
                $fetch_d[$key_1]['M'] = $key_1;
                $i++;
            }
        }
    }
    return $fetch_d;
}

#-----------------------------------------------
function mon_uu_access(){

    $counts_3 = array();
    $fetch=access();
    foreach ($fetch as $key=>$subarr) {
        if ($subarr['USER_FLG'] == 1) {
            if (isset($counts_3[strftime('%m', strtotime($subarr['INS_DATE']))])) {
                $counts_3[strftime('%m', strtotime($subarr['INS_DATE']))]++;
            } // or initialize to 1 if it doesn't exist
            else $counts_3[strftime('%m', strtotime($subarr['INS_DATE']))] = 1;

            $counts_3[strftime('%m', strtotime($subarr['INS_DATE']))] = isset($counts_3[strftime('%m', strtotime($subarr['INS_DATE']))]) ? $counts_3[strftime('%m', strtotime($subarr['INS_DATE']))]++ : 1;
            $fetch_d = array();
            $i = 0;
            foreach ($counts_3 as $key_1 => $row) {
                $fetch_d[$key_1]['CNT'] = $row;
                $fetch_d[$key_1]['M'] = $key_1;
                $i++;
            }
        }
    }
    return $fetch_d;
}

#---------------------------------------------
function month_top()
{
    return array_slice(array_sort(access(),'ID',SORT_DESC), 0, 1000);
}
#----------------------------------------------
function hour_access(){
    $counts_3 = array();
    $fetch=access();
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
	return $fetch_time;
}

#------------------------------------------
function hour_u_access(){
        $counts_3 = array();
        $fetch=access();
        foreach ($fetch as $key=>$subarr) {
            if ($subarr['UNIQUE_FLG'] == 1) {
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
        }
        $fetch_time=$fetch_d;
        return $fetch_time;
}

function hour_uu_access(){

    $counts_3 = array();
    $fetch=access();
    foreach ($fetch as $key=>$subarr) {
        if ($subarr['USER_FLG'] == 1) {
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
    }
    $fetch_time=$fetch_d;
    return $fetch_time;
}

#------------------------------------------------
function page_access(){
    $page_url_array= array();
    $fetch=access();
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
    return $page_url;
}

#------------------------------------------
function page_u_access(){

    $page_url_array= array();
    $fetch=access();
    foreach ($fetch as $key_fetch => $row_fetch) {
        if ($row_fetch['PAGE_URL'] != '') {
            if ($row_fetch['UNIQUE_FLG'] == 1) {
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
                $i = 0;
                foreach ($page_url_array as $key_1 => $row) {
                    $page_url[$i]['PAGE_URL'] = $key_1;
                    $page_url[$i]['CNT'] = $row;
                    $i++;
                }
            }
        }
    }
    return $page_url;
}

#------------------------------------------------------------
function engine_access(){
    $engine_array= array();
    $fetch=access();
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
            array_slice($engine_array, 0, 5);
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
    return $engine;
}

function engine_access_u(){

    $page_url_array= array();
    $fetch=access();
    foreach ($fetch as $key_fetch => $row_fetch) {
        if ($row_fetch['ENGINE'] != '') {
            if ($row_fetch['UNIQUE_FLG'] == 1) {
                // Add to the current group count if it exists
                if (isset($page_url_array[$row_fetch['ENGINE']])) {
                    $page_url_array[$row_fetch['ENGINE']]++;
                } // or initialize to 1 if it doesn't exist
                else $page_url_array[$row_fetch['ENGINE']] = 1;

                // Or the ternary one-liner version
                // instead of the preceding if/else block
                $page_url_array[$row_fetch['ENGINE']] = isset($page_url_array[$row_fetch['ENGINE']]) ? $page_url_array[$row_fetch['ENGINE']]++ : 1;
                arsort($page_url_array);
                $page_url = array();
                $i = 0;
                foreach ($page_url_array as $key_1 => $row) {
                    $page_url[$i]['ENGINE'] = $key_1;
                    $page_url[$i]['CNT'] = $row;
                    $i++;
                }
            }
        }
    }
    return $page_url;
}

#-----------------------------------------------
function access_query(){

    $query_array= array();
    $fetch=access();
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
            array_slice($query_array, 0, 10);
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

    return $query;
}

#-----------------------------------------
function dayofweek_access(){
    $counts_6 = array();
    $fetch=access();
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
     return $fetch_dayofweek =$fetch_week;
}

#-----------------------------------------------
function dayofweek_u_access(){

    $counts_7= array();
    $fetch=access();
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
     return $fetch_dayofweek_u=$fetch_week_u;
}

#--------------------------------------
function dayofweek_uu_access(){

    $counts_8= array();
    $fetch=access();
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
    return $fetch_dayofweek_uu=$fetch_week_uu ;
}

#---------------------------------------
function bro_access(){

    $browser_array= array();
    $fetch=access();
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
            array_slice($browser_array, 0, 3);
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


    return $fetch_bro =  $browser;
}

#-----------------------------------------
function bro_access_u(){

    $browser_array= array();
    $fetch=access();
    foreach ($fetch as $key_fetch => $row_fetch) {
        if ($row_fetch['BROWSER'] != '' && $row_fetch['UNIQUE_FLG']=='1') {
            // Add to the current group count if it exists
            if (isset($browser_array[$row_fetch['BROWSER']])) {
                $browser_array[$row_fetch['BROWSER']]++;
            } // or initialize to 1 if it doesn't exist
            else $browser_array[$row_fetch['BROWSER']] = 1;

            // Or the ternary one-liner version
            // instead of the preceding if/else block
            $browser_array[$row_fetch['BROWSER']] = isset($browser_array[$row_fetch['BROWSER']]) ? $browser_array[$row_fetch['BROWSER']]++ : 1;
            arsort($browser_array);
            array_slice($browser_array, 0, 3);
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


    return $fetch_bro =  $browser;
}

#-------------------------------------
function os_access(){
    $os_array= array();
    $fetch=access();
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
            array_slice($os_array, 0, 3);
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

     return $fetch_os = $os;
}

#----------------------------------------
function os_access_u(){
    $os_array= array();
    $fetch=access();
    foreach ($fetch as $key_fetch => $row_fetch) {
        if ($row_fetch['OS'] != '' && $row_fetch['UNIQUE_FLG']=='1') {
            // Add to the current group count if it exists
            if (isset($os_array[$row_fetch['OS']])) {
                $os_array[$row_fetch['OS']]++;
            } // or initialize to 1 if it doesn't exist
            else $os_array[$row_fetch['OS']] = 1;

            // Or the ternary one-liner version
            // instead of the preceding if/else block
            $os_array[$row_fetch['OS']] = isset($os_array[$row_fetch['OS']]) ? $os_array[$row_fetch['OS']]++ : 1;
            arsort($os_array);
            array_slice($os_array, 0, 3);
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

    return $fetch_os = $os;
}

#--------------------------------------
function ref_access(){

    $referen_array= array();
    $fetch=access();
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
            array_slice($referen_array, 0, 3);
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
    return $fetch_ref = $referen;
}

#-----------------------------------------------
function ref_access_u(){

    $referen_array= array();
    $fetch=access();
    foreach ($fetch as $key_fetch => $row_fetch) {
        if ($row_fetch['REFERER'] != '' && $row_fetch['UNIQUE_FLG']=='1') {
            // Add to the current group count if it exists
            if (isset($referen_array[$row_fetch['REFERER']])) {
                $referen_array[$row_fetch['REFERER']]++;
            } // or initialize to 1 if it doesn't exist
            else $referen_array[$row_fetch['REFERER']] = 1;

            // Or the ternary one-liner version
            // instead of the preceding if/else block
            $referen_array[$row_fetch['REFERER']] = isset($referen_array[$row_fetch['REFERER']]) ? $referen_array[$row_fetch['REFERER']]++ : 1;
            arsort($referen_array);
            array_slice($referen_array, 0, 3);
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
    return $fetch_ref = $referen;
}
#-----------------------------------------------
function search_array_compact($data){
    $pids = array();
    foreach ($data as $h) {
        $pids[] = $h['REMOTE_ADDR'];
    }
    $uniquePids = array_unique($pids);
    return $uniquePids;
}
#-----------------------------------------------

#------------------------------------------------
function aasort (&$array, $key) {
    $sorter=array();
    $ret=array();
    reset($array);
    foreach ($array as $ii => $va) {
        $sorter[$ii]=$va[$key];
    }
    arsort($sorter);
    foreach ($sorter as $ii => $va) {
        $ret[$ii]=$array[$ii];
    }
    return $array=$ret;
}


#------------------------------------------
function ip_adrress(){

    $referen_array= array();
    $fetch=access();
    foreach ($fetch as $key_fetch => $row_fetch) {
        if ($row_fetch['REMOTE_ADDR'] != '') {
            // Add to the current group count if it exists
            if (isset($referen_array[$row_fetch['REMOTE_ADDR']])) {
                $referen_array[$row_fetch['REMOTE_ADDR']]++;
            } // or initialize to 1 if it doesn't exist
            else $referen_array[$row_fetch['REMOTE_ADDR']] = 1;

            // Or the ternary one-liner version
            // instead of the preceding if/else block
            $referen_array[$row_fetch['REMOTE_ADDR']] = isset($referen_array[$row_fetch['REMOTE_ADDR']]) ? $referen_array[$row_fetch['REMOTE_ADDR']]++ : 1;
            arsort($referen_array);
            array_slice($referen_array, 0, 3);
            $referen= array();
            $i=0;
            foreach ($referen_array as $key_1 => $row)
            {
                $referen[$i]['REMOTE_ADDR']=$key_1;
                $referen[$i]['CNT']=$row;
                $i++;
            }
        }
    }
//    return $fetch_ref = $referen;
    $i=0;
    foreach ($referen as $row_referen)
    {
        foreach ($fetch as $key_fetch => $row_fetch)
        {
            if ($row_fetch['REMOTE_ADDR']==$row_referen['REMOTE_ADDR']) {
                $refe_array['REMOTE_ADDR']=$row_referen['REMOTE_ADDR'];
                $refe_array['CNT']=$row_referen['CNT'];
                $refe_array['COUNTRY_CITY'] = $row_fetch['COUNTRY'] . ' / ' . $row_fetch['CITY'];
                $refe_array['LAST'] = $row_fetch['TIME'].' '.date('d-m-Y',strtotime($row_fetch['INS_DATE']));
            }
        }
        $refe_array_last[]=$refe_array;
    }
    $tempArr = array_unique(array_column($fetch, 'REMOTE_ADDR'));
    $tempArr1=array_intersect_key($fetch, $tempArr);
    foreach ($tempArr1 as $temp)
    {
        foreach ($refe_array_last as $row_last)
        {
            if ($temp['REMOTE_ADDR']==$row_last['REMOTE_ADDR'])
            {
                $last['REMOTE_ADDR']=$row_last['REMOTE_ADDR'];
                $last['CNT']=$row_last['CNT'];
                $last['COUNTRY_CITY'] = $row_last['COUNTRY_CITY'];
                $last['LAST'] = $row_last['LAST'];
                $last['FIRST'] =  $temp['TIME'].' '.date('d-m-Y',strtotime($temp['INS_DATE']));;
            }
        }
        $array_last[]=$last;
    }
    return aasort($array_last,'CNT');
//    return   $refe_array_last;

//
//    print_r()
}
//echo "<pre>";
//print_r(ip_adrress());
#-----------------------------------------------
if(empty($term)){
    $dbh = new sqlite3Ope(SQLITE3_OPEN_READWRITE);
    $create=$dbh->sqlite3Ope(DB_FILEPATH,CREATE_SQL1);
}else{
    $db_filepath = ACCESS_PATH.$term."_access_log_db";
    $dbh = new sqlite3Ope(SQLITE3_OPEN_READWRITE);
    $create=$dbh->sqlite3Ope($db_filepath,CREATE_SQL1);
}

if (!isset($_POST["mode"])) $_POST["mode"]='day';
switch ($_POST["mode"]):
	case "day":
			$fetch_day = day_access();
			//$fetch_day_u = day_u_access();
			$fetch_day_uu = day_uu_access();
			$get_day_access=get_day_access();
		break;
	case "month":
			$MonCnt = mon_access();
			//$MonCnt_u = mon_u_access();
			$MonCnt_uu = mon_uu_access();
            $Mon_top=month_top();
		break;
	case "hour":
			$fetch_time = hour_access();
			//$fetch_time_u = hour_u_access();
			$fetch_time_uu = hour_uu_access();
		break;
	case "youbi":
			$fetch_dayofweek = dayofweek_access();
			//$fetch_dayofweek_u = dayofweek_u_access();
			$fetch_dayofweek_uu = dayofweek_uu_access();
		break;
	case "page":
			$fetchURL = page_access();
			$fetchURL_u = page_u_access();
		break;
	case "engine":
			$fetchENGINE = engine_access();
            $fetchENGINE_u = engine_access_u();
		break;
	case "query":
//			$fetchQuery = access_query();
		break;
	case "bro":
			$fetch_bro = bro_access();
            $fetch_bro_u= bro_access_u();
		break;
	case "os":
			$fetch_os = os_access();
            $fetch_os_u = os_access_u();
		break;
	case "ref":
			$fetch_ref = ref_access();
            $fetch_ref_u = ref_access_u();
		break;
    case "ip":
        $ip_adress=ip_adrress();
        break;
	case "all":
			$fetch_day = day_access();
			//$fetch_day_u = day_u_access();
			$fetch_day_uu = day_uu_access();
			$MonCnt = mon_access();
			//$MonCnt_u = mon_u_access();
			$MonCnt_uu = mon_uu_access();
			$fetch_time = hour_access();
			//$fetch_time_u = hour_u_access();
			$fetch_time_uu = hour_uu_access();
			$fetch_dayofweek = dayofweek_access();
			//$fetch_dayofweek_u = dayofweek_u_access();
			$fetch_dayofweek_uu = dayofweek_uu_access();
			$fetchURL = page_access();
			$fetchURL_u = page_u_access();
			$fetchENGINE = engine_access();
            $fetchENGINE_u = engine_access_u();
//			$fetchQuery = access_query();
            $ip_adress=ip_adrress();
			$fetch_bro = bro_access();
            $fetch_bro_u= bro_access_u();
			$fetch_os = os_access();
            $fetch_os_u = os_access_u();
			$fetch_ref = ref_access();
            $fetch_ref_u = ref_access_u();
	default:
			$fetch_day = day_access();
			//$fetch_day_u = day_u_access();
			$fetch_day_uu = day_uu_access();
		break;
endswitch;

?>