<?php
/**
 * FlagClosedAccounts
 *
 * This code displays a clear indication that an account has been disabled
 * on that user's Special:Contributions page
 *
 * @file
 * @ingroup Extensions
 * @author Łukasz Garczewski (TOR) <tor@wikia-inc.com>
 * @date 2008-01-29
 * @copyright Copyright © 2009 Łukasz Garczewski, Wikia Inc.
 * @license http://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

if ( !defined( 'MEDIAWIKI' ) ) {
	echo "Not a valid entry point.\n";
	exit( 1 );
}

define( 'CLOSED_ACCOUNT_FLAG', 'Account Disabled' );

$wgHooks['SpecialContributionsBeforeMainOutput'][] = 'efFlagClosedAccounts';

$wgExtensionMessagesFiles['EditAccount'] = dirname( __FILE__ ) . '/EditAccount.i18n.php';

function efFlagClosedAccounts( $id ) {
	$u = User::newFromId( $id );
	// Quick safeguard, *just* in case...probably not even needed.
	if ( !$u instanceof User ) {
		return true;
	}
	$disOpt = $u->getOption( 'disabled' );

	if ( !empty( $disOpt ) ) {
		global $wgOut;
		$wgOut->wrapWikiMsg(
			"<div class=\"errorbox account-disabled-box\" style=\"padding: 1em;\">\n$1\n</div>",
			'edit-account-closed-flag'
		);
		$wgOut->addHTML( '<br clear="both" />' );
	}

	return true;
}