<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="Style.css" rel="stylesheet" type="text/css" />
	<link href="blog.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
	<script src="script.js"></script>
    <title>The Super Snail</title>
</head>
<body onload="init()">
    <header>
        <a onclick="toggleHeader()" id="toggle"><i class="fas fa-bars"></i></a>
        <a onclick="toggleTheme()">Ändra tema</a>
        <a href="index.html">Hem</a>
        <a href="om.html" >Om projektet</a>
        <a href="projektdagbok.html" class="active">Projektdagbok</ahref="om.html">
        <a href="http://weber.itn.liu.se/~nikro27/tnmk30-2018/" target="_blank">Kurshemsida</a>
        <div id="time"></div>
    </header>
    <div id="frontimg">
    </div>
    <div class="content">
        <div class="container">
			<button onclick="toggleTheme()">Nytt mötesprotokoll</button> 
			<button onclick="document.querySelector('.overlay').style.transform = 'translateY(0)'">Nytt mötesprotokoll</button> 
             <?php include("meetingprotocols.txt");?>

        </div>
	</div>
	<div class="overlay">
		<div>
			<h2>Nytt inlägg</h2>
			<form action="sendform.php" method="POST">
			
				<p>Titel</p>
				<input name="Heading" id="Heading" type="text"></input>
				<p>Anteckningar</p>
				<textarea name="Protocol" id="Protocol" type="text"></textarea>
				<div class="row">
					<input name="password"  type="password" placeholder="password"></input>
					<input type="submit" name="submit"></input>
				</div>
			<form>
		</div>
	</div>
    <footer>
        <p>© Jakob Unnebäck & Josefine Klintberg 2018</p>
    </footer>
</body>
</html>