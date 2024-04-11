<?php 
    require_once 'jobs-form.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="jobsStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="jobScript.js"></script>
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
    <main>
        <h1 class="job-selcetion-header">All Projects</h1>
        <div class="job-search-container">
            <span class="fas fa-search"></span>
            <input class="job-search-input" type="text" placeholder="Search projects" />
            <button class="search-button">Search</button>
        </div>
        <content>
            <form action="jobs.php" class="search-filter" method="post">
                <h2>Filter</h2>
                <p class="filter-selector filter-selector-bold">Budget</p>
                <p class="filter-selector">Hourly prices</p>
                <input class="filter-input" type="number" placeholder="Min"/>
                <input class="filter-input" type="number" placeholder="Max"/>
                <p class="filter-selector">Fixed prices</p>
                <input class="filter-input" type="number" placeholder="Min"/>
                <input class="filter-input" type="number" placeholder="Max"/>
                <p class="filter-selector filter-selector-bold">Skills</p>
                <div class="selected-skills"></div>
                <div class="skill-addition-container">
                    <input class="filter-input skill-input" type="text" placeholder="Enter skills">
                    <button type="button" class="add-skill-button">Add</button>
                </div>
                <p class="filter-selector filter-selector-bold">Project type</p>
                <select name="spec" class="sort-by">
                    <option value="i">Individual project</option>
                    <option value="t">Team up request</option>
                    <option value="l">Learning request</option>
                </select>
                <button type="submit" class="submit-filter-button">Submit</button>
            </form>
            <div class="search-results">
                <?php for ($i = $start; $i < $limit; $i++){
                    if (array_key_exists($i, $posts)){?>
                        <a href="viewPost.php?postId=<?php echo $posts[$i]['id']?>">
                            <div class="found-form">
                                <h2><?php echo $posts[$i]["name"]; ?></h2>
                                <p class="handle-form-text"><?php echo $posts[$i]["details"]; ?></p>
                                <div class="nested-outputs">
                                    <div>
                                        <p>Skills</p>
                                        <?php for ($j = 0; $j < count($skills); $j++){
                                            if ($posts[$i]["id"] == $skills[$j]["post_id"]){?>
                                                <span><?php echo $skills[$j]["skill"] ?> </span>
                                            <?php } elseif ($posts[$i]["id"] < $skills[$j]["post_id"]){
                                                break;
                                            } ?>
                                        <?php } ?>
                                    </div>
                                    <div>
                                        <p><?php echo $posts[$i]["type"];?></p>
                                        <?php if ($posts[$i]["pay_max"] == 0){?>
                                        <p><?php echo $posts[$i]["pay_min"] ?>$</p>
                                        <?php } else { ?>
                                            <p><?php echo $posts[$i]["pay_min"]?>$ - <?php echo $posts[$i]["pay_max"]?>$</p>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </a>
                <hr class="highlight-line">
                <?php }} ?>
                <div class="page-nav">
                    <?php if ($page == 1){ ?>
                        <a class="page-switch" href="jobs.php?pg=<?php echo $page; ?>"><</a>
                        <a class="page-switch active-page" href="jobs.php?pg=<?php echo $page; ?>"><?php echo $page; ?></a>
                    <?php } else { ?>
                        <a class="page-switch" href="jobs.php?pg=<?php echo $page - 1; ?>"><</a>
                        <a class="page-switch" href="jobs.php?pg=<?php echo $page -1; ?>"><?php echo $page - 1; ?></a>
                    <?php } if ($page == 1){
                        if ($page * 10 < $resultCheck){?>
                            <a class="page-switch" href="jobs.php?pg=<?php echo $page + 1; ?>"><?php echo $page + 1; ?></a>
                        <?php } if($page * 10 + 10 < $resultCheck){ ?>
                            <a class="page-switch" href="jobs.php?pg=<?php echo $page + 2; ?>"><?php echo $page + 2; ?></a>
                    <?php }} else { ?>
                        <a class="page-switch active-page" href="jobs.php?pg=<?php echo $page; ?>"><?php echo $page; ?></a>
                        <?php if ($page * 10 < $resultCheck){ ?>
                            <a class="page-switch" href="jobs.php?pg=<?php echo $page + 1; ?>"><?php echo $page + 1; ?></a>
                    <?php }} if ($page * 10 < $resultCheck){ ?>
                        <a class="page-switch" href="jobs.php?pg=<?php echo $page + 1; ?>">></a>
                    <?php } else { ?>
                        <a class="page-switch" href="jobs.php?pg=<?php echo $page; ?>">></a>
                    <?php } ?>
                </div>
            </div>
        </content>
    </main>
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