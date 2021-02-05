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

		$sql = "SELECT id FROM product ORDER BY id DESC LIMIT 1";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
		  while($row = mysqli_fetch_assoc($result)) {
			$last_id = $row['id'] + 1;
		  }
		} else {
			$last_id = 1;
		}

		if(isset($_POST['category'])) $category = $_POST['category'];
		if(isset($_POST['name'])) $name = $_POST['name'];
		if(isset($_POST['price'])) $price = $_POST['price'];
		if(isset($_POST['detail'])) $detail = $_POST['detail'];
			
		if(isset($_POST["action"])){
			if($_POST["action"] == "entry") {
				$id = $last_id;
				$sql = "INSERT INTO product (id, name, price, category, detail) 
				VALUES('$id', '$name', '$price', '$category', '$detail')";
			}
			else if($_POST["action"] == "update"){
				$id = $_POST["id"];
				$sql = "UPDATE product SET name = '$name', price = '$price', category = '$category', detail = '$detail' WHERE id = '$id'";
			}
			else if($_POST["action"] == "delete"){
				$id = $_POST["id"];
				$product = "SELECT * FROM product WHERE id = '$id'";
				$result = mysqli_query($conn,$product);
				if(mysqli_num_rows($result) > 0){
					$row = mysqli_fetch_assoc($result);
					$category = $row['category'];
					$name = $row['name'];
					$price = $row['price'];
					$detail = $row['detail'];
				}
				$sql = "DELETE FROM product WHERE id = '$id'";
			}
			else;
		}
		

	?>
<header>
	<h1>商品データベース</h1>
</header>
<main id="confirm">
	<h2>商品の確認</h2>
	<p>以下の情報で更新します。</p>
	<table class="form">
		<tr>
			<th>商品ID</th>
			<td><?php echo $id ?></td>
		</tr>
		<tr>
			<th>カテゴリ</th>
			<td><?php echo $category ?></td>
		</tr>
		<tr>
			<th>商品名</th>
			<td><?php echo $name ?></td>
		</tr>
		<tr>
			<th>価格</th>
			<td><?php echo $price ?></td>
		</tr>
		<tr>
			<th>商品説明</th>
			<td><?php echo $detail ?></td>
		</tr>
		<tr class="buttons">
			<td colspan="2">
				<form name="inputs">
					<button formaction="complete.php" formmethod="post" name="action" value="execute">実行する</button>
					<input type="hidden" name="sql" value="<?php echo $sql ?>">
				</form>
			</td>
		</tr>
	</table>
</main>
<footer>
	<div id="copyright">&copy; 2021 The Applied Course of Web System Development.</div>
</footer>
</body>
</html>
