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
  $updateSQL = sprintf("UPDATE boogie SET  thecarownersname=%s, paintingsource=%s,  paintingclass=%s, boogiesource=%s, paintingcolor=%s, noboogie=%s, thechassisnumber=%s WHERE platenumber=%s",
                       GetSQLValueString($_POST['thecarownersname'], "text"),
                       GetSQLValueString($_POST['paintingsource'], "text"),
                       GetSQLValueString($_POST['paintingclass'], "text"),
					   GetSQLValueString($_POST['boogiesource'], "text"),
					   GetSQLValueString($_POST['paintingcolor'], "text"),
                       GetSQLValueString($_POST['noboogie'], "text"),
                       GetSQLValueString($_POST['thechassisnumber'], "text"),
					   GetSQLValueString($_POST['platenumber'], "text"));
  mysql_select_db($database_myonn, $myonn);
  $Result1 = mysql_query($updateSQL, $myonn) or die(mysql_error());
  $updateGoTo = "D_boogie.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];


  }
  header(sprintf("Location: %s", $updateGoTo));
}
mysql_select_db($database_myonn, $myonn);
$query_Recordset1 = "SELECT * FROM boogie WHERE platenumber='".$_POST['hidup']."' ";
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
  <div id="site_title"><a href="#"><img src="x.jpg" height="70"></a> </div>
  <!-- Main Menu -->
  <ol id="menu">
  <li><a href="#">ادخال ببيانات</a>
    
      <!-- sub menu -->
	        <ol>
        <li><a href="boogie.php">الاستعلام</a></li>
		<li><a href="plate.php">التراخيص</a></li>
        <li><a href="irregularities.php">المخالفات</a></li>
      </ol>
    </li>
        <!-- end sub menu -->
	     <li><a href='#'>تعديل او حذف البيانات</a>
      <!-- sub menu -->
      <ol>
        <li><a href="D_boogie.php">الاستعلام</a></li>
        <li><a href="D_plate.php">بيانات التراخيص</a></li>
        <li><a href="D_irregularities.php">المخالفات</a></li>
      </ol>
    </li>
                 <li><a href='#'>تسجيل الدخول كـ</a>
      <!-- sub menu -->
      <ol>
        <li><a href="login1.php">موظف</a></li>
        <li><a href="login.php">مدير النظام</a></li>
      </ol>
    </li>
	   <!-- end sub menu -->
  </ol>
</div>
<!-- END header -->
<div id="container">
  <div class="two-third">
<div id="slider3" class="nivoSlider" style="width: 630px; height: 280px"> <a href="#"><img title="شرطة المرور" src="1.jpg" alt="" width="630" height="280"></a> <img  src="2.jpg" alt="" width="630" height="280"> <img  src="3.jpg" alt="" width="630" height="280"> <img  src="4.jpg" alt="" width="630" height="280"> </div>
	 <div style="clear:both"></div>
    <div class="one-third">
  <h3>تعديل الحساب</h3>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">رقم الحساب:</td>
      <td><?php echo $row_Recordset1['platenumber']; ?></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">اسم صاحب المركبه:</td>
      <td><input type="text" name="thecarownersname" value="<?php echo htmlentities($row_Recordset1['thecarownersname'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">مصدر اللوحة:</td>
      <td><input type="text" name="paintingsource" value="<?php echo htmlentities($row_Recordset1['paintingsource'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
        <tr valign="baseline">
      <td nowrap="nowrap" align="right">فئة اللوحة:</td>
      <td><input type="text" name="paintingclass" value="<?php echo htmlentities($row_Recordset1['paintingclass'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">مصدر الرخصة:</td>
      <td><input type="text" name="boogiesource" value="<?php echo htmlentities($row_Recordset1['boogiesource'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
        <tr valign="baseline">
      <td nowrap="nowrap" align="right">لون اللوحة:</td>
      <td><input type="text" name="paintingcolor" value="<?php echo htmlentities($row_Recordset1['paintingcolor'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">رقم الرخصة:</td>
      <td><input type="text" name="noboogie" value="<?php echo htmlentities($row_Recordset1['noboogie'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
        <tr valign="baseline">
      <td nowrap="nowrap" align="right">رقم هيكل السيارة:</td>
      <td><input type="text" name="thechassisnumber" value="<?php echo htmlentities($row_Recordset1['thechassisnumber'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><input type="submit" value="تعديل الاستعلام" /></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="platenumber" value="<?php echo $row_Recordset1['platenumber']; ?>" />
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