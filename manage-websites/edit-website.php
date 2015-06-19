<?
// Secure file
if(! isset($authenticator) ){
  die(); 
}

if( isset($_POST['website']) ){
  $db->update('websites', $_POST['website'], $_GET['website_id']);
}

if( isset($_GET['website_id']) ){
  $shame_id = $_GET['website_id'];
  $shame = $db->queryRow("SELECT * FROM `websites` WHERE id = '$website_id'");
}else{
  header('Location: /shame/manage-websites/?error=No Shame ID supplied.');
}



include('../header.php');
?>

<h3>Edit User</h3>
<form method="POST" action="<?= $_SERVER['PHP_SELF']?>?action=edit-website&website_id=<?=$_GET['website_id']?>">
  <? include('_website-form.php'); ?>
  <button class="btn btn-success">Update website</button>
</form>


<?
include('../footer.php');