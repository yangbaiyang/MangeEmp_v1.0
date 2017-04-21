<html>
    <h1>雇员管理信息</h1>
    <script type="text/javascript">
        function checkemp() {
           return window.confirm('是否删除');

        }
    </script>
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/4/8
 * Time: 15:10
 */
   require_once 'EmpService.class.php';
   require_once 'FenyePage.class.php';
   $fenyePage=new FenyePage();
   $fenyePage->setPageNow(1);
   $fenyePage->setPageSize(6);
   $fenyePage->setGotoUrl('empList.php');
    /*$pageSize=6;
    $pageNow=1;
    $rowCount=0;
    $pageCount=0;*/
    if(!empty($_GET['pageNow'])){
        $fenyePage->setPageNow($_GET['pageNow']);
    }
    $empService=new EmpService();

   /* $pageCount=$empService->getPageCount($pageSize);

    $arr=$empService->getEmpListByPage($pageNow,$pageSize);*/
   $empService->getFenyePage($fenyePage);
    echo "<table border='1px' cellspacing='0px' style='border-color: aqua'>";
    echo "<tr><th>id</th><th>name</th><th>email</th><th>mobile</th><th>level</th><th>salary</th><th>修改用户</th><th>删除用户</th></tr>";
   /* while($row=$res->fetch_assoc()){
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td>
            <td>{$row['mobile']}</td><td>{$row['level']}</td><td>{$row['salary']}</td><td><a href='#'>修改用户</a></td><td><a href='#'>删除用户</a></td></tr>";
    }*/
   for ($i=0;$i<count($fenyePage->getResArray());$i++){
       $row=$fenyePage->getResArray()[$i];
       echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td>
            <td>{$row['mobile']}</td><td>{$row['level']}</td><td>{$row['salary']}</td><td><a href='updateEmp.php?id={$row['id']}'>修改用户</a></td>
            <td><a href='EmpControl.php?id={$row['id']}&flag=delemp'onclick='return checkemp()'>删除用户</a></td></tr>";

   }
    echo "</table>";
    echo $fenyePage->getNavigate();
?>

</html>