<?php
if($_SERVER["REMOTE_ADDR"]!=="127.0.0.1") exit('This page only allows local access此页面仅允许本地访问');
if($_POST)
{
    $dbpath=$_POST['dbpath'];
    $bakpath=$_POST['bakpath'];
    if(copy($dbpath,$bakpath))
    {
        echo '<script>alert("备份成功!")</script>';
    }else
    {
        echo '<script>alert("备份失败!")</script>';
    }
}

?>
<HTML>
<HEAD>
<TITLE>数据库备份</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</HEAD>
<center>
<form method=post name="back">
<table cellSpacing="1" borderColorDark="#ffffff" cellPadding="4" width="680" align="center" bgColor="#000000" borderColorLight="#000000" border="0">
  <tr bgColor="#ebebeb">
    <td width="20%" align=right>数据库路径：</td>
    <td ><input type=text name="dbpath" size="30"  value="../ly.db" ></td>   
  </tr>
    <tr bgColor="#ebebeb">
    <td width="20%" align=right>备份路径：</td>
    <td ><input type=text name="bakpath" size="30"  value="../ly_bak_<?php echo rand(1000000, 9999999);?>.db" ></td>   
  </tr>
  
  <tr bgColor="#ebebeb">
    <td colSpan="2"><input type="submit" value="备份" name="Submit"> 
</tr>
</table>
</form>
</table>
</center>
</body>
</html>