<?php
session_start();

?>
<!DOCTYPE html>
<html>
<?php require_once 'template/head.php'; ?>
<body>
<!-- main -->
<div class="w3layouts-main">
    <a class="logout" href="profileView.php">Return to the profile</a>
    <h1>Change full name</h1>
    <div class="agilesign-form">
        <div class="agileits-top">
            <form autocomplete="off" action="../controllers/changeUserFullNameController.php" method="post">

                <div class="styled-input w3ls-text">
                    <input type="password" name="password" placeholder="Enter your password">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['passwordError']) {
                            echo $_SESSION['passwordError'];
                        }
                        unset($_SESSION['passwordError']);
                        ?>
                    </small>
                    <label>Password</label>
                    <span></span>
                </div>

                <div class="styled-input w3ls-text">
                    <input type="text" name="new_full_name" placeholder="Enter new full name">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['fullNameError']) {
                            echo $_SESSION['fullNameError'];
                        }
                        unset($_SESSION['fullNameError']);
                        ?>
                    </small>
                    <label>New Full Name</label>
                    <span></span>
                </div>

                <div class="agileits-bottom">
                    <input type="submit" value="Change">
                </div>

            </form>
        </div>
        <?php
        if ($_SESSION['message_change_fn']) {
            echo '<p class="msg"> ' . $_SESSION['message_change_fn'] . ' </p>';
        }
        unset($_SESSION['message_change_fn']);
        ?>
    </div>

    <h1>Change password</h1>
    <div class="agilesign-form">
        <div class="agileits-top">
            <form autocomplete="off" action="../controllers/changeUserPasswordController.php" method="post">

                <div class="styled-input w3ls-text">
                    <input type="password" name="password" placeholder="Enter your password">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['passwordError']) {
                            echo $_SESSION['passwordError'];
                        }
                        unset($_SESSION['passwordError']);
                        ?>
                    </small>
                    <label>Password</label>
                    <span></span>
                </div>

                <div class="styled-input w3ls-text">
                    <input type="password" name="new_password" placeholder="Enter new password">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['newPasswordError']) {
                            echo $_SESSION['newPasswordError'];
                        }
                        unset($_SESSION['newPasswordError']);
                        ?>
                    </small>
                    <label>New Password</label>
                    <span></span>
                </div>
                <div class="styled-input w3ls-text">
                    <input type="password" name="new_password_confirm" placeholder="Confirm new password">
                    <small class="text-danger">
                        <?php
                        if ($_SESSION['passwordConfirmError']) {
                            echo $_SESSION['passwordConfirmError'];
                        }
                        unset($_SESSION['passwordConfirmError']);
                        ?>
                    </small>
                    <label>Confirm New Password</label>
                    <span></span>
                </div>

                <div class="agileits-bottom">
                    <input type="submit" value="Change">
                </div>

            </form>
        </div>
        <?php
        if ($_SESSION['message_change_pass']) {
            echo '<p class="msg"> ' . $_SESSION['message_change_pass'] . ' </p>';
        }
        unset($_SESSION['message_change_pass']);
        ?>
    </div>
</body>
</html>