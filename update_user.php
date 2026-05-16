<?php
	include "db.php";

	$oldId = $_POST['oldId'];
	$newId = $_POST['newId'];
	$userName = $_POST['newName']; 
	$userEmail = $_POST['userEmail'];
	$userPw = $_POST['userPw'];


	if ($oldId !== $newId) {
    $checkSql = "SELECT COUNT(*) FROM `member` WHERE user_id = '{$newId}'";
    $result = $pdo->query($checkSql);
    $count = $result->fetchColumn();

    if ($count > 0) {
        echo "<script>
                alert('아이디 중복');
                history.back(); 
              </script>";
        exit; 
    }
}

	$sql = "UPDATE `member` SET 
			user_id = '{$newId}', 
			user_name = '{$userName}', 
			user_email = '{$userEmail}', 
			user_pw = '{$userPw}' 
			WHERE user_id = '{$oldId}'";

	$result = $pdo->exec($sql);

	if ($result !== false) {
		echo "<script>
				alert('회원 정보가 수정되었습니다.');
				location.replace('./admin_users.php');
			</script>";
	}

?>
