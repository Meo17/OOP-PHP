<?php 

    include('db_con.php');
    session_start();

    // var_dump($_POST['content']);
    // die;

    if(!empty($_POST['title']) && !empty($_POST['content'])) {

        $title   = trim($_POST['title']);
        $content = trim( $_POST['content']);
        $date    = date('Y-m-d H:i:s');
       addNewArticle($title,$content,$date);
       return "true";
    } else {
        return "false";
    }
?>