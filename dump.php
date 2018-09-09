<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Base | Xavier Araque</title>
</head>
<body>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user = 'usershakers';
$pass = 'ShakersOct17#';
$host = '127.0.0.1';



function develop($user, $pass, $host){
    $database = 'theshakers_dev';
    $dir = dirname(__FILE__) . '/develop.sql';

    echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";

    exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir} 2>&1", $output);

    var_dump($output);
}

function test($user, $pass, $host){
    $database = 'theshakers_test';
    $dir = dirname(__FILE__) . '/test.sql';

    echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";

    exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir} 2>&1", $output);

    var_dump($output);
}

function staging($user, $pass, $host){
    $database = 'theshakers';
    $dir = dirname(__FILE__) . '/staging.sql';

    echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";

    exec("mysqldump --user={$user} --password={$pass} --host={$host} {$database} --result-file={$dir} 2>&1", $output);

    var_dump($output);
}

function staginTotest($user, $pass, $host){
    $database = 'theshakers_test';
    $toDB = 'staging.sql';

    echo "<h3>Importanto base de datos de Stagin a Test</h3>";

    exec("mysql --user={$user} --password={$pass} --host={$host} {$database} < {$toDB}");

}

function staginToDev($user, $pass, $host){
    $database = 'theshakers_dev';
    $toDB = 'staging.sql';

    echo "<h3>Importanto base de datos de Stagin a Develop</h3>";

    exec("mysql --user={$user} --password={$pass} --host={$host} {$database} < {$toDB}");

}
if (isset($_GET['stgToTest'])) {
    staginTotest($user, $pass, $host);
}
if (isset($_GET['stgToDev'])) {
    staginTotest($user, $pass, $host);
}
if (isset($_GET['develop'])) {
    develop($user, $pass, $host);
}

if (isset($_GET['test'])) {
    test($user, $pass, $host);
}

if (isset($_GET['staging'])) {
    staging($user, $pass, $host);
}

?>

<a href='index.php?develop=true'>Backup Develop</a>
<a href='index.php?test=true'>Backup Text</a>
<a href='index.php?staging=true'>Backup Staging</a>

<hr>

<a href='index.php?stgToTest=true'>Copiar DB de Staging a Test</a>
<a href='index.php?stgToDev=true'>Copiar DB de Staging a Develop</a>


<script>

</script>
</body>
</html>