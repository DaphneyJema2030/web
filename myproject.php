<?php
    require 'config/connect.php';
    require 'includes/header.php';
    require 'includes/nav.php';
?>
<div class="header">
    <h1>Products</h1>
</div>
<div class="row">
    <div class="content">
<h1>Heading 1</h1>

   <div>
       <img src="images/books.jpg" alt="Book" width="200" height="200">
   </div> 

<table>
    <caption>Stationery Products</caption>
    <tr>
        <th>SN</th>
        <th>Title</th>
        <th>Author</th>
        <th>Price</th>
    </tr>
    <tr>
        <td>1</td>
        <td>Ghostwriter</td>
        <td>Julie Clark</td>
        <td>$15.00</td>
    </tr>
    <tr>
        <td>2</td>
        <td>Disney High</td>
        <td>Ashley Sencer</td>
        <td>$20.50</td>
    </tr>
    <tr>
        <td>3</td>
        <td>The Bussiness Trip</td>
        <td>Jessie Garcia</td>
        <td>$17.40</td>
    </tr>
    <tr>
        <td>4</td>
        <td>The favorites</td>
        <td>Layne Fargo</td>
        <td>$19.50</td>
    </tr>
    <tr>
        <td>5</td>
        <td>Kate in Waiting</td>
        <td>Becky Albertalli</td>
        <td>$20.00</td>
    </tr>
</table>


    </div>
    <div class="sidebar">
                <h2>Side Bar</h2>
<p>Welcome to our online bookstore! We specialize in a wide range of genres—from classic literature and biographies to self-help and fiction.</p>
<p>Whether you're a student, a casual reader, or a lifelong learner, we have books that will inspire and educate. Explore our latest arrivals and discover your next great read today.</p>
>
    </div>
<?php
    require 'includes/footer.php';
?>