<div class="form-group">
  <label>Website ID</label>
  <input type="text" name="shame[website_id]" <? if($readonly) echo 'READONLY'; ?> value="<?= $shame['website_id'] ?>" class="form-control" placeholder="Enter URL">
</div>
<div class="form-group">
  <label>Shames</label>
  <input type="text" name="shame[shame]" <? if($readonly) echo 'READONLY'; ?> value="<?= $shame['shame'] ?>" class="form-control" placeholder="Shame">
</div>
<div class="form-group">
  <label>User ID</label>
  <input type="text" name="shame[user_id]" <? if($readonly) echo 'READONLY'; ?> value="<?= $shame['user_id'] ?>" class="form-control" placeholder="Shame">
</div>
<div class="form-group">
  <label>Notes</label>
  <input type="text" name="shame[notes]" <? if($readonly) echo 'READONLY'; ?> value="<?= $shame['notes'] ?>" class="form-control" placeholder="Shame Notes">
</div>

