<?php
session_start();
unset($_SISSION['name']);
session_destroy();
header("Location: index.php");

?>