<!DOCTYPE html>
<html>
<head>
	<title>Your TITLE</title>
	<!--This will take you to main page.(아래 코드는 메인 페이지로 바로 넘어가는 기능을 수행합니다.-->
	<!--If you want to change this rule, you can modify the url. 으아ㅏ 역시 영어는 어려워
      만약 당신이 메인 페이지로 가고 싶지 않다면 url값을 수정하십시오. -->
	<meta charset="UTF-8" http-equiv="refresh" content="0;url=/">
</head>
<body>
<?php 
  //id 와 pw(password) 값을 전 페이지로 부터 받아옵니다. 
  //get the values of id, and pw.
	$id = $_POST['id'];
	$pw = $_POST['pw'];

  //php상에서 MySQL과 연결합니다. 
  //Connect to local MySQL server.
	$mysqli = new mysqli('localhost', '[db_user]', '[db_user_password]', '[db_name]');
	
	//id와 pw값이 일치하면 테이블의 모든 값을 가져와라.
	//if id and password are correct, it will bring all values from MySQL server.
	$sql = "SELECT * FROM [table] WHERE id='$id' and pw='$pw'";
  
  //만약 쿼리에 문제가 생겼다면, 문제 코드를 출력합니다. 
  //if there are some troubles in mysql query, print the code of errors.
	if(!$result = $mysqli->query($sql)) {
		echo "죄송합니다. 서버에 문제가 생겼습니다. 최대한 빨리 수정하도록 하겠습니다. <br>"; 
		echo "오류난 이유는 다음과 같습니다. <br>";
		echo "에러 넘버 : " . $mysqli->errno . "\n";
		echo "에러 코드 : " . $mysqli->error . "\n";

		exit;
	}
	
	//DB에 쿼리한 결과를 $row에 저장합니다.
	//Storing the result of query.
	$row = $result->fetch_array(MYSQLI_BOTH);

  //DB에서 가져온 값들을 세션으로 올립니다. 
  //The value from MySQL will be $_SESSION.
	$_SESSION['id'] = $row['id'];
	$_SESSION['pw'] = $row['pw'];
	$_SESSION['nick'] = $row['nick'];
	$_SESSION['name'] = $row['name'];

	$result->free();
	$mysqli->close();

?>

</body>
</html>
