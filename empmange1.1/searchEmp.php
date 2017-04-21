<html>
<h1>查询用户</h1>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/10
 * Time: 10:47
 */
    require_once 'EmpService.class.php';
    $id=$_POST['id'];
    $empService = new EmpService();
    $emp=$empService->searchEmp($id);

?>
    <table>
        <tr><td>id</td><td><input type="text" readonly='readonly' name="id" value="<?php echo $emp->getId();?>"></td></tr>
        <tr><td>姓名</td><td><input type="text" name="name" value="<?php echo $emp->getName();?>"></td></tr>
        <tr><td>电邮</td><td><input type="text" name="email" value="<?php echo $emp->getEmail();?>"></td></tr>
        <tr><td>号码</td><td><input type="text" name="mobile" value="<?php echo $emp->getMobile();?>"></td></tr>
        <tr><td>级别</td><td><input type="text" name="level" value="<?php echo $emp->getLevel();?>"></td></tr>
        <tr><td>薪水</td><td><input type="text" name="salary" value="<?php echo $emp->getSalary();?>"></td></tr>
    </table>
</html>