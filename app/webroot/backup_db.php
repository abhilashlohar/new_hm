<?php


$output1 = shell_exec('C:/xampp/mysql/bin/mysqldump -u root -h localhost cp > C:\xampp\htdocs\cp\app\webroot\backup\cp.sql 2>&1');
echo "Back up comppleted";
?>