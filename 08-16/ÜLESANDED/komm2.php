<html>
    <head>
        <title>Updater</title>
    </head>
    <body>
        <?php
               function Read() {
                   $file = "kommentaarid.txt";
                   echo file_get_contents( $file);
               }

               function Write() {
                   $file = "kommentaarid.txt";
                   $fp = fopen($file, "w");
                   $data = $_POST["tekst"];
                   fwrite($fp, $data);
                   fclose($fp);
               }
        ?>

        <?php
        if ($_POST["submit_check"]){
            Write();
        };
        ?>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
        <textarea width="400px" height="400px" name="tekst"><?php Read(); ?></textarea><br>
        <input type="submit" name="submit" value="Update text">
        <input type="hidden" name="submit_check" value="1">
        </form>

                <?php
        if ($_POST["submit_check"]){
            echo 'Text updated';
        };
        ?>


    </body>
</html>
