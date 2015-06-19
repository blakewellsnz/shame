<?

require('kint/Kint.class.php');

Kint::trace();
die("mwmwhahahahahahha");


// Require security helpers
require_once('authenticator.php');
$authenticator = new AuthenticatorHelper();
// Secured content, redirect unauthenticated users
//$authenticator->redirectUnauthenticatedUser();

switch($_GET['action']){
  case 'manage-shames':
      header('Location: /shame/manage-shames/');
    break;  
  
  case 'manage-websites':
      header('Location: /shame/manage-websites/');
    break;  
  
  case 'manage-users':
      header('Location: /shame/manage-users/');
    break;
}

$logger = new Logger();
//$logger->setLog('access', 'Loaded admin.php section');
//$logger->saveLog();
$logger->setType('access');
die(var_dump($logger->sendEmail()));

include('header.php');
?>

<!-- html content for admin page --> 

<h1>Mission Control</h1>
<div class="col-xs-4">
  <h3>Manage Users</h3>
</div>
<div class="col-xs-4">
  <h3>Manage Websites</h3>
</div>
<div class="col-xs-4">
  <h3>Manage Shames</h3>
</div>

<?
include('footer.php');