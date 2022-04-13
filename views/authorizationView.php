<?php
session_start();

if ($_SESSION['user']) {
    header('Location: profileView.php');
}

?>

<!DOCTYPE html>
<html>
<?php require_once 'template/head.php'; ?>
<body>
<!-- main -->
<div class="w3layouts-main">
    <h1>Sign in Form</h1>
    <div class="agilesign-form">
        <div class="agileits-top">
            <form autocomplete="off" action="../controllers/signinController.php" method="post">
                <div class="styled-input w3ls-text">
                    <input type="text" name="login" required=""/>
                    <label>Login</label>
                    <span></span>
                </div>
                <div class="styled-input w3ls-text">
                    <input type="password" name="password" required="">
                    <label>Password</label>
                    <span></span>
                </div>

                <div class="agileits-bottom">
                    <input type="submit" value="Sign In">
                </div>
            </form>
        </div>

        <?php
        if ($_SESSION['message']) {
            echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
        }
        unset($_SESSION['message']);
        ?>
    </div>

    <h1>Signup Form</h1>
    <div class="agilesign-form">
        <div class="agileits-top">
            <form autocomplete="off" action="../controllers/signupController.php" method="post">

                <div class="styled-input ">
                    <input type="text" name="full_name" placeholder="Enter your full name"
                           value="<?php echo $_SESSION['full_name'] ?>">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['fullNameError']) {
                            echo $_SESSION['fullNameError'];
                        }
                        unset($_SESSION['fullNameError']);
                        ?>
                    </small>

                    <label>Full name</label>
                    <span></span>
                </div>

                <div class="styled-input ">
                    <input type="text" name="login" placeholder="Enter your login"
                           value="<?php echo $_SESSION['login'] ?>">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['loginError']) {
                            echo $_SESSION['loginError'];
                        }
                        unset($_SESSION['loginError']);
                        ?>
                    </small>

                    <label>Login</label>
                    <span></span>
                </div>
                <div class="styled-input w3ls-text">
                    <input type="text" name="email" placeholder="Enter your email address"
                           value="<?php echo $_SESSION['email'] ?>">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['emailError']) {
                            echo $_SESSION['emailError'];
                        }
                        unset($_SESSION['emailError']);
                        ?>
                    </small>
                    <label>Email</label>
                    <span></span>
                </div>
                <div class="styled-input w3ls-text">
                    <input type="password" name="password" placeholder="Enter password">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['newPasswordError']) {
                            echo $_SESSION['newPasswordError'];
                        }
                        unset($_SESSION['newPasswordError']);
                        ?>
                    </small>
                    <label>Password</label>
                    <span></span>
                </div>
                <div class="styled-input w3ls-text">
                    <input type="password" name="password_confirm" placeholder="Confirm your password">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['passwordConfirmError']) {
                            echo $_SESSION['passwordConfirmError'];
                        }
                        unset($_SESSION['passwordConfirmError']);
                        ?>
                    </small>
                    <label>Confirm Password</label>
                    <span></span>
                </div>

                <div class="agileits-bottom">
                    <input type="submit" value="Sign Up">
                </div>

            </form>
        </div>

    </div>
</div>

</body>
</html>