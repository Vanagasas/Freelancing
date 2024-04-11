<?php 
    include_once 'dbc.php';
	require_once 'messages-form.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="messagesStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="finishedScript.js"></script>
</head>
<body>
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
        <div class="messages-container">
            <div class="message-info">
                <h2>Messages</h2>
                <p>This is a message to a person i guess</p>
            </div>
            <div class="message-info">
                <h2>Messages</h2>
                <p>This is a message to a person i guess</p>
            </div>
            <div class="message-info">
                <h2>Messages</h2>
                <p>This is a message to a person i guess</p>
            </div>
                
        </div>
    </main>
</body>


</html>