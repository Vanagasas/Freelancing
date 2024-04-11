<?php
    session_start();
    include_once 'dbc.php';
    if (!$_SESSION['id']){
        header('Location: login.PHP');
    }
    if (isset($_POST['form-button'])){
        $id = $_SESSION['id'];
        $name = $_POST['project-name'];
        $name = mysqli_real_escape_string($conn, $name);
        $details = $_POST['project-details'];
        $details = mysqli_real_escape_string($conn, $details);
        $category = $_POST['categories'];
        $spec = $_POST['spec'];
        $min = 0;
        $max = 0;
        $skills = array();
        if ($_POST['param-one-first'] == 'param-payment'){
            $type = 'Fixed Price';
            $min = $_POST['fixed'];
        }
        else if ($_POST['param-one-second'] == 'param-payment'){
            $type = 'Fixed hourly payment';
            $min = $_POST['fixed'];
        }
        else if ($_POST['param-two-first'] == 'param-payment'){
            $type = 'Bid payment';
            $min = $_POST['bid-min'];
            $max = $_POST['bid-max'];
        }
        else if ($_POST['param-two-second'] == 'param-payment'){
            $type = 'Bid hourly payment';
            $min = $_POST['bid-min'];
            $max = $_POST['bid-max'];
        }
        else{
            $type= 'none';
        }
        foreach ($_POST['input-skill'] as $value){
            array_push($skills, $value);
        }
        $sqlPost = "INSERT INTO posts(user_id, name, details, category, spec, type, pay_min, pay_max) VALUES ('$id', '$name', '$details', '$category', '$spec', '$type', '$min', '$max');";
        mysqli_query($conn, $sqlPost);
        $last_id = mysqli_insert_id($conn);
        foreach ($skills as $va){
            $sqlSkill = "INSERT INTO skills(post_id, skill) VALUES ('$last_id', '$va');";
            mysqli_query($conn, $sqlSkill);
        }
        header('Location: myProjects.php');
    }

?>