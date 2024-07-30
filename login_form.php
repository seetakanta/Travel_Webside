<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel Website</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="login.js"></script>

</head>
<body>
<div class="login-form-container">

<!-- <i class="fas fa-times" id="form-close"></i> -->

<form action="log_in.php" method="POST">
      <h3>login</h3>
    <input type="email" class="box" placeholder="enter your email" name="email" id="email">
    <input type="password" class="box" placeholder="enter your password" name="password" id="password">
    <button type="login" value="login now" class="btn" name="login" id="login" onclick="login()">Log In</button>
    <input type="checkbox" id="remember">
    <label for="remember">Remember Me</label>
    <p>Forget password? <a href="#">Click Here</a></p>
    <p>don't have and account? <a href="register.php">register now</a></p>
</form>

</div>
</body>
</html>