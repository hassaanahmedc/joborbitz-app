<?php
//Connecting Database 
require_once '../dbConn/dbconn.php';
try {
    $pdo = new PDO($attr, $user, $pass, $opts);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

//Function t0 show search results
function search_reults($pdo)
{
    if (isset($_GET['submit']) && isset($_GET['searchInput'])) {

        $searchinput = $_GET['searchInput'];
        $validatedinput = sanitize_search_input($searchinput);

        $query = $pdo->prepare("SELECT * FROM jobs WHERE MATCH(title) AGAINST(:search)");
        $query->execute(['search' => $validatedinput]);

        $title = 'No title found';
        $organization = 'No organization found';
        $province = 'No province found';
        $description = 'No description found';
        $qualification = 'No qualification found';


        while ($row = $query->fetch(PDO::FETCH_BOTH)) {
            $sno = $row['id'];
            $title = $row['title'];
            $organization =  $row['organization'];
            $province = $row['province'];
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

//Creating function to retreive all jobs!
function show_all_jobs($pdo)
{
    $query = "SELECT * FROM `jobs` ORDER BY posted_date DESC";
    $result = $pdo->query($query);
    while ($row = $result->fetch(PDO::FETCH_BOTH)) {
        $sno = $row['id'];
        $title = $row['title'];
        $organization =  $row['organization'];
        $province = $row['province'];
        $description = $row['description'];
        $qualification = $row['requirements'];
        $posted_date = new DateTime($row['posted_date']);
        $last_date = new DateTime($row['last_date']);
        $formatted_posted_date = $posted_date->format('d-m-Y');
        $formatted_last_date = $last_date->format('d-m-Y');

        //Creating JobItems divs depending om searcdh results
        echo <<<_END
                        <div class="jobItem">
                            <div class="jobItemLeft">
                                <h2>$title</h2>
                                <p>$organization</p>
                                <div class="dates">
                                    <p><img src="images/posted-date.png" alt="icon"> <span>Posted on: $formatted_posted_date</span></p>
                                    <p class="lastDate"><img src="images/date.png" alt="icon"> <span>Last Date: $formatted_last_date</span></p>
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

//function to sanitize search input 
function sanitize_search_input($search)
{
    $result = trim($search);
    $result = strip_tags($result);
    return $result;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobOrbitz | Available Jobs</title>
    <!-- style sheets -->
    <link rel="stylesheet" href="styles/jobs.css">
    <!-- javascript -->
    <script src="scripts/jobsPage.js" defer></script>
</head>

<body>
    <div class="app">

        <!-- navbar and hero -->
        <header>
            <div class="wrapper">
                <!-- navbar -->
                <nav class="topNav">
                    <a href="#" class="logo">
                        <img src="images/logo.png" alt="JobOrbitz">
                    </a>
                    <div class="hamburger">
                        <div class="line"></div>
                        <div class="line"></div>
                        <div class="line"></div>
                    </div>
                    <ul class="mainMenu">
                        <div class="navLinks">
                            <li><a href="index.php">Home</a></li>
                            <li><a href="jobs.html">Jobs</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </div>
                        <div class="loginButton">
                            <li><a href="./auth/login.html" class="btn navBtn">Login</a></li>
                        </div>
                    </ul>
                    <div class="mobile-menu-wrapper menu-hide">
                        <div class="mobile-menu menu-closed">
                            <span class="close-menu">&larr;</span>
                            <div class="menu-logo">
                                <img src="/images/logo.png" alt="">
                            </div>
                            <ul class="mobile-menu-list mobile-menu-top">
                                <li><a href="/">Home</a></li>
                                <li><a href="/jobs.html">Find Jobs</a></li>
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Contact Us</a></li>
                                <li><a href="/auth/login.html">Log In</a></li>
                            </ul>
                            <hr width="80%">
                            <ul class="mobile-menu-list mobile-menu-middle">
                                <li><a href="#">Provide Feedback</a></li>
                                <li><a href="#">Terms & Conditions</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Subscribe to Newsletter</a></li>
                            </ul>
                            <hr width="80%">
                            <ul class="mobile-menu-list mobile-menu-bottom">
                                <li><a href="#">
                                        <img src="/images/email.png" alt="icon">
                                        <span>email@gmail.com</span>
                                    </a></li>
                                <li><a href="#">
                                        <img src="/images/phone.png" alt="icon">
                                        <span>+92 315 3427365</span>
                                    </a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- hero -->
                <section class="hero">
                    <h1>Find More Jobs!</h1>
                    <div class="searchForm">
                        <form action="../joborbitz-app-main/jobs.php" method='get'>
                            <label for="searchInput">
                                <img src="/images//search.png" alt="">
                            </label>
                            <input type="search" name="searchInput" placeholder="Search Jobs!" id="searchInput">
                            <button type="submit" name="submit" class="btn">Search</button>
                        </form>
                        <select name="location">
                            <option value="Punjab">Punjab</option>
                            <option value="Sindh">Sindh</option>
                            <option value="Balochistan">Balochistan</option>
                            <option value="KPK">KPK</option>
                            <option value="AJK">AJK</option>
                        </select>
                        <select name="education">
                            <option value="Matriculation">Matriculation</option>
                            <option value="Intermediate">Intermediate</option>
                            <option value="Bachelors">Bachelors</option>
                        </select>
                        <select name="sector">
                            <option value="Government">Government</option>
                            <option value="Private">Private</option>
                            <option value="Semi-Government">Semi-Government</option>
                        </select>
                    </div>
                </section>
            </div>
        </header>

        <!-- jobs -->
        <section class="jobSection wrapper">
            <div class="jobsSectionTop">
                <h2>Available Jobs</h2>
                <p>You will be able to find all the jobs that are posted on the website. We provide extensive search
                    engine that can get to the bottom of every job to find the one you are interested in.</p>
            </div>
            <div class="jobsSectionBottom">
                <div class="jobsSectionLeft">
                    <div class="accordian activeAccordian">
                        <div class="accordianHeader">
                            <h2>Date Posted</h2>
                            <p>+</p>
                        </div>
                        <ul class="accordianMenu">
                            <li><input type="checkbox" name="24Hours" id="24Hours"><label for="24Hours">24 Hours</label>
                            </li>
                            <li><input type="checkbox" name="72Hours" id="72Hours"><label for="72Hours">72 Hours</label>
                            </li>
                            <li><input type="checkbox" name="1Week" id="1Week"><label for="1Week">1 Week</label></li>
                            <li><input type="checkbox" name="1Month" id="1Month"><label for="1Month">1 Month</label>
                            </li>
                            <li><input type="checkbox" name="1Year" id="1Year"><label for="1Year">1 Year</label></li>
                        </ul>
                    </div>
                    <div class="accordian sortAccordian">
                        <div class="accordianHeader">
                            <h2>Sort By</h2>
                            <p>+</p>
                        </div>
                        <ul class="accordianMenu">
                            <li><input type="checkbox" name="24Hours" id="24Hours"><label for="24Hours">24 Hours</label>
                            </li>
                            <li><input type="checkbox" name="72Hours" id="72Hours"><label for="72Hours">72 Hours</label>
                            </li>
                            <li><input type="checkbox" name="1Week" id="1Week"><label for="1Week">1 Week</label></li>
                            <li><input type="checkbox" name="1Month" id="1Month"><label for="1Month">1 Month</label>
                            </li>
                            <li><input type="checkbox" name="1Year" id="1Year"><label for="1Year">1 Year</label></li>
                        </ul>
                    </div>
                    <div class="accordian dateAccordian">
                        <div class="accordianHeader">
                            <h2>Qualification</h2>
                            <p>+</p>
                        </div>
                        <ul class="accordianMenu">
                            <li><input type="checkbox" name="24Hours" id="24Hours"><label for="24Hours">24 Hours</label>
                            </li>
                            <li><input type="checkbox" name="72Hours" id="72Hours"><label for="72Hours">72 Hours</label>
                            </li>
                            <li><input type="checkbox" name="1Week" id="1Week"><label for="1Week">1 Week</label></li>
                            <li><input type="checkbox" name="1Month" id="1Month"><label for="1Month">1 Month</label>
                            </li>
                            <li><input type="checkbox" name="1Year" id="1Year"><label for="1Year">1 Year</label></li>
                        </ul>
                    </div>
                    <div class="accordian dateAccordian">
                        <div class="accordianHeader">
                            <h2>Job Type</h2>
                            <p>+</p>
                        </div>
                        <ul class="accordianMenu">
                            <li><input type="checkbox" name="24Hours" id="24Hours"><label for="24Hours">24 Hours</label>
                            </li>
                            <li><input type="checkbox" name="72Hours" id="72Hours"><label for="72Hours">72 Hours</label>
                            </li>
                            <li><input type="checkbox" name="1Week" id="1Week"><label for="1Week">1 Week</label></li>
                            <li><input type="checkbox" name="1Month" id="1Month"><label for="1Month">1 Month</label>
                            </li>
                            <li><input type="checkbox" name="1Year" id="1Year"><label for="1Year">1 Year</label></li>
                        </ul>
                    </div>
                </div>
                <div class="jobsSectionRight">
                    <?php 

                    //showing search results if we are getting any value from search input 
                    if (!isset($_GET['submit']) && !isset($_GET['searchInput'])) {
                        show_all_jobs($pdo);
                    } else {
                        search_reults($pdo);
                    }
                    ?>

                </div>
            </div>
            <div class="loadJobsBtn">
                <button class="btn">Load More Jobs!</button>
            </div>
        </section>

        <!-- mailing -->
        <section class="mailing">
            <div class="wrapper">
                <h2 class="container-heading">Subscribe To Our Newsletter</h2>
                <h3 class="container-sub-heading">Get to know about new exclusive jobs vacancies through our
                    Newsletter.
                </h3>
                <form action="" class="mailing-form">
                    <input type="email" name="email" placeholder="Enter your email address">
                    <button class="btn">Subscribe</button>
                </form>
            </div>
        </section>
        </main>

        <footer>
            <div class="footer-top">
                <div class="wrapper">
                    <div class="f-t-about">
                        <h2>About Us</h2>
                        <p class="f-t-description">we are a group of individual aiming to provide a library of jobs for
                            people that are seeking opportunities to serve with their skill and knowledge. we post jobs
                            on
                            regular basis for our users and provide them a one stop solution.</p>
                    </div>
                    <div class="doubleMenu">
                        <ul class="find-menu">
                            <h2>Finds Jobs in</h2>
                            <li><a href="#">Punjab</a></li>
                            <li><a href="#">Sindh</a></li>
                            <li><a href="#">Balochistan</a></li>
                            <li><a href="#">KPK</a></li>
                            <li><a href="#">AJK</a></li>
                        </ul>
                        <ul class="footer-nav">
                            <h2>Menu</h2>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Jobs</a></li>
                            <li><a href="#">About</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="doubleMenu">
                        <ul class="signup-login">
                            <h2>Join Us</h2>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">Create Account</a></li>
                        </ul>
                        <ul class="footer-contact">
                            <h2>Got Any Questions?</h2>
                            <li>
                                <p>
                                    <img src="/images/location.png" alt="icon">
                                    <span>Sukkur, Sindh, Pakistan</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <img src="/images/email.png" alt="icon">
                                    <span>admin@joborbitz.com</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <img src="/images/phone.png" alt="icon">
                                    <span>+92-312-4567890</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p>Made With Love By @JobOrbitz.com - Copyright &copy;</p>
            </div>
        </footer>
    </div>

    <!-- script -->
    <script>
        // sticky nav
        const heroSection = document.querySelector('.hero')
        const navbar = document.querySelector('.topNav')

        const observer = new IntersectionObserver((e) => {
            e.forEach(entry => !entry.isIntersecting ? navbar.classList.add('stickyNav') : navbar.classList.remove('stickyNav'))
        }, {
            root: null,
            threshold: 0.1
        })
        observer.observe(heroSection)
    </script>
</body>

</html>