<section class="content">
	<h3 style="margin-top: 6px;"><?= $Lang->get('SUPPORT__SETTINGS_TITLE'); ?></h3>
	<div class="card">
		<div class="card-body">
      <form method="post">
        <div class="row">
          <div class="col-sm-5">
                  <label><?= $Lang->get('SUPPORT__SETTINGS_WEBHOOK'); ?></label>
                  <input type="text" class="form-control" name="webhook" value="<?= $settings ? $settings["discord_webhook"] : "" ?>">
          </div>
        </div>

        <button type="submit"
                  class="btn btn-primary float-right"><?= $Lang->get('GLOBAL__SUBMIT'); ?></button>
      </form>
		</div>
	</div>
</section>
<div class="modal fade" id="modal-settings-suffix" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"><?= $Lang->get('SUPPORT__SHOW_EDIT'); ?></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
		<h4>Aperçu</h4>
		<hr>
		<blockquote>
            <?= $settings ? $settings['suffix_reply'] : "" ?>
        </blockquote>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?= $Lang->get('SUPPORT__CLOSED'); ?></button>
        <button type="button" class="btn btn-primary"><?= $Lang->get('SUPPORT__MODIFY'); ?></button>
      </div>
    </div>
  </div>
</div>
<script>
	$('.modal-settings-suffix').click(function() {
		$('#modal-settings-suffix').modal();
	});
</script>