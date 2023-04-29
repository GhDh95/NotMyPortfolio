<?php

Session_start();

//Get messages
$con = require('connect.php');
$msg = "";

$sql = "SELECT * FROM contact";
$result = mysqli_query($con, $sql);
$messages = [];

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $messages[] = $row;
    }
}else{
    $msg = "No Messages";
}

$con->close();

//delete message
if(isset($_POST['delete_message'])){
       $con = require('connect.php');
       $id = $_POST['message_id'];
       $sql = "DELETE FROM contact WHERE id = $id";
       $result = mysqli_query($con, $sql);
       if($result){
           $msg = "Message Deleted";
       }else{
           $msg = "Something went wrong";
       }
       $con->close();
}



?>


<?php require('header.php') ?>

<p class="mt-5 text-center text-2xl font-semibold text-red-500"> <?=  $msg?></p>

    <div class="relative overflow-x-auto mt-20 h-screen">
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                    subject
                </th>
                <th scope="col" class="px-6 py-3">
                    message
                </th>
                <th scope="col" class="px-10 py-3">
                    Files
                </th>
                <th scope="col" class="px-6 py-3">
                    Delete
                </th>

            </tr>
            </thead>
            <tbody>
            <?php  foreach( array_reverse($messages) as $message): ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <?=$message['email'] ?>
                </th>
                <td class="px-6 py-4">
                    <?=$message['subject'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= $message['message'] ?>
                </td>
                <td class="px-6 py-4">
                    <?php if(!empty($message['file_path'])): ?>
                        <a class="hover:underline" href="<?= $message['file_path']?>" download>Download File</a>
                    <?php else: ?>
                        No Files
                    <?php endif; ?>
                </td>

                <td class="px-3 py-4">
                    <form action="messages.php" method="post">
                        <input type="text" name="message_id" id="" value="<?=$message['id']?>" hidden>
                        <button type="submit" name="delete_message" class="hover:opacity-75 bg-red-500 text-white px-4 py-2 rounded-md">Delete</button>
                    </form>
                </td>


            </tr>
            <?php endforeach;?>

            </tbody>
        </table>
    </div>




<?php require('footer.php') ?>