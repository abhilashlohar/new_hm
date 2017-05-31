<?php

//$data = file(“http://localhost/new_hm/Accounts/ledger_report_cron_job”);

$file = fopen("http://localhost/new_hm/Accounts/ledger_report_cron_job/","r");

/*
C:\xampp\php\php.exe
and in the “Add arguments (optional)” type

https://stackoverflow.com/questions/9894804/use-php-to-set-cron-jobs-in-windows

-f c:/xampp/htdocs/cron_new.php

schtasks /create /tn "XamppCron" /tr "C:\xampp\php\php.exe C:\xampp\htdocs\cron_new.php" /sc minute /mo 10

*/
?>
