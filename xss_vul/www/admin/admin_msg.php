<?php
if($_SERVER["REMOTE_ADDR"]!=="127.0.0.1") exit('This page only allows local access此页面仅允许本地访问');
setcookie('blog.mo60.cn','flag{ssss}',time()+30000,'/');
include_once('../conn.php');
$sql ='SELECT * from msg order by  id  desc limit 5 ';
$ret = DBUtils::queryList($sql);
?>

<HTML><HEAD>
<TITLE>在线留言</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="在线留言">
<meta name="keywords" content="在线留言">
<link rel="stylesheet" href="book.css" type="text/css">
</HEAD>
<center>
<table width="760" border=0 cellspacing=0 cellpadding=0 align=center bgcolor="#FFFFFF"  class="grayline">
    
<?php foreach($ret as $k){ ?>
<br>
<table cellSpacing="1" borderColorDark="#ffffff" cellPadding="4" width="680" align="center" bgColor="#000000" borderColorLight="#000000" border="0">
  <tr bgColor="#ebebeb">
    <td   width="20%" align=right>您的姓名：</td>
    <td ><?php echo ($k['name']); ?> </td>
  </tr>
  <tr bgColor="#ebebeb">
    <td   width="20%" align=right>标题：</td>
    <td><?php echo ($k['title']); ?></td>
  </tr>
  <tr bgColor="#ebebeb">
    <td   width="20%" align=right>留言内容</td>
    <td><?php echo ($k['comments']); ?></td>
  </tr>
</table>

<?php }
?>

  <br>
    <br>
</table>
</center>
</body>
</html>
