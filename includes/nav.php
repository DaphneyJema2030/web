<div class="topnav">
    <a href="index.php">Home</a>
    <a href="aboutme.php">About Me</a>
    <a href="myproject.php">My Project</a>
    <a href="myhobbies.php">My Hobbies</a>
    <a href="contactus.php">Contact Us</a>

    <div class="topnav-right">
        <?php if(isset($_SESSION['consort'])) { ?>
        <a href="profile.php">Profile</a>
        <a href="proc/processes.php?logout=true">Logout</a>
        <?php } else { ?>
        <a href="signin.php">Sign in</a>
        <a href="signup.php">Sign up</a>
        <?php } ?>
    </div>
</div>