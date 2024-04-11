<?php
    include_once 'dbc.php';
    session_start();
    $post_result = array();
    $post_skills = array();
    $post_applies = array();
    $error = '';
    $description = '';
    $postId = $_GET["postId"];
    $post = GetPost($conn, $postId);
    $skills = GetSkills($conn, $postId);
    $applies = GetApplies($conn, $postId);
    if (isset($_POST["apply"])){
        if (!$_SESSION['id']){
            header('Location: login.PHP');
        }
        $description = $_POST['fit'];
        $pay = $post['pay_min'];
        Apply($conn, $description, $pay, $postId);
        header('Location: jobs.php?ph=1');
    }
    if (isset($_POST["bid-apply"])){
        if (!$_SESSION['id']){
            header('Location: login.php');
        }
        $description = $_POST['fit'];
        $pay = $_POST['bid'];
        if ($pay == ''){
            $error = "Field can't be empty";
        }
        else if (!is_numeric($pay)){
            $error = "Enter a number";
        }
        else{
            Apply($conn, $description, $pay, $postId);
            header('Location: jobs.php?pg=1');
        }
    }
    if (isset($_POST["accept-offer"])){
        $username = $_POST['form-username'];
        $payment = $_POST['form-payment'];
        UpdateValue($conn, $postId, 'accepted', $username);
        UpdateValue($conn, $postId, 'pay_min', $payment);
        UpdateValue($conn, $postId, 'visability', 'a');
        header('Location:myProjects.php');
    }
    function GetPost($conn, $postId){
        $sql = "SELECT user_id, name, details, category, spec, visability, type, pay_min, pay_max, accepted FROM posts WHERE id = '$postId' LIMIT 1;";
        $results = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($results);
        if ($resultCheck > 0){
            $results = mysqli_fetch_array($results, MYSQLI_ASSOC);
            return $results;
        }
        else{
            header('Location:jobs.php');
        }
    }
    function GetSkills($conn, $postId){
        $postSkills = array();
        $sql = "SELECT skill FROM skills WHERE post_id = '$postId';";
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($results)){
            array_push($postSkills, $row["skill"]);
        }
        return $postSkills;
    }
    function GetApplies($conn, $postId){
        $postApplies = array();
        $postApplies['details'] = array();
        $postApplies['payment'] = array();
        $postApplies['username'] = array();
        $sql = "SELECT details, payment, user_id FROM applies WHERE post_id = '$postId';";
        $results = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($results)){
            array_push($postApplies['details'], $row["details"]);
            array_push($postApplies['payment'], $row["payment"]);
            $sqlUsername = "SELECT username FROM users WHERE id = '$row[user_id]';";
            $resultsUsername = mysqli_query($conn, $sqlUsername);
            $resultsUsername = mysqli_fetch_assoc($resultsUsername);
            array_push($postApplies['username'], $resultsUsername["username"]);
        }
        return $postApplies;
    }
    function GetRating($conn, $postId){
        $sql = "SELECT rating, rating_quantity FROM profiles WHERE user_id IN (SELECT user_id FROM posts WHERE id = '$postId');";
        $results = mysqli_query($conn, $sql);
        $results = mysqli_fetch_array($results, MYSQLI_ASSOC);
        return $results;
    }
    function Apply($conn, $description, $pay, $postId){
        $description = mysqli_real_escape_string($conn, $description);
        $pay = mysqli_real_escape_string($conn, $pay);
        $postId = $_GET["postId"];
        $id = $_SESSION['id'];
        $sql = "INSERT INTO applies (post_id, user_id, details, payment) VALUES ('$postId', '$id', '$description', '$pay');";
        mysqli_query($conn, $sql);
    }
    function GetUsername($conn, $postId){
        $sql = "SELECT username FROM users WHERE id IN (SELECT user_id FROM posts WHERE id = '$postId');";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($result);
        return $result['username'];
    }
    function GetAppliedID($conn, $username){
        $sql = "SELECT id FROM users WHERE username = '$username';";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($result);
        return $result['id'];
    }

    function UpdateValue($conn, $postId, $target, $value){
        $sql = "UPDATE posts SET $target = '$value' WHERE id = '$postId';";
        mysqli_query($conn, $sql);
    }
    

?>