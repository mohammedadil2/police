<?php require_once('Connections/myonn.php'); ?>
<?php
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
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

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$mun="";
if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO  irregularities (ID, name, type,  money, no) VALUES (%s, %s, %s, %s, %s)",
                       GetSQLValueString($_POST['ID'], "int"),
                       GetSQLValueString($_POST['name'], "text"),
					   GetSQLValueString($_POST['type'], "text"),
                       GetSQLValueString($_POST['money'], "text"),
                       GetSQLValueString($_POST['no'], "text"));
  mysql_select_db($database_myonn, $myonn);
  $Result1 = mysql_query($insertSQL, $myonn) or die(mysql_error());
    $num=$_POST['ID']+1;
  echo '<script> alert("تم العملية بنجاح"); </script>' ;
}
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
	<h3>اضافة مخالفة جديد</h3>
    <form method="post" name="form1" action="<?php echo $editFormAction; ?>">
      <table align="center">
        <tr valign="baseline">
          <td nowrap align="right">رقم المخالفة:</td>
          <td><input type="text" name="ID" value="<? echo $num ; ?>" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">اسم صاحب المخالفة:</td>
          <td><input type="text" name="name" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">نوع المخالفة:</td>
          <td><input type="text" name="type" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">المبلغ:</td>
          <td><input type="text" name="money" value="" size="32"></td>
        </tr>
        <tr valign="baseline">
          <td nowrap align="right">رقم الايصال:</td>
          <td><input type="text" name="no" value="" size="32"></td>
        </tr>
          <tr valign="baseline">
          <td nowrap align="right">&nbsp;</td>
          <td><input type="submit" value="تسجيل البينات"></td>
        </tr>
      </table>
      <input type="hidden" name="MM_insert" value="form1">
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