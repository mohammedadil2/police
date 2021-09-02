<?php require_once('Connections/myonn.php');
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE employee SET  name=%s, addrees=%s,  phone=%s, user=%s, pass=%s WHERE ID=%s",
                       GetSQLValueString($_POST['name'], "text"),
					   GetSQLValueString($_POST['addrees'], "text"),
                       GetSQLValueString($_POST['phone'], "int"),
                       GetSQLValueString($_POST['user'], "text"),
                       GetSQLValueString($_POST['pass'], "text"),
					   GetSQLValueString($_POST['ID'], "int"));
  mysql_select_db($database_myonn, $myonn);
  $Result1 = mysql_query($updateSQL, $myonn) or die(mysql_error());
  $updateGoTo = "D_employee.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}
mysql_select_db($database_myonn, $myonn);
$query_Recordset1 = "SELECT * FROM employee WHERE ID='".$_POST['hidup']."' ";
$Recordset1 = mysql_query($query_Recordset1, $myonn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE HTML>
<head>
<title>شرطة المرور</title>
<meta charset="utf-8">
<!-- CSS Files -->
<link rel="stylesheet" type="text/css" media="screen" href="css/style.css">
<link rel="stylesheet" type="text/css" media="screen" href="menu/css/simple_menu.css">
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen">
<link rel="stylesheet" type="text/css" href="boxes/css/style6.css">
<!-- JS Files -->
<script src="js/jquery.min.js"></script>
<script src="js/custom.js"></script>
<script src="js/slides/slides.min.jquery.js"></script>
<script src="js/cycle-slider/cycle.js"></script>
<script src="js/nivo-slider/jquery.nivo.slider.js"></script>
<script src="js/tabify/jquery.tabify.js"></script>
<script src="js/prettyPhoto/jquery.prettyPhoto.js"></script>
<script src="js/twitter/jquery.tweet.js"></script>
<script src="js/scrolltop/scrolltopcontrol.js"></script>
<script src="js/portfolio/filterable.js"></script>
<script src="js/modernizr/modernizr-2.0.3.js"></script>
<script src="js/easing/jquery.easing.1.3.js"></script>
<script src="js/kwicks/jquery.kwicks-1.5.1.pack.js"></script>
<script src="js/swfobject/swfobject.js"></script>
<!-- FancyBox -->
<link rel="stylesheet" type="text/css" href="js/fancybox/jquery.fancybox.css" media="all">
<script src="js/fancybox/jquery.fancybox-1.2.1.js"></script>
</head>
<body>
<div class="header">
  <!-- Logo/Title -->
  <div id="site_title"><a href="#"><img src="x.jpg" height="74"></a> </div>
  <!-- Main Menu -->
  <ol id="menu">
  <li><a href="employee.php">اضافة موظف</a>
        <li><a href="D_employee.php">تعديل او حذف بيانات موظف</a></li>
        <li><a href='#'>تسجيل الدخول كـ</a>
      <!-- sub menu -->
      <ol>
        <li><a href="login1.php">موظف</a></li>
        <li><a href="login.php">مدير النظام</a></li>
      </ol>
    </li>
	   <!-- end sub menu -->
  </ol></div>
<!-- END header -->
<div id="container">
  <div class="two-third">
<div id="slider3" class="nivoSlider" style="width: 630px; height: 280px"> <a href="#"><img title="شرطة المرور" src="1.jpg" alt="" width="630" height="280"></a> <img  src="2.jpg" alt="" width="630" height="280"> <img  src="3.jpg" alt="" width="630" height="280"> <img  src="4.jpg" alt="" width="630" height="280"> </div>
	 <div style="clear:both"></div>
    <div class="one-third">
  <h3>تعديل بينات الموظف</h3>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">رقم الموظف:</td>
      <td><?php echo $row_Recordset1['ID']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">اسم الموظف:</td>
      <td><input type="text" name="name" value="<?php echo htmlentities($row_Recordset1['name'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">العنوان:</td>
      <td><input type="text" name="addrees" value="<?php echo htmlentities($row_Recordset1['addrees'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
        <tr valign="baseline">
      <td nowrap="nowrap" align="right">رقم الهاتف:</td>
      <td><input type="text" name="phone" value="<?php echo htmlentities($row_Recordset1['phone'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">اسم الدخول:</td>
      <td><input type="text" name="user" value="<?php echo htmlentities($row_Recordset1['user'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">كلمة المرور:</td>
      <td><input type="text" name="pass" value="<?php echo htmlentities($row_Recordset1['pass'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="تعديل البيانات" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="ID" value="<?php echo $row_Recordset1['ID']; ?>" />
</form>
<p>&nbsp;</p>
    </div>
	    <div class="one-third">

    </div>
    <div class="one-third last">
	<p style="text-align:right">
      
    </div>
  </div>
  <!-- close two third -->
    <div class="sidebar_right">
    </div>
  <div style="clear:both; height: 40px"></div>
</div>
<!-- end container -->
<div id="footer">
  <!-- First Column -->
  <div class="one-fourth">
    <h3>معلومات</h3>
يتبع هذه الموقع لشرطة المرور
  </div>
  <!-- Second Column -->
  <div class="one-fourth last">
    <a href="http://www.facebook.com"><img src="img/icon_fb.png" alt=""> </a> <a href="http://www.twitter.com"> <img src="img/icon_twitter.png" alt=""></a> <a href="http://www.in.com"><img src="img/icon_in.png" alt=""> </a></div>
  <div style="clear:both"></div>
</div>
<!-- END footer -->
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>