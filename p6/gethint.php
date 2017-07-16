<?php
require_once './php/db_connect.php';
?>
<?php
$q = $_REQUEST["q"];

$hint = "";

if ($q !== "") {
    $q = ucwords ($q);
    $len=strlen($q);
    $selectStmt = 'SELECT  `name` 
FROM  (SELECT * from `BABYNAMES` order by `value` desc)  as ordered
WHERE name LIKE "'.$q.'%"
LIMIT 5';
    $result = $db->query($selectStmt);
    while($row = $result->fetch_assoc()) {
        $hint .= "<option value=\"".$row["name"]."\">" ;
    }
    echo $hint === "" ? "no suggestion" : $hint;
}
?>