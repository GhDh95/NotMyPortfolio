<?php Session_start();
$erreur = "";



if($_SERVER['REQUEST_METHOD'] == 'POST') {

    //logout
    if (isset($_POST['logout'])) {
        unset($_SESSION['user']);
        Session_destroy();
        header('Location: index.php');
        exit;
    }

    if (isset($_POST['contact'])) {
        $con = require('connect.php');
        if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
            $erreur = "Veuillez remplir tous les champs";
        } else {


                $file_path = "";
                if(isset($_FILES['file_upload'])) {


                    $file = $_FILES['file_upload'];
                    $fileName = $_FILES['file_upload']['name'];
                    $fileTmpName = $_FILES['file_upload']['tmp_name'];


                    $upload_dir = 'storage/';
                    $file_path = $upload_dir . $fileName;

                    if(move_uploaded_file($fileTmpName, $file_path)){
                        $erreur = "Votre fichier a bien été envoyé";
                        } else {
                        $erreur = "Une erreur est survenue";
                    }
                }


                $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
                $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

                $sql = "INSERT INTO contact (email, subject, message, file_path) VALUES ('$email', '$subject', '$message', '$file_path')";

                if (mysqli_query($con, $sql)) {
                    $erreur = "Votre message a bien été envoyé";
                } else {
                    $erreur = "Une erreur est survenue";
                }


            }
            $con->close();
        }


}

?>



<?php require('header.php') ?>

<?php require('components/main-section.php') ?>

<?php require('components/timeline.php') ?>

<?php require('components/competence.php') ?>

<?php require('components/divider.php') ?>

<?php require('components/experience.php') ?>


<?php require('components/divider.php') ?>

<?php require('components/contact-form.php')?>



<?php require('footer.php') ?>
