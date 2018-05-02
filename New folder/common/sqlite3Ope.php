<?php
class sqlite3Ope extends SQLite3
{
    var $filepath;
    var $create_sql;
    var $escape_flg;

    function __construct()
    {

    }

    //open file
    function openFile($filePath)
    {
        $this->filepath=$filePath;
        $this->open($this->filepath);
    }


    function sqlite3Ope($fp = "", $cs = "", $e = true)
    {
        $this->filepath = ($fp) ? $fp : "";
        $this->create_sql = ($cs) ? $cs : "";
        $this->escape_flg = $e;

        #-----------------------------------------------------------
        if ($fp && $cs)
            $this->db_init();
    }

    function db_init()
    {
        if(!$this->filepath || !$this->create_sql)die("");
        #------------------------------------------------------------------
        $this->open($this->filepath);
        $this->exec($this->create_sql);
        if(file_exists($this->filepath) && !filesize($this->filepath)){
            if(!$this->query($this->create_sql)){
                die("");
            }
            $this->close();
        }
    }

    function setFilepath($path,$file=""){

        if(!$path):
            die("");
        else:
            $this->filepath = $path.$file;
        endif;

    }


    function setCreateSQL($sql)
    {

        if(!$sql):
            die("");
        else:
            $this->create_sql = $sql;
        endif;

    }

    function fetch($sql)
    {

        if(empty($sql))die("");

        #------------------------------------------------------------------
        #------------------------------------------------------------------
        $result =$this->query($sql);
        if(!$result){
            die("");
        }

        $this->escape_flg=true;
        if($this->escape_flg){
            $data=$result->fetchArray();
            if (isset($data[0])) unset($data[0]);
            if (isset($data[1])) unset($data[1]);
            if (isset($data[2])) unset($data[2]);
            if (isset($data[3])) unset($data[3]);
            if (isset($data[4])) unset($data[4]);
            if (isset($data[5])) unset($data[5]);
            if (isset($data[6])) unset($data[6]);
            if (isset($data[7])) unset($data[7]);
            if (isset($data[8])) unset($data[8]);
            if (isset($data[9])) unset($data[9]);
            if (isset($data[10])) unset($data[10]);
            if (isset($data[11])) unset($data[11]);
            if (isset($data[12])) unset($data[12]);
            if (isset($data[13])) unset($data[13]);
            if (count($data)>1)
            {
                foreach ($data as $row)
                {
                    $row= stripslashes($row);
                }
            }
            $i=0;
//            global $data_return;
            $data_return=array();
            while($row=$result->fetchArray()){
                if (isset($data['ID'])) $data_return[$i]['ID'] = stripslashes($row ['ID']);

                if (isset($data['REMOTE_ADDR'])) $data_return[$i]['REMOTE_ADDR'] =  stripslashes($row['REMOTE_ADDR']);

                if (isset($data['USER_AGENT'])) $data_return[$i]['USER_AGENT'] =  stripslashes($row['USER_AGENT']);

                if (isset($data['QUERY_STRING'])) $data_return[$i]['QUERY_STRING'] = stripslashes($row['QUERY_STRING']);

                if (isset($data['REFERER'])) $data_return[$i]['REFERER'] =  stripslashes($row['REFERER']);

                if (isset($data['ENGINE'])) $data_return[$i]['ENGINE'] =  stripslashes($row['ENGINE']);

                if (isset($data['OS'])) $data_return[$i]['OS'] =  stripslashes($row['OS']);

                if (isset($data['BROWSER'])) $data_return[$i]['BROWSER'] =  stripslashes($row['BROWSER']);

                if (isset($data['PAGE_URL'])) $data_return[$i]['PAGE_URL'] =  stripslashes($row['PAGE_URL']);

                if (isset($data['UNIQUE_FLG'])) $data_return[$i]['UNIQUE_FLG'] = stripslashes($row['UNIQUE_FLG']);

                if (isset($data['USER_FLG'])) $data_return[$i]['USER_FLG'] =  stripslashes($row['USER_FLG']);

                if (isset($data['INS_DATE'])) $data_return[$i]['INS_DATE'] =  $row['INS_DATE'];

                if (isset($data['TIME'])) $data_return[$i]['TIME'] =  stripslashes($row['TIME']);

                if (isset($data['DEL_FLG'])) $data_return[$i]['DEL_FLG'] = stripslashes($row['DEL_FLG']);
                if (isset($data['CNT'])) $data_return[$i]['CNT'] =  stripslashes($data['CNT']);
                if (isset($data['DAYOFWEEK'])) $data_return[$i]['DAYOFWEEK'] =  stripslashes($row['DAYOFWEEK']);

                if (isset($data['DAYOFWEEK'])) $data_return[$i]['DAYOFWEEK'] =  stripslashes($row['DAYOFWEEK']);

                if (isset($data['D'])) $data_return[$i]['D'] = $row['D'];

                if (isset($data['Y'])) $data_return[$i]['D'] = $row['D'];
                if (isset($data['M'])) $data_return[$i]['M'] = $row['M'];

                if (isset($data['COUNTRY'])) $data_return[$i]['COUNTRY'] = $row['COUNTRY'];
                if (isset($data['CITY'])) $data_return[$i]['CITY'] = $row['CITY'];
                $i++;
            }
            return $data_return;
        }
    }


    function regist($sql)
    {

        $error_mes = false;
        $array_sql = array();

        if(empty($sql)):
            die("");
        endif;
        #------------------------------------------------------------------
        $this->exec("BEGIN EXCLUSIVE TRANSACTION");
        $this->query($sql);
        $this->exec("COMMIT");
        #------------------------------------------------------------------
        $this->close();
        if($error_mes)return $error_mes;
    }

    function get($sql)
    {
        return $this->query($sql);
    }

    //test
    public function add(){
        $this->query('INSERT INTO `ACCESS_LOG` 
    (`REMOTE_ADDR`, `USER_AGENT`,`REFERER`,`QUERY_STRING`,`ENGINE`,`OS`,`BROWSER`,`PAGE_URL`,`UNIQUE_FLG`,`USER_FLG`,`INS_DATE`,`TIME`,`DEL_FLG`) 
    VALUES ("119.26.170.114", "","","","WindowsUnknown","Internet ExplorerUnknown","http://www.sogocorporation.com/unreserved/","dsdsd","dsdsd","dsds","dsdsd","dsds","0")');
    }
}
