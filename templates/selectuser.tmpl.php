<?php
/**
 * @file
 */
if ( !defined( 'MEDIAWIKI' ) ) {
	die( 'This is not a valid entry point to MediaWiki.' );
}

/**
 * HTML template for Special:EditAccount -- main screen (for selecting what
 * user to edit)
 *
 * @ingroup Templates
 */
class EditAccountSelectUserTemplate extends QuickTemplate {
	function execute() {
		$status = $this->data['status'];
		$statusMsg = $this->data['statusMsg'];
		$statusMsg2 = $this->data['statusMsg2'];
		$user_hsc = $this->data['user_hsc'];
?>
<!-- s:<?php echo __FILE__ ?> -->
<?php if ( !is_null( $status ) ) { ?>
<fieldset>
	<legend><?php echo wfMsg( 'editaccount-status' ); ?></legend>
	<?php
		if ( $status ) {
			echo Xml::element( 'span', array( 'style' => 'color: darkgreen; font-weight: bold;' ), $statusMsg );
		} else {
			echo Xml::element( 'span', array( 'style' => 'color: #fe0000; font-weight: bold;' ), $statusMsg );
		}
		if( !empty( $statusMsg2 ) ) {
			echo Xml::element( 'span', array( 'style' => 'color: #fe0000; font-weight: bold;' ), $statusMsg2 );
		}
	?>
</fieldset>
<?php } ?>
<form method="post" id="editaccountSelectForm" action="">
	<fieldset>
		<legend><?php echo wfMsg( 'editaccount-frame-manage' ) ?></legend>
		<label for="wpUserName"><?php echo wfMsg( 'editaccount-label-select' ); ?></label>
		<input type="text" name="wpUserName" value="<?php echo $user_hsc; ?>" />
		<input type="submit" value="<?php echo wfMsg( 'editaccount-submit-account' ); ?>" />
		<input type="hidden" name="wpAction" value="displayuser" />
	</fieldset>
	<fieldset>
		<legend><?php echo wfMsg( 'editaccount-frame-usage' ); ?></legend>
		<?php echo wfMsg( 'editaccount-usage' ); ?>
	</fieldset>
</form>
<!-- e:<?php echo __FILE__ ?> -->
<?php
	}
}