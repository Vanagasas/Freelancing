<?php 
    session_start();
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="https://kit.fontawesome.com/74d37a292d.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="script.js"></script>
</head>
<body>
<!--Website header-->
    <header class="main-header">
        <nav>
            <a href="index.php" class="nav-button">Home</a>
            <a href="jobs.php?pg=1" class="nav-button">Jobs</a>
            <a href="post.php" class="nav-button">Post a Project</a>
            <?php if (!isset($_SESSION['username'])) {?>
                <a href="login.php" class="nav-button">Log In</a>
            <?php } elseif (isset($_SESSION['username'])){?>
                <a  class="nav-button dropdown"><?php echo $_SESSION['username'];?></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="profile.php" class="nav-button dropdown-nav">Profile</a>
                    </li>
                    <li>
                        <a href="myProjects.php" class="nav-button dropdown-nav">My Projects</a>
                    </li>
                    <li>
                        <a href="messages.php" class="nav-button dropdown-nav">Messages</a>
                    </li>
                    <li>
                        <a href="logout.php" class="nav-button dropdown-nav">Logout</a>
                    </li>
                </ul>
            <?php } ?>
        </nav>
    </header>
<!--Animation canvas-->
    <canvas id="canvas-display" height="400"></canvas>
    <div class="canvas-inner-content">
        <h1 class="canvas-inner-header">Connect with other freelancers</h1>
        <h1 class="canvas-inner-header">to complete various types</h1>
        <h1 class="canvas-inner-header">of projects online</h1>
        <form class="canvas-button" action="jobs.php">
            <button type="submit" class="canvas-inner-button">Connect with Freelancers</button>
        </form>
        <form class="canvas-button" action="post.php">
            <button type="submit" class="canvas-inner-button">Post a Project</button>
        </form>
    </div>
<!--Suggested projects-->
    <div class="suggested-project-display">
        <h1 class="suggested-project-header">Popular project selection</h1>
        <div class="suggested-project-selection">
            <a class="suggested-link" href="jobs.php?pg=1&pc=designs">
                <div class="suggested-project-logo suggested-project-image">
                    <div class="suggested-project-overlay"></div>
                    <div class="suggested-project-border">
                        <div class="suggested-project-text">
                            <p>Designs</p>
                        </div>
                    </div>
                </div>
            </a>
            <a class="suggested-link" href="jobs.php?pg=1&pc=website">
                <div class="suggested-project-website suggested-project-image">
                    <div class="suggested-project-overlay"></div>
                    <div class="suggested-project-border">
                        <div class="suggested-project-text">
                            <p>Websites</p>
                        </div>
                    </div>
                </div>
            </a>
            <a class="suggested-link" href="jobs.php?pg=1&pc=applications">
                <div class="suggested-project-app suggested-project-image">
                    <div class="suggested-project-overlay"></div>
                    <div class="suggested-project-border">
                        <div class="suggested-project-text">
                            <p>Applications</p>
                        </div>
                    </div>
                </div>
            </a>
            <a class="suggested-link" href="jobs.php?pg=1&pc=illustrations">
                <div class="suggested-project-illustration suggested-project-image">
                    <div class="suggested-project-overlay"></div>
                    <div class="suggested-project-border">
                        <div class="suggested-project-text">
                            <p>Illustations</p>
                        </div>
                    </div>
                </div>
            </a>
            <a class="suggested-link" href="jobs.php?pg=1&pc=writing">
                <div class="suggested-project-writing suggested-project-image">
                    <div class="suggested-project-overlay"></div>
                    <div class="suggested-project-border">
                        <div class="suggested-project-text">
                            <p>Writing</p>
                        </div>
                    </div>
                </div>
            </a>
            <a class="suggested-link" href="jobs.php?pg=1&pc=software">
                <div class="suggested-project-software suggested-project-image">
                    <div class="suggested-project-overlay"></div>
                    <div class="suggested-project-border">
                        <div class="suggested-project-text">
                            <p>Software</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="see-more-projects">
            <a class="suggested-link" href="jobs.php?pg=1&pc=other">
                <button type="submit" class="see-more-projects-button">Other</button>
            </a>
            <br>
        </div>
    </div>
    <div class="reasons-to-use">
        <h1>Why you should team up with other freelancers?</h1>
        <div class="reasons-to-use-points">
            <span class="fas fa-check reasons-to-use-checkmark"></span><p class="reasons-to-use-paragrapghs">The best options for every budget</p>
        </div>
        <div class="reasons-to-use-points">
            <span class="fas fa-check reasons-to-use-checkmark"></span><p class="reasons-to-use-paragrapghs">View all offers submitted for the project to select the best fitting option</p>
        </div>
        <div class="reasons-to-use-points">
            <span class="fas fa-check reasons-to-use-checkmark"></span><p class="reasons-to-use-paragrapghs">Browse users portfolios to see their reviews and completed projects</p>
        </div>
        <div class="reasons-to-use-points">
            <span class="fas fa-check reasons-to-use-checkmark"></span><p class="reasons-to-use-paragrapghs">Pay when the project is completed to ensure the best results</p>
        </div>
        <div class="reasons-to-use-points">
            <span class="fas fa-check reasons-to-use-checkmark"></span><p class="reasons-to-use-paragrapghs">Easiest way to ensure the projects are completed before deadline</p>
        </div>
    </div>
    <div class="find-the-freelancers">
        <div class="find-the-freelancers-overlay"></div>
        <div class="find-the-freelancers-container">
            <h1 class="find-the-freelancers-header">Find the freelancers required to team up on the project now</h1>
            <form action="post.php">
                <button type="submit" class="find-the-freelancers-button">Get Started</button>
            </form>
        </div>
    </div>
    
    <footer>
        <div class="footer-logo">
        
        </div>
        <div class="footer-socials">
            <span class="fab fa-facebook socials-icon"></span>
            <span class="fab fa-twitter socials-icon"></span>
            <span class="fab fa-linkedin socials-icon"></span>
            <span class="fab fa-instagram socials-icon"></span>
        </div>
        
    </footer>
</body>


</html>