<?php
    include_once 'dbc.php';
    if (isset($_GET['user'])){
        $username = $_GET['user'];
    }
    function GetMessages($conn, $senderId){
        $id = $_SESSION['id'];
        $sql = "SELECT sender_id, receiver_id, message FROM messages WHERE sender_id = '$id' AND receiver_id = '$senderId' OR receiver_id = '$id' AND sender_id = '$senderId' ORDER BY date DESC";
        $result = mysqli_query($conn, $sql);
        $messages = array();
        while($row = mysqli_fetch_assoc($result)){
            $messages[] = $row;
        }
        return $messages;
    }
    function GetUserID($conn, $username){
        $sql = "SELECT id FROM users WHERE username = $username";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        return $row['id'];
    }



?>