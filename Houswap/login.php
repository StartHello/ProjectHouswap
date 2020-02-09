<?php include './dbconn.php';?>
<html>
<head>
<title>login</title>
		<link href="./loginpage.css" rel="stylesheet" type="text/css">
</head>

<body>
	<?php if(!isset($_SESSION['ss_login'])) {?>
<!-- 만약 세션로그인이 없는상태면 아래의 로그인창을 띄워줌 -->
<h1><a class="title" href='./mainview.php'>Houswap</a></h1>

<form action="./logincheck.php" method="post">
	<table class="logintable">
		<tr>
			<td>
				<input type="text" style=width:100%;height:100%; placeholder="아이디" name="cs_id">
			</td>
		</tr>
		
		<tr>
			<td>
				<input type="password"  style=width:100%;height:100%; placeholder="비밀번호" name="cs_password">
			</td>
		</tr>
		
		<tr>
			<td>
				<input type="submit" style=width:100%;height:100%; value="로그인" >
			</td>
		</tr>
	</table>
</form>

<hr style="width:300px;"></hr>

<div>
<div class="sginbutton">
	<h5><a id="signupbutton" href='./signup.php'>회원가입</a></h5>
</div>
</div>

<?php } else { ?>
	<?php Header("Location:./mainview.php")?>
<?php } ?>
<!-- header를 이용해 로그인 상태면 자동으로 메인페이지로 이동시킴 -->
</body>
</html>