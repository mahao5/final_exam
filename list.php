<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>商品データベース</title>
	<link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
<?php 
	$servername = "localhost";
	$username = "productdb_admin";
	$password = "admin123";
	$dbname = "productdb";
	
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	$sql = "SELECT * FROM product";
	$result = mysqli_query($conn, $sql);
?>
<header>
	<h1>商品データベース</h1>
</header>
<main id="list">
	<h2>商品一覧</h2>
	<table class="list">
		<tr>
			<th>商品ID</th>
			<th>カテゴリ</th>
			<th>商品名</th>
			<th>価格</th>
			<th></th>
		</tr>
<?php 
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)) { 
?>
		<tr>
			<td><?php echo $row['id'] ?></td>
			<td><?php echo $row['category'] ?></td>
			<td><?php echo $row['name'] ?></td>
			<td>&yen;<?php echo $row['price'] ?></td>
			<td class="buttons">
				<form name="inputs">
					<input type="hidden" name="id" value="<?php echo $row['id'] ?>" />
					<button formaction="update.php" formmethod="post" name="action" value="update">更新</button>
					<button formaction="confirm.php" formmethod="post" name="action" value="delete">削除</button>
				</form>
			</td>
		</tr>
<?php			
 		}
	}
?>
	</table>
</main>
<footer>
	<div id="copyright">&copy; 2021 The Applied Course of Web System Development.</div>
</footer>
</body>
</html>
