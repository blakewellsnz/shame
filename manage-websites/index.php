<?
// Require security helpers
require_once('../authenticator.php');
$authenticator = new AuthenticatorHelper();
// Secured content, redirect unauthenticated users
$authenticator->redirectUnauthenticatedUser();
$db = new DatabaseHelper();

switch($_GET['action']){
  case 'add-website':
      require('add-website.php');
      die();
    break;
  
  case 'edit-website':
      require('edit-website.php');
      die();
    break;
  
  case 'view-website':
      require('view-website.php');
      die();
    break;
}



if( $websites = $db->getAllByTableName('websites') ){
}else{
  echo 'SHIT HAS HIT THE PHLAN!!!';
}


include('../header.php');
?>
<h1>Manage Websites</h1>
<? if( $_GET['message'] ) echo '<p class="alert alert-success">'.$_GET['message'].'</p>'; ?>
<? if( $_GET['error'] ) echo '<p class="alert alert-danger">'.$_GET['error'].'</p>'; ?>
<a href="/shame/manage-websites/?action=add-user" class="btn btn-success"><i class="fa fa-laptop"></i> Add Website</a>

<h3>List All Websites</h3>
<ul><? 
  foreach($websites as $website){ ?>
      <li>
        <strong><?= $website['username'] ?></strong> 
        <em><?= date('D jS F Y', strtotime($user['date_created']) ) ?></em>
        <a href="/manage-websites/?action=edit-website&website_id=<?= $website['id'] ?>"><i class="fa fa-pencil"></i> Edit</a>
        <a href="/manage-websites/?action=view-website&website_id=<?= $website['id'] ?>"><i class="fa fa-eye"></i> View</a>
      </li><? 
  } ?>
</ul>


<?
include('../footer.php');