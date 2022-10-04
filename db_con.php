<?php
function db() {
   	return new PDO("mysql:host=localhost; dbname=bulletin_board;", "root","");
}

function addNewArticle($title,$content,$created) {
 	$db = db();
	$sql = "INSERT INTO article (title,content,created_date) VALUES(?,?,?)";
	$s = $db->prepare($sql);
	$s->execute(array($title,$content,$created));
	$db = null;
}

function retArticle() {
    $db = db();
    $sql ="Select * from article";
    $s = $db->query($sql);
	$ret = $s->fetchAll();
	$db = null;
	return $ret;
}

function delete($id){
    $db = db();
    $sql = "Delete from article  where id = ?";
	$s = $db->prepare($sql);
	$s->execute(array($id));
	$db = null;
}

function update($title,$content) {
    $db = db();
	$sql = "Update (title,content) from article VALUES(?,?)";
	$s = $db->prepare($sql);
	$s->execute(array($title,$content));
	$db = null;
}

?>