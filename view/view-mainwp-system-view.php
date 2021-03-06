<?php

class MainWP_System_View {
	public static function getMainWPTranslations() {
		function mainwpAddTranslation( &$pArray, $pKey, $pText ) {
			if ( ! is_array( $pArray ) ) {
				$pArray = array();
			}

			$strippedText = str_replace( ' ', '_', $pKey );
			$strippedText = preg_replace( '/[^A-Za-z0-9_]/', '', $strippedText );

			$pArray[ $strippedText ] = $pText;
		}

		$mainwpTranslations = array();
		mainwpAddTranslation( $mainwpTranslations, 'Update settings.', __( 'Update settings.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Settings have been updated.', __( 'Settings have been updated.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'An error occured.', __( 'An error occured.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Testing login.', __( 'Testing login.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Your login is valid.', __( 'Your login is valid.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Your login is invalid.', __( 'Your login is invalid.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'An error occured, please contact us.', __( 'An error occured, please contact us.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'more', __( 'more', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'less', __( 'less', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'An error occured: ', __( 'An error occured: ', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'No data available. Connect your sites using the Settings submenu.', __( 'No data available. Connect your sites using the Settings submenu.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Undefined error', __( 'Undefined error', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'PENDING', __( 'PENDING', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'UPDATING', __( 'UPDATING', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'UPGRADING', __( 'UPGRADING', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'FAILED', __( 'FAILED', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'DONE', __( 'DONE', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Ignored', __( 'Ignored', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'No ignored %1s', __( 'No ignored %1s', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'No ignored %1 conflicts', __( 'No ignored %1 conflicts', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'No ignored plugins', __( 'No ignored plugins', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'No ignored themes', __( 'No ignored themes', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Upgrading..', __( 'Upgrading..', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Upgrade successful', __( 'Upgrade successful', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Upgrade failed', __( 'Upgrade failed', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Show All', __( 'Show All', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Show', __( 'Show', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Hide All', __( 'Hide All', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Hide', __( 'Hide', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Testing ...', __( 'Testing ...', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Test Settings', __( 'Test Settings', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Received wrong response from the server.', __( 'Received wrong response from the server.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Untitled', __( 'Untitled', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Are you sure you want to remove this destination. This could make some of the backup tasks invalid.', __( 'Are you sure you want to remove this destination. This could make some of the backup tasks invalid.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Starting backup task.', __( 'Starting backup task.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Cancel', __( 'Cancel', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Backup task complete', __( 'Backup task complete', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'with errors', __( 'with errors', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Close', __( 'Close', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Creating backupfile.', __( 'Creating backupfile.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Backupfile created successfully.', __( 'Backupfile created successfully.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Download from child site completed.', __( 'Download from child site completed.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Uploading to remote destinations..', __( 'Uploading to remote destinations..', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Backup complete.', __( 'Backup complete.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Upload to %1 (%2) failed:', __( 'Upload to %1 (%2) failed:', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Upload to %1 (%2) succesful', __( 'Upload to %1 (%2) succesful', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please select websites or groups to add a backup task.', __( 'Please select websites or groups to add a backup task.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Adding the task to MainWP', __( 'Adding the task to MainWP', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please select websites or groups.', __( 'Please select websites or groups.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Are you sure you want to delete this backup task?', __( 'Are you sure you want to delete this backup task?', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Removing the task..', __( 'Removing the task..', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'The task has been removed', __( 'The task has been removed', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'An unspecified error occured', __( 'An unspecified error occured', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Connection test failed.', __( 'Connection test failed.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Error message:', __( 'Error message:', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Received HTTP-code:', __( 'Received HTTP-code:', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Connection test successful.', __( 'Connection test successful.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Invalid response from the server, please try again.', __( 'Invalid response from the server, please try again.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please enter csv file for upload', __( 'Please enter csv file for upload', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please enter a name for the website', __( 'Please enter a name for the website', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please enter a valid URL for your site', __( 'Please enter a valid URL for your site', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please enter a username for the administrator', __( 'Please enter a username for the administrator', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Adding the site to MainWP', __( 'Adding the site to MainWP', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'No MainWP Child plugin detected, first install and activate the plugin and add your site to MainWP afterwards. Click <a href="%1" target="_blank">here</a> to install <a href="%2" target="_blank">MainWP</a> plugin (do not forget to activate it after installation).', __( 'No MainWP Child plugin detected, first install and activate the plugin and add your site to MainWP afterwards. Click <a href="%1" target="_blank">here</a> to install <a href="%2" target="_blank">MainWP</a> plugin (do not forget to activate it after installation).', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Testing the connection', __( 'Testing the connection', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Are you sure you want to delete this site?', __( 'Are you sure you want to delete this site?', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Removing and deactivating the MainWP Child plugin..', __( 'Removing and deactivating the MainWP Child plugin..', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'The site has been removed and the MainWP Child plugin has been disabled', __( 'The site has been removed and the MainWP Child plugin has been disabled', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'The requested site has not been found', __( 'The requested site has not been found', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'The site has been removed but the MainWP Child plugin could not be disabled', __( 'The site has been removed but the MainWP Child plugin could not be disabled', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Paused import by user.', __( 'Paused import by user.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Continue', __( 'Continue', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Continue import.', __( 'Continue import.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Pause', __( 'Pause', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Finished', __( 'Finished', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please enter the Site name.', __( 'Please enter the Site name.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please enter the Site url.', __( 'Please enter the Site url.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please enter Admin name of the site.', __( 'Please enter Admin name of the site.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Number of sites to Import: %1 Created sites: %2 Failed: %3', __( 'Number of sites to Import: %1 Created sites: %2 Failed: %3', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'HTTP error - website does not exist', __( 'HTTP error - website does not exist', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'No selected Categories', __( 'No selected Categories', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please select websites or groups to add a user.', __( 'Please select websites or groups to add a user.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please enter csv file for upload.', __( 'Please enter csv file for upload.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Number of Users to Import: %1 Created users: %2 Failed: %3', __( 'Number of Users to Import: %1 Created users: %2 Failed: %3', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please enter the username.', __( 'Please enter the username.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please enter the email.', __( 'Please enter the email.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please enter the password.', __( 'Please enter the password.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please select a valid role.', __( 'Please select a valid role.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Loading previous page..', __( 'Loading previous page..', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Loading next page..', __( 'Loading next page..', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Searching the Wordpress repository..', __( 'Searching the Wordpress repository..', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please select websites or groups on the right side to install files.', __( 'Please select websites or groups on the right side to install files.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Queued', __( 'Queued', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'In progress', __( 'In progress', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Preparing %1 installation.', __( 'Preparing %1 installation.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Installation successful', __( 'Installation successful', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Installation failed', __( 'Installation failed', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please select websites or groups to install files.', __( 'Please select websites or groups to install files.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Creating the backupfile on the child installation, this might take a while depending on the size. Please be patient.', __( 'Creating the backupfile on the child installation, this might take a while depending on the size. Please be patient.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Backupfile on child site created successfully.', __( 'Backupfile on child site created successfully.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Downloading the file.', __( 'Downloading the file.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Download from site child completed.', __( 'Download from site child completed.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please wait while we are saving your note', __( 'Please wait while we are saving your note', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Note saved.', __( 'Note saved.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'An error occured while saving your message.', __( 'An error occured while saving your message.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please search and select users for update password.', __( 'Please search and select users for update password.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'All', __( 'All', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Any', __( 'Any', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'HTTP error', __( 'HTTP error', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Error on your child wordpress', __( 'Error on your child wordpress', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'No MainWP Child plugin detected, first install and activate the plugin and add your site to MainWP afterwards. If you continue experiencing this issue please post as much information as possible on the error in the <a href="https://mainwp.com/forum/">support forum</a>.', __( 'No MainWP Child plugin detected, first install and activate the plugin and add your site to MainWP afterwards. If you continue experiencing this issue please post as much information as possible on the error in the <a href="https://mainwp.com/forum/">support forum</a>.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'No MainWP Child plugin detected, first install and activate the plugin and add your site to MainWP afterwards. If you continue experiencing this issue please  test your connection <a href="admin.php?page=managesites&do=test&site=%1">here</a> or post as much information as possible on the error in the <a href="https://mainwp.com/forum/">support forum</a>.', __( 'No MainWP Child plugin detected, first install and activate the plugin and add your site to MainWP afterwards. If you continue experiencing this issue please  test your connection <a href="admin.php?page=managesites&do=test&site=%1">here</a> or post as much information as possible on the error in the <a href="https://mainwp.com/forum/">support forum</a>.', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Remove', __( 'Remove', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please reconnect to Dropbox', __( 'Please reconnect to Dropbox', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Please wait', __( 'Please wait', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Upgrading all', __( 'Upgrading all', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Upgrading %1', __( 'Upgrading %1', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Updating your plan...', __( 'Updating your plan...', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Updated your plan', __( 'Updated your plan', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'A full backup has not been taken in the last 7 days for the following sites:', __( 'A full backup has not been taken in the last 7 days for the following sites:', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Starting required backup(s).', __( 'Starting required backup(s).', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Required backup(s) complete', __( 'Required backup(s) complete', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Continue upgrade anyway', __( 'Continue upgrade anyway', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Continue upgrade', __( 'Continue upgrade', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Pause', __( 'Pause', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Resume', __( 'Resume', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Checking if a backup is required for the selected upgrades...', __( 'Checking if a backup is required for the selected upgrades...', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Full backup required', __( 'Full backup required', 'mainwp' ) );
		mainwpAddTranslation( $mainwpTranslations, 'Checking backup settings', __( 'Checking backup settings', 'mainwp' ) );

		return $mainwpTranslations;
	}
}
