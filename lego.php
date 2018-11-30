<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lego</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="Style.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="lego.css" />
</head>
<body>
    <header>
        <a onclick="toggleHeader()" id="toggle"><i class="fas fa-bars"></i></a>
        <a href="index.html">Hem</a>
        <a href="om.html" >Om projektet</a>
        <a href="projektdagbok.php" >Projektdagbok</a href="om.html">
        <a href="http://weber.itn.liu.se/~nikro27/tnmk30-2018/" target="_blank">Kurshemsida</a>
        <a href="lego.php" class="active">Labb 5</a>
        <div id="time"></div>
    </header>
    <div id="frontimg">
    </div>

    <div class="content">
        <div class="container">
            <h1>Tabell över legodatabasen </h1>
            <h3>Lagersaldo Set 375-2 </h3>

            <?php
                $connection = mysqli_connect("mysql.itn.liu.se","lego","","lego");
                if(mysqli_errno($connection)) {
                    die("<p>MySQL error:</p>\n<p>" . mysqli_error($connection) . "</p>\n</body>\n</html>\n");
                }

                $contents = mysqli_query($connection, "SELECT inventory.Quantity, inventory.ItemTypeID, inventory.ItemID, inventory.ColorID, colors.Colorname, parts.Partname FROM inventory, parts, colors WHERE inventory.SetID='375-2' AND inventory.ItemTypeID='P' AND inventory.ItemID=parts.PartID AND inventory.ColorID=colors.ColorID");
                if(mysqli_num_rows($contents) == 0) {
                    print("<p>No parts in inventory for this set.</p>\n");
                } else {
                print("<table>\n<tr>");
                print("<th>Quantity</th>");
                print("<th>Picture</th>");
                print("<th>Color</th>");
                print("<th>Part name</th>");
                print "</tr>\n";
                while($row = mysqli_fetch_array($contents)) {
                    print("<tr>");
                    $Quantity = $row['Quantity'];
                    print("<td>$Quantity</td>");
                    $prefix = "http://www.itn.liu.se/~stegu76/img.bricklink.com/";
                    $ItemID = $row['ItemID'];
                    $ColorID = $row['ColorID'];
                    $imagesearch = mysqli_query($connection, "SELECT * FROM images WHERE ItemTypeID='P' AND ItemID='$ItemID' AND ColorID=$ColorID");
                    $imageinfo = mysqli_fetch_array($imagesearch);
                    if($imageinfo['has_jpg']) { // Use JPG if it exists
	                    $filename = "P/$ColorID/$ItemID.jpg";
                    } else if($imageinfo['has_gif']) { // Use GIF if JPG is unavailable
	                    $filename = "P/$ColorID/$ItemID.gif";
                    } else { // If neither format is available, insert a placeholder image
	                    $filename = "noimage_small.png";
                    }
                    print("<td><img title='$prefix$filename' src=\"$prefix$filename\" alt=\"Part $ItemID\"/></td>");
                    $Colorname = $row['Colorname'];
                    $Partname = $row['Partname'];
                    print("<td style='color: $Colorname'>$Colorname</td>");
                    print("<td>$Partname</td>");
                    print("</tr>\n");
                }
                print("</table>\n");
            }
                ?>
        </div>
    </div>

</body>
</html>