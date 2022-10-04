<?php 

    include('db_con.php');
    session_start();
    // var_dump($_POST['id']);
    // die;
     if(!empty($_POST['id'])) {
        $id  = trim($_POST['id']);
        delete($id);
     }

    
?>