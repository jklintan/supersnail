
<?php 
$txt = "data.txt";
if($_POST["password"]!=supersnail)
    print("<p>Felaktigt lösenord!</p>");
else{
    if(isset($_POST['Heading'] && isset($_POST['Protocol'])){
        $fh = fopen($txt, 'ab');
        fwrite(date("Y-m-d H:i:s");
        $txt = $_POST['Heading'].' - '.$_POST['Protocol'];
        fwrite($fh, $txt);
        fclose($fh);
    }
}
?>