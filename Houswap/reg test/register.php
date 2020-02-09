<?php
include("./dbconn.php");

if(isset($_SESSION['ss_mb_id']) && $GET['mode'] == 'modify'){

    
    
    $mb_id = $_SEESION['ss_mb_id'];
    $sql = " SELECT * FROM member WHERE mb_id = '$mb_id' ";
    $result = mysqli_query($conn, $sql);
    $mb = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    
    $mode = "modify";
    $title = "123";
    $modify_mb_info = "readonly";
}

else {
    $mode = "insert";
    $title = "456";
    $modify_mb_info = '';
}
?>

<html>
<head>
	<title>Register</title>
	<link href="./style.css" rel="stylesheet" type="text/css">
</head>
</html>

<h1><?php echo $title ?></h1>

<form action="./register_update.php" onsubmit="return fregisterform_submit(this);" method="post">
	<input type="hidden" name="mode" value="<?php echo $mode ?>">

	<table>
		<tr>
			<th>id</th>
			<td><input type="text" name="mb_id" value="<?php echo $mb['mb_id'] ?>"<?php echo $modify_mb_info ?>></td>
		</tr>
		<tr>
			<th>pw</th>
			<td><input type="password" name="mb_password"></td>
		</tr>
		<tr>
			<th>pw ch</th>
			<td><input type="password" name="mb_password_re"></td>
		</tr>
		<tr>
			<th>name</th>
			<td><input type="text" name="mb_name" value="<?php echo $mb['mb_name'] ?>"></td>
		</tr>
		<tr>
			<th>email</th>
			<td><input type="text" name="mb_email" value="<?php echo $mb['mb_email'] ?>"></td>
		</tr>
		<tr>
			<th>gender</th>
			<td>
				<label><input type="radio" name="mb_gender" value="����" <?php echo ($mb['mb_gender'] == "����") ? "checked" : ""; ?> > ���� </label>
				<label><input type="radio" name="mb_gender" value="����" <?php echo ($mb['mb_gender'] == "����") ? "checked" : ""; ?> > ���� </label>
			</td>
		</tr>
		<tr>
			<th>job</th>
			<td>
				<select name="mb_job">
					<option value="">�����ϼ���</option>
					<option value="�л�"<?php echo ($mb['mb_job'] == "�л�") ? "selected": ""; ?>>�л�</option>
					<option value="ȸ���"<?php echo ($mb['mb_job'] == "ȸ���") ? "selected": ""; ?>>ȸ���</option>
					<option value="������"<?php echo ($mb['mb_job'] == "������") ? "selected": ""; ?>>������</option>
					<option value="�ֺ�"<?php echo ($mb['mb_job'] == "�ֺ�") ? "selected": ""; ?>>�ֺ�</option>
					<option value="����"<?php echo ($mb['mb_job'] == "����") ? "selected": ""; ?>>����</option>
				</select>
			</td>
		</tr>
		<tr>
			<th>language</th>
			<td>
				<label><input type="checkbox" name="mb_language[]" value="HTML" <?php echo strpos($mb['mb_language'], 'HTML') !== false ? 'checked' : '' ?>>HTML</label>
				<label><input type="checkbox" name="mb_language[]" value="CSS" <?php echo strpos($mb['mb_language'], 'CSS') !== false ? 'checked' : '' ?>>CSS</label>
				<label><input type="checkbox" name="mb_language[]" value="PHP" <?php echo strpos($mb['mb_language'], 'PHP') !== false ? 'checked' : '' ?>>PHP</label>
			</td>
		</tr>
		<tr>
			<td colspan="2" class"td_center"><input type="submit" value="<?php echo $title ?>"> <a href="./login.php">���</a></td>
		</tr>
	</table>
</form>

<script>
function fregister_submit(f) { //submit ���� �� üũ
	
	if (f.mb_id.value.length < 1) //ȸ�����̵� �˻�
	{
		alert("���̵� �Է��Ͻʽÿ�.");
		f.mb_id.focus();
		return false;
	}
	if (f.mb_name.value.length < 1) //�̸� �˻�
	{
		alert("�̸��� �Է��Ͻʽÿ�.");
		f.mb_name.focus();
		return false;
	}
	if (f.mb_password.value.length < 3)
	{
		alert("��й�ȣ�� 3���� �̻� �Է��Ͻÿ�.");
		f.mb_password.focus();
		return false;
	}
	if (f.mb_password.value != f.mb_password_re.value)
	{
		alert("��й�ȣ�� ���� �ʽ��ϴ�.");
		f.mb_password_re.focus();
		return false;
	}
	if (f.mb_password.value.length > 0)
	{
		if (f.mb_password_re.value.length < 3){
		alert("��й�ȣ�� 3���� �̻� �Է��Ͻÿ�.");
		f.mb_password_re.focus();
		return false;
		}
	}
	if (f.mb_email.value.length < 1) //�̸��� �˻�
	{
		alert("�̸����� �Է��Ͻʽÿ�.");
		f.mb_email.focus();
		return false;
	}
	if (f.mb_email.value.length > 0) //�̸��� ���� �˻�
	{
		var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;
		if (f.mb_email.value.match(regExp) == null){
				alert("�̸��� �ּҰ� ���Ŀ� ���� �ʽ��ϴ�.");
				f.mb_email.focus();
				return false;
		}
	}

 return true;

}
</script>

</body>
</html>