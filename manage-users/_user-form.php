<div class="form-group">
  <label>Username</label>
  <input type="text" name="user[username]" <? if($readonly) echo 'READONLY'; ?> value="<?= $edit_user['username'] ?>" class="form-control" placeholder="Enter email">
</div>
<div class="form-group">
  <label>Password</label>
  <input type="text" name="user[password]" <? if($readonly) echo 'READONLY'; ?> value="<?= $edit_user['password'] ?>" class="form-control" placeholder="Password">
</div>

