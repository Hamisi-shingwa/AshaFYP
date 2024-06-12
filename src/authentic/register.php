<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link rel="stylesheet" href="../public/css/index.css">
     <link rel="stylesheet" href="../public/css/auth.css">
</head>
<body>
    <div class="authentic-container">
    <div class="navbar">
        <div class="left-icon"><img src="../assets/icons/icon.png" alt=""></div>
        <div class="right-content">
           <a href="../index.php">Home</a>
           <a href="">Teams</a>
           <a href="">Blog</a>
           <a href="">Faq</a>
           <a href="">About</a>
           <a href="./login.php">Sign up</a>
        </div>
    </div>
<div class="form-container">
    
<form action="./register_process.php" method="post" >
        <h4>Sign up with your email</h4>
        <input type="email" name='email' placeholder="email" required>
        <input type="password" name="pass" placeholder="password"  required>
        <input type="password" name="cpass"  placeholder="confirm your password" required>
        <input type="submit" value="Sign up">
        <div class="shift-account">
            <div>having an account ?</div>
            <a href="./login.php">Cick here to sign in</a>
        </div>
        <div class="feedback-element">
            <p><?php if(isset($_GET['msg'])) echo base64_decode($_GET['msg'])?></p>
        </div>
    </form>
</div>
</div>
</body>
</html>