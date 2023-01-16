<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>    
<?php 
require_once 'dbconn.php';

try {
  $pdo = new PDO($attr, $user, $pass, $opts);
} catch (PDOException $e) {
  throw new PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($_POST['submit']) && isset($_POST['name'])) { 
    
    $org = ($_POST['name']);
    echo  $org;
    // $no = isset($_POST['edit_sno']);
    // $org = isset($_POST['edit_organization']);
    // $des = isset($_POST['edit_description']);
    // $pro = isset($_POST['edit_province']);
    // $qua = isset($_POST['edit_qualification']);
    // $l_d = isset($_POST['edit_last_date']);

    //  echo $no. $org. $des. $pro. $qua. $l_d;
    //   $edit_query = $pdo->prepare("UPDATE jobs SET organization = ?, description = ?, last_date =?, province=?, requirements = ? WHERE id=?");
    //   $edit_query->bindParam(1, $org);
    //   $edit_query->bindParam(2, $des);
    //   $edit_query->bindParam(3, $l_d);
    //   $edit_query->bindParam(4, $pro);
    //   $edit_query->bindParam(5, $qua);
    //   $edit_query->bindParam(6, $no);

    //   $query = $edit_query->execute([$org, $des, $l_d, $pro, $qua, $no]);
    //   if ($query) {
    //     echo "updated";
    //   }else{
    //     echo "failed to update";
    //   }
    }
      // echo  $result;
      // if ($result) {
      //   echo "updated successfully";
      // }else{
      //   echo "failed to update the result";
      // }
?>

<div class="container">
    <form action="updateTest.php" method="post">
        <input type="text" name="name" id="" placeholder="Enter org Name">
        <input type="submit" name="submit" value="submit">
    </form>
</div>
</body>
</html>