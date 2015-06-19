<html>
<head>
    <title>Shame-n-ator!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" src="css/style.css" />

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container main">
    <div class="row">
      <? if( $authenticator->isAuthenticated() ): ?>
          <ul class="col-xs-3">
              <li><a href="admin.php?action=manage-shames">Manage Shame</a></li>
              <li><a href="admin.php?action=manage-websites">Manage Websites</a></li>
              <li><a href="admin.php?action=manage-users">Manage Users</a></li>
              <li><a href="index.php?logout=yes">Logout</a></li>
          </ul>
      <? else: ?>
          <form class="col-xs-3" method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
              <h3>Login</h3>
              
              <label>Username</label>
              <input type="text" name="login[username]" />
              
              <label>Password</label>
              <input type="password" name="login[password]" />
              
              <button class="btn btn-success">Login</button>
          </form>
      <? endif; ?>
      
      <div class="col-xs-9">
        <?= $htmlContent ?>
      </div>
      
    </div><!-- .row -->
  </div><!-- .container.main -->
</body>
</html>