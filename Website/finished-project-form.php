<?php
    include_once 'dbc.php';
    session_start();
    $postId = $_GET['postId'];
    $username = GetUsername($conn, $postId);
    if (isset($_POST['finished-form'])){
        $username = GetUsername($conn, $postId);
        $star = $_POST['stars'];
        $userID = GetID($conn, $username);
        UpdateValue($conn, 'posts', 'visability', 'c', 'id', $postId);
        UpdateValue($conn, 'profiles', 'jobs_completed', 'jobs_completed + 1', 'user_id', $userID);
        UpdateValue($conn, 'profiles', 'rating', 'rating + ' . $star, 'user_id', $userID);
        UpdateValue($conn, 'profiles', 'rating_quantity', 'rating_quantity + 1', 'user_id', $userID);
        header("Location: myProjects.php");
    }


    function UpdateValue($conn, $dbname, $selector, $value, $whereSel, $whereClaus){
        $sql = "UPDATE $dbname SET $selector = '$value' WHERE $whereSel = '$whereClaus'";
        mysqli_query($conn, $sql);
    }

    function GetUsername($conn, $postId){
        $sql = "SELECT accepted FROM posts WHERE id = $postId";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($result);
        return $result['accepted'];
    }
    function GetID($conn, $username){
        $sql = "SELECT id FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($result);
        return $result['id'];
    }
    function UserStats($conn, $userID){
        $sql = "SELECT rating, rating_quantity, jobs_completed FROM profiles WHERE user_id = $userID";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $result;
    }


?>