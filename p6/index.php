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

    <title>Baby Names</title>

    <!-- Bootstrap Core CSS -->
    <link href= "vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
  <body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
      <header class="intro">
      <div class="intro-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                       <h1 class="brand-heading">Baby Names</h1>
                        
                                                
                        <form method="post" action="index.php">
                            <label>  Select gender:</label>
        <select name="gender">
            <option selected disabled>Choose here</option>
            <option value="F">Female</option>
            <option value="M">Male</option>
        </select>
		<label>Enter name:</label>
		<input type="text" name="input" list = "namehint" onkeyup="showHint(this.value)"/>
                            <datalist id="namehint">
                        </datalist>
		<input type="submit" value="Vote!" />
        <script src="ajax.js"></script>
	</form>
    <br/>

<?php

// Get the rows from the table
$selectStmt = 'SELECT  `name` ,  `value` 
FROM  (SELECT * from `BABYLIST` order by `value` desc)  as ordered 
WHERE GENDER =  \'F\'
LIMIT 5';
?>  

<div>
    
<?php
$result = $db->query($selectStmt);
    echo '        <div class="col-md-6">' . PHP_EOL;
    echo "<h2>Female Names</h2>";
    while($row = $result->fetch_assoc()) {
        echo '          <p>' . $row["name"] . ' - ' . $row["value"] . '</p>' . PHP_EOL;
    }
    echo '        </div>' . PHP_EOL;
?>    
    </div>
<?php
      $selectStmt = 'SELECT  `name` ,  `value` 
FROM  (SELECT * from `BABYLIST` order by `value` desc)  as ordered 
WHERE GENDER =  \'M\'
LIMIT 5';
?>  

<div>
    
<?php
$result = $db->query($selectStmt);
    echo '        <div class="col-md-6">' . PHP_EOL;
    echo "<h2>Male Names</h2>";
    while($row = $result->fetch_assoc()) {
        echo '          <p>' . $row["name"] . ' - ' . $row["value"] . '</p>' . PHP_EOL;
    }
    echo '        </div>' . PHP_EOL;
?>    
    </div>
<?php
if ((isset($_POST['input']) && isset($_POST['gender'])))
{
    $name = $_POST['input'];
    $name = ucwords ($name);
    $words = explode(" ",$name);
    $name = $words[0];
    if($name != '')
    {
    $gender = $_POST['gender'];
// Get the rows from the table
$selectStmt = 'SELECT  `value` 
FROM `BABYLIST` 
WHERE GENDER =  \''.$gender.'\' AND NAME = \''.$name.'\'';
?>

    <div>
<?php
$result = $db->query($selectStmt);
$row = $result->fetch_assoc();
if($row['value']>0)
{
    $resultint = $row['value'] + 1;
    $updatestmt = 'UPDATE `BABYLIST`
    SET value = '.$resultint.
    ' WHERE GENDER =  \''.$gender.'\' AND NAME = \''.$name.'\'';
}
else
{
    $updatestmt = 'INSERT INTO `BABYLIST` (`name`, `gender`,`value`)' . PHP_EOL
            . '  VALUES (\''.$name.'\', \''.$gender.'\',\'1\');';  
    
}
 $db->query($updatestmt); 
    header("Refresh:0");
}
}
?>
        
        
    </div>
                        </div>
                </div>
            </div>
        </div>
    </header>
    </body>
</html>