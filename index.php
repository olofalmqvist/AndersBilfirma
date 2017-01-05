<?php include 'includes/overall/header.php';
include 'core/init.php';

if (logged_in()) {
    echo '<script type="text/javascript">window.location = "guestbook.php"</script>'; 
    exit(); 
}

if (empty($_POST['loginBtn']) === false) {
    $email = $_POST['email'];
    $password =  $_POST['password'];
    if (empty($email) || empty($password)) {
        $errors[] = 'You need to enter email and password'; }
    
    else if (user_exists($email) === false) {
        $errors[] = 'That email is not registred'; }
        
    else {
        $password = encrypt_password($email, $password);
        $login = login($email, $password);
        if ($login === false) {
            $errors[] = 'That username/password combination is incorrect'; }
        else {
            $_SESSION['user_id'] = $login;
            echo '<script type="text/javascript">window.location = "guestbook.php"</script>';
            exit();
            }
    }   
}?>

<h1>ELIAS GUESTBOOK</h1>
<div id="loginForm">
<form action="" id="login" method="post">
    <button class="active" type="reset">LOGIN</button><button class="disabled" type="reset" onclick="window.location.href='register.php'">SIGN UP</button>
    <p>Enter your email and password to sign in</p>
    <?php echo output_errors($errors); ?>
    <ul>
        <li>
            <input type="text" name="email" placeholder="Email" <input  type=text name=email placeholder="* Email" data-rule-required="true" data-msg-required="Please insert email" data-rule-email="true" data-msg-email="Invalid email">
        </li>
        <li>
            <input type="password" name="password" placeholder="Password" data-rule-required="true" data-msg-required="Please insert password" data-rule-minlength="6" data-msg-minlength="Password has to be at least 6 characters">
        </li>
        <li>
            <input type="submit" value="LOG IN" class="btn" name=loginBtn>
        </li>
    </ul>
</form>
</div>

<script type="text/javascript">
$( "#login" ).validate({
  });
</script>

<?php include 'includes/overall/footer.php';?>   