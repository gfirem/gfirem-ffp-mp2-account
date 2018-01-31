<?php /** @var GFireMFfpMp2AccountSettings $this */ ?>
<label>
    <p><?php FrmFormsHelper::forms_dropdown( GFireMFfpMp2AccountManager::get_slug() . '[form]', ( isset( $this->settings['form'] ) ) ? $this->settings['form'] : '' ); ?>
    <?php _e( 'This is the form will appear in My Account of MP 2.', 'gfirem-ffp-m2-account-locale' ); ?></p>
</label>
