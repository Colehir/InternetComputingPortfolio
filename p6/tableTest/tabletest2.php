<?php
require_once './php/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DB Table Test</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <div class="container">
      <div class="page-header">
        <h1>Database Table Test</h1>
      </div>

<?php
// Create table with two columns: id and value
$createStmt = 'CREATE TABLE `BABYLIST` (' . PHP_EOL
    . '  `id` int(11) NOT NULL AUTO_INCREMENT,' . PHP_EOL
            . '  `name` varchar(20) DEFAULT NULL,' . PHP_EOL
            . '  `gender` varchar(1) DEFAULT NULL,' . PHP_EOL
            . '  `value` int(5) DEFAULT NULL,' . PHP_EOL
            . '  PRIMARY KEY (`id`)' . PHP_EOL
            . ')ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;';
?>
      <div id="step-one" class="well">
        <h3>Step One <small>Creating the table</small></h3>
        <pre><?php echo $createStmt; ?></pre>
<?php
if($db->query($createStmt)) {
    echo '        <div class="alert alert-success">Table creation successful.</div>' . PHP_EOL;
} else {
    echo '        <div class="alert alert-danger">Table creation failed: (' . $db->errno . ') ' . $db->error . '</div>' . PHP_EOL;
    exit(); // Prevents the rest of the file from running
}
?>
      </div>

    </div>
  </body>
</html>

