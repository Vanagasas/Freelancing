<?php
    include_once 'dbc.php';
    session_start();
    $id = $_SESSION['id'];
    $selector = "v";
    if (isset($_GET['selector'])){
        $selector = $_GET['selector'];
    }
    $posts = array();
    $sql = "SELECT id, name, details, visability FROM posts WHERE user_id = '$id';";
    $result = mysqli_query($conn, $sql);
    $resultCheck = mysqli_num_rows($result);
    for ($i = 0; $i < $resultCheck; $i++){
        $posts[$i] = mysqli_fetch_array($result, MYSQLI_ASSOC);
    }
?>