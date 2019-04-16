<?php
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' ) {
    header('location: index.php');
    exit;
}

if ( $_POST['type'] === 'login' ) {

    $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
    $passwordAttempt = !empty($_POST['password']) ? trim($_POST['password']) : null;

    $sql = "SELECT id, username, password FROM users  WHERE username = :username";
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':username', $username);

    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if($user === false){


        die('Incorrect username / password combination!');
    } else{

        $validPassword = password_verify($passwordAttempt, $user['password']);

        if($validPassword){

            $_SESSION['id'] = $user['id'];
            $_SESSION['logged_in'] = time();

            header('Location: index.php');
            exit;

        } else{

            die('Incorrect username / password combination!');
        }
    }
}

if ($_POST['type'] === 'register') {

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordConfirm= $_POST['passwordConfirm'];

    try {
        $conn = new PDO("mysql:host=$dbHost;dbname=$dbName", $dbUser, $dbPass);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        exit($e->getMessage());
    }

    if (isset($_POST['submit'])) {

        try {
            $stmt = $conn->prepare('SELECT email FROM users WHERE email = ?');
            $stmt->bindParam(1, $_POST['email']);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            }
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        if ($stmt->rowCount() > 0) {
            echo "Email exists already";
        } else {
            echo "email doesn't exist yet";
        }


    }
    if (isset($_POST['submit'])) {

        try {
            $stmt = $conn->prepare('SELECT username FROM users WHERE username = ?');
            $stmt->bindParam(1, $_POST['username']);
            $stmt->execute();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            }
        } catch (PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
        }

        if ($stmt->rowCount() > 0) {
            echo "username exists already";
        } else {
            echo "username doesn't exist yet";
        }

    }

    if (trim($_POST['password']) == '' || trim($_POST['passwordConfirm']) == '') {
        echo('All fields are required!');
    } else if ($_POST['password'] != $_POST['passwordConfirm']) {
        echo('Passwords do not match!');
    } else if ($_POST['password'] == $_POST['passwordConfirm']) {
        $errors = array();
        if (strlen($password) < 7 || strlen($password) > 16) {
            $errors[] = "Password should be min 7 characters and max 16 characters";
        }
        if (!preg_match("/\d/", $password)) {
            $errors[] = "Password should contain at least one digit";
        }
        if (!preg_match("/[A-Z]/", $password)) {
            $errors[] = "Password should contain at least one Capital Letter";
        }
        if (!preg_match("/[a-z]/", $password)) {
            $errors[] = "Password should contain at least one small Letter";
        }

        if ($errors) {
            foreach ($errors as $error) {
                echo $error . "\n";
            }
            die();
        } else {
            header('location: login.php');
        }
        $passwordHash = password_hash($password, PASSWORD_BCRYPT, array("cost" => 12));

        $sql = "INSERT INTO users (firstname, lastname, username, email, password) 
                     VALUES (:firstname, :lastname, :username, :email, :password)";
        $prepare = $db->prepare($sql);
        $prepare->execute([
            ':firstname'     => $firstname,
            ':lastname'      => $lastname,
            ':email'         => $email,
            ':username'      => $username,
            ':password'      => $passwordHash
        ]);
    }
}
exit;





