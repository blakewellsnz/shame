<?
// Secure file
if(! isset($authenticator) ){
  die(); 
}


if( isset($_GET['website_id']) ){
  $website_id = $_GET['website_id'];
  $website = $db->queryRow("SELECT * FROM `users` WHERE id = '$website_id'");
  $readonly = true;
}else{
  header('Location: /shame/manage-websites/?error=No Shame ID supplied.');
}



include('../header.php');
?>

<h3>Edit User</h3>
<form method="POST" action="<?= $_SERVER['PHP_SELF']?>?action=edit-website&website_id=<?=$_GET['website_id']?>">
  <? include('_website-form.php'); ?>
  <button class="btn btn-success" type="button">Back</button>
</form>


<?
include('../footer.php');