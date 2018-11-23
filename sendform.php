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
        header('Location: projektdagbok.php');
    }
?>
<html>
</html>

<!-- <script type="text/javascript">
    window.location.href = 'projektdagbok.php';
</script> -->