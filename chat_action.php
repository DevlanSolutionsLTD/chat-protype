<?php
session_start();
include ('Chat.php');
$chat = new Chat();
 $host  = 'localhost';
 $user  = 'root';
 $password   = "";
$database  = "phpzag_demo";      
 $chatTable = 'chat';
 $chatUsersTable = 'chat_users';
 $chatLoginDetailsTable = 'chat_login_details';
  
$conn = new mysqli($host, $user, $password, $database);
if (isset($_POST['chat'])) {
	$sender_userid = $_POST['sender_userid'];
    $reciever_userid = $_POST['reciever_userid'];
	$message = $_POST['message'];
	$status = 1;

    $stmt = $conn->prepare("INSERT INTO chat (reciever_userid, sender_userid, message, status) VALUES (?, ?, ?,?)");
    $stmt->bind_param("ssss", $reciever_userid ,$sender_userid,$message,$status);
    $stmt->execute();
    if ($stmt == TRUE) {
	  
	 
      header("chat_forum.php");
     exit;
    } else {
       echo"Message not sent";
    }
	
}
if($_POST['action'] == 'update_user_list') {
	$chatUsers = $chat->chatUsers($_SESSION['userid']);
	$data = array(
		"profileHTML" => $chatUsers,	
	);
	echo json_encode($data);	
}

if($_POST['action'] == 'show_chat') {
	$chat->showUserChat($_SESSION['userid'], $_POST['to_user_id']);
}
if($_POST['action'] == 'update_user_chat') {
	$conversation = $chat->getUserChat($_SESSION['userid'], $_POST['to_user_id']);
	$data = array(
		"conversation" => $conversation			
	);
	echo json_encode($data);
}
if($_POST['action'] == 'update_unread_message') {
	$count = $chat->getUnreadMessageCount($_POST['to_user_id'], $_SESSION['userid']);
	$data = array(
		"count" => $count			
	);
	echo json_encode($data);
}
if($_POST['action'] == 'update_typing_status') {
	$chat->updateTypingStatus($_POST["is_type"], $_SESSION["login_details_id"]);
}
if($_POST['action'] == 'show_typing_status') {
	$message = $chat->fetchIsTypeStatus($_POST['to_user_id']);
	$data = array(
		"message" => $message			
	);
	echo json_encode($data);
}
?>