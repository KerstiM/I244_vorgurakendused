<?php
function connect_db(){
  global $L;
  $host="localhost";
  $user="test";
  $pass="t3st3r123";
  $db="test";
  $L = mysqli_connect($host, $user, $pass, $db) or die("ei saa mootoriga ühendust");
  mysqli_query($L, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($L));
}

function tee_komment($id){
  global $L;
  $content = mysqli_real_escape_string($L, $_POST['content']);
  $sql = "INSERT INTO KM_kommentaarid (postitus_id, content, postedat) VALUES ($id, '$content', NOW() )";
  $result= mysqli_query($L, $sql);
  header("Location: ?page=post&id=$id");
  exit(0);
}


function hangi_kommentaarid(){
	global $L;
	$kommentaarid = array();
	$sql = "SELECT postitus_id, content FROM KM_kommentaarid";
	$result = mysqli_query($L, $sql);
  	return $kommentaarid;
  }

?>
