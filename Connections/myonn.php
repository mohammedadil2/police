<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_myonn = "localhost";
$database_myonn = "police";
$username_myonn = "root";
$password_myonn = "";
$myonn = mysql_pconnect($hostname_myonn, $username_myonn, $password_myonn) or trigger_error(mysql_error(),E_USER_ERROR); 
?>