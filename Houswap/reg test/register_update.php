<?php
include("./dbconn.php");

$mode = $_POST['mode'];

if($mode != 'insert' && mode != 'modify'){
    echo "<script>alert('mode ���� ����� �Ѿ���� �ʾҽ��ϴ�.');</script>";
    echo "<script>location.replace('./register.php');</script>";
    exit;
}

switch ($mode) {
    case 'insert' :
        $mb_id = trim($_POST['mb_id']);
        $title = "ȸ������";
        break;
    case 'modify' :
        $mb_id = trim($SESSION['ss_mb_id']);
        $title = "ȸ������";
        break;
}

$mb_password = trim($_POST['mb_password']);
$mb_password_re = trim($_POST['mb_password_re']);
$mb_name = trim($_POST['mb_name']);
$mb_email= trim($_POST['mb_email']);
$mb_gender = $_POST['mb_gender'];
$mb_job = $_POST['mb_job'];
$mb_ip = $_SERVER['REMOTE_ADDR'];
$mb_language = implode(",",$_POST['mb_language']);
$mb_datetime = date('Y-m-d H:i:s', time());
$mb_modify_datetime = date('Y-m-d H:i:s', time());

if(!$mb_id){
    echo "<script>alert('���̵� �Ѿ���� �ʾҽ��ϴ�.');</script>";
    echo "<script>location.replace('./register.php');</script>";
    exit;
}

if(!$mb_password){
    echo "<script>alert('��й�ȣ�� �Ѿ���� �ʾҽ��ϴ�.');</script>";
    echo "<script>location.replace('./register.php');</script>";
    exit;
}

if($mb_password != $mb_password_re){
    echo "<script>alert('��й�ȣ�� ��ġ���� �ʽ��ϴ�.');</script>";
    echo "<script>location.replace('./register.php');</script>";
    exit;
}

if(!$mb_name){
    echo "<script>alert('�̸��� �Ѿ���� �ʾҽ��ϴ�.');</script>";
    echo "<script>location.replace('./register.php');</script>";
    exit;
}

if(!$mb_email){
    echo "<script>alert('�̸����� �Ѿ���� �ʾҽ��ϴ�.');</script>";
    echo "<script>location.replace('./register.php');</script>";
    exit;
}

$sql = "SELECT PASSWORD('$mb_password') AS pass";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$mb_password = $row['pass'];

if($mode=="insert"){ #ȸ������ ����
    $sql = "SELECT * FROM member WHERE mb_id='$mb_id'"; #ȸ�������� �õ��ϴ� ���̵� ��������� üũ
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($result)>0){ #������� ���̵��Ͻ� ��¸޽���->ȸ���������������̵�
        echo "<script>alert('�̹� ������� ȸ�����̵� �Դϴ�.');</script>";
        echo "<script>location.replace('./register.php');</script>";
        exit;
    }
    
    $sql = "INSERT INTO member
			SET mb_id = '$mb_id',
				mb_password = '$mb_password',
				mb_name = '$mb_name',
				mb_email = '$mb_email',
				mb_gender = '$mb_gender',
				mb_job = '$mb_job',
				mb_ip = '$mb_id',
				mb_language = '$mb_language',
				mb_datetime = '$mb_datetime' ";
    $result = mysqli_query($conn, $sql);
}

else if($mode=="modify"){ #ȸ����������
    
    $sql = "UPDATE member
				SET mb_password = '$mb_password',
					mb_email = '$mb_email',
					mb_gender = '$mb_gender',
					mb_job = '$mb_job',
					mb_language = '$mb_language',
					mb_modify_datetime = '$mb_modify_datetime'
				WHERE mb_id = '$mb_id' ";
    
    $result = mysqli_query($conn, $sql); }
    
    if($result){
        if($mode == "insert"){ #�ű԰��Խ� ��������
            include_once('./function.php'); #���������� ���� ���� ��Ŭ���
            
            $mb_md5 = md5(pack('V*,rand(),rand(),rand(),rand()')); #��ȸ�� ��������(���������)
            
            $sql="UPDATE member SET mb_email_certify2 = '$mb_md5' WHERE mb_id='$mb_id'";
            
            $result=mysqli_query($conn, $sql);
            mysqli_close($conn);
            
            //���������ּ�
            $certify_href = 'http://localhost/myapp/pt03/email_certify.php?&amp;mb_id='.$mb_id.'&amp;mb_md5='.$mb_md5;
            
            $subject = '����Ȯ�� �����Դϴ�.'; #���� ����
            
            ob_start();
            include_once('./register_update_mail.php');
            $content = ob_get_contents(); #���ϳ���
            ob_end_clean();
            
            $mail_from = "gamejsoft@naver.com";
            $mail_to = $mb_email;
            
            mailer('������', $mail_from, $mail_to, $subject, $content); #���� ����
        }
        echo "<script>alert('".$title."�� �Ϸ�Ǿ����ϴ�.\\n�ű԰����� ��� ���������� �޾�ž� �α����� �����մϴ�.');</script>";
        
        echo "<script>location.replace('./login.php');</script>";
        exit;
    }
    
    else{
        echo "���� ����:".mysqli_error($conn);
        mysqli_close($conn);
    }
    ?>