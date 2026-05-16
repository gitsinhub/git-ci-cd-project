<?php
	include "db.php";
	// 변수 선언
	// C, C#, JAVA 언어
	// 자료형 변수이름;
	// int a;
	// float f;
	
	// php 자료형 없이 변수 선언
	$id = $_POST['loginId'];
	$pw = $_POST['loginPw'];

	$sql = "SELECT * FROM `member` WHERE user_id = '{$id}' AND user_pw = '{$pw}'";
	
	$result = $pdo->query($sql);
    $user = $result->fetch();

    if ($user) {
        echo "<script>
			location.replace('./admin_users.php');
        </script>";
    } else {
        echo "<script>
            alert('아이디 비밀번호 틀림');
            location.replace('./login.html'); 
        </script>";
    }
	
?>