<?php
include("./dbconn.php");
?>

<html>
<head>
	<title>Login</title>
	<link href="./style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php if(!isset($_SESSION['ss_mb_id'])) { ?>

<h1>login</h1>

	<form action="./login_check.php" method="post">
		<table>
			<tr>
				<th>id</th>
				<td><input type="text" name="mb_id"></td>
			</tr>
			<tr>
				<th>pw</th>
				<td><input type="password" name="mb_password"></td>
			</tr>
			<tr>
				<td colspan="2" class="td_center">
					<input type="submit" value="login">
					<a href="./register.php">sign up</a>
				</td>
			</tr>
		</table>
	</form>

<?php } else { ?>

<h1>�α����� ȯ���մϴ�.</h1>

	<?php
		$mb_id = $_SESSION['ss_mb_id'];

	$sql = "select * from member where mb_id = TRIM('$mb_id')";
	$result = mysqli_query($conn, $sql);
	$mb = mysqli_fetch_assoc($result);

	mysqli_close($conn);
	?>
	<table>
		<tr>
			<th>id</th>
			<td><?php echo $mb['mb_id'] ?></td>
		</tr>
		<tr>
			<th>�̸�</th>
			<td><?php echo $mb['mb_name'] ?></td>
		</tr>
		<tr>
			<th>�̸���</th>
			<td><?php echo $mb['mb_email'] ?></td>
		</tr>
		<tr>
			<th>����</th>
			<td><?php echo $mb['mb_gender'] ?></td>
		</tr>
		<tr>
			<th>����</th>
			<td><?php echo $mb['mb_job'] ?></td>
		</tr>
		<tr>
			<th>���ɾ��</th>
			<td><?php echo $mb['mb_language'] ?></td>
		</tr>
		<tr>
			<th>�̸���������</th>
			<td><?php echo $mb['mb_email_certify'] ?></td>
		</tr>
		<tr>
			<th>ȸ��������</th>
			<td><?php echo $mb['mb_datetime'] ?></td>
		</tr>
		<tr>
			<th>ȸ������������</th>
			<td><?php echo $mb['mb_modify_datetime'] ?></td>
		</tr>
		<tr>
			<td colspan="2" class="td_center">
				<a href="./register.php?mode=modify">ȸ����������</a>
				<a href="./logout.php">�α׾ƿ�</a>
			</td>
		</tr>
	</table>

<?php } ?>

</body>
</html>