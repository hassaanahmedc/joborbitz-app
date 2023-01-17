<?php
require_once '../dbConn/dbconn.php';
try{
    $pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e){
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

$sql ="SELECT * FROM `jobs`";
$query = mysqli_query($conn,$sql);
// $row = mysqli_fetch_assoc
while ($row = mysqli_fetch_assoc($query)) {
    echo $row['organization'];
}
?>
