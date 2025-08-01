<?php
    require 'config/connect.php';
    require 'includes/header.php';
    require 'includes/nav.php';
?>

<div class="row">
<div class="content">
    
        <h1>Sign In</h1>
        <form id="signin-form" method="post">
           <label>Username</label>
            <input type="text" id="username-input" placeholder="" required>
            <label>Password</label>
            <input type="text" id="password-input" placeholder="" required >
             <button type="submit">Sign In</button>
        </form>
    
    <P class="para">Dont have an account? <a href="signup.html">Sign Up</a></P>
    
    <script src="js/javascript.js"></script>
   
</div>
<div class="sidebar">
    <h2>Welcome Back!</h2>
    <p>Sign in to continue exploring your personal reading world:</p>
    <ul>
        <li>Access your bookshelf</li>
        <li>View past recommendations</li>
        <li>Update your reading goals</li>
        <li>Connect with fellow readers</li>
    </ul>
    <p>Haven’t signed up yet? <a href="signup.php">Create an account here</a>.</p>
</div>
</div>

<?php
require 'includes/footer.php';
?>