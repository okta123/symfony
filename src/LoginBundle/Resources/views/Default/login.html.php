<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Login Form</title>
<link rel="stylesheet" href="../assets/css/stylelogin.css" />

</head>
<body>
  <section class="container">
    <div class="login">
    <form method="POST" action="" >
  
      <h1>Login to Web App</h1>
      
        <?php if (isset($name)) echo $name; ?>
        <p><input type="text" name="username" value="" placeholder="Username "></p>
        <p><input type="password" name="password" value="" placeholder="Password" ></p>
        <p class="submit"><input type="submit" name="commit" value="Login"></p>
     
        
        
      </form>
        	<a href = "signup" >Register</a></p>
    </div>
    
  </section>

 
</body>
</html>
