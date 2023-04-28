<?php

Session_start();
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



?>


<?php require('header.php') ?>



    <div class="relative overflow-x-auto mt-20">
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

            </tr>
            </thead>
            <tbody>
            <?php  foreach($messages as $message): ?>
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

            </tr>
            <?php endforeach;?>

            </tbody>
        </table>
    </div>




<?php require('footer.php') ?>