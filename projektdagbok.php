<?php
    if(isset($_POST['submit'])) {
        $connection = mysqli_connect("mysql.itn.liu.se","blog_edit", "bloggotyp", "blog");
        if(!$connection){
            die('MySQL connection error');
        }
        $author	=	mysqli_real_escape_string($connection,	$_POST["author"]);
        $heading	=	mysqli_real_escape_string($connection,	$_POST["heading"]);
        $text	=	mysqli_real_escape_string($connection,	$_POST["text"]);
        $query = "INSERT INTO joskl841 VALUES (NULL, '$author', '$heading', '$text')";
        if (!mysqli_query($connection, $query)) {
            die('Error: Cannot post to MYSQL' . mysqli_error());
        }
        mysqli_close($connection);
    }
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="Style.css" rel="stylesheet" type="text/css" />
	<link href="blog.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script src="script.js"></script>
    <title>The Super Snail</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
</head>
<body onload="init()">
    <header>
        <a onclick="toggleHeader()" id="toggle"><i class="fas fa-bars"></i></a>
        <a onclick="toggleTheme()">Ändra tema</a>
        <a href="index.html">Hem</a>
        <a href="om.html" >Om projektet</a>
        <a href="projektdagbok.php" class="active">Projektdagbok</a href="om.html">
        <a href="http://weber.itn.liu.se/~nikro27/tnmk30-2018/" target="_blank">Kurshemsida</a>
        <a href="lego.php">Labb 5</a>
        <div id="time"></div>
    </header>
    <div id="frontimg">
    </div>
    <div class="content">
        <div class="container">
            <form action="projektdagbok.php" method="GET">
                <input type="text" placeholder="Antal posts" name="latest">
                <input type="text" placeholder="Sökord" name="keyword">
                <button type="submit" name="apply">Apply</button>
            </form>

            <button onclick="document.querySelector('.overlay').style.transform = 'translateY(0)'">Nytt mötesprotokoll</button> 
            <!-- <button onclick="document.querySelector('.overlay').style.transform = 'translateY(0)'">Nytt mötesprotokoll</button>  -->

            <?php
            $connection	=	mysqli_connect("mysql.itn.liu.se","blog", "", "blog");
            if(!$connection){
                die('MySQL connection error');
            }
            $timestamp = date("Y/m/d");
            $sorting = "SELECT	*	FROM joskl841	ORDER	BY	entry_date	DESC";

            if(isset($_GET['latest']) != '') {
                $howmany = $_GET['latest'];
                $sorting = "SELECT	*	FROM joskl841	ORDER	BY	entry_date	DESC LIMIT $howmany";
            }
 
            if (isset($_GET['keyword'])) {
                $keyword = $_GET['keyword'];
                if(!empty($keyword)) {
                    $sorting = "SELECT	*	FROM    joskl841   WHERE  entry_author LIKE '%$keyword%'  OR  entry_text  LIKE    '%$keyword%' OR entry_heading LIKE '%$keyword%' ORDER BY entry_date DESC" ;
                }
            }

            $result	=	mysqli_query($connection,	$sorting);
            while	($row	=	mysqli_fetch_array($result)){
                $heading	=	$row['entry_heading'];
                print("<div class='post'>");
                print("<h2>$heading</h2>\n");
                $text	=	$row['entry_text'];
                print("<p>$text</p>\n");
                $date	=	$row['entry_date'];
                $author	=	$row['entry_author'];
                print("<p>$author, $date</p	>\n");
                print("</div>");
            }
            ?>

        </div>
	</div>
	<div class="overlay" >
		<div>
            <div class="row">
                <h2>Nytt inlägg</h2>
                <i class="fas fa-times" onclick="closeOverlay()"></i>
            </div>
			<form action="projektdagbok.php" method="POST">
				<p>Titel</p>
                <input name="heading" type="text" />
                <p>Användare</p>
				<input name="author" type="text" />
				<p>Anteckningar</p>
				<textarea value="123" name="text" type="text"></textarea>
				<div class="row">
					<input name="password"  type="password" placeholder="password"/>
                    <button type="submit" name="submit">Posta</button>
				</div>
            </form>
		</div>
	</div>
    <footer>
        <p>© Jakob Unnebäck & Josefine Klintberg 2018</p>
    </footer>
</body>
</html>