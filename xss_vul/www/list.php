<?php
include_once('conn.php');
$sql ='SELECT * from msg order by  id  desc limit 5 ';
$ret = DBUtils::queryList($sql);
?>
<HTML><HEAD>
<TITLE>在线留言</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="查看留言">
<meta name="keywords" content="查看留言">
<link rel="stylesheet" href="book.css" type="text/css">
</HEAD>
<center>
<body background=images/bg.gif topmargin="0" leftmargin="0">
<table width="760" border=0 cellspacing=0 cellpadding=0 bgcolor="#FFFFFF" align=center class="grayline">
<tr><td><img border="0" src="images/TOPS.gif" width=758></td></tr>
</table>

<table width="760" border=0 cellspacing=0 cellpadding=0 align=center bgcolor="#FFFFFF"  class="grayline">
<tr><td align=center height=50>
<a href=./><img border=0 src=images/write.gif> &nbsp;&nbsp;&nbsp;&nbsp;</a> <a href=./list.php><img border=0 src=images/read.gif title="我要看留言"></a>
</td></tr>
<tr><td>
    
<?php foreach($ret as $k){ ?>
<br>
<table cellSpacing="1" borderColorDark="#ffffff" cellPadding="4" width="680" align="center" bgColor="#000000" borderColorLight="#000000" border="0">
  <tr bgColor="#ebebeb">
    <td   width="20%" align=right>姓名：</td>
    <td ><?php echo htmlspecialchars($k['name']); ?> </td>
  </tr>
  <tr bgColor="#ebebeb">
    <td   width="20%" align=right>标题：</td>
    <td><?php echo htmlspecialchars($k['title']); ?></td>
  </tr>
  <tr bgColor="#ebebeb">
    <td   width="20%" align=right>留言内容</td>
    <td><?php echo htmlspecialchars($k['comments']); ?></td>
  </tr>
</table>

<?php  }?>

  <br>
    <br>
</table>
</center>
</body>
</html>
