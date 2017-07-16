<?php
require_once './php/db_connect.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Currency Conversion</title>

    <!-- Bootstrap Core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">

    <!-- Theme CSS -->
    <link href="css/grayscale.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
    <body>
        <div>

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
<?php
$myfile = fopen("yob2014.csv", "r") or die("Unable to open file!");
      
while(!feof($myfile))
{
$array = explode(",", fgets($myfile));
echo fgets($myfile);
        

// Add two rows to the table
$insertStmt = 'INSERT INTO `BABYNAMES` (`name`, `gender`,`value`)' . PHP_EOL
            . '  VALUES (\''.$array[0].'\', \''.$array[1].'\',\''.$array[2].'\');';
?>
<?php
if($db->query($insertStmt)) {
    //echo '        <div class="alert alert-success">Values inserted successfully.</div>' . PHP_EOL;
} else {
    //echo '        <div class="alert alert-danger">Value insertion failed: (' . $db->errno . ') ' . $db->error . '</div>' . PHP_EOL;
    exit();
}
}
fclose($myfile);
?>

<?php
// Get the rows from the table
$selectStmt = 'SELECT * FROM `BABYNAMES`;';
?>
      <div id="step-three" class="well">
        <h3>Step Three <small>Retrieving the rows</small></h3>
        <pre><?php echo $selectStmt; ?></pre>
<?php
$result = $db->query($selectStmt);
if($result->num_rows > 0) {
    echo '        <div class="alert alert-success">' . PHP_EOL;
    while($row = $result->fetch_assoc()) {
        echo '          <p>id: ' . $row["id"] . ' - value: ' . $row["value"] . '</p>' . PHP_EOL;
    }
    echo '        </div>' . PHP_EOL;
} else {
    echo '        <div class="alert alert-success">No Results</div>' . PHP_EOL;
}
?>
      </div>

<?php
// Drop the TEST table now that we're done with it
$dropStmt = 'DROP TABLE `BABYNAMES`;';
?>
      <div id="step-four" class="well">
        <h3>Step Four <small>Dropping the table</small></h3>
        <pre><?php echo $dropStmt; ?></pre>
<?php
if($db->query($dropStmt)) {
    echo '        <div class="alert alert-success">Table drop successful.</div>' . PHP_EOL;
} else {
    echo '        <div class="alert alert-danger">Table drop failed: (' . $db->errno . ') ' . $db->error . '</div>' . PHP_EOL;
    exit();
}
?>
      </div>

    </div>
  </body>
</html>

