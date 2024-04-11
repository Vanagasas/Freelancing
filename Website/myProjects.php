<?php 
    require_once 'myProjects-form.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="myProjectsStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="myProjectsScript.js"></script>
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
        <div class="button-container">
            <button name="v" class="selector active-selector">Posted</button>
            <button name="a" class="selector">Active</button>
            <button name="c" class="selector">Completed</button>
        </div>
        <div class="search-results">
            <?php for ($i = 0; $i < $resultCheck; $i++){?>
                <a href="viewPost.php?postId=<?php echo $posts[$i]['id']?>">
                    <div class="post-found" value="<?php echo $posts[$i]['visability'];?>">
                        <h2><?php echo $posts[$i]["name"]; ?></h2>
                        <p class="handle-form-text"><?php echo $posts[$i]["details"]; ?></p>
                    </div>
                    <hr class="highlight-line">
                </a>
            <?php } ?>
        </div>
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
<script>
    $('.post-found').hide();
</script>
</html>