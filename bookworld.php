<?php
    require 'config/connect.php';
    require 'includes/header.php';
    require 'includes/nav.php';
?>
<div class="row">
    <div class="content">
        <h2>BookWorld</h2>
<table>
    <caption>Our Readers</caption>
    <tr>
        <th>SN</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Username</th>
        <th>Phone</th>
        <th>Date Created</th>

    </tr>
<?php
$spot_users = "SELECT * FROM users left join lastname using (lastnameId) left join username using (usernameId) WHERE users.status = 0 ORDER BY users.fullname ASC";
$result = $conn->query($spot_users); $sn = 0;
while ($row = $result->fetch_assoc()) {
    $sn++;
?>
<tr>
    <td><?php echo $sn ?></td>
    <td><?php echo $row['firstname']; ?></td>
    <td><?php echo $row['lastname']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['username']; ?></td>
    <td><?php echo $row['phone']; ?></td>
    <td><?php echo $row['Updates']; ?></td>
    <td>
        [ <a href="edit_user.php?id=<?php echo $row['userId']; ?>">Edit</a> ] |
        [ <a href="process.php?delete_user=<?php print $row['userId']; ?>" onclick="return confirm('Are you sure you want to delete <?php echo $row['fullname']; ?>?');">Del</a> ]
    </td>
</tr>
<?php
} if ($result->num_rows == 0) {
    print "<tr><td colspan='7'>No users found.</td></tr>";
}

?></table>

    <h2>Our Story</h2>

        <p>BookWorld started with one simple idea: bring readers together. Whether you're flipping through classics, diving into fantasy,
            or exploring self-help — you're welcome here.
        </p>

    </div>
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