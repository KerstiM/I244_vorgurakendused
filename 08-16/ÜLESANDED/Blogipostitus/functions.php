<?php
ini_set("display_errors", 1);

function tee_kommentaar($id) {
	global $conn;
	if (!empty($_POST)){
		if (empty($_POST['content'])){
			$errors[] = "Kommentaari sisu ei saa olla tühi";
		} else {
			//tekitame kommentaari
			$cont = mysqli_real_escape_string($conn, $_POST['content']);
			$uid = mysqli_real_escape_string($conn, $_SESSION['user']['id']);

			$sql = "INSERT INTO mb_kommentaarid (kasutaja_id, postitus_id, sisu, aeg) VALUES
					 ($uid, $id, '$cont', NOW() )";
			$res = mysqli_query($conn, $sql);
			if ($res) {
				$_SESSION["teade"] = "Kommenteerimine õnnestus!";
			} else {
				$_SESSION["teade"] = "Kommenteerimine ebaõnnestus!";
			}
			header("Location: ?mode=post&id=$id");
			exit(0);
		}
	}
}
function hangi_kommentaarid($id){
	global $conn;
	$kommid = array();
	$sql = "SELECT c.*, k.nimi as kommenteerija FROM mb_kommentaarid c, mb_kasutajad k
	WHERE postitus_id=$id AND k.id=c.kasutaja_id";
	$result = mysqli_query($conn, $sql);
	while($r = mysqli_fetch_assoc($result)){
		$kommid[] = $r;
	}
	return $kommid;


}

?>
