<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/8
 * Time: 19:51
 */
    require_once 'SqlHelper.class.php';
    require_once 'emp.class.php';
class EmpService
{
    public function getPageCount($pageSize)
    {
        $sqlHelpler = new SqlHelper();
        $sql='select count(id) from emp';
        $res=$sqlHelpler->execute_dql($sql);
        if($row=$res->fetch_row()){
            $rowCount=$row[0];
        }
        $pageCount=ceil($rowCount/$pageSize);
        $res->free_result();
        $sqlHelpler->close_connect();
        return $pageCount;
    }
    public function getEmpListByPage($pageNow,$pageSize)
    {
       $sqlHelper=new SqlHelper();
       $sql="select * from emp limit ".($pageNow-1)*$pageSize.','.$pageSize;
       $arr=$sqlHelper->excute_dql2($sql);
       $sqlHelper->close_connect();
       return $arr;

    }
    public function getFenyePage($fenyePage){
        $sqlHelper=new SqlHelper();
        $sql1="select * from emp limit ".($fenyePage->getPageNow()-1)*$fenyePage->getPageSize().','
            .$fenyePage->getPageSize();
        $sql2='select count(id) from emp';
        $sqlHelper->excute_fenye_page($sql1,$sql2,$fenyePage);
        $sqlHelper->close_connect();

    }
    public function delEmpById($id){
        $sqlHelper = new SqlHelper();
        $sql="delete from emp where id={$id}";
        return $sqlHelper->execute_dml($sql);
    }
    public function addEmp($name,$email,$mobile,$level,$salary)
    {
        $sql="insert into emp(name,email,mobile,level,salary) values('$name','$email','$mobile','$level','$salary')";
        $sqlHelper = new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }
    public function searchEmp($id)
    {
            $sql = "select * from emp where id='{$id}'";
            $sqlHelper = new SqlHelper();
           $arr = $sqlHelper->excute_dql2($sql);
           $emp = new Emp();
           $emp->setId($arr[0]['id']);
           $emp->setName($arr[0]['name']);
           $emp->setEmail($arr[0]['email']);
           $emp->setMobile($arr[0]['mobile']);
           $emp->setLevel($arr[0]['level']);
           $emp->setSalary($arr[0]['salary']);
           $sqlHelper->close_connect();
           return $emp;
    }
    public function updateEmp($id,$name,$email,$mobile,$level,$salary)
    {
        $sql="update emp set name='$name',email='$email',mobile='$mobile',level='$level',salary='$salary' where id='$id'";
        $sqlHelper = new SqlHelper();
        $res=$sqlHelper->execute_dml($sql);
        $sqlHelper->close_connect();
        return $res;
    }
}