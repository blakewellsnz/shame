<?
// Require security helpers
require('authenticator.php');
// Secured content, redirect unauthenticated users
redirectUnauthenticatedUser();

# List all users
global $mysql;
$users = array();
connectToDatabase();

if($_POST['add_user']){
  $username = $_POST['add_user']['username'];
  $password = $_POST['add_user']['password'];
  
  $add_user_sql = "INSERT INTO users (username, password) VALUES('$username','$password')";
  $add_user = mysql_query($add_user_sql);
  
  $message = "Successfully added <strong>$username</strong>.";
}

if($_GET['user_id']){
  $user_id = $_GET['user_id'];
  $edit_user_sql = "SELECT * FROM users WHERE id = '$user_id'";
  $edit_user_query = mysql_query($edit_user_sql, $mysql);
  $edit_user = mysql_fetch_assoc($edit_user_query);
}


$query_sql = "SELECT * FROM `users`";
$query = mysql_query($query_sql, $mysql) 
        or die('Query failed: ' . mysql_error());

while( $user = mysql_fetch_assoc($query)){
  $users[] = $user;
  // JAVASCRIPT: users.push(user);
}

// Start the output buffer
ob_start();
?>
<h1>Manage Users</h1>
<? if($message): ?>
  <p class="alert alert-success"><?= $message ?></p>
<? endif;?>

<h3>List All Users</h3>
<ul><? 
  foreach($users as $user){ ?>
      <li><strong><?= $user['username'] ?></strong> - <?= date('D jS F Y', strtotime($user['date_created']) ) ?></li><? 
  } ?>
</ul>

<h3>Add New User</h3>
<form method="POST" action="<?= $_SERVER['PHP_SELF']?>">
  <? include('_user-form.php'); ?>
  <button class="btn btn-success">Add User</button>
</form>

<h3>Edit User</h3>
<form method="POST" action="<?= $_SERVER['PHP_SELF']?>">
  <? include('_user-form.php'); ?>
  <button class="btn btn-success">Update User</button>
</form>

<h3>View User</h3>
<form>
  <? 
    $readonly = true;
    include('_user-form.php'); 
  ?>
</form>



<?
// Get the content of the buffer
$htmlContent = ob_get_contents();
// Clean the buffer
ob_end_clean();
// Load the template, outputting $htmlContent
require('template.php');

# Create a user
# Edit a user
# View a user
# Delete a user