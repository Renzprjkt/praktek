<?php
ob_start();
session_start();
unset($HTTP_SESSION_VARS);
session_destroy();
echo "<script>document.location='index.php';</script>";
ob_end_flush();

?>