<?php 
                $connection	=	mysqli_connect("mysql.itn.liu.se","lego", "", "lego");
                if(!$connection){
                    die('MySQL connection error');
                } 

                //$query = "SELECT Quantity FROM inventory WHERE SetID = '375-2'";
                // $query = "SELECT inventory.Quantity, inventory.ItemID, colors.Colorname, parts.Partname FROM inventory, colors, parts WHERE inventory.SetID='375-2' AND inventory.ItemtypeID='P' AND colors.ColorID=inventory.ColorID AND parts.PartID=inventory.ItemID";
                // $getItemID = "SELECT inventory.ItemID FROM inventory, colors, parts WHERE inventory.SetID='375-2' AND inventory.ItemtypeID='P' AND colors.ColorID=inventory.ColorID AND parts.PartID=inventory.ItemID";
                $query = "SELECT inventory.Quantity, inventory.ItemID, colors.Colorname, colors.ColorID, parts.Partname FROM inventory, colors, parts WHERE inventory.SetID='375-2' AND inventory.ItemtypeID='P' AND colors.ColorID=inventory.ColorID AND parts.PartID=inventory.ItemID";
                $result	=	mysqli_query($connection,	$query);

                $color = "SELECT colors.ColorID FROM  inventory, colors, parts WHERE inventory.SetID='375-2' AND inventory.ItemtypeID='P' AND colors.ColorID=inventory.ColorID AND parts.PartID=inventory.ItemID";                
                $colorID = mysqli_query($connection,	$color);

                $part = "SELECT inventory.ItemID FROM  inventory, colors, parts WHERE inventory.SetID='375-2' AND inventory.ItemtypeID='P' AND colors.ColorID=inventory.ColorID AND parts.PartID=inventory.ItemID";
                $partID = mysqli_query($connection,	$part);

                


                $path = 'http://weber.itn.liu.se/~stegu76/img.bricklink.com/P/5/3176.gif';

                print("<table>\n<tr>");
                print("<th>Antal bitar</th><th>Bildnamn</th><th>Bild</th><th>Färg</th><th>Beskrivning</th>\n");
                while	($row	=	mysqli_fetch_array($result)){
                    $col = mysqli_fetch_array($colorID);
                    $IDs = mysqli_fetch_array($partID);


                    //$gif = "SELECT inventory.ItemID FROM  inventory, colors, parts WHERE inventory.SetID='375-2' AND inventory.ItemtypeID='P' AND colors.ColorID=inventory.ColorID AND parts.PartID=inventory.ItemID";
                    //$allGIFS = mysqli_query($connection, $gif);

                    //$jpg = "SELECT inventory.ItemID FROM  inventory, colors, parts WHERE inventory.SetID='375-2' AND inventory.ItemtypeID='P' AND colors.ColorID=inventory.ColorID AND parts.PartID=inventory.ItemID";
                    //$alljpg = mysqli_query($connection, $jpg);

                    //$hasgif = mysqli_fetch_array($allGIFS);
                    //$hasjpg = mysqli_fetch_array($alljpg);

                    print("<tr>\n");
                    for($i=0; $i<mysqli_num_fields($result); $i++) {
                        print("<td>$row[$i]</td>");

                        //$newQuery = "SELECT has_gif FROM images WHERE inventory.SetID='375-2' AND inventory.ItemtypeID='P' AND $col[$i]=inventory.ColorID AND $IDs[$i]=inventory.ItemID ";
                        //$currentgif = mysqli_fetch_array($connection, $newQuery);
                        //$newq = "SELECT has_jpg FROM images WHERE inventory.SetID='375-2' AND inventory.ItemtypeID='P' AND $col[$i]=inventory.ColorID AND $IDs[$i]=inventory.ItemID ";
                        //$currentjpg = mysqli_fetch_array($connection, $newq);





                        // $allImages = "SELECT * FROM images WHERE SetID='375-2' AND $col[$i]=ColorID AND $IDs[$i]=ItemID ";
                        // $all = mysqli_query($connection, $allImages);
                        // $getinfo = mysqli_fetch_array($all);
                        // print("<td>$getinfo[0]</td>"); // Not working?!
                        // if($getinfo['has_gif']){
                        //     $newPath = 'http://weber.itn.liu.se/~stegu76/img.bricklink.com/P/'.$col[$i].'/'.$IDs[$i].'.gif';
                        // } else if ($getinfo['has_jpg'])  {
                        //     $newPath = 'http://weber.itn.liu.se/~stegu76/img.bricklink.com/P/'.$col[$i].'/'.$IDs[$i].'.jpg';
                        // }
                        // print("<img src='$newPath'/>");
                    }
                    print("</tr>\n");
                }
                print("</table>\n");
                mysqli_close($connection);
            ?>