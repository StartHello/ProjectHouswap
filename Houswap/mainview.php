<?php 
    include './dbconn.php';
?>

<html>
	<head>
		<title>하우스왑</title>
		<link href="./mainpage.css" rel="stylesheet" type="text/css">
	</head>

<body>
<?php if(!isset($_SESSION['ss_login'])) {?>
		<h3><a href="./login.php">로그인</a>&nbsp&nbsp<a href="./signup.php">회원가입</a></h3>
<?php } else { ?>
	<h3><a href="./signupdate.php">마이페이지</a></h3>
<?php } ?>
<!-- 만약 세션이 없다면 로그인, 회원가입 링크를 출력하고 연결중이라면 마이페이지(signupdate) 하이퍼링크를 출력 -->		

	<div>
	<h1> &nbsp&nbsp Houswap &nbsp&nbsp
		<input type="text" placeholder="search">
		<input type="submit" value="검색">
		<!-- 그냥 버튼에서 submit으로 변경 + css 추가 -->
	</h1>
	</div>
		<h4>최근 올라온 상품</h4>
	<hr>
	<br>
		<table>
		<tr>
			<td>
			<?php echo"<img src='images/1111.jpg'
			width =400 height=400>";?></td>
			<td><img src='images/1111.jpg'
			width =400 height=400></td>
			<td><img src='images/1111.jpg'
			width =400 height=400></td>
			<td><img src='images/1111.jpg'
			width =400 height=400></td>
			<td><img src='images/1111.jpg'
			width =400 height=400></td>
		</tr>
		
		<tr align=center>
			<td>1</td>
			<td>2</td>
			<td>3</td>
			<td>4</td>
			<td>5</td>
		</tr>
		</table>
		
</body>
</html>

