<div class="wrap">

	<?php settings_errors(); ?>
    <div id="icon-options-general" class="icon32"><br></div>
    <h2> <?php _e( 'GFireM FFP MP 2 Account', 'gfirem-ffp-m2-account-locale' ); ?></h2>
    <div style="overflow: auto;">
        <span style="font-size: 13px; float:right;"><?php _e( 'With love from ', 'gfirem-ffp-m2-account-locale' ); ?><a href="http://www.gfirem.com/" target="_new">GFireM</a>.</span>
    </div>

    <form method="post" action="options.php">
		<?php wp_nonce_field( 'update-options' ); ?>
		<?php settings_fields( GFireMFfpMp2AccountManager::get_slug() ); ?>
		<?php do_settings_sections( GFireMFfpMp2AccountManager::get_slug() ); ?>
    </form>

</div>
