<?php require 'header.php'; ?>
    <div class="login-wrapper">

        <div class="login-div">
            <h1>Welkom!</h1>
            <form action="loginController.php" class="login-form" method="post">
                <input type="hidden" name="type" value="login0">
                <input type="text" placeholder="Gebruikersnaam" name="username" id="username">
                <input type="text" placeholder="Wachtwoord" name="password" id="password">
                <input type="submit" value="Login" id="login-button" >
            </form>
            <p>Wachtwoord vergeten? <a href="forget.php">Klik Hier!</a></p>
            <p>Nog geen account? <a href="register.php">Klik Hier!</a></p>
        </div>

    </div>
<?php require 'footer.php'; ?>