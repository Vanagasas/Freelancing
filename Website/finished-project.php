<?php 
    include_once 'dbc.php';
	require_once 'finished-project-form.php';
?>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="finishedProjectStyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alata&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="finishedScript.js"></script>
</head>
<body>

    <main>
        <form method="POST" class="finished-container">
            <h1>Finished project</h1>
            <div class="field">
                <h3>Rate <?php echo $username;?></h3>
                <div>
                    <span value="1" class="far fa-star"></span>
                    <span value="2" class="far fa-star"></span>
                    <span value="3" class="far fa-star"></span>
                    <span value="4" class="far fa-star"></span>
                    <span value="5" class="far fa-star"></span>
                    <input id="hidden-star" type="hidden" name="stars" value="0">
                </div>
            </div>
            <div class="field">
                <h3>Comment</h3>
                <textarea name="comment" id="comment" cols="30" rows="10"></textarea>
            </div>
            <div class="field">
                <button name="finished-form" type="submit">Finished</button>
            </div>
        </form>
    </main>
    
</body>


</html>