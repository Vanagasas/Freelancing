<?php
    include_once 'dbc.php';
    session_start();
    $posts = array();
    $skills = array();
    if (isset($_POST['spec'])){
        $spec = $_POST['spec'];
    }
    if (isset($_GET['pg'])){
        $page = $_GET['pg'];
    }
    else{
        $page = 1;
    }
    $limit = $page * 10;
    $start = $limit - 10;
    if (isset($_GET['pc']) && isset($_POST['spec'])){
        $project_category = $_GET['pc'];
        $sql = "SELECT * FROM posts WHERE visability = 'v' && category = '$project_category' && post_spec = '$spec' ORDER BY post_id DESC";
    }
    else if (isset($_GET['pc'])){
        $project_category = $_GET['pc'];
        $sql = "SELECT * FROM posts WHERE visability = 'v' && category = '$project_category' ORDER BY post_id DESC";
    }
    else if (isset($_POST['spec'])){
         $sql = "SELECT * FROM posts WHERE visability = 'v' && spec = '$spec' ORDER BY id DESC";
    }
    else{
        $sql = "SELECT * FROM posts WHERE visability = 'v' ORDER BY id DESC";
    }
    $sqlSkills = "SELECT * FROM skills";
    $result = mysqli_query($conn, $sql);
    $resultSkills = mysqli_query($conn, $sqlSkills);
    $resultCheck = mysqli_num_rows($result);
    $resultSkillsCheck = mysqli_num_rows($resultSkills);
    for ($i = 0; $i < $resultCheck; $i++){
        $posts[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
    for ($i = 0; $i < $resultSkillsCheck; $i++){
        $skills[$i] = mysqli_fetch_array($resultSkills, MYSQLI_ASSOC);
    }
    

    
?>