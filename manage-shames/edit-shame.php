<?
// Secure file
if(! isset($authenticator) ){
  die(); 
}

if( isset($_POST['shame']) ){
  $db->update('shames', $_POST['shame'], $_GET['shame_id']);
}

if( isset($_GET['shame_id']) ){
  $shame_id = $_GET['shame_id'];
  $shame = $db->queryRow("SELECT * FROM `shames` WHERE id = '$shame_id'");
}else{
  header('Location: /shame/manage-shames/?error=No Shame ID supplied.');
}



include('../header.php');
?>

<h3>Edit Shame</h3>
<form method="POST" action="<?= $_SERVER['PHP_SELF']?>?action=edit-shame&shame_id=<?=$_GET['shame_id']?>">
  <? include('_shame-form.php'); ?>
  <button class="btn btn-success">Update Shame</button>
</form>


<?
include('../footer.php');
