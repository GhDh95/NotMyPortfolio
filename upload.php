<?php

$msg ="";

insertFilePathIfFileExists();

?>




<?php require('header.php') ?>


    <form action="upload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="file">
        <button type="submit" name="upload">Upload</button>
        <p><?= $msg?> </p>
    </form>




<?php require('footer.php') ?>