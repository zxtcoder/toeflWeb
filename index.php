<html>
<head>
<meta http-equiv="Content-Type" content="text/html"; charset=utf-8" />
<title>Fight for TOEFL!!!</title>
<?php
  $pwd=$_POST["pwd"];
  if($pwd=="wecandoit"){
    header("Location: cal.php");
  }
?>

</head>

<body>
Password:<br>
<form action="index.php" method="POST">
<input name="pwd" type="password"></input>
<input value=" OK " type="submit"></input>
</form>

</body>

</html>
