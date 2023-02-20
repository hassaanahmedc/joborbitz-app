<?php
//Connecting Database 
require_once '../dbConn/dbconn.php';

//funtion to display jobs on index page
//well we could have just used show_all_job function here instead but that will break our styling of job divs
function index_page_jobs($pdo)
{
    $query = "SELECT * FROM `jobs` ORDER BY posted_date DESC LIMIT 10 ";
    $result = $pdo->query($query);
    while ($row = $result->fetch(PDO::FETCH_BOTH)) {
        $sno = $row['id'];
        $title = $row['title'];
        $organization =  $row['organization'];
        $province = $row['province'];
        $last_date = $row['last_date'];

        echo <<<_END
                <div class="job">
                    <div class="job-details">
                        <h2> $organization - $title</h2>
                        <div class="l-d-v">
                            <p><img src="images/location.png" alt="icon"> <span>$province</span></p>
                            <p><img src="images/date.png" alt="icon"> <span>$last_date</span></p>
                            <p><img src="images/user.png" alt="icon"> <span>03</span></p>
                        </div>
                    </div>
                    <a href="#" class="btn jobBtn">View More!</a>
                </div>
                _END;
    }
}

//funtion to retreive job rows from database with query parameter
function displayRecords($result)
{
    while ($row = $result->fetch(PDO::FETCH_BOTH)) {
        $sno = $row['id'];
        $title = $row['title'];
        $organization =  $row['organization'];
        $province = $row['province'];
        $description = $row['description'];
        $qualification = $row['requirements'];

        //Formatting dates from Y-M-D to D-M-Y
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
//Function to show search results
function search_reults($pdo)
{
    if (isset($_GET['submit']) && isset($_GET['searchInput'])) {

        $searchinput = $_GET['searchInput'];
        $validatedinput = sanitize_search_input($searchinput);

        $query = $pdo->prepare("SELECT * FROM jobs WHERE MATCH(title) AGAINST(:search) ORDER BY posted_date DESC");
        $query->execute(['search' => $validatedinput]);
        displayRecords($query);
    }
}
//Creating function to retreive all jobs!
function show_all_jobs($pdo)
{
    $query = "SELECT * FROM `jobs` ORDER BY posted_date DESC LIMIT 10 ";
    $result = $pdo->query($query);
    displayRecords($result);
}

//function to sanitize search input 
function sanitize_search_input($search)
{
    $result = trim($search);
    $result = strip_tags($result);
    return $result;
}
