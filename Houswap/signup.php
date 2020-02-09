<?php include './dbconn.php';?>
<html>
<head>
<title>sign up</title>
	<link href="./loginpage.css" rel="stylesheet" type="text/css">
</head>

<body>
<h1><a class="title" href='./mainview.php'>Houswap</a></h1>

<form action="./signupdate.php" onsubmit="return fsignup_submit(this);" method="post">
<!-- onsubmit을 해야하는 이유는 action 하기 전에 정보 입력이 전부 되었는지 체크를 하는것 -->
<!-- onsubit = "return 함수명(함수이름);" 형식으로 사용  -->
	<table class="signuptable">
		<tr>
			<td>아이디
				<input type="text" style=width:100%;height:100%; name="cs_id">
			</td>
		</tr>
		
		<tr>
			<td>비밀번호
				<input type="password" style=width:100%;height:100%; name="cs_password">
			</td>
		</tr>
		
		<tr>
			<td>이름
				<input type="text" style=width:100%;height:100%; name="cs_name">
			</td>
		</tr>
		
		<tr>
			<td>성별
				<select style=width:100%;height:100% name="cs_sex">
					<option value="">성별을 선택하세요</option>
					<option value="남성">남성</option>
					<option value="여성">여성</option>
				</select>
			</td>
		</tr>
		
		<tr>
			<td>이메일
			 <input type="text" style=width:100%;height:100%; name="cs_email">
			</td>
		</tr>
		
		<tr>
			<td>전화번호
				<input type="text" style=width:100%;height:100%; name="cs_phonenum"> 
			</td>
		</tr>
		
		<tr>
			<td>주소
				<input type="text" style=width:100%;height:100%; name="cs_adress">
			</td>
		</tr>	
		<!-- submit button -->
		<tr>
			<td>
				<input class="signup" type="submit" value="회원가입" >
			</td>
		</tr>
	</table>
</form>

<script>
function fsignup_submit(f){
	if (f.cs_id.value.length<1){
		alert("아이디를 입력하세요.");
		f.cs_id.focus(); /*cs_id로 포커스가 가도록 지정 >> 해당 장소로 이동시켜줌*/
		return false;
		}
	if (f.cs_password.value.length<5){
		alert("비밀번호를5글자 이상 입력하세요.");
		f.cs_password.focus();
		return false;
		}	
	if (f.cs_name.value.length<1){
		alert("이름을 입력하세요.");
		f.cs_name.focus();
		return false;
		}
	if (f.cs_sex.value == "" ){
		alert("성별을 선택하세요.");
		f.cs_sex.focus();
		return false;
		}
	if (f.cs_email.value.length<1){
		alert("이메일을 입력하세요.");
		f.cs_email.focus();
		return false;
		}
	if (f.cs_phonenum.value.length<1){
		alert("전화번호를 입력하세요.");
		f.cs_phonenum.focus();
		return false;
		}
	if (f.cs_adress.value.length<1){
		alert("주소를 입력하세요.");
		f.cs_adress.focus();
		return false;
		}
	
	return true;
}
</script>
<!-- 회원가입시 정보 입력 확인 구간 -->
</body>
</html>

