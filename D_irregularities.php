          <?php require_once('Connections/myonn.php'); ?>
<?php
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

if ((isset($_POST['hid_del'])) && ($_POST['hid_del'] != "")) {
  $deleteSQL = sprintf("DELETE FROM irregularities WHERE ID=%s",
                       GetSQLValueString($_POST['hid_del'], "int"));

  mysql_select_db($database_myonn, $myonn);
  $Result1 = mysql_query($deleteSQL, $myonn) or die(mysql_error());

  $deleteGoTo = "D_irregularities.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

$maxRows_Recordset1 = 1000;
$pageNum_Recordset1 = 0;
if (isset($_GET['pageNum_Recordset1'])) {
  $pageNum_Recordset1 = $_GET['pageNum_Recordset1'];
}
$startRow_Recordset1 = $pageNum_Recordset1 * $maxRows_Recordset1;

mysql_select_db($database_myonn, $myonn);
$query_Recordset1 = "SELECT * FROM irregularities";
$query_limit_Recordset1 = sprintf("%s LIMIT %d, %d", $query_Recordset1, $startRow_Recordset1, $maxRows_Recordset1);
$Recordset1 = mysql_query($query_limit_Recordset1, $myonn) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);

if (isset($_GET['totalRows_Recordset1'])) {
  $totalRows_Recordset1 = $_GET['totalRows_Recordset1'];
} else {
  $all_Recordset1 = mysql_query($query_Recordset1);
  $totalRows_Recordset1 = mysql_num_rows($all_Recordset1);
}
$totalPages_Recordset1 = ceil($totalRows_Recordset1/$maxRows_Recordset1)-1;
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
  <div id="site_title"><a href="#"><img src="x.jpg" height="72"></a> </div>
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
	<h3>تعديل او حذف مخالفة</h3>
    <table width="708%" border="1" cellpadding="3" cellspacing="3">
      <tr> 
	    <td>رقم المخالفة</td>
        <td>اسم صاحب المخالفة</td>
        <td>نوع المخالفة</td>
        <td>المبلغ</td>
        <td>رقم الايصال</td>
    <td>مسح</td>
	<td>تعديل</td>
      </tr>
  <?php do { ?>
    <tr>
      <td><?php echo $row_Recordset1['ID']; ?></td>
      <td><?php echo $row_Recordset1['name']; ?></td>
      <td><?php echo $row_Recordset1['type']; ?></td>
      <td><?php echo $row_Recordset1['money']; ?></td>
      <td><?php echo $row_Recordset1['no']; ?></td>      
      <td><form id="form2" name="form2" method="post" action="">
        <input type="submit" name="del" id="del" value="مسح" />
        <input name="hid_del" type="hidden" id="hid_del" value="<?php echo $row_Recordset1['ID']; ?>" />
      </form></td>
      <td><form id="form1" name="form1" method="post" action="up_irregularities">
        <input type="submit" name="btn" id="btn" value="تعديل" />
        <input name="hidup" type="hidden" id="hidup" value="<?php echo $row_Recordset1['ID']; ?>" />
      </form></td>
    </tr>
    <?php } while ($row_Recordset1 = mysql_fetch_assoc($Recordset1)); ?>
</table>
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
    <div style="clear:both"></div>
  </div>
  <!-- end sidebar right -->
  <div style="clear:both; height: 40px"></div>
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
