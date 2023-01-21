<?php
session_start();
// will destroy all running sessions for that folder
session_destroy();

// unset($_SESSION['xyz']);
echo "<script>window.location.href='../index.php';</script>";
exit;


?>