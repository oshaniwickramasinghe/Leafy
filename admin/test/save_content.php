<?php
	require_once '../connect.php';
 
	if(ISSET($_POST['save'])){
		$title = addslashes($_POST['title']);
		$content = addslashes($_POST['content']);
 
		mysqli_query($conn, "INSERT INTO `blog` VALUES('', '$title', '$content')") ;
 
		header('location: index.php');
 
	}
?>