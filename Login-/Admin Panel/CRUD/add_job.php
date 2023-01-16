<?php
require_once '../dbconn.php';
try {
    $pdo = new PDO($attr, $user, $pass, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
if (isset($_FILES['image'])&&
    isset($_POST['organization']) &&
    isset($_POST['description']) &&
    isset($_POST['province']) &&
    isset($_POST['qualification']) &&
    isset($_POST['last_date']) &&
    isset($_POST['submit']))
{
    // $organization = mysql_entities_quote($pdo, $_POST['organization']);
    // $description = mysql_entities_quote($pdo,$_POST['description']);
    // $province = mysql_entities_quote($pdo,$_POST['province']);
    // $qualification = mysql_entities_quote($pdo,$_POST['qualification']);
    $organization = $_POST['organization'];
    $description = $_POST['description'];
    $province = $_POST['province'];
    $qualification = $_POST['qualification'];
    $last_date = $_POST['last_date'];
    // date_default_timezone_set('Pakistan/Islamabad');
    $posted_date = date('Y/m/d');
    $image_name = $_FILES['image']['tmp_name'];
    $name = "images".time().'.jpg';
    move_uploaded_file($image_name,$name);



    $query = $pdo->prepare("INSERT INTO jobs (organization, image, description, province, requirements, last_date, posted_date) VALUES(?,?,?,?,?,?,?)");
    $org = filter_var($organization, FILTER_SANITIZE_STRING); 
    $desc = filter_var($description, FILTER_SANITIZE_STRING); 
    $pro = filter_var($province, FILTER_SANITIZE_STRING);
    $qua = filter_var($qualification, FILTER_SANITIZE_STRING); 
    $l_d = filter_var($last_date, FILTER_SANITIZE_NUMBER_INT); 
    $p_d = filter_var($posted_date, FILTER_SANITIZE_NUMBER_INT); 
    // $i_n = filter_var($name, FILTER_SANITIZE_STRING); 
    $query->bindParam(1, $org, PDO::PARAM_STR);
    $query->bindParam(2, $name, PDO::PARAM_STR);
    $query->bindParam(3, $desc, PDO::PARAM_STR);
    $query->bindParam(4, $pro, PDO::PARAM_STR);
    $query->bindParam(5, $qua, PDO::PARAM_STR);
    $query->bindParam(6, $l_d, PDO::PARAM_INT);
    $query->bindParam(7, $p_d, PDO::PARAM_STR);

    $query->execute([$org, $name, $desc, $pro, $qua, $l_d, $p_d]);
}
?>
        <html>
            <head>
                <title>Job Post</title>
            </head>
            <body>
                <h1>Create a new Job!</h1>
                <div class="job-container input-container">
                    <form action="add_job.php" method="post" enctype="multipart/form-data">
                        <pre>
                            <label for="organization">Organization</label>
                            <input type="text" id="organization" name="organization" required>

                            <label for="description">description</label>
                            <textarea type="message" id="description" name="description" placeholder="Describe what this job is about!" required></textarea>

                            <label for="province">Province</label>
                            <select name="province" id="province" size="1" required>
                                <option value="Sindh">Sindh</option>
                                <option value="Punjab">Punjab</option>
                                <option value="Balochistan">Balochistan</option>
                                <option value="Khyber PakhtunKhwa">Khyber PakhtunKhwa</option>
                            </select>

                            <label for="qualification">Qualification</label>
                            <input type="text" id="qualification" name="qualification" placeholder="Experience Level" required>


                            <label for="last_date">Last Date</label>
                            <input type="date" id="last_date" name="last_date" required>

                            <label for="file">Select Image</label>
                            <input type="file" id="image" name="image" accept="image/*">
                            
                            <input type="submit" id="submit" value="Add Job" class="login" name="submit">
                            <button onClick="location.href='../welcome.php'">Show Results</button>
                        </pre>
                    </form>
                </div>
            </body>
        </html>
       <?php 

// function mysql_entities_quote($pdo, $string){
//     if ($string && $pdo) {
//         return htmlentities(get_post($pdo, $string));
//     }

// }

// function get_post($pdo, $string)
// {
//     if ($string && $pdo) {
//     return $pdo->quote($string);
//     }
// }
?>