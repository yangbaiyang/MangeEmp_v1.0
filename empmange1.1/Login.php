<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/7
 * Time: 16:35
 */
?>
<html>
<h1>管理员登录</h1>
<form action="LoginControl.php" method="post">
<table>
<tr><td>用户名：</td><td><input type="text" name="username"></td></tr>
<tr><td>密&nbsp;&nbsp;&nbsp;码：</td><td><input type="password" name="pwd"></td></tr>
<tr><td><input type="submit" value="登录"></td><td><input type="reset" value="重新填写"></td></tr>
</table>
</form>
</html>
<?php

    if (!empty($_GET['err'])) {
        $err = $_GET['err'];
        if ($err=='1'){
            echo "<font color='red'>用户名或密码错误</font>";
        }
    }
    ?>

