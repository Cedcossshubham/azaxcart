<?php
session_start();

echo "<pre>";
print_r( $_SESSION['tasks']);
echo "</pre>";