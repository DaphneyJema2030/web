<?php
    require 'config/connect.php';
    require 'includes/header.php';
    require 'includes/nav.php';

$user_id = $_GET['id'] ?? null;
if (!$user_id) {
    echo "User ID is required.";
    exit;
}

$spot_users = "SELECT * FROM users left join lastname using (lastnameId) left join username using (usernameId) WHERE users.userId = ? ORDER BY users.firstname ASC";
$stmt = $conn->prepare($spot_users);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$edit_res = $stmt->get_result()->fetch_assoc();

?>
<div class="row">
    <div class="content">
        <h2>Edit <?php print $edit_res['firstname']; ?></h2>

<form action="process.php" method="post">
    <input type="text" name="firstname" placeholder="Update your first name" value="<?php print $edit_res['firstname']; ?>" required/><br>
    <input type="text" name="lastname" placeholder="Update your last name" value="<?php print $edit_res['lastname']; ?>" required/><br>
    <input type="email" name="email" placeholder="Update your email address" value="<?php print $edit_res['email']; ?>" required /><br>
    <input type="text" name="username" placeholder="Update your Username" value="<?php print $edit_res['username']; ?>" required/><br>
    <input type="tel" name="tel" placeholder="Update your phone number" maxlength="13" value="<?php print $edit_res['tel']; ?>" required /><br>

    <input type="submit" name ="update_user" value="Update <?php print $edit_res['fullname']; ?>" /> <a href="bookworld.php">Cancel</a>
    <input type="hidden" name="userId" value="<?php print $user_id; ?>" />
</form>

<div class="sidebar">
                <h2>Side Bar</h2>
        <p><ul>
            <li>✓ Build your personal reading list</li>
            <li>✓ Find books that match your vibe</li>
            <li>✓ Connect with fellow book lovers</li>
            <li>✓ Keep track of your reading journey</li>
        </ul>
        <p>
            Whether you're a seasoned bookworm or just starting your reading adventure, BookWorld is here to make it memorable.
        </p>
    </div>
</div>
<?php
    require 'includes/footer.php';
?>