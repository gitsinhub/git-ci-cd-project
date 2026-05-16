<?php
include "db.php";

$userId = $_GET['userId'];

$sql = "SELECT * FROM `member` WHERE user_id = '{$userId}'";
$result = $pdo->query($sql);
$user = $result->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo "<script>
	alert('존재하지 않는 회원'); 
	history.back();
	</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>회원가입</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <main class="page">
    <section class="card">
      <h1>회원수정</h1>
      <p class="desc">회원 정보를 수정하세요.</p>

      <form id="editUserForm" action="update_user.php" method="post">
		<input type="hidden" name="oldId" value="<?php echo $user['user_id']; ?>">
	  
        <div class="form-group">
          <label for="userId">아이디</label>
		  <input type="text" id="userId" name="newId" value="<?php echo $user['user_id']; ?>">

        </div>

        <div class="form-group">
          <label for="userName">이름</label>
		  <input type="text" id="userName" name="newName" value="<?php echo $user['user_name']; ?>">
        </div>

        <div class="form-group">
          <label for="userEmail">이메일</label>
          <input type="email" id="userEmail" name="userEmail" value="<?php echo $user['user_email']; ?>">
        </div>

        <div class="form-group">
          <label for="userPw">비밀번호</label>
          <input type="password" id="userPw" name="userPw" placeholder="비밀번호 입력">
        </div>

        <div class="form-group">
          <label for="userPwCheck">비밀번호 확인</label>
          <input type="password" id="userPwCheck" name="userPwCheck" placeholder="비밀번호 다시 입력">
        </div>

        <button class="btn" type="submit">수정하기</button>
      </form>

      <p class="link-text">
        <a href="admin_users.php">돌아가기</a>
      </p>
    </section>
  </main>

  <script src="js/editUser.js"></script>  
</body>
</html>
