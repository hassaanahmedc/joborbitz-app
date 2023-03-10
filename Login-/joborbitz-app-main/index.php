<?php
//Adding Funtions file 
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobOrbitz | Get the job that you deserve</title>
    <!-- style sheets -->
    <link rel="stylesheet" href="./styles/styles.css">
    <link rel="stylesheet" href="./styles/tablets.css">
    <link rel="stylesheet" href="./styles/mobile.css">

    <!-- javascript -->
    <script src="./scripts/main.js" defer></script>
</head>

<body>
    <div class="app">

        <!-- navbar and hero -->
        <header>
            <div class="wrapper">
                <!-- navbar -->
                <nav class="topNav stickyNav">
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
                            <li><a href="jobs.php">Jobs</a></li>
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
                    <div class="circle"></div>
                    <div class="circle"></div>
                    <div class="heroLeft">
                        <h1>GET A JOB THAT YOU DESERVE !</h1>
                        <form action="../joborbitz-app-main/jobs.php" class="searchForm" method='get'>
                            <label for="searchInput">
                                <img src="images/search.png" alt="">
                            </label>
                            <input type="search" name="searchInput" placeholder="Search Jobs!" id="searchInput" required>
                            <button type="submit" name="submit" class="btn">Search</button>
                        </form>
                    </div>
                    <div class="heroRight">
                        <img src="images/hero.png" alt="A woman standing confidentally">
                    </div>
                </section>
            </div>
        </header>

        <main>
            <!-- features -->
            <section class="features container-wrap">
                <div class="wrapper">
                    <div class="feature">
                        <img src="images/e-s.png" alt="icon">
                        <h2>Enhanced Search</h2>
                        <p>We provide extensive search options to find the job of your need.</p>
                    </div>
                    <div class="feature">
                        <img src="images/e-s-i.png" alt="icon">
                        <h2>Easy User Interface</h2>
                        <p>With our improved UI, it is much easier to search jobs.</p>
                    </div>
                    <div class="feature">
                        <img src="images/d-u.png" alt="icon">
                        <h2>Daily Job Updates</h2>
                        <p>We update the jobs on regularly to bring new opportunities for you.</p>
                    </div>
                    <div class="feature">
                        <img src="images/c-s.png" alt="icon">
                        <h2>Customer Support</h2>
                        <p>We are always available to help with our Kind customer support.</p>
                    </div>
                </div>
            </section>


            <!-- latest jobs -->
            <section class="latest-jobs container">
                <div class="wrapper">
                    <h2 class="container-heading">Latest Jobs</h2>
                    <h3 class="container-sub-heading">We post jobs daily to keep you updated!</h3>
                    <div class="jobs-list">

                    <?php index_page_jobs($pdo) // Calling PHP function to show latest jobs ?>
                    
                    </div>
                    <a href="#" class="btn jobsBtn">See All Jobs!</a>
                </div>
            </section>

            <!-- Team -->
            <section class="team container" id="team">
                <div class="wrapper">
                    <h2 class="container-heading">Meet Our Team</h2>
                    <h3 class="container-sub-heading">Every team member is ready to serve you!</h3>
                    <div class="members">
                        <div class="member">
                            <img src="images/ishaq.png" alt="M Ishaq">
                            <div class="member-details">
                                <h1 class="name">Muhammad Ishaq</h1>
                                <h3 class="role">Full Stack Developer</h3>
                                <p class="description">Being the project leader and a extraordinary full stack
                                    developer, He
                                    supervise the work of the team and is the main person behind the project. with his
                                    ilustrious
                                    vision and guidance the team is ready to make this one a noteworthy association.</p>
                            </div>
                        </div>
                        <div class="member">
                            <img src="images/hassaan.png" alt="Muhammad Hassaan">
                            <div class="member-details">
                                <h1 class="name">Muhammad Hassaan</h1>
                                <h3 class="role">Back End Developer</h3>
                                <p class="description">This man is a jack of all trades! Not only he is an awesome
                                    back-end
                                    developer but he knows about front-end, programming and content writing too!
                                    Nonetheless
                                    he has
                                    a certificate in graphic designing from sukkur iba. He is a part time freelancer as
                                    well.</p>
                            </div>
                        </div>
                        <div class="member">
                            <img src="images/imtiaz.png" alt="Muhammad Imtiaz">
                            <div class="member-details">
                                <h1 class="name">M. Imtiaz</h1>
                                <h3 class="role">Front End Developer</h3>
                                <p class="description">Imtiaz is an experience front-end developer and exceptional at
                                    making
                                    beautiful websites with perfectionism. He is always eager and loves to learn new
                                    things
                                    about
                                    development. Want to see how a perfect website looks? just look at his.</p>
                            </div>
                        </div>
                        <div class="member">
                            <img src="images/tousif.png" alt="Tousif Ahmed">
                            <div class="member-details">
                                <h1 class="name">Tousif Ahmed</h1>
                                <h3 class="role">UI/UX Designer</h3>
                                <p class="description">Tousif played an important role of Designing the feel & looks for
                                    the
                                    website, he has been working as a graphic designer for many years now. He???s always
                                    ready
                                    for new
                                    challenges and tries to accomplish them as soon as possible.</p>
                            </div>
                        </div>
                    </div>
                    <div class="dots"></div>
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
                                    <img src="images/location.png" alt="icon">
                                    <span>Sukkur, Sindh, Pakistan</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <img src="images/email.png" alt="icon">
                                    <span>admin@joborbitz.com</span>
                                </p>
                            </li>
                            <li>
                                <p>
                                    <img src="images/phone.png" alt="icon">
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
    <div class="spinner">
        <div class="cir" style="--i:0"></div>
        <div class="cir" style="--i:1"></div>
        <div class="cir" style="--i:2"></div>
        <div class="cir" style="--i:3"></div>
        <div class="cir" style="--i:4"></div>
    </div>
</body>

</html>