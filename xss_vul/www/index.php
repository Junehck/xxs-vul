<?php
include_once('conn.php');
?>


<HTML><HEAD>
<TITLE>在线留言</TITLE>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="在线留言">
<meta name="keywords" content="在线留言">
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
<form method=post name="book">
<table cellSpacing="1" borderColorDark="#ffffff" cellPadding="4" width="680" align="center" bgColor="#000000" borderColorLight="#000000" border="0">
  <tr bgColor="#ebebeb">
    <td   width="20%" align=right>您的姓名：</td>
    <td ><input type=text name="username" size="30" maxlength=16> 
      <font color="#FF0000">*</font></td>   
  </tr>
  <tr bgColor="#ebebeb">
    <td   width="20%" align=right>标题：</td>
    <td><input type=text value="" name="title" size="30"  maxlength=50></td>
  </tr>
  <tr bgColor="#ebebeb">
    <td   width="20%" align=right>留言内容:</td>
    <td><textarea name="comments" rows="7" cols="66" style="overflow:auto;"></textarea></td>
  </tr>
  <tr bgColor="#ebebeb">
    <td colSpan="2"><input type="submit" value="提交留言" name="Submit"> 
      <input type="reset" value="重新填写" name="Submit2"><input type=hidden name=send value=ok></td>
</tr>
</table>
</form>
</table>
</center>
</body>
</html>
<?php
if($_POST)
{
    $title=str_replace("'","''",$_POST['title']);
    $name=str_replace("'","''",$_POST['username']);
    $comments=str_replace("'","''",$_POST['comments']);
    $sql="INSERT INTO msg(name,title,comments)VALUES('{$name}','{$title}','{$comments}');";
    $ret = DBUtils::execute($sql);
    if($ret)
    {
        echo '<script>alert("留言成功")</script>';
    }else
    {
        echo '<script>alert("留言失败!")</script>';
    }
}
?>