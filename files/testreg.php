<meta charset="utf-8">
<?php
session_start();// вся процедура работает на сессиях. Именно в ней хранятся данные пользователя, пока он находится на сайте. Очень важно запустить их в самом начале странички!!!

if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
exit ("Необходимо ввести логин и пароль!");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);


// подключаемся к базе
include ("bd.php");//файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь



$result = mysqli_query($db, "SELECT * FROM userstable WHERE Login='".$login."'"); //извлекаем из базы все данные о пользователе с введенным логином
if(!$result){
  printf("Error: %s\n", mysqli_error($db));
  exit();
}
$myrow = mysqli_fetch_array($result);

if (empty($myrow['Password']))
{
//если пользователя с введенным логином не существует
exit ("Извините, введённый вами логин или пароль неверный.");
}
else {
//если существует, то сверяем пароли
          if ($myrow['Password']==$password) {
          //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
          $_SESSION['Login']=$myrow['Login']; 
          $_SESSION['Password']=$myrow['Password'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
          echo "Добро пожаловать! <a href='index.php'>Главная страница</a>";
          }

       else {
       //если пароли не сошлись
       exit ("Извините, введённый вами логин или пароль неверный.");
	   }
}
?>