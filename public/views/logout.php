<?php
session_start();
unset($_SESSION);
unset($_COOKIE);
session_destroy();
session_write_close();
header('Location: /login');
?>