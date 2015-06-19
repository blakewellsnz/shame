<?
require_once('authenticator.php');
$authenticator = new AuthenticatorHelper();
?>

<html>
<head>
    <title>Shame-n-ator!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/shame/css/style.css" type="text/css">

</head>
<body>
  <div class="container main">
    <div class="row">
      <? if( $authenticator->isAuthenticated() ): ?>
      <nav class="navbar navbar-default">
          <a href="/                                                                                         shame/index.php"><img src="/shame/images/logo.png" class="pull-left logo-img"> </a>   
          <ul class="nav nav-pills pull-right">
              <li><a href="/shame/admin.php?action=manage-shames">Manage Shame</a></li>
              <li><a href="/shame/admin.php?action=manage-websites">Manage Websites</a></li>
              <li><a href="/shame/admin.php?action=manage-users">Manage Users</a></li>
              <li><a href="/shame/index.php?logout=yes">Logout</a></li>
          </ul>
        </nav>
      <? else: ?>
      <div class="login-box">
          <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
              <div class="row">
                  <div class="col-xs-12 col-md-6 login-header">
                    <h3 class="text-center">Shame - Login</h3>
                  </div>
              </div>
              <div class="row"><br/>
                  <div class="col-xs-12 col-md-6">
                      <label>Username</label>
                      <input class="username" type="text" name="login[username]" />
                  </div>
              </div>
              <div class="row"><br/>
                  <div class="col-xs-12 col-md-6">
                      <label>Password</label>
                      <input type="password" name="login[password]" />
                  </div>
              </div>
              <br/>
              <div class="col-xs-12 col-md-6 text-center">
              <button class="btn btn-success">Login <i class="fa fa-check-circle"></i> </button>
              </div>
          </form>
        </div>
      <? endif; ?>
      
      <div class="col-xs-9">