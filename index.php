<?php include 'database.php';?>
<?php
//Perform a Query
$query="SELECT * FROM Blog ORDER BY id DESC";
$Blogging=mysqli_query($con,$query);
?>
<html>
<head>
<title> Blog</title>

    <link rel="stylesheet" href="css/style.css" type="text/css" />

</head>
<body>

<div id="container">
    <header>
        <h1>Blog</h1>
    </header>
    <div id="blog">
        <ul>
            <?php while($row=mysqli_fetch_assoc($Blogging)):?>
                <li class="blog"> <span><?php echo $row['time']?></span>
                    <?php echo $row['user']?>: <?php echo $row['message']?></li>

            <?php endwhile;?>
        </ul>
    </div>
    <div id="input">
        <?php if(isset($_GET['error'])):?>
            <div class="error"><?php echo $_GET['error'];?> </div>
        <?php endif;?>
        <form method="post" action="process.php">
            <input type="text" name="user" placeholder="Enter Your Name "/>
            <input type="text" name="message" placeholder="Write Your Message "/>
            <br>
            <br/>
            <input type="submit" name="submit" class="submit-btn" value="UPDATE YOUR STATUS"/>
        </form>
    </div>
</div>
</body>
</html>