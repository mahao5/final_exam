<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>商品データベース</title>
	<link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
<header>
	<h1>商品データベース</h1>
</header>
<main id="complete">
	<?php 
		$servername = "localhost";
		$username = "productdb_admin";
		$password = "admin123";
		$dbname = "productdb";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		$sql = $_POST["sql"];
		mysqli_query($conn, $sql);
	?>
	<h2>商品の完了</h2>
	<p>処理を完了しました。</p>
	<p><a href="top.php">トップページに戻る</a></p>
</main>
<footer>
	<div id="copyright">&copy; 2021 The Applied Course of Web System Development.</div>
</footer>
</body>
</html>
