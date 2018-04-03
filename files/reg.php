<meta charset="utf-8">
<html>
<head>
<title>Регистрация</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<h2>Регистрация</h2>
<form action="save_user.php" method="post">
<!--**** save_user.php - это адрес обработчика. То есть, после нажатия на кнопку "Зарегистрироваться", данные из полей отправятся на страничку save_user.php методом "post" ***** -->
  <p>
    <label>Логин:*<br></label>
    <input name="login" type="text" size="15" maxlength="15">
  </p>
<!--**** В текстовое поле (name="login" type="text") пользователь вводит свой логин***** -->  
  <p>
    <label>Пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15">
  </p>
<!--**** В поле для паролей (name="password" type="password") пользователь вводит свой пароль***** -->  
<p>
<input type="submit" name="submit" value="Регистрация">
<!--**** Кнопочка (type="submit") отправляет данные на страничку save_user.php ***** -->  
</p></form>
</body>
</html>
