<?php
$output1 = shell_exec('/usr/bin/mongodump --db new_version 2>&1');
$output1 = shell_exec('/usr/bin/zip -r /var/www/html/Housingmatters/app/webroot/dump.zip /var/www/html/Housingmatters/app/webrootdump 2>&1');
echo "Back up completed";
?>