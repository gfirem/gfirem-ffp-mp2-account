<?php /** @var GFireMFfpMp2AccountSettings $this */ ?>
<label>
    <p><select name='<?php echo GFireMFfpMp2AccountManager::get_slug() ?>[position]'>
			<?php
			foreach ( $this->positions as $key => $title ) {
				echo '<option value="' . $key . '" ' . selected( ( isset( $this->settings['position'] ) ) ? $this->settings['position'] : 'after_profile', $key, false ) . '>' . $title . '</option>';
			}
			?>
        </select>
		<?php _e( 'This option override the default tab to show when the user click in the Shop tab.', 'gfirem-ffp-m2-account-locale' ); ?></p>
</label>

