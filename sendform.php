<?php
    $connection = mysqli_connect("mysql.itn.liu.se","blog_edit", "bloggotyp", "blog");
                if(!$connection){
                    die('MySQL connection error');
                }
                $author = 'Jozzz';
                $heading	=	$_POST['heading'];
                $text	=	$_POST['text'];
                $date = date("Y/m/d");
                $query = "INSERT INTO blog VALUES ('$date', '$author', '$heading', '$text')";
                if (!mysqli_query($connection, $query))
                {
                    die('Error: Cannot post to MYSQL' . mysqli_error());
                }
                mysqli_query($connection, $query);
                mysqli_close($connection);
            ?>

<html>
    <p>Ditt blogginlägg har postats! </p>
    <p><a href="http://www.student.itn.liu.se/~joskl841/projektdagbok.php">Ta mig tillbaka</a></p>
    </html>

<!-- <script type="text/javascript">
    window.location.href = 'projektdagbok.php';
</script> -->