<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/9
 * Time: 17:13
 */
    require_once 'EmpService.class.php';
    $empService = new EmpService();
    if(!empty($_REQUEST['flag'])){
        $flag=$_REQUEST['flag'];
        if($flag=='delemp') {
            $id = $_GET['id'];
            if ($empService->delEmpById($id) == 1) {
                header('Location: Success.php');
                exit();
            } else {
                header('Location: Fail.php');
                exit();
            }
        }else if ($flag=='addemp'){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $mobile=$_POST['mobile'];
            $level=$_POST['level'];
            $salary=$_POST['salary'];
            if ($empService->addEmp($name,$email,$mobile,$level,$salary) == 1) {
                header('Location: Success.php');
                exit();
            } else {
                header('Location: Fail.php');
                exit();
            }
        }else if ($flag=='updateemp'){
            $id = $_POST['id'];
            $name=$_POST['name'];
            $email=$_POST['email'];
            $mobile=$_POST['mobile'];
            $level=$_POST['level'];
            $salary=$_POST['salary'];
            if ($empService->updateEmp($id,$name,$email,$mobile,$level,$salary) == 1) {
                header('Location: Success.php');
                exit();
            } else {
                header('Location: Fail.php');
                exit();
            }
        }
    }
