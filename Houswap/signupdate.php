<?php include("./dbconn.php");

#----------sign up source--------------

#check for user presence
$check_sql = "SELECT * FROM customer WHERE c_id='$c_id'";

#id ���翩�θ� DB�� ���� üũ
$check_num = mysqli_query($conn, $check_sql);
if(mysqli_num_rows($check_num)>0)
{
    echo "�����ϴ� ���̵��Դϴ�.";
    exit;
}

#Signup.php���� form�� �ޱ�
$c_id= trim(_POST['c_id']);
$c_password= trim(_POST['c_password']);
$c_name= trim(_POST['c_name']);
$c_sex= trim(_POST['c_sex']);
$c_email= trim(_POST['c_email']);
$c_phonenum= trim(_POST['c_phonenum']);
$c_adress= trim(_POST['c_adress']);

#Empty Error Message
if(!$c_id){ echo "���̵� �Է����ּ���.";}
else if($c_id>5||$c_id<13){ echo"���̵�� 5~12�� �̳������մϴ�.";}
if(!$c_password){ echo "��й�ȣ�� �Է����ּ���.";}
else if(!$c_name){ echo "�̸��� �Է����ּ���.";}
else if(!$c_sex){ echo "������ �������ּ���.";}
else if(!$c_email){ echo "�̸����� �Է����ּ���.";}
else if(!$c_phonenum){ echo "�޴�����ȣ�� �Է����ּ���.";}
else if(!$c_adress){ echo "�ּҸ� �Է����ּ���.";}


#insert query
$insert_q="INSERT INTO customer
           SET c_id='$c_id',
               c_password='$c_password'";

?>