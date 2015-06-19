<?
// Secure file
if(! isset($authenticator) ){
  die(); 
}

if($_POST['user']){
  $db->insert('users', $_POST['user'], 'Successfully added user');
}


// Require security helpers
require_once('../authenticator.php');
// Secured content, redirect unauthenticated users
$authenticator = new AuthenticatorHelper();
$authenticator->redirectUnauthenticatedUser();

if($_POST['add_user']){
  global $mysql;
  connectToDatabase();
  
  $username = $_POST['add_user']['username'];
  $password = $_POST['add_user']['password'];
  
  $add_user_sql = "INSERT INTO users (username, password) VALUES('$username','$password')";
  $add_user = mysql_query($add_user_sql);
  
  header("Location: /shame/manage-users/?message=Successfully added <strong>$username</strong>.");
}


include('../header.php');
?>

<h3>Add New User</h3>
<form method="POST" action="<?= $_SERVER['PHP_SELF']?>?action=add-user">
  <? include('_user-form.php'); ?>
  <button class="btn btn-success">Add User</button>
</form>


<?
include('../footer.php');
