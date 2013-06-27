<?php
    include_once "../includes/connection.php";
 
    if(!empty($_POST['username'])):
        include_once '../includes/trait.crud.php';
        include_once "../classes/class.users.php";
        $users = new User($db);
        $users->createAccount($_POST['username'], $_POST['password'], $_POST['email']);
        echo('Your account was succesfully created! <a href="../index.php">Go home</a> or <a href="signin.php">log in</a>');
    else:
?>

<head>
    <meta charset="UTF-8" />
    <title>Sign up</title>
</head>
<body>
 
        <form method="post" action="signup.php" id="registerform">
            <h2 class="signuphead">Sign up</h2>
            <div>
                <input type="text" name="username" id="username" placeholder="username" class="typeinput"/><br />
                <input type="password" name="password" id="password" placeholder="password" class="typeinput"/><br />
                <input type="email" name="email" id="email" placeholder="email" class="typeinput"/><br />
                <input type="submit" name="register" id="register" value="Sign up"  class="submit"/>
            </div>
        </form>

        <a href="../index.php">Home</a>

</body>
 
<?php
    endif;
?>