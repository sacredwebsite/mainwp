<?php

/**
 * @see MainWP_Bulk_Add
 */
class MainWP_Bulk_Update_Admin_Passwords {
	public static function getClassName() {
		return __CLASS__;
	}

	public static function initMenu() {
		add_submenu_page( 'mainwp_tab', __( 'Admin Passwords', 'mainwp' ), '<div class="mainwp-hidden">' . __( 'Admin Passwords', 'mainwp' ) . '</div>', 'read', 'UpdateAdminPasswords', array(
			MainWP_Bulk_Update_Admin_Passwords::getClassName(),
			'render',
		) );
	}

	public static function renderFooter( $shownPage ) {
		?>
		</div>
		</div>
		<?php
	}

	public static function render() {
		$show_form = true;

		if ( isset( $_POST['updateadminpassword'] ) ) {
			check_admin_referer( 'mainwp_updateadminpassword', 'security' );

			$errors = array();
			if ( isset( $_POST['select_by'] ) ) {
				$selected_sites = array();
				if ( isset( $_POST['selected_sites'] ) && is_array( $_POST['selected_sites'] ) ) {
					foreach ( $_POST['selected_sites'] as $selected ) {
						$selected_sites[] = $selected;
					}
				}

				$selected_groups = array();
				if ( isset( $_POST['selected_groups'] ) && is_array( $_POST['selected_groups'] ) ) {
					foreach ( $_POST['selected_groups'] as $selected ) {
						$selected_groups[] = $selected;
					}
				}
				if ( ( $_POST['select_by'] == 'group' && count( $selected_groups ) == 0 ) || ( $_POST['select_by'] == 'site' && count( $selected_sites ) == 0 ) ) {
					$errors[] = __( 'Please select the sites or groups where you want to change the admin password.', 'mainwp' );
				}
			} else {
				$errors[] = __( 'Please select whether you want to change the admin password for specific sites or groups.', 'mainwp' );
			}
			if ( ! isset( $_POST['pass1'] ) || $_POST['pass1'] == '' || ! isset( $_POST['pass2'] ) || $_POST['pass2'] == '' ) {
				$errors[] = __( 'Please enter the password twice.', 'mainwp' );
			} else if ( $_POST['pass1'] != $_POST['pass2'] ) {
				$errors[] = __( 'Please enter the same password in the two password fields.', 'mainwp' );
			}
			if ( count( $errors ) == 0 ) {
				$show_form = false;

				$new_password = array(
					'user_pass' => $_POST['pass1'],
				);

				$dbwebsites = array();
				if ( $_POST['select_by'] == 'site' ) { //Get all selected websites
					foreach ( $selected_sites as $k ) {
						if ( MainWP_Utility::ctype_digit( $k ) ) {
							$website                    = MainWP_DB::Instance()->getWebsiteById( $k );
							$dbwebsites[ $website->id ] = MainWP_Utility::mapSite( $website, array(
								'id',
								'url',
								'name',
								'adminname',
								'nossl',
								'privkey',
								'nosslkey',
							) );
						}
					}
				} else { //Get all websites from the selected groups
					foreach ( $selected_groups as $k ) {
						if ( MainWP_Utility::ctype_digit( $k ) ) {
							$websites = MainWP_DB::Instance()->query( MainWP_DB::Instance()->getSQLWebsitesByGroupId( $k ) );
							while ( $websites && ( $website = @MainWP_DB::fetch_object( $websites ) ) ) {
								if ( $website->sync_errors != '' ) {
									continue;
								}
								$dbwebsites[ $website->id ] = MainWP_Utility::mapSite( $website, array(
									'id',
									'url',
									'name',
									'adminname',
									'nossl',
									'privkey',
									'nosslkey',
								) );
							}
							@MainWP_DB::free_result( $websites );
						}
					}
				}

				if ( count( $dbwebsites ) > 0 ) {
					$post_data      = array(
						'new_password' => base64_encode( serialize( $new_password ) ),
					);
					$output         = new stdClass();
					$output->ok     = array();
					$output->errors = array();
					MainWP_Utility::fetchUrlsAuthed( $dbwebsites, 'newadminpassword', $post_data, array(
						MainWP_Bulk_Add::getClassName(),
						'PostingBulk_handler',
					), $output );
				}
			}
		}

		if ( ! $show_form ) {
			//Added to..
			?>
			<div class="wrap">
                <h2 id="add-new-user"><i class="fa fa-key"></i> Update Admin Passwords</h2>

				<div id="message" class="updated">
					<?php foreach ( $dbwebsites as $website ) { ?>
						<p>
							<a href="<?php echo admin_url( 'admin.php?page=managesites&dashboard=' . $website->id ); ?>"><?php echo stripslashes( $website->name ); ?></a>: <?php echo( isset( $output->ok[ $website->id ] ) && $output->ok[ $website->id ] == 1 ? __( 'Admin password updated.', 'mainwp' ) : __( 'ERROR: ', 'mainwp' ) . $output->errors[ $website->id ] ); ?>
						</p>
					<?php } ?>
				</div>
				<br/>
				<a href="<?php echo get_admin_url() ?>admin.php?page=UpdateAdminPasswords" class="add-new-h2" target="_top"><?php _e( 'Update admin passwords', 'mainwp' ); ?></a>
				<a href="<?php echo get_admin_url() ?>admin.php?page=mainwp_tab" class="add-new-h2" target="_top"><?php _e( 'Return to Dashboard', 'mainwp' ); ?></a>
			</div>
			<?php
		} else {
			wp_enqueue_script( 'user-profile' );
			// header in User page
			MainWP_User::renderHeader( 'UpdateAdminPasswords' );
			?>
			<form action="" method="post" name="createuser" id="createuser" class="add:users: validate">

				<input type="hidden" name="security" value="<?php echo wp_create_nonce( 'mainwp_updateadminpassword' ); ?>"/>

				<div class="mainwp_config_box_right">
					<?php MainWP_UI::select_sites_box( __( 'Select Sites to Update', 'mainwp' ) ); ?>
				</div>

				<div class="mainwp_config_box_left postbox mainwp-postbox">
					<h3 class="mainwp_box_title">
						<i class="fa fa-key"></i> <?php _e( 'Bulk Update Administrator Passwords', 'mainwp' ); ?></h3>

					<div class="inside">
						<table class="form-table">
							<?php
							global $wp_version;
							if ( version_compare( '4.3-alpha', $wp_version, '>=' ) ) : ?>
								<tr class="form-field form-required">
									<th scope="row"><label for="pass1"><?php _e( 'Enter New Password ', 'mainwp' ); ?>
											<br/><span class="description"><?php _e( '(twice, required)', 'mainwp' ); ?></span></label>
									</th>
									<td>
										<input name="user_login" type="hidden" id="user_login" value="admin">
										<input class="" name="pass1" type="password" id="pass1" autocomplete="off"/>
										<br/>
										<input class="" name="pass2" type="password" id="pass2" autocomplete="off"/>
										<br/>

										<div id="pass-strength-result" style="display: block;"><?php _e( 'Strength indicator', 'mainwp' ); ?></div>
										<p class="description indicator-hint" style="clear:both;"><?php _e( 'Hint: The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ &amp; ).', 'mainwp' ); ?></p>
									</td>
								</tr>
							<?php else : ?>
								<tr class="form-field form-required user-pass1-wrap">
									<th scope="row">
										<label for="pass1">
											<?php _e( 'New Password', 'mainwp' ); ?>
											<span class="description hide-if-js"><?php _e( '(required)' ); ?></span>
										</label>
									</th>
									<td>
										<input class="hidden" value=" "/><!-- #24364 workaround -->
										<!--                   			<button type="button" class="button button-secondary wp-generate-pw hide-if-no-js">--><?php //_e( 'Show password' ); ?><!--</button>-->
										<div class="wp-pwd123">
											<?php $initial_password = wp_generate_password( 24 ); ?>
											<span class="password-input-wrapper">
												<input type="password" name="pass1" id="pass1" class="regular-text" autocomplete="off" data-reveal="1" data-pw="<?php echo esc_attr( $initial_password ); ?>" aria-describedby="pass-strength-result"/>
											</span>
											<button type="button" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="<?php esc_attr_e( 'Hide password' ); ?>">
												<span class="dashicons dashicons-hidden"></span>
												<span class="text"><?php _e( 'Hide' ); ?></span>
											</button>
											<!--                   				<button type="button" class="button button-secondary wp-cancel-pw hide-if-no-js" data-toggle="0" aria-label="--><?php //esc_attr_e( 'Cancel password change' ); ?><!--">-->
											<!--                   					<span class="text">--><?php //_e( 'Cancel' ); ?><!--</span>-->
											<!--                                </button>-->
											<div style="display:none" id="pass-strength-result" aria-live="polite"></div>
										</div>
									</td>
								</tr>
								<tr class="form-field form-required user-pass2-wrap hide-if-js">
									<td scope="row"><label for="pass2"><?php _e( 'Repeat Password' ); ?>
											<span class="description"><?php _e( '(required)' ); ?></span></label></td>
									<td>
										<input name="pass2" type="password" id="pass2" value="<?php echo esc_attr( $initial_password ); ?>" autocomplete="off"/>
									</td>
								</tr>
							<?php endif; ?>
							<tr>
								<td colspan="2">
									<p class="description indicator-hint"><?php _e( 'Hint: The password should be at least seven
                                characters long. To make it stronger, use upper and lower case letters, numbers and
                                symbols like ! " ? $ % ^ &amp; ).', 'mainwp' ); ?></p>
								</td>
							</tr>
							<tr>
								<td></td>
								<td colspan="2">
									<input type="submit" name="updateadminpassword" id="bulk_updateadminpassword" class="button-primary button button-hero" value="<?php _e( 'Update Now', 'mainwp' ); ?>"/>
								</td>
							</tr>
						</table>
					</div>
				</div>

			</form>
			<?php
			MainWP_User::renderFooter( 'UpdateAdminPasswords' );
		}
	}

	// this help moved to User page
	public static function QSGManageAdminPasswords() {
		MainWP_User::renderHeader( 'AdminPasswordsHelp' );
		?>
		<div style="text-align: center">
			<a href="#" class="button button-primary" id="mainwp-quick-start-guide"><?php _e( 'Show Quick Start Guide', 'mainwp' ); ?></a>
		</div>
		<div class="mainwp_info-box-yellow" id="mainwp-qsg-tips">
			<span><a href="#" class="mainwp-show-qsg" number="1"><?php _e( 'Manage Admin Passwords', 'mainwp' ) ?></a></span><span><a href="#" id="mainwp-qsg-dismiss" style="float: right;"><i class="fa fa-times-circle"></i> <?php _e( 'Dismiss', 'mainwp' ); ?>
				</a></span>

			<div class="clear"></div>
			<div id="mainwp-qsgs">
				<div class="mainwp-qsg" number="1">
					<h3>Manage Admin Passwords</h3>

					<p>
					<ol>
						<li>
							Enter a new password twice
						</li>
						<li>
							Select the sites in the Select Site Box
						</li>
						<li>
							Click Update Now button
						</li>
					</ol>
					</p>
				</div>
			</div>
		</div>
		<?php
		MainWP_User::renderFooter( 'AdminPasswordsHelp' );
	}
}

?>
