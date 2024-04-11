<?php 
    require_once 'viewPost-form.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="viewPostStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="viewPostScript.js"></script>
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
    <?php if ($post['visability'] == 'a'){?>
        <main>
            <h1 class="applied"><?php echo $post['accepted'];?> is working on the project</h1>
            <a href="send-messages.php?user=<?php echo $post['accepted'];?>"><button>Message</button></a>
            <a href="finished-project.php?postId=<?php echo $postId;?>"><button type="button">Finish Project</button></a>
            <a href="profile.php?user=<?php echo $post['accepted'];?>"><button>View Profile</button></a>
        </main>
    <?php } ?>
    <main>
        <h1><?php echo $post['name'];?></h1>
        <div class="description">
            <h3><?php echo $post['details'];?></h3>
            <hr class="highlight-line">
        </div>
        <div class="skills">
            <p>Skills required: </p>
            <?php for ($i = 0; $i < count($skills); $i++){
                if ($i == 0){?>
                    <span><?php echo $skills[$i];?></span>
                <?php } else { ?>
                    <span>, <?php echo $skills[$i]; ?></span>
            <?php } } ?>
            <hr class="highlight-line">
        </div>
        <div class="user-post">
            <p>Created by:</p>
            <a href="profile.php?user=<?php echo GetUsername($conn, $postId);?>"><?php echo GetUsername($conn, $postId);?></a>
            <p>User rating </p>
            <hr class="highlight-line">
        </div>
        <div class="price">
            <?php if ($post['pay_max'] == 0){?>
                <p>Payment for the project:</p>
                <?php if ($post['type'] == "Fixed Price"){?>
                    <p><?php echo $post['pay_min']; ?>$</p>
                <?php } else { ?>
                    <p><?php echo $post['pay_min']; ?>$p/h</p>
                <?php } ?>
            <?php } else { ?>
                <p>Suggested payment range:</p>
                <?php if ($post['type'] == 'Bid payment'){?>
                    <p><?php echo $post['pay_min']; ?>$ - <?php echo $post['pay_max']; ?>$</p>
                <?php } else { ?>
                    <p><?php echo $post['pay_min']; ?>$p/h - <?php echo $post['pay_max']; ?>$p/h</p>
                <?php } } ?>
            <hr class="highlight-line">
        </div>
        <?php if ($_SESSION['id'] !== $post['user_id']){?>
            <form action="viewPost.php?postId=<?php echo $postId ?>" id="apply-form" method="post">
                <h3>Apply for the position</h3>
                <p>Why would you fit the position:</p>
                <textarea name="fit" rows="5"><?php echo $description; ?></textarea>
                <?php if ($post['pay_max'] == 0){?>
                    <button name="apply" type="submit">Apply</button>
                <?php } else{ ?>
                    <p class="error"><?php echo $error; ?></p>
                    <input name="bid" placeholder="Bid value"/><button name="bid-apply" type="submit">Bid</button>
                <?php } ?>
                <hr class="highlight-line">
            </form>
        <?php } ?>
    </main>
    <?php if ($post['user_id'] == $_SESSION['id'] && $post['visability'] == 'v'){?>
        <main>
            <h1 class="applied">Applied:</h1>
            <?php for($i = 0; $i < count($applies['username']); $i++){ ?>
                <form method="post" class="found-apply">
                <input type="hidden" name="form-username" value="<?php echo $applies['username'][$i];?>"/>
                <input type="hidden" name="form-payment" value="<?php echo $applies['payment'][$i];?>"/>
                    <h2><?php echo $applies['username'][$i];?></h2>
                    <h3>Details:</h3>
                    <p><?php echo $applies['details'][$i]; ?></p>
                    <h3>Payment:</h3>
                    <p><?php echo $applies['payment'][$i]; ?></p>
                    <button type="SUBMIT" name="accept-offer">Accept</button></a>
                    <hr class="highlight-line">
            </form>
            <?php }?>
            
        </main>
    <?php } ?>
</body>
</html>