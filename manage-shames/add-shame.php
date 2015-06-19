<?
// Secure file
if(! isset($authenticator) ){
  die(); 
}

if($_POST['shame']){
  $db->insert('shames', $_POST['shame'], 'Successfully added shame');
}

include('../header.php');
?>

<h3>Add New Shame</h3>
<form method="POST" action="<?= $_SERVER['PHP_SELF']?>?action=add-shame">
  <? include('_shame-form.php'); ?>
  <button class="btn btn-success">Add Shame</button>
</form>


<?
include('../footer.php');
