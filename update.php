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
  
	$id = $_POST["id"];
	$sql = "SELECT * FROM product where id = '$id'";
	$result = mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
	}
	$list_ctg = ["財布・小物入れ", "食卓用" , "その他"];

?>
<header>
	<h1>商品データベース</h1>
</header>
<main id="update">
	<h2>商品の更新</h2>
	<p class="note">商品名と価格は<em>必須入力</em>です。</p>
	<form class="update">
		<table class="form">
			<tr>
				<th>商品ID</th>
				<td>
					<?php echo $row["id"] ?>
					<input type="hidden" name="id" value="<?php echo $row["id"] ?>">
				</td>
			</tr>
			<tr>
				<th>カテゴリ</th>
				<td>
					<select name="category">
					<?php 
						foreach($list_ctg as $ctg){
							if($row["category"] == $ctg){
								echo "<option value='" .  $ctg . "' selected>" .
								 $ctg .  "</option>";
							} else { 
								echo "<option value='" .  $ctg . "'>" .
								 $ctg .  "</option>";
							}
						}	
					?>
					</select>
				</td>
			</tr>
			<tr>
				<th>商品名</th>
				<td><input type="text" name="name" value="<?php echo $row["name"] ?>"></td>
			</tr>
			<tr>
				<th>価格</th>
				<td><input type="number" name="price" value="<?php echo $row["price"] ?>">円</td>
			</tr>
			<tr>
				<th>商品説明</th>
				<td><textarea name="detail" id="" cols="30" rows="3"><?php echo $row["detail"] ?></textarea></td>
			</tr>
			<tr class="buttons">
				<td colspan="2">
					<button formaction="confirm.php" formmethod="post" name="action" value="update">確認画面へ</button>
				</td>
			</tr>
		</table>
	</form>
</main>
<footer>
	<div id="copyright">&copy; 2021 The Applied Course of Web System Development.</div>
</footer>
</body>
</html>
