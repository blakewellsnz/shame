<?
// Require security helpers
require_once('../authenticator.php');
$authenticator = new AuthenticatorHelper();
// Secured content, redirect unauthenticated users
$authenticator->redirectUnauthenticatedUser();
$db = new DatabaseHelper();

switch($_GET['action']){
  case 'add-user':
      require('add-user.php');
      die();
    break;
  
  case 'edit-user':
      require('edit-user.php');
      die();
    break;
  
  case 'view-user':
      require('view-user.php');
      die();
    break;
}


if( $users = $db->getAllByTableName('users') ){
}else{
  echo 'SHIT HAS HIT THE PHLAN!!!';
}


include('../header.php');

?>
<h1>Manage Users</h1>
<? if( $_GET['message'] ) echo '<p class="alert alert-success">'.$_GET['message'].'</p>'; ?>
<? if( $_GET['error'] ) echo '<p class="alert alert-danger">'.$_GET['error'].'</p>'; ?>
<a href="/shame/manage-users/?action=add-user" class="btn btn-success"><i class="fa fa-user"></i> Add User</a>

<h3>List All Users</h3>
<ul><? 
  foreach($users as $user){ ?>
      <li>
        <strong><?= $user['username'] ?></strong> 
        <em><?= date('D jS F Y', strtotime($user['date_created']) ) ?></em>
        <a href="/shame/manage-users/?action=edit-user&user_id=<?= $user['id'] ?>"><i class="fa fa-pencil"></i> Edit</a>
        <a href="/shame/manage-users/?action=view-user&user_id=<?= $user['id'] ?>"><i class="fa fa-eye"></i> View</a>
      </li><? 
  } ?>
</ul>



<?
include('../footer.php');