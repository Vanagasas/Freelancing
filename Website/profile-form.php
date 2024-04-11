<?php
    session_start();
    include_once 'dbc.php';
    if (isset($_GET['user'])){
        $username = $_GET['user'];
        $id = GetID($conn, $username);
    }
    else{
        $username = $_SESSION['username'];
        $id = $_SESSION['id'];
    }
    $profile = GetData($conn, $id);
    if (isset($_POST['form-button'])){
        if ($id = $_SESSION['id']){
            for ($i = 0; $i < count($profile); $i++){
                if (isset($_POST[DataTypes($i)])){
                    $profile[DataTypes($i)] = mysqli_real_escape_string($conn, $_POST[DataTypes($i)]);
                    UpdateValue($conn, $id, DataTypes($i), $profile[DataTypes($i)]);
                }
            }
        }
    }
    function GetData ($conn, $id){
        $sql = "SELECT profession, about_me, rating, rating_quantity, jobs_completed, skills, education, work_experience, helped FROM profiles WHERE user_id = '$id' LIMIT 1;";
        $result = mysqli_query($conn, $sql);
        $val = mysqli_fetch_array($result, MYSQLI_ASSOC);
        return $val;
    }
    function GetID ($conn, $username){
        $sql = "SELECT id FROM users WHERE username = '$username' LIMIT 1;";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            $val = mysqli_fetch_assoc($result);
            return $val['id'];
        }
    }
    function UpdateValue ($conn, $id, $type, $value){
        $sql = "UPDATE profiles SET $type = '$value' WHERE user_id = '$id';";
        mysqli_query($conn, $sql);
    }
    function DataTypes ($i){
        $types = array(
            'profession',
            'about_me',
            'rating',
            'rating_quantity',
            'jobs_completed',
            'skills',
            'education',
            'work_experience',
            'helped'
        );
        return $types[$i];
    }

?>