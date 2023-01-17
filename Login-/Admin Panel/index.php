<?php
session_start();
if(!isset($_SESSION['loggedin'])){
    header("Location: login.php");
}
  require_once '../dbConn/dbconn.php';

  try {
    $pdo = new PDO($attr, $user, $pass, $opts);
  } catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
  }

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=h1, initial-scale=1.0">
  <title>Document</title>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</head>

<?php 

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  
  if (isset($_POST['edit_sno'])) { 
      
      $no =  ($_POST['edit_sno']);
      $org = ($_POST['edit_organization']);
      $des = ($_POST['edit_description']);
      $pro = ($_POST['edit_province']);
      $qua = ($_POST['edit_qualification']);
      $l_d = ($_POST['edit_last_date']);
      $image = ($_POST['edit_image']);

      $edit_query = $pdo->prepare("UPDATE jobs SET organization = ?, description = ?, last_date =?, province=?, requirements = ?, image = ? WHERE id=?");
      $sorg = filter_var($org, FILTER_SANITIZE_STRING); 
      $sdes = filter_var($des, FILTER_SANITIZE_STRING); 
      $sl_d = filter_var($l_d, FILTER_SANITIZE_NUMBER_INT);
      $spro = filter_var($pro, FILTER_SANITIZE_STRING); 
      $squa = filter_var($qua, FILTER_SANITIZE_STRING); 
      $edit_query->bindParam(1, $sorg);
      $edit_query->bindParam(2, $sdes);
      $edit_query->bindParam(3, $sl_d);
      $edit_query->bindParam(4, $spro);
      $edit_query->bindParam(5, $squa);
      $edit_query->bindParam(6, $no);
 
      $edit_query->execute([$sorg, $sdes, $sl_d, $spro, $squa, $no]);
      }
    }

if (isset($_POST['delete']) && isset($_POST['sno']))
    {
    $id = $_POST['sno'];
    $query = $pdo->prepare("DELETE FROM jobs WHERE id=?");
    $query->bindParam(1, $id, PDO::PARAM_INT);
    $query->execute([$id]);
    }

?>

<body>  

  <h1>Welcome Welcome Welcome</h1>
  <button type="button" class="job_btn" value="Add_Job" onclick="location.href='add_job.php'">Post Job</button>
  <button type="submit" value="logout" onclick="location.href='logout.php'">logout</button>
  <table class="table">

    <thead>
      <tr>
        <th scope="col">Sno</th>
        <th scope="col">Jobs Title</th>
        <th scope="col">Organization</th>
        <th scope="col">District/Province</th>
        <th scope="col">Posted Date</th>
        <th scope="col">Last Date</th>
      </tr>
    </thead>

    <?php

    $query = "SELECT * FROM `jobs`";
    $result = $pdo->query($query);
    $num = 0;
    // $row = mysqli_fetch_assoc
    while ($row = $result->fetch(PDO::FETCH_BOTH))
    {
      $sno = $row['id'];
      $title =  $row['title'];
      $organization =  $row['organization'];
      $province = $row['province'] ;
      $posted_date = $row['posted_date'];
      $last_date = $row['last_date'];
      $description = $row['description'];
      $qualification = $row['requirements'];
      $image = $row['image'];

      ?>
      <tbody>
        <tr id="Hello">
          <th> <?= $num += 1; ?></th> 
          <td id="title" > <?=$title?> </td> 
          <td id="organization" > <?=$organization?> </td> 
          <td id="province"> <?=$province ?></td>
          <td id="Posted_date"> <?=$posted_date?> </td>
          <td id="last_date"> <?=$last_date ?></td>
          <td id="description" style="display:none;"> <?= $description ?> </td>
          <td id="qualification" style="display:none;"> <?= $qualification ?> </td>
          <td id="image"> <?= $image ?> </td>
          <td> <form action='index.php' method='post'>
          <input type='hidden' name='delete' value='yes'>
          <input type='hidden' name='sno' value=<?=$sno?>>
          <input type='submit' value='DELETE RECORD'></form> </td>
          <td> <button class="edit" id=<?=$sno?>> Update</button> </td>
        </tr>
      </tbody>
      <?php
    }
    ?>
  </table>

    <div id="edit_form" style="display:none;" class="job-container input-container">
     <h1>Update Job!</h1>
       <form  action="welcome.php" method="POST">
       <!-- <form class='editForm'> -->
          <pre>
              <input type="text" id="edit_sno" name="edit_sno">
              <label for="edit_organization">Edit Organization</label>
              <input type="text" id="edit_organization" name="edit_organization" required>

              <label for="edit_description">edit description</label>
              <textarea type="message" id="edit_description" name="edit_description" placeholder="Describe what this job is about!" required></textarea>

              <label for="edit_province">edit Province</label>
              <select name="edit_province" id="edit_province" size="1" required>
                <option value="Sindh">Sindh</option>
                <option value="Punjab">Punjab</option>
                <option value="Balochistan">Balochistan</option>
                <option value="Khyber PakhtunKhwa">Khyber PakhtunKhwa</option>
              </select>

              <label for="edit_qualification">edit Qualification</label>
              <input type="text" id="edit_qualification" name="edit_qualification" placeholder="Experience Level" required>


              <label for="edit_last_date">edit Last Date</label>
              <input type="date" id="edit_last_date" name="edit_last_date" required>

              <label for="edit_image">Select Image</label>
              <input type="file" id="edit_image" name="edit_image" accept="image/*">
              
              <input type="submit" id="submit" value="Update Job" class="login" name="submit">
              <!-- <button onClick="location.href='../welcome.php'">Show Results</button> -->
          </pre>
       </form>
    </div>
  <!-- <button src="logout.php"> Logout</button> -->
  
</body>
<script>
    const edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
      element.addEventListener("click", (e) => {
        document.getElementById("edit_form").style.display = "block";
        // console.log("edit ");
        
        const tr = e.target.parentNode.parentNode;
        const tds = tr.querySelectorAll('td')
        
        edit_organization.value = tds[0].innerText;
        edit_province.value =tds[1].innerText;
        edit_last_date.value = tds[3].innerText;
        edit_description.value = tds[4].innerText;
        edit_qualification.value = tds[5].innerText;
        edit_image.filename = tds[6].innerText;
        
        edit_sno.value = e.target.id;
        // console.log(tds[6].innerText)
        console.log(edit_image.filename)
        // console.log(edit_sno.value);
        // $('#editModal').modal('toggle');
      })
    })
    // const editForm = document.querySelector('.editForm')
    // editForm.addEventListener('submit', (e) => {
    //   e.preventDefault()
    //   const tr = document.querySelector('#Hello')
    //   const tds = tr.querySelectorAll('td')
    //   console.log(edit_organization.value)
    //   console.log(edit_province.value)
    //   console.log(edit_last_date.value)
    //   console.log(edit_description.value)
    //   console.log(edit_qualification.value)
    //   console.log(edit_sno.value)
    //   tds.forEach(td => console.log(td.innerText))
    // })
</script>
</html>