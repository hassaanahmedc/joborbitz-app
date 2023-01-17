<!-- <?php
    // require_once '../dbConn/dbconn.php'; 
    // try {
    //     $pdo = new PDO($attr, $user, $pass, $opts);
    // } catch (PDOException $e) {
    //     throw new PDOException($e->getMessage(), (int)$e->getCode());
    // }


    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     if (isset($_POST['edit_sno'])) { 
      
    //            $no = isset($_POST['edit_sno']);
    //            echo $no;
    //         $org = isset($_POST['edit_organization']);
    //         $des = isset($_POST['edit_description']);
    //         $pro = isset($_POST['edit_province']);
    //         $qua = isset($_POST['edit_qualification']);
    //         $l_d = isset($_POST['edit_last_date']);
      
    //           $edit_query = $pdo->prepare("UPDATE jobs SET organization = ?, description = ?, last_date =?, province=?, requirements = ? WHERE id=?");
    //           $edit_query->bindParam(1, $org, PDO::PARAM_STR);
    //           $edit_query->bindParam(2, $des, PDO::PARAM_STR);
    //           $edit_query->bindParam(3, $l_d, PDO::PARAM_INT);
    //           $edit_query->bindParam(4, $pro, PDO::PARAM_STR);
    //           $edit_query->bindParam(5, $qua, PDO::PARAM_STR);
    //           $edit_query->bindParam(6, $no, PDO::PARAM_INT);
      
    //           $result = $edit_query->execute();
    //           if ($result) {
    //             echo "updated successfully";
    //           }else{
    //             echo "failed to update the result";
    //           }
      
    //     }
    //    }
      
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
?> -->