<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8" />
		<title>KOMMENTAARIDE LISAMINE ANDMEBAASI</title>
	</head>

	<body>
    <h1>KOMMENTAARIDE LISAMINE ANDMEBAASI</h1>

    <form action="?page=komm" method="POST">
        <input type="text" placeholder="pealkiri" name="title" value="<?php if (!empty($_POST['title'])) echo htmlspecialchars($_POST['title']);?>"/><br/>
            <textarea name="content" rows="10" cols="60"><?php if (!empty($_POST['content'])) echo htmlspecialchars($_POST['content']);?></textarea><br/>
        <input type="submit" value="Postita"/>
    </form>

<?php

$user = "test"; //kasutajanimi phpmyadminnis
$pass = "t3st3r123"; //parool phpmyadminnis
$db = "test"; //andmebaasinmi on test phpmyadminnis
$host = "localhost"; //salvestame enose kettale -> serveri hosti aadressiks on localhost

//or: kui parempoolne ei käivitu, siis on vasakpoolne ja annab veateate
$link = mysqli_connect($host, $user, $pass, $db) or die("ei saa mootoriga ühendust");
mysqli_query($link, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($link));


$sql = "INSERT INTO KM_kommentaarid (postitus_id, content, postedat) VALUES ($id, '$content', NOW() )";

$sql = "SELECT postitus_id, content FROM KM_kommentaarid";

$result = mysqli_query($link, $sql) or die ( $sql. " - ". mysqli_error($link));

if (!empty($result)) {
	echo "Sain ridu!";
}
echo "<pre>";
print_r(mysqli_fetch_array($result));
echo "</pre>";
echo "<pre>";
print_r(mysqli_fetch_assoc($result));
echo "</pre>";
?>

</body>
</html>
