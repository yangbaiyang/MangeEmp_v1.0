<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/8
 * Time: 19:50
 */
 require_once 'SqlHelper.class.php';
class AdminService
{
    public function checkAdmin($username,$password){
        $sqlHelper = new SqlHelper();
        $sql="select password from admin where name='{$username}'";
        $res=$sqlHelper->execute_dql($sql);
        var_dump($res);
        if($row=$res->fetch_assoc()){
            if (md5($password)==$row['password']){
                return true;
            }
        }
        $res->free();
        $sqlHelper->close_connect();
        return false;

    }

}