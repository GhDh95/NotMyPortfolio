<?php Session_start();
$erreur = "";
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    //logout
    if(isset($_POST['logout'])){
        unset($_SESSION['user']);
        Session_destroy();
        header('Location: index.php');
        exit;
    }

    if(isset($_POST['contact'])){
        $con = require('connect.php');
        if(empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])){
            $erreur = "Veuillez remplir tous les champs";
        }else{
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $subject = filter_var($_POST['subject'], FILTER_SANITIZE_STRING);
            $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

            $sql = "INSERT INTO contact (email, subject, message) VALUES ('$email', '$subject', '$message')";
            $result = $con->query($sql);

            if(mysqli_query($con, $sql)){
                $erreur = "Votre message a bien été envoyé";
            }else{
                $erreur = "Une erreur est survenue";
            }



        }
        $con->close();
    }
}



?>

<?php require('header.php') ?>

<?php require('components/main-section.php') ?>

<?php require('components/divider.php') ?>

<?php require('components/contact-form.php')?>




<?php require('footer.php') ?>
