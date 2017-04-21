<html>
<a href="Login.php">返回重新登录</a>
<h1>添加雇员界面</h1>
<form action="EmpControl.php" method="post">
    <table>
        <tr><td>姓名</td><td><input type="text" name="name"></td></tr>
        <tr><td>电邮</td><td><input type="text" name="email"></td></tr>
        <tr><td>号码</td><td><input type="text" name="mobile"></td></tr>
        <tr><td>级别</td><td><input type="text" name="level"></td></tr>
        <tr><td>薪水</td><td><input type="text" name="salary"></td></tr>
        <tr><td><input type="hidden" name="flag" value="addemp"></td></tr>
        <tr><td><input type="submit" value="添加"></td><td><input type="reset" name="重新填写"></td></tr>
    </table>
</form>

</html>