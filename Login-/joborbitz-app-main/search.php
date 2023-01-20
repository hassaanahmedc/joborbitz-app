<link rel="stylesheet" href="styles/jobs.css">
    <!-- javascript -->
    <script src="/scripts/jobsPage.js" defer></script>
<?php
require_once '../dbConn/dbconn.php';
try{
    $pdo = new PDO($attr, $user, $pass, $opts);
}
catch (PDOException $e){
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}
function search_reults($pdo){
    if($_SERVER['REQUEST_METHOD'] === 'GET') {

        if (isset($_GET['submit']) && isset($_GET['searchInput'])){
            
            $searchinput = $_GET['searchInput'];
            $validatedinput = sanitize_search_input($searchinput); 
            
            $query = $pdo->prepare("SELECT * FROM jobs WHERE MATCH(title) AGAINST(:search)");
            $query->execute(['search'=>$validatedinput]);
            
            $title = 'No title found';
            $organization = 'No organization found'; 
            $province = 'No province found';
            $description = 'No description found';
            $qualification = 'No qualification found';


            while ($row = $query->fetch(PDO::FETCH_BOTH)){
                $sno = $row['id'];
                $title = $row['title'];
                $organization =  $row['organization'];
                $province = $row['province'] ;
                $description = $row['description'];
                $qualification = $row['requirements'];
                $posted_date = new DateTime($row['posted_date']);
                $last_date = new DateTime($row['last_date']);
                $formatted_posted_date = $posted_date->format('d-m-Y');
                $formatted_last_date = $last_date->format('d-m-Y');

                echo <<<_END
                <div class="jobItem">
                        <div class="jobItemLeft">
                            <h2>$title</h2>
                            <p>$organization</p>
                            <div class="dates">
                                <p><img src="images/posted-date.png" alt="icon"> <span>Posted on: $formatted_posted_date</span></p>
                                <p class="lastDate"><img src="images/date.png" alt="icon"> <span>Last Date:
                                       $formatted_last_date</span></p>
                            </div>
                            <div class="tags">
                                <span class="tag">$province</span>
                                <span class="tag">Private</span>
                                <span class="tag">$qualification</span>
                            </div>
                        </div>
                        <div class="jobItemRight">
                            <a href="#" class="btn">
                                <p>View Job</p>
                                <img src="images/rarr.png" alt="icon" height="20">
                            </a>
                            <a href="#" class="greenBtn">
                                <img src="images/download.png" alt="icon">
                                <p>Download Advertisement</p>
                            </a>
                        </div>
                    </div>
                _END;
            }
        }
    }
}
search_reults($pdo);
function sanitize_search_input($search){
    $result = trim($search);
    $result = strip_tags($result);
    return $result;
}

?>