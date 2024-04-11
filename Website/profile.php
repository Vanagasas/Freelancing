<?php 
    include_once 'dbc.php';
	require_once 'profile-form.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="profileStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="profileScript.js"></script>
    <?php $profile = GetData($conn, $id);?>
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
        <div class="content">
            <div class="container">
                <h1><?php echo $username;?></h1>
            </div>
            <form action="profile.php" id="edit-form" method="post">
                <div class="container">
                    <h2 class="field-display"><?php echo $profile['profession']; ?></h2>
                    <input class="edit-field-display" name="profession" placeholder="Profession" type="text" value="<?php echo $profile['profession']; ?>"></input>
                </div>
                <div class="container">
                    <h3>About me:</h3>
                    <p class="field-display"><?php echo $profile['about_me'] ?></p>
                    <textarea class="edit-field-display test" name="about_me" type="text" rows="5"><?php echo $profile['about_me']; ?></textarea>
                </div>
                <div class="container">
                    <h4>Rating:</h4>
                    <span class="far fa-star"></span>
                    <span class="far fa-star"></span>
                    <span class="far fa-star"></span>
                    <span class="far fa-star"></span>
                    <span class="far fa-star"></span>
                </div>
                <div class="container">
                    <h3>Jobs completed:</h3>
                    <p class=""><?php echo $profile['jobs_completed']; ?></p>
                </div>
                <div class="container">
                    <h3>Helped freelancers:</h3>
                    <p class=""><?php echo $profile['helped']; ?></p>
                </div>
                <div class="container">
                    <h3>Skills:</h3>
                    <p class="field-display"><?php echo $profile['skills']; ?></p>
                    <textarea class="edit-field-display" name="skills" type="text" rows="5"><?php echo $profile['skills']; ?></textarea>
                </div>
                <div class="container">
                    <h3>Education:</h3>
                    <p class="field-display"><?php echo $profile['education']; ?></p>
                    <textarea class="edit-field-display" name="education" type="text" rows="5"><?php echo $profile['education']; ?></textarea>
                </div>
                <div class="container">
                    <h3>Work experience:</h3>
                    <p class="field-display"><?php echo $profile['work_experience']; ?></p>
                    <textarea class="edit-field-display" name="work_experience" type="text" rows="5"><?php echo $profile['work_experience']; ?></textarea>
                </div>
                <div class="container">
                    <h3>Reviews:</h3>
                    <div class="field-display"></div>
                </div>
                <?php if ($username == $_SESSION['username']){?>
                    <button type="button" class="edit-button start-edit-button">Edit profile</button>
                    <button type="submit" name="form-button" class="edit-button finish-edit-button">Save changes</button>
                    <button type="button" class="edit-button cancel-edit-button">Cancel</button>
                <?php } ?>
            </form>
        </div>
    </main>
</body>
</html>