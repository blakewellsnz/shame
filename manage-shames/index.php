<?
// Require security helpers
require_once('../authenticator.php');
$authenticator = new AuthenticatorHelper();
// Secured content, redirect unauthenticated users
$authenticator->redirectUnauthenticatedUser();
$db = new DatabaseHelper();

switch($_GET['action']){
  case 'add-shame':
      require('add-shame.php');
      die();
    break;
  
  case 'edit-shame':
      require('edit-shame.php');
      die();
    break;
  
  case 'view-shame':
      require('view-shame.php');
      die();
    break;
}

$db = new DatabaseHelper();
if( $shames = $db->getAllByTableName('shames') ){

}else{
  echo 'SHIT HAS HIT THE PHLAN!!!';
}


include('../header.php');
?>
<div class="container">
    <div class="row">
        <div class="col-xs-6 pull-left">
            <h1>Manage Shames</h1>
        </div>
            <? if( $_GET['message'] ) echo '<p class="alert alert-success">'.$_GET['message'].'</p>'; ?>
            <? if( $_GET['error'] ) echo '<p class="alert alert-danger">'.$_GET['error'].'</p>'; ?>
        <div class="col-xs-6 pull-right">
            <a href="/shame/manage-shames/?action=add-shame" class="btn btn-success"><i class="fa fa-bullhorn"></i> Add shame</a>
        </div>
    </div>
    <div class="col-xs-12">
    <h3>List All shames</h3>
    <ul><? 
      foreach($shames as $shame){ ?>
          <li>
            <strong><?= $shame['user_id'] ?> - <?= $shame['website_id']?></strong> 
            <em><?= $shame['shame']?></em>
            <a href="/shame/manage-shames/?action=edit-shame&shame_id=<?= $shame['id'] ?>"><i class="fa fa-pencil"></i> Edit</a>
            <a href="/shame/manage-shames/?action=view-shame&shame_id=<?= $shame['id'] ?>"><i class="fa fa-eye"></i> View</a>
          </li><? 
      } ?>
    </ul>
    </div>
</div>


<?
include('../footer.php');