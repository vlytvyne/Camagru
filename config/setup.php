<?php

include 'DB.php';

$mysql_path = '/Volumes/Storage/cache/vlytvyne/Library/Containers/MAMP/mysql/bin/mysql';
$sql_file_path = '/Volumes/Storage/cache/vlytvyne/Library/Containers/MAMP/apache2/htdocs/config/db_install.sql';

shell_exec("$mysql_path -h localhost -u root -p123456 camagru < $sql_file_path");
$result = shell_exec('pwd');
