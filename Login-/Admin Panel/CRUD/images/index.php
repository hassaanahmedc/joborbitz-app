<?php
require_once '../../dbconn.php';
try {
    $pdo = new PDO($attr, $user, $pass, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
if (isset($_FILES['image'])) {

    $file_name = $_FILES['image']['tmp_name'];

    $name = "images".time().'.jpg';
    move_uploaded_file($file_name,"images".$name);

    $query = $pdo->prepare("INSERT INTO jobs (image) VALUES(?)");
    $query->bindParam(1, $name, PDO::PARAM_STR);
    $query->execute([$name]);
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
  </head>
  <body>
    <form action="index.php" method="post" enctype="multipart/form-data">
      <input type="file" name="image" id="image" />
      <input type="submit" name="submit" id="submit" />
    </form>
  </body>
</html>
