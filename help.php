<?php add_action( 'admin_menu', 'sh_sb_help_page' );

function sh_sb_help_page() {

	/* Add documentation */
	$contextual_help = '<h2>'.__('Help', 'shaken').' - Social Bartender</h2>';
	
	$contextual_help .= '<h3>'.__('Including the list of links in your theme', 'shaken').'</h3>';
	
	$contextual_help .= '<p>'.__('To include the list of links in your theme, you need to place the following PHP function in the location where you want the links to appear:', 'shaken').'</p>';
	
	$contextual_help .= '<code>&lt;?php social_bartender(); ?&gt;</code>';
	
	$contextual_help .= '<hr />';
	
	$contextual_help .= '<h3>'.__( 'Parameters', 'shaken' ).'</h3>';
	
	$contextual_help .= '<p><strong>link_before</strong>: '.__('(string) Sets the text or html that precedes the &lt;a&gt; tag. Default = \'\'', 'shaken' ).'</p>';
	
	$contextual_help .= '<p><strong>link_after</strong>: '.__('(string) Sets the text or html that follows the &lt;a&gt; tag. Default = \'\'', 'shaken' ).'</p>';
	
	$contextual_help .= '<p><strong>echo</strong>: '.__('(boolean) Toggles the display of the generated list of links or return the list as an HTML text string to be used in PHP. Default = 1', 'shaken').'</p>';

	$contextual_help .= '<hr />';

	$contextual_help .= '<h3>'.__( 'Example Output', 'shaken' ).'</h3>';

	$contextual_help .= '<p>'.__('Using the default settings, the <code>social_bartender()</code> function would output the following:', 'shaken').'</p>';
	
	$contextual_help .= '<pre><code>&lt;a href="http://example.com" class="sh-sb-link"&gt;
&lt;img src="http://mysite.com/images/icon.png" alt="Link Title" class="sh-sb-icon"&gt;
&lt;/a&gt;

&lt;a href="http://example.com" class="sh-sb-link"&gt;
&lt;img src="http://mysite.com/images/icon-2.png" alt="Link #2 Title" class="sh-sb-icon"&gt;
&lt;/a&gt;</code></pre>';
	
	
	$contextual_help .= '<hr />';
	
	$contextual_help .= '<h3>'.__('Theme Developers', 'shaken').'</h3>';
	
	$contextual_help .= '<p>'.__('If you would like to make your own icon set available to users in the Icon Box, just place the images inside of an "images/sb-icons" folder of your theme.', 'shaken').'</p>';
	
	$contextual_help .= '<h3>'.__('Credits / Support', 'shaken').'</h3>';
	
	$contextual_help .= '<p>'.__( 'The Social Bartender plugin was created by', 'shaken' ).' <a href="http://shakenandstirredweb.com">Shaken and Stirred Web</a>. '.__( 'If you find any bugs, have feature requests, or would like to contribute, please visit the plugin\'s <a href="https://github.com/sawyerh/social-bartender">GitHub page</a>.', 'shaken').'</p>';
	
	$contextual_help .= '<p><strong>'.__( 'Contributors:', 'shaken' ).'</strong> @sawyerh, @devinsays, @NickHamze, and @thelukemcdonald</p>';

	add_contextual_help( 'settings_page_sh_sb_settings_page', $contextual_help );
}

?>