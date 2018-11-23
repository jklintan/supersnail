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
        <div id="time"></div>
    </header>
    <div id="frontimg">
    </div>
    <div class="content">
        <div class="container">
			<button onclick="document.querySelector('.overlay').style.transform = 'translateY(0)'">Nytt mötesprotokoll</button> 
            <?php include("protocols.txt");?>
        </div>
	</div>
	<div class="overlay" >
		<div>
            <div class="row">
                <h2>Nytt inlägg</h2>
                <i class="fas fa-times" onclick="closeOverlay()"></i>
            </div>
			<!-- <form action="sendform.php" method="POST"> -->
            <form action="">
				<p>Titel</p>
				<input value="En riktigt bra titel" name="Heading" type="text" />
				<p>Anteckningar</p>
				<textarea value="123" name="Protocol" type="text"></textarea>
				<div class="row">
					<input value="123" name="password"  type="password" placeholder="password"/>
                    <button type="submit" name="submit">Posta</button>
				</div>
			<form>
		</div>
	</div>
    <footer>
        <p>© Jakob Unnebäck & Josefine Klintberg 2018</p>
    </footer>
</body>
</html>
<?php
    $txt = "protocols.txt";
    if ($_POST["password"]!= "123") { // test if the password is correct
        print("<p>Felaktigt lösenord!</p>");
    } else {
        $timestamp = date("Y/m/d");
        $headern = $_POST['Heading'];
        $post = $_POST['Protocol'];
        $fh = fopen($txt, 'ab');

        // Write the protocol to the file
        fwrite($fh, '<div class="post">');
        fwrite($fh, '<h3>');
        fwrite($fh, $headern);
        fwrite($fh, '</h3>');
        fwrite($fh, '<p>');
        fwrite($fh, $post);
        fwrite($fh, '</p>');
        fwrite($fh, '<p>');
        fwrite($fh, $timestamp);
        fwrite($fh, '</p>');
        fwrite($fh, '</div>');
        fclose($fh);
    }
?>