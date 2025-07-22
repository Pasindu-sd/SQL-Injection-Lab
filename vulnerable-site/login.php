<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'db.php';

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $message = "<span class='success'>Login Successful!</span>";
    } else {
        $message = "<span class='error'>Invalid Credentials</span>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>SQL Injection Lab - Login</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background: #f0f4f8;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  .container {
    background: white;
    padding: 30px 40px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0,0,0,0.2);
    width: 350px;
  }
  h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #333;
  }
  input[type="text"], input[type="password"] {
    width: 100%;
    padding: 12px 15px;
    margin: 8px 0 20px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
  }
  input[type="submit"] {
    width: 100%;
    background-color: #007bff;
    color: white;
    padding: 12px 0;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
  }
  input[type="submit"]:hover {
    background-color: #0056b3;
  }
  .message {
    text-align: center;
    margin-bottom: 15px;
    font-weight: bold;
  }
  .success {
    color: green;
  }
  .error {
    color: red;
  }
</style>
</head>
<body>

<div class="container">
  <h2>SQL Injection Lab Login</h2>
  
  <?php if($message): ?>
    <div class="message"><?= $message ?></div>
  <?php endif; ?>

  <form method="POST" action="login.php">
    <input type="text" name="username" placeholder="Username" required autocomplete="off" />
    <input type="password" name="password" placeholder="Password" required autocomplete="off" />
    <input type="submit" value="Login" />
  </form>
</div>

</body>
</html>
