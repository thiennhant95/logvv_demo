<?php
    function DispAccesslog(){
        global $inc_file_path;

        $html = "";

        if(!empty($_POST['act'])){
            return $html;
        }

        $link_type = "log.php";

        //----------------//
        $top_path = $inc_file_path;

        $html = <<<EDIT
    <script type="text/javascript" src="https://www.google.com/jsapi?key="></script>
    <script src="https://api.all-internet.jp/accesslog/access.js" language="javascript" type="text/javascript"></script>
    <script language="JavaScript" type="text/javascript">
    <!--
    var s_obj = new _WebStateInvest();
        document.write('<img src="{$top_path}{$link_type}?referrer='+escape(document.referrer)+'&st_id_obj='+encodeURI(String(s_obj._st_id_obj))+'" width="1" height="1" style="display:none">');
    //-->
    </script>
EDIT;
        return $html;
    }

?>