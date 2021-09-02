<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta =utf-8" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
</head>

<body>
<p>&lt;?php require_once('Connections/myonn.php'); ?&gt;<br />
  &lt;?php<br />
  function GetSQLValueString($theValue, $theType, $theDefinedValue = &quot;&quot;, $theNotDefinedValue = &quot;&quot;) <br />
  {<br />
  $theValue = (!get_magic_quotes_gpc()) ? addslashes($theValue) : $theValue;</p>
<p> switch ($theType) {<br />
  case &quot;text&quot;:<br />
  $theValue = ($theValue != &quot;&quot;) ? &quot;'&quot; . $theValue . &quot;'&quot; : &quot;NULL&quot;;<br />
  break; <br />
  case &quot;long&quot;:<br />
  case &quot;int&quot;:<br />
  $theValue = ($theValue != &quot;&quot;) ? intval($theValue) : &quot;NULL&quot;;<br />
  break;<br />
  case &quot;double&quot;:<br />
  $theValue = ($theValue != &quot;&quot;) ? &quot;'&quot; . doubleval($theValue) . &quot;'&quot; : &quot;NULL&quot;;<br />
  break;<br />
  case &quot;date&quot;:<br />
  $theValue = ($theValue != &quot;&quot;) ? &quot;'&quot; . $theValue . &quot;'&quot; : &quot;NULL&quot;;<br />
  break;<br />
  case &quot;defined&quot;:<br />
  $theValue = ($theValue != &quot;&quot;) ? $theDefinedValue : $theNotDefinedValue;<br />
  break;<br />
  }<br />
  return $theValue;<br />
  }</p>
<p>$editFormAction = $_SERVER['PHP_SELF'];<br />
  if (isset($_SERVER['QUERY_STRING'])) {<br />
  $editFormAction .= &quot;?&quot; . htmlentities($_SERVER['QUERY_STRING']);<br />
  }</p>
<p>if ((isset($_POST[&quot;MM_insert&quot;])) &amp;&amp; ($_POST[&quot;MM_insert&quot;] == &quot;form1&quot;)) {<br />
  $insertSQL = sprintf(&quot;INSERT INTO degree (ID_NO, name, arbic_language, mathematics, quran, english_language, chemistry, physics, biology, engineering, history, commercial, geographies, arts, french_language, sports) VALUES (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)&quot;,<br />
  GetSQLValueString($_POST['ID_NO'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['name'], &quot;text&quot;),<br />
  GetSQLValueString($_POST['arbic_language'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['mathematics'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['quran'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['english_language'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['chemistry'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['physics'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['biology'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['engineering'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['history'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['commercial'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['geographies'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['arts'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['french_language'], &quot;int&quot;),<br />
  GetSQLValueString($_POST['sports'], &quot;int&quot;));</p>
<p> mysql_select_db($database_myonn, $myonn);<br />
  $Result1 = mysql_query($insertSQL, $myonn) or die(mysql_error());<br />
  echo '&lt;script&gt; alert(&quot;تم رفع النتيجة الطالب&quot;); &lt;/script&gt;' ;<br />
  }<br />
  ?&gt;<br />
  &lt;!DOCTYPE HTML&gt;<br />
  &lt;head&gt;<br />
  &lt;title&gt;اريس الثانوية&lt;/title&gt;<br />
  &lt;meta charset=&quot;utf-8&quot;&gt;<br />
  &lt;!-- CSS Files --&gt;<br />
  &lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen&quot; href=&quot;css/style.css&quot;&gt;<br />
  &lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; media=&quot;screen&quot; href=&quot;menu/css/simple_menu.css&quot;&gt;<br />
  &lt;link rel=&quot;stylesheet&quot; href=&quot;css/nivo-slider.css&quot; type=&quot;text/css&quot; media=&quot;screen&quot;&gt;<br />
  &lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;boxes/css/style6.css&quot;&gt;<br />
  &lt;!-- JS Files --&gt;<br />
  &lt;script src=&quot;js/jquery.min.js&quot;&gt;&lt;/script&gt;<br />
  &lt;script src=&quot;js/custom.js&quot;&gt;&lt;/script&gt;<br />
  &lt;script src=&quot;js/slides/slides.min.jquery.js&quot;&gt;&lt;/script&gt;<br />
  &lt;script src=&quot;js/cycle-slider/cycle.js&quot;&gt;&lt;/script&gt;<br />
  &lt;script src=&quot;js/nivo-slider/jquery.nivo.slider.js&quot;&gt;&lt;/script&gt;<br />
  &lt;script src=&quot;js/tabify/jquery.tabify.js&quot;&gt;&lt;/script&gt;<br />
  &lt;script src=&quot;js/prettyPhoto/jquery.prettyPhoto.js&quot;&gt;&lt;/script&gt;<br />
  &lt;script src=&quot;js/twitter/jquery.tweet.js&quot;&gt;&lt;/script&gt;<br />
  &lt;script src=&quot;js/scrolltop/scrolltopcontrol.js&quot;&gt;&lt;/script&gt;<br />
  &lt;script src=&quot;js/portfolio/filterable.js&quot;&gt;&lt;/script&gt;<br />
  &lt;script src=&quot;js/modernizr/modernizr-2.0.3.js&quot;&gt;&lt;/script&gt;<br />
  &lt;script src=&quot;js/easing/jquery.easing.1.3.js&quot;&gt;&lt;/script&gt;<br />
  &lt;script src=&quot;js/kwicks/jquery.kwicks-1.5.1.pack.js&quot;&gt;&lt;/script&gt;<br />
  &lt;script src=&quot;js/swfobject/swfobject.js&quot;&gt;&lt;/script&gt;<br />
  &lt;!-- FancyBox --&gt;<br />
  &lt;link rel=&quot;stylesheet&quot; type=&quot;text/css&quot; href=&quot;js/fancybox/jquery.fancybox.css&quot; media=&quot;all&quot;&gt;<br />
  &lt;script src=&quot;js/fancybox/jquery.fancybox-1.2.1.js&quot;&gt;&lt;/script&gt;<br />
  &lt;/head&gt;<br />
  &lt;body&gt;<br />
  &lt;div class=&quot;header&quot;&gt;<br />
  &lt;!-- Logo/Title --&gt;<br />
  &lt;div id=&quot;site_title&quot;&gt;&lt;a href=&quot;#&quot;&gt;&lt;img src=&quot;x.jpg&quot;&gt;&lt;/a&gt; &lt;/div&gt;<br />
  &lt;!-- Main Menu --&gt;<br />
  &lt;ol id=&quot;menu&quot;&gt;<br />
  &lt;li&gt;&lt;a href=&quot;#&quot;&gt;ادخال ببيانات&lt;/a&gt;<br />
  <br />
  &lt;!-- sub menu --&gt;<br />
  &lt;ol&gt;<br />
  &lt;li&gt;&lt;a href=&quot;bank.php&quot;&gt;انشاء حساب جديد&lt;/a&gt;&lt;/li&gt;<br />
  &lt;li&gt;&lt;a href=&quot;behavior.php&quot;&gt;اضافة سلوك جديد&lt;/a&gt;&lt;/li&gt;<br />
  &lt;li&gt;&lt;a href=&quot;degree.php&quot;&gt;اضاقة درجات جديدة&lt;/a&gt;&lt;/li&gt;<br />
  &lt;/ol&gt;<br />
  &lt;/li&gt;<br />
  &lt;!-- end sub menu --&gt;<br />
  &lt;li&gt;&lt;a href='#'&gt;تعديل او حذف البيانات&lt;/a&gt;<br />
  &lt;!-- sub menu --&gt;<br />
  &lt;ol&gt;<br />
  &lt;li&gt;&lt;a href=&quot;D_behavior.php&quot;&gt;سلوك طالب&lt;/a&gt;&lt;/li&gt;<br />
  &lt;li&gt;&lt;a href=&quot;D_degree.php&quot;&gt;درجات طالب&lt;/a&gt;&lt;/li&gt;<br />
  &lt;/ol&gt;<br />
  &lt;/li&gt;<br />
  &lt;!-- end sub menu --&gt;<br />
  &lt;li&gt;&lt;a href='#'&gt;عرض بيانات&lt;/a&gt;<br />
  &lt;ol&gt;<br />
  &lt;li&gt;&lt;a href=&quot;D_vistors.php&quot;&gt;رسائل الزوار&lt;/a&gt;&lt;/li&gt;<br />
  &lt;li&gt;&lt;a href=&quot;D_father.php&quot;&gt;اولياء الامر&lt;/a&gt;&lt;/li&gt;<br />
  &lt;li&gt;&lt;a href=&quot;student.php&quot;&gt;كل الطلاب&lt;/a&gt;&lt;/li&gt;<br />
  &lt;li&gt;&lt;a href=&quot;D_school.php&quot;&gt;بيانات خاصة بالمدرسة&lt;/a&gt;&lt;/li&gt;<br />
  &lt;/ol&gt;<br />
  &lt;/li&gt;<br />
  &lt;/ol&gt;<br />
  &lt;/div&gt;<br />
  &lt;!-- END header --&gt;<br />
  &lt;div id=&quot;container&quot;&gt;<br />
  &lt;div class=&quot;two-third&quot;&gt;<br />
  &lt;div id=&quot;slider3&quot; class=&quot;nivoSlider&quot; style=&quot;width: 630px; height: 280px&quot;&gt; &lt;a href=&quot;#&quot;&gt;&lt;img title=&quot;Students of Adres&quot; src=&quot;20150224_114715.jpg&quot; alt=&quot;&quot; width=&quot;630&quot; height=&quot;280&quot;&gt;&lt;/a&gt; &lt;img  src=&quot;20150224_114715.jpg&quot; alt=&quot;&quot; width=&quot;630&quot; height=&quot;280&quot;&gt; &lt;img  src=&quot;20150224_114818.jpg&quot; alt=&quot;&quot; width=&quot;630&quot; height=&quot;280&quot;&gt; &lt;img  src=&quot;189771.png.jpg&quot; alt=&quot;&quot; width=&quot;630&quot; height=&quot;280&quot;&gt; &lt;/div&gt;<br />
  &lt;div style=&quot;clear:both&quot;&gt;&lt;/div&gt;<br />
  &lt;div class=&quot;one-third&quot;&gt;<br />
  &lt;h3&gt;اضافة درجات طالب&lt;/h3&gt;<br />
  &lt;form method=&quot;post&quot; name=&quot;form1&quot; action=&quot;&lt;?php echo $editFormAction; ?&gt;&quot;&gt;<br />
  &lt;table align=&quot;center&quot;&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;رقم الطالب:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;ID_NO&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;الاسم:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;name&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;اللغة العربية:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;arbic_language&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;رياضيات:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;mathematics&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;قران:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;quran&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;لغة انجليزي:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;english_language&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;كمياء:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;chemistry&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;فيزياء:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;physics&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;احياء:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;biology&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;هندسية:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;engineering&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;تاريخ:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;history&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;عسكرية:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;commercial&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;جغرافية:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;geographies&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;فنون:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;arts&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;لفة فرنسية:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;french_language&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;الرياضة:&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;text&quot; name=&quot;sports&quot; value=&quot;&quot; size=&quot;32&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;tr valign=&quot;baseline&quot;&gt;<br />
  &lt;td nowrap align=&quot;right&quot;&gt;&amp;nbsp;&lt;/td&gt;<br />
  &lt;td&gt;&lt;input type=&quot;submit&quot; value=&quot;تسجيل البيانات&quot;&gt;&lt;/td&gt;<br />
  &lt;/tr&gt;<br />
  &lt;/table&gt;<br />
  &lt;input type=&quot;hidden&quot; name=&quot;MM_insert&quot; value=&quot;form1&quot;&gt;<br />
  &lt;/form&gt;<br />
  &lt;p&gt;&amp;nbsp;&lt;/p&gt;<br />
  &lt;/div&gt;<br />
  &lt;div class=&quot;one-third&quot;&gt;</p>
<p> &lt;/div&gt;<br />
  &lt;div class=&quot;one-third last&quot;&gt;<br />
  &lt;p style=&quot;text-align:right&quot;&gt;<br />
  <br />
  &lt;/div&gt;<br />
  &lt;/div&gt;<br />
  &lt;!-- close two third --&gt;<br />
  &lt;div class=&quot;sidebar_right&quot;&gt;<br />
  &lt;ul id=&quot;tabify_menu&quot; class=&quot;menu_tab&quot; style=&quot;margin: 0;&quot;&gt;<br />
  &lt;li class=&quot;active&quot;&gt;&lt;a href=&quot;#fane1&quot;&gt;الثلاثة الاوائل&lt;/a&gt;&lt;/li&gt;<br />
  &lt;/ul&gt;<br />
  &lt;div id=&quot;fane1&quot; class=&quot;tab_content&quot;&gt;<br />
  &lt;div class=&quot;tab_article&quot;&gt; &lt;img src=&quot;vv.jpg&quot; alt=&quot;&quot;&gt;<br />
  &lt;p&gt;احمد محمد علي 93.05%.&lt;/p&gt;<br />
  &lt;/div&gt;<br />
  &lt;div class=&quot;tab_article&quot;&gt; &lt;img src=&quot;vv1.jpg&quot; alt=&quot;&quot;&gt;<br />
  &lt;p&gt;عصام محمد خالد 92.085.&lt;/p&gt;<br />
  &lt;/div&gt;<br />
  &lt;div class=&quot;tab_article&quot;&gt; &lt;img src=&quot;vv2&quot; alt=&quot;&quot;&gt;<br />
  &lt;p&gt;وليد احمد عثمان 92.01.&lt;/p&gt;<br />
  &lt;/div&gt;<br />
  &lt;/div&gt;<br />
  &lt;div style=&quot;clear:both&quot;&gt;&lt;/div&gt;<br />
  <br />
  &lt;/div&gt;<br />
  &lt;!-- end sidebar right --&gt;<br />
  &lt;div style=&quot;clear:both; height: 40px&quot;&gt;&lt;/div&gt;<br />
  &lt;h2&gt;مجموعة من الصور&lt;/h2&gt;<br />
  &lt;ul class=&quot;ca-menu&quot; style=&quot;margin:0&quot;&gt;<br />
  &lt;li&gt; &lt;a href=&quot;school.php&quot;&gt; &lt;span class=&quot;ca-icon&quot;&gt;F&lt;/span&gt;<br />
  &lt;div class=&quot;ca-content&quot;&gt;<br />
  &lt;h2 class=&quot;ca-main&quot;&gt;صور الطلاب &lt;br&gt;<br />
  المعسكر الصيفي&lt;/h2&gt;<br />
  &lt;/div&gt;<br />
  &lt;/a&gt; &lt;/li&gt;<br />
  &lt;li&gt; &lt;a href=&quot;ei-slider.html&quot;&gt; &lt;span class=&quot;ca-icon&quot;&gt;H&lt;/span&gt;<br />
  &lt;div class=&quot;ca-content&quot;&gt;<br />
  &lt;h2 class=&quot;ca-main&quot;&gt;الدفعة من 2010 &lt;br&gt;<br />
  الي 2014&lt;/h2&gt;<br />
  &lt;/div&gt;<br />
  &lt;/a&gt; &lt;/li&gt;<br />
  &lt;li&gt; &lt;a href=&quot;image-frontpage.html&quot;&gt; &lt;span class=&quot;ca-icon&quot;&gt;N&lt;/span&gt;<br />
  &lt;div class=&quot;ca-content&quot;&gt;<br />
  &lt;h2 class=&quot;ca-main&quot;&gt;افضل طلاب &lt;br&gt;<br />
  :)&lt;/h2&gt;<br />
  &lt;/div&gt;<br />
  &lt;/a&gt; &lt;/li&gt;<br />
  &lt;li&gt; &lt;a href=&quot;images2.html&quot;&gt; &lt;span class=&quot;ca-icon&quot;&gt;K&lt;/span&gt;<br />
  &lt;div class=&quot;ca-content&quot;&gt;<br />
  &lt;h2 class=&quot;ca-main&quot;&gt;مراجعة &lt;br&gt;<br />
  ما قبل الامتحان  &lt;/h2&gt;<br />
  &lt;/div&gt;<br />
  &lt;/a&gt; &lt;/li&gt;<br />
  &lt;/ul&gt;<br />
  &lt;div style=&quot;clear:both; height: 40px&quot;&gt;&lt;/div&gt;<br />
  &lt;/div&gt;<br />
  &lt;!-- end container --&gt;<br />
  &lt;div id=&quot;footer&quot;&gt;<br />
  &lt;!-- First Column --&gt;<br />
  &lt;div class=&quot;one-fourth&quot;&gt;<br />
  &lt;h3&gt;معلومات&lt;/h3&gt;<br />
  في عام 1999 تم انشاء مدرسة ادريس عن طريق مجموعة من الشباب<br />
  &lt;/div&gt;<br />
  &lt;!-- Second Column --&gt;<br />
  &lt;div class=&quot;one-fourth last&quot;&gt;<br />
  &lt;a href=&quot;http://www.facebook.com&quot;&gt;&lt;img src=&quot;img/icon_fb.png&quot; alt=&quot;&quot;&gt; &lt;/a&gt; &lt;a href=&quot;http://www.twitter.com&quot;&gt; &lt;img src=&quot;img/icon_twitter.png&quot; alt=&quot;&quot;&gt;&lt;/a&gt; &lt;a href=&quot;http://www.in.com&quot;&gt;&lt;img src=&quot;img/icon_in.png&quot; alt=&quot;&quot;&gt; &lt;/a&gt;&lt;/div&gt;<br />
  &lt;div style=&quot;clear:both&quot;&gt;&lt;/div&gt;<br />
  &lt;/div&gt;<br />
  &lt;!-- END footer --&gt;<br />
  &lt;/body&gt;<br />
  &lt;/html&gt;&lt;?php<br />
  mysql_free_result($Recordset1);<br />
  ?&gt;</p>
</body>
</html>
