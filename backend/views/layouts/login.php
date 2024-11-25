 <?php
    $title = "Login";
    
    $csrfToken = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrfToken;

    require_once PARTIALS_DIR."/header.php";
?>

<?php
    require_once PARTIALS_DIR."/navbar.php";
?>



<div class="container"> 
    <center> <h1>Login</h1> </center>  
    <hr>

	<form method="POST" action="login?newlogin"> 
        <label for="email"><b>Email</b></label>  
            <input class = "input" type="text" placeholder="Enter Your Email" name="email"> 
                <?php if (isset($errors['email'])): ?>
					<p class="errormsg" style="font-weight: bold;" id="email-error"> <?php echo $errors['email']; ?> </p>
						<?php endif; ?>
							<br>
        <label for="password"><b>Password</b></label>  
            <input class = "input" type="password" placeholder="Enter Your Password" name="password">
                <?php if (isset($errors['password'])): ?>
                    <p class="errormsg" style="font-weight: bold;" id="password-error"> <?php echo $errors['password']; ?> </p>
                      	<?php endif; ?>
                        	<br>

        <input type="hidden" name="csrf_token" value="<?php echo $csrfToken ?>">  

    	<button type="submit" class="registerbtn">Login</button>
	</form>
</div>    

  
  
</body> 
</html> 