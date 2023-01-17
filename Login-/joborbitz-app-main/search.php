<?php
require_once '../dbConn/dbconn.php';
try{
    $pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e){
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

function match_search_value($pdo){
    if (isset($_GET['submit']) && isset($_GET['searchInput'])){
        
        $searchinput = $_GET['searchInput'];
        $validatedinput = filter_var($searchinput, FILTER_SANITIZE_STRING); 
        
        $query = $pdo->prepare("SELECT * FROM jobs WHERE MATCH(title) AGAINST(:search)");
        $query->execute(['search'=>$validatedinput]);
        
        $title = 'No title found';
        // $organization = 'No organization found';
        // $province = 'No province found';
        // $posted_date = 0;
        // $last_date = 0;

        while ($row = $query->fetch(PDO::FETCH_BOTH)){
            // $sno = $row['id'];
            $title = $row['title'];
            // $organization =  $row['organization'];
            // $province = $row['province'] ;
            // $posted_date = (int) $row['posted_date'];
            // $last_date = (int)  $row['last_date'];
        }
        return $title; 
    }
}

$result = match_search_value($pdo);
echo $result;
?>