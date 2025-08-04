<?php
    require 'config/connect.php';
    require 'includes/header.php';
    require 'includes/nav.php';
?>

<div class="row">
    <div class="content">
    
        <h2>Signup</h2>
        <form action="process.php" method="post">
            <label>First Name</label>
            <input type="text" name="firstname" id="firstname-input" placeholder="" required autofocus />
            <div class="error"></div>

            <label>Last Name</label>
            <input type="text" name="lastname" id="lastname-input" placeholder="" required />
            <div class="error"></div>

            <label>Email</label>
            <input type="email" name="email" id="email-input" placeholder="" required />
            <div class="error"></div>

            <label>Telephone</label>
            <input type="tel" name="tel" id="tel-input" placeholder="" required />
            <div class="error"></div>

            <label>Username</label>
            <input type="text" name="username" id="username-input" placeholder="" required />
            <div class="error"></div>

            <label>Password</label>
            <input type="password" name="password" id="password-input" placeholder="" required />
            <div class="error"></div>

            <label>Confirm Password</label>
            <input type="password" name="confirm_password" id="confirm-password-input" placeholder="" required />
            <div class="error"></div>

            <div id="error-message" class="form-error"></div>
            <button type="submit" name="signup">Signup</button>
        </form>

    
      <P class="para">Already have an account? <a href="signin.php">Sign in</a></P>
    </div>


    <div class="sidebar">
    <h2>Join BookWorld Today</h2>
    <p>By signing up, you get access to a world of books, reading lists, and personalized recommendations.</p>
    <ul>
        <li>✓ Save your favorite reads</li>
        <li>✓ Get custom book suggestions</li>
        <li>✓ Participate in reader forums</li>
        <li>✓ Request titles from our library</li>
    </ul>
    <p>It’s free, fast, and perfect for book lovers.</p>
  </div>
</div>

<?php
    require 'includes/footer.php';
?>