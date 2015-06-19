<?
// Secure file
if(! isset($authenticator) ){
  die(); 
}


if( isset($_GET['user_id']) ){
  $shame_id = $_GET['user_id'];
  $shame = $db->queryRow("SELECT * FROM `users` WHERE id = '$user_id'");
  $readonly = true;
}else{
  header('Location: /shame/manage-users/?error=No Shame ID supplied.');
}


include('../header.php');
?>

<h3>Edit User</h3>
<form method="POST" action="<?= $_SERVER['PHP_SELF']?>?action=edit-user&user_id=<?=$_GET['user_id']?>">
  <? include('_user-form.php'); ?>
  <button class="btn btn-success" type="button">Back</button>
</form>


<?
include('../footer.php');