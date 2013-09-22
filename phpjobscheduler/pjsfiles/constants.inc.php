<?php
// ---------------------------------------------------------
 $app_name = "phpJobScheduler";
 $phpJobScheduler_version = "3.61";
// ---------------------------------------------------------
  define('TIME_WINDOW', 3600);//denomination is in seconds, so 3600 = 60 minute time frame window

  define('ERROR_LOG', TRUE);// prints runs and errors to error log table

  define('LOCATION', dirname(__FILE__) ."/");// used to open local files

  define('PJS_TABLE','fxphpjobscheduler');// pjs table name
  define('LOGS_TABLE','fxphpjobscheduler_logs');// logs table name

  define('MAX_ERROR_LOG_LENGTH',1200);// maximum string length of output to record in error log table

  define('SHOW_MYSQL_ERRORS', false); //if errors occur with mysql do not display message
?>
