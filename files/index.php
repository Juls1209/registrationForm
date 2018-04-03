<meta charset="utf-8">
<?php
session_start();
?>
<html>
<head>
<title>Форма регистрации</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2>Вход</h2>
<form action="testreg.php" method="post">
  <p>
    <label>Логин:<br></label>
    <input name="login" type="text" size="15" maxlength="15">
  </p> 
  <p>
    <label>Пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
  </p>
<p>
<input type="submit" name="submit" value="Вход">
<br>
<a href="reg.php">Регистрация</a> 
</p></form>
<br>

<?php
if (empty($_SESSION['Login']) or empty($_SESSION['Password']))
{
echo "Вы вошли на сайт, как гость<br><a href='#'>Эта ссылка доступна только зарегистрированным пользователям</a>";
}
else
   {
    echo "Вы вошли на сайт как ".$_SESSION['Login']."<br><a href='http://tvpavlovsk.sk6.ru/'>Эта ссылка доступна только зарегистрированным пользователям</a>";
   }
?>
</body>
</html>
