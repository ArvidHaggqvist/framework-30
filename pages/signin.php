<?php include_once "../includes/connection.php";  ?>
<head>
    <meta charset="UTF-8" />
    <title>Sign in</title>
</head>

<?php
    if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username'])):
?>

        <?= $_SESSION['Username'] ?>
 
        <p>You are currently <strong>logged in.</strong></p>
        <p><a href="../actions/logout.php">Log out</a> or <a href="../index.php">Go to the home page</a></p>

<?php
    elseif(!empty($_POST['username']) && !empty($_POST['password'])):
        include_once '../includes/trait.crud.php';
        include_once '../classes/class.users.php';
        $users = new User($db);
        if($users->accountLogin()===TRUE):
            echo "<meta http-equiv='refresh' content='0;../index.php'>";
            exit;
        else:
?>
 
        <form method="post" action="signin.php" name="loginform" id="loginform">
            <h2 class="signinhead">Login Failed&mdash;Try Again?</h2>
            <div>
                <input type="text" name="username" id="username" placeholder="username" class="typeinput" />
                <input type="password" name="password" id="password" placeholder="password" class="typeinput" />
                <input type="submit" name="login" id="login" value="Login" class="submit" />
            </div>
        </form>

        <a href="../index.php">Home</a>
<?php
        endif;
    else:
?>
 
        <form method="post" action="signin.php" name="loginform" id="loginform">
            <h2 class="signinhead">Log In</h2>
            <div>
                <input type="text" name="username" id="username" placeholder="username" class="typeinput" />
                <input type="password" name="password" id="password" placeholder="password" class="typeinput" />
                <input type="submit" name="login" id="login" value="Login" class="submit" />
            </div>
        </form>

        <a href="../index.php">Home</a>
<?php
    endif;
?>