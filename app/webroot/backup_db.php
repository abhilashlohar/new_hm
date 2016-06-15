<?php
$output1 = shell_exec('/usr/bin/mongodump --db new_version 2>&1');
$output1 = shell_exec('/usr/bin/zip -r dump.zip dump 2>&1');
header('Location: http://app.housingmatters.co.in/Hms/auto_backup_data');

?>