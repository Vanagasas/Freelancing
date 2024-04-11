<?php
    include_once 'dbc.php';
    session_start();
    $error = array();
    $username = '';
    $email = '';
    $loginUsername = '';
    $errorUsername = '';
    if (isset($_POST['signup-button'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sqlUsername = GetValue($conn, 'username', 'username', $username);
        $sqlEmail = GetValue($conn, 'email', 'email', $email);
        $resultUsername = mysqli_num_rows($sqlUsername);
        $resultEmail = mysqli_num_rows($sqlEmail);
        if (strlen($username) > 20 || strlen($username) <= 5){
            $error['username'] = "Username must be between 6-20 characters";
        }
        if ($resultUsername > 0){
            $error['username'] = "Username already exists";
        }
        else if ($resultEmail > 0){
            $error['email'] = "Email already exists";
        }
        if (count($error) === 0){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email');";
            mysqli_query($conn, $sql);
            $getId = GetValue($conn, 'id', 'username', $username);
            $id = mysqli_fetch_assoc($getId);
            $idVal = $id['id'];
            $sql_profile = "INSERT INTO profiles (user_id) VALUES ('$idVal');";
            mysqli_query($conn, $sql_profile);
            $_SESSION['id'] = $idVal;
            $_SESSION['username'] = $username;
            header('Location: profile.PHP');
        }
    }
    if (isset($_POST['login-button'])){
        $loginUsername = $_POST['login-username'];
        $loginPassword = $_POST['login-password'];
        $sqlUsername = GetValue($conn, 'username', 'username', $loginUsername);
        $sqlPassword = GetValue($conn, 'password', 'username', $loginUsername);
        $resultUsername = mysqli_num_rows($sqlUsername);
        $resultPassword = mysqli_fetch_array($sqlPassword, MYSQLI_ASSOC);
        if ($resultUsername){
            if (password_verify($loginPassword, $resultPassword['password'])){
                $resultId = GetValue($conn, 'id', 'username', $loginUsername);
                $id = mysqli_fetch_assoc($resultId);
                $idVal = $id['id'];
                $_SESSION['username'] = $loginUsername;
                $_SESSION['id'] = $idVal;
                header('Location: index.php');
            }
            else{
                $errorUsername = "Incorrect credentials";
            }
        }
        else{
            $errorUsername = "Incorrect credentials";
        }
    }
    function GetValue ($conn, $target, $filter, $value){
        $sql = "SELECT $target FROM users WHERE $filter = '$value';";
        return mysqli_query($conn, $sql);
    }
    function InsertValues ($conn, $target, $value){
        $sql = "INSERT INTO users ($target) VALUES ('$value');";
        mysqli_query($conn, $sql);
    }

?>