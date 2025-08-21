<?php
// ===== DB CONFIG =====
// 1) Create MySQL DB and user, then fill these values
// 2) Import sql/schema.sql to create tables + sample data

define('DB_HOST', 'localhost');
define('DB_NAME', 'portfolio_db2');
define('DB_USER', 'root');
define('DB_PASS', '');

// Site
define('SITE_NAME', 'Manish Yadav');
define('BASE_URL', rtrim((isset($_SERVER['HTTPS'])?'https':'http').'://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']), '/\\'));
?>
