
# QuickFire 🔥

A Light-weight Project to attempt Quiz based on php.





## Layout

- Login Page
- SignUp Page
- Dashboard 
- Quiz Booth
- Quiz Summary


## Web Page Preview  

https://github.com/adityapai1/QuickFire/assets/105188352/5901fd42-6142-4d7e-8c67-d6d48cba5a93






# Features

##Localization : 

```php
<?php date_default_timezone_set('Asia/Kolkata'); echo date('H:i:s'). " IST"; ?>
```


##Email Handling : 

```php
$mail->setFrom('paiaditya250@gmail.com', 'QuizMaster');
$mail->addAddress($email, $name); //Add a recipient

$mail->isHTML(true); //Set email format to HTML
$mail->Subject = "Hey ".$name . ",your Test Score is...";
```


##Connect PHP to MYSQL: 

```php
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "quiz_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}?>
```

##Session Handling : 

```php
<?php
require_once("connect.php");
session_start();
session_destroy();

header("Location: index.php");
exit();
?>
```

##Array Handling : 

```php
    $name = $_SESSION['login_active'][0];
    $email = $_SESSION['login_active'][1];
```


##String Handling : 

```php
function santize($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

```


