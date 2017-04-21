<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7
 * Time: 16:48
 */
    require_once 'AdminService.class.php';
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $adminService = new AdminService();

   if($adminService->checkAdmin($username,$pwd)){
               header("Location: Mange.php?name=$username");
               exit();
       }
       header('Location: Login.php?err=1');
       exit();

