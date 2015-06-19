<?
// Secure file
if(! isset($authenticator) ){
  die(); 
}

if( isset($_GET['shame_id']) ){
  $shame_id = $_GET['shame_id'];
  $shame = $db->queryRow("SELECT * FROM `shames` WHERE id = '$shame_id'");
  $readonly = true;
}else{
  header('Location: /manage-shames/?error=No Shame ID supplied.');
}


include('../header.php');
?>

<h3>View Shame</h3>
<form method="POST" action="<?= $_SERVER['PHP_SELF']?>?action=view-shame&shame_id=<?=$_GET['shame_id']?>">
  <? include('_shame-form.php'); ?>
  <button type="button" class="btn btn-default">Back</button>
</form>


<?
include('../footer.php');