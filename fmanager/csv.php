<?php

include("../common/logconfig.php");

include("util_lib.php");

include("sqlite3Ope.php");

mb_http_output("UTF-8");

#---------------------------------------------------------------
//if( !$_SERVER['PHP_AUTH_USER'] || !$_SERVER['PHP_AUTH_PW'] ){
//
//    header("HTTP/1.0 404 Not Found"); exit();
//
//}

$db=new  utilLib();

extract($db->getRequestParams("post",array(8,7,1,4),true));
//
header("Content-Type: text/plain; charset=UTF-8");

header("Content-Type: application/octet-stream");

header("Content-Disposition: attachment; filename=list-".date("YmdHis").".csv");
$sql = '

	SELECT *
	FROM

		ACCESS_LOG

	ORDER BY

		INS_DATE ASC

';

$dbh = new sqlite3Ope();
$create=$dbh->sqlite3Ope(ACCESS_PATH.$filename,CREATE_SQL1);
$fetchLogList = $dbh->get($sql);
$data = "REMOTE ADDR,REFERER,KEYWORD,ENGINE,OS,BROWSER,URL,NS_DATE,TIME\n";

while($row=$fetchLogList->fetchArray()){
    if ($row['DEL_FLG']==0) {
        $data .= str_replace(",", ".", $row['REMOTE_ADDR']) . ",";

        $data .= str_replace(",", ".", $row['REFERER']) . ",";

        $data .= str_replace(",", ".", str_replace('［','', str_replace('］','', $row['QUERY_STRING']))) . ",";

        $data .= str_replace(",", ".", $row['ENGINE']) . ",";

        $data .= str_replace(",", ".", $row['OS']) . ",";

        $data .= $row['BROWSER'] . ",";

        $data .= str_replace(",", ".", $row['PAGE_URL']) . ",";

        $data .= $row['INS_DATE'] . ",";

        $data .= $row['TIME'] . "\n";
    }
}
echo $data;
?>