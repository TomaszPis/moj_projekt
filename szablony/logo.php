<?php
require $_SERVER['DOCUMENT_ROOT'] . '/admin/function/db.ini.php';


$sql = "SELECT * FROM logo WHERE id = 1";
$logo = pg_query($sql);
$log = pg_fetch_array($logo);

$logo = 'logo/' . $log['nazwa_logo'];

echo $logo;