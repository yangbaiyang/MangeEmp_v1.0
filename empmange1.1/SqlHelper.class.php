<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7
 * Time: 16:48
 */
class SqlHelper
{
    private  static $mysqli;
    private static $host = 'localhost';
    private static $username = 'root';
    private  static $password = 'root';
    public static $db ='empmange';
    public function __construct()
    {
        self::$mysqli = new mysqli(self::$host,self::$username,self::$password,self::$db);
        if(self::$mysqli->connect_errno){
            echo '失败'.self::$mysqli->connect_errno;
        }else{
            self::$mysqli->query('set names utf8');}
    }
    public  function execute_dql($sql)
    {
        //$res = mysqli_query(self::$conn,$sql) or die(mysqli_errno());
        $res = self::$mysqli->query($sql) or die(self::$mysqli->errno);
        return $res;
    }
    public function excute_dql2($sql)
    {
        $arr=array();
        $res = self::$mysqli->query($sql);
        $i=0;
        while($row=$res->fetch_assoc()){
            $arr[$i++]=$row;
        }
        $res->free_result();
        return $arr;
    }
    public function excute_fenye_page($sql1,$sql2,$fenyePage)
    {
        $res = self::$mysqli->query($sql1);
        while($row=$res->fetch_assoc()){
            $arr[]=$row;
        }
        $res->free_result();
        $fenyePage->setResArray($arr);
        $res= self::$mysqli->query($sql2);
        if($row=$res->fetch_row()){
            $fenyePage->setRowCount($row[0]);
            $fenyePage->setPageCount(ceil($row[0]/$fenyePage->getPageSize()));
        }
        $res->free_result();
        $navigate='';
        if ($fenyePage->getPageNow()>1){
            $prePage=$fenyePage->getPageNow()-1;
            $navigate = "<a href='{$fenyePage->getGotoUrl()}?pageNow=$prePage'>上一页</a>";
        }
        /*for ($i=1;$i<=3;$i++){
             echo "<a href='{$fenyePage->getGotoUrl(
}?pageNow={$i}'>$i</a>";
         }*/
        $start=floor(($fenyePage->getPageNow()-1)/10)*10+1;
        $index=$start;
        if($start>1){
            $start1=$start-1;
            $navigate.= "<a href='{$fenyePage->getGotoUrl()}?pageNow=$start1'><<</a>&nbsp;";
        }
        if($fenyePage->getPageNow()<$fenyePage->getPageCount()){
            for (;$start<$index+10;$start++){
                $navigate.= "<a href='{$fenyePage->getGotoUrl()}?pageNow={$start}'>[$start]</a>&nbsp;";
            }

            $navigate.= "<a href='{$fenyePage->getGotoUrl()}?pageNow={$start}'>>></a>";}
        if ($fenyePage->getPageNow()<$fenyePage->getPageCount()){
            $nextPage=$fenyePage->getPageNow()+1;
            $navigate.= "<a href='{$fenyePage->getGotoUrl()}?pageNow=$nextPage'>下一页</a>";
        }
        $navigate.= "当前页{$fenyePage->getPageNow()}/共有{$fenyePage->getPageCount()}";
        //self::$mysqli->close();
        $fenyePage->setNavigate($navigate);
    }
    public  function execute_dml($sql)
    {
        // $res = mysqli_query(self::$conn,$sql) or die(mysqli_errno());
        $res = self::$mysqli->query($sql) or die(self::$mysqli->errno);
        if(!$res){
            return 0;
            //mysqli_affected_rows(self::$conn)>0
        }elseif (self::$mysqli->affected_rows >0){
            return 1;
        }else
        {
            return 2;
        }
    }
    public function close_connect(){
        if(!empty(self::$mysqli)){
            self::$mysqli->close();
        }
    }

    /**
     * @return mysqli|null
     */
    public static function getMysqli()
    {
        return self::$mysqli;
    }

    /**
     * @param mysqli|null $mysqli
     */
    public static function setMysqli($mysqli)
    {
        self::$mysqli = $mysqli;
    }

    /**
     * @return string
     */
    public static function getHost(): string
    {
        return self::$host;
    }

    /**
     * @param string $host
     */
    public static function setHost(string $host)
    {
        self::$host = $host;
    }

    /**
     * @return string
     */
    public static function getUsername(): string
    {
        return self::$username;
    }

    /**
     * @param string $username
     */
    public static function setUsername(string $username)
    {
        self::$username = $username;
    }

    /**
     * @return string
     */
    public static function getPassword(): string
    {
        return self::$password;
    }

    /**
     * @param string $password
     */
    public static function setPassword(string $password)
    {
        self::$password = $password;
    }

    /**
     * @return string
     */
    public static function getDb(): string
    {
        return self::$db;
    }

    /**
     * @param string $db
     */
    public static function setDb(string $db)
    {
        self::$db = $db;
    }


}