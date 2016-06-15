<?php


$output1 = shell_exec('/usr/bin/mongodump -h 52.74.61.249 new_version > /var/www/html/Housingmatters/app/webroot 2>&1');
echo "Back up comppleted";
?>