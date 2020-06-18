<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign in / Sign up</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require_once('connection.php');

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'practice';

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "INSERT INTO users (id, username, email, password, active) VALUES (null, '$username', '$email', '$password', null)";
        $result = $conn->exec($query);

        if ($result) {
            $alertClass = 'alert-success';
            $msg = 'Регистрация прошла успешно<br>';
        } else {
            $alertClass = 'alert-danger';
            $msg = 'Ошибка. Попробуйте еще раз<br>';
        }
    }
} catch (PDOException $e) {
    echo 'Failed: ' . $e->getMessage() . '<br>';
}
?>
<div class="container">
    <form action="" method="POST">
        <div class="form-group">
            <h2>Registration</h2>
            <div class="alert <?php echo $alertClass; ?>"><?php echo $msg; ?></div>
            <input type="text" name="username" class="form-control" placeholder="Username" required>
            <input type="email" name="email" class="form-control" placeholder="Email" required>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button type="submit" class="btn btn-lg btn-primary btn-block">Register</button>
        </div>
    </form>
</div>
</body>
</html>

<?php
