<?php 

/*	Show the new style help section if user is running WP 3.3
 ******************************************************** */
if( version_compare( '3.3', get_bloginfo( 'version' ), '<=' ) ):

function sh_sb_help_page() {
	global $sh_sb_settings;
	$current_screen = get_current_screen();
	if ($current_screen->id != $sh_sb_settings)
		return;

	// Overview tab
	
	$sb_overview = '<h2>'.__('Help', 'shaken').' - Social Bartender</h2>';
	
	$sb_overview .= '<h3>'.__('Including the list of links in your theme', 'shaken').'</h3>';
	
	$sb_overview .= '<p>'.__('To include the list of links in your theme, you need to place the following PHP function in the location where you want the links to appear:', 'shaken').'</p>';
	
	$sb_overview .= '<code>&lt;?php social_bartender(); ?&gt;</code>';
	
	$sb_overview .= '<h3>'.__('Theme Developers', 'shaken').'</h3>';
	
	$sb_overview .= '<p>'.__('If you would like to make your own icon set available to users in the Icon Box, just place the images inside of an "images/sb-icons" folder of your theme.', 'shaken').'</p>';
	
	$sb_overview .= '<h3>'.__('Credits', 'shaken').'</h3>';
	
	$sb_overview .= '<p><strong>'.__( 'Contributors:', 'shaken' ).'</strong> @sawyerh, @devinsays, @NickHamze, and @thelukemcdonald</p>';
			
	$current_screen->add_help_tab( array(
	    'id'      => 'overview',
		'title'   => __('Overview'),
		'content' => $sb_overview,
	) );
	
	// Parameters tab
	
	$sb_parameters = '<h3>'.__( 'Parameters', 'shaken' ).'</h3>';
	
	$sb_parameters .= '<p><strong>link_before</strong>: '.__('(string) Sets the text or html that precedes the &lt;a&gt; tag. Default = \' \'', 'shaken' ).'</p>';
	
	$sb_parameters .= '<p><strong>link_after</strong>: '.__('(string) Sets the text or html that follows the &lt;a&gt; tag. Default = \' \'', 'shaken' ).'</p>';
	
	$sb_parameters .= '<p><strong>echo</strong>: '.__('(boolean) Toggles the display of the generated list of links or return the list as an HTML text string to be used in PHP. Default = 1', 'shaken').'</p>';
	
		
	
	$current_screen->add_help_tab( array(
	    'id'      => 'parameters',
		'title'   => __('Parameters'),
		'content' => $sb_parameters,
	) );
	
	// Output tab
	
	$sb_output .= '<h3>'.__( 'Example Output', 'shaken' ).'</h3>';
	
	$sb_output .= '<p>'.__('Using the default settings, the <code>social_bartender()</code> function would output the following:', 'shaken').'</p>';
	
	$sb_output .= '<pre><code>&lt;a href="http://example.com" class="sh-sb-link"&gt;
	&lt;img src="http://mysite.com/images/icon.png" alt="Link Title" class="sh-sb-icon"&gt;
	&lt;/a&gt;
	
	&lt;a href="http://example.com" class="sh-sb-link"&gt;
	&lt;img src="http://mysite.com/images/icon-2.png" alt="Link #2 Title" class="sh-sb-icon"&gt;
	&lt;/a&gt;</code></pre>';
	
	$current_screen->add_help_tab( array(
	    'id'      => 'output',
		'title'   => __('Example Output'),
		'content' => $sb_output,
	) );
	
	// Sidebar
	
	$current_screen->add_help_sidebar(
		'<p><strong>' . __( 'For more information:' ) . '</strong></p>' .
		'<p>' . __( '<a href="https://github.com/sawyerh/social-bartender" target="_blank">Contribute on Github</a>' ) . '</p>' .
		'<p>' . __( '<a href="http://shakenandstirredweb.com">Shaken and Stirred Web</a>' ) . '</p>' .
		'<p>' . __( '<a href="http://onlythefunctions.com" target="_blank">Only the Functions</a>' ) . '</p>'
	
	); 
}

else:

/*	Show the old style contextual help if user isn't running WP 3.3+
 ******************************************************** */
 
add_action( 'admin_menu', 'sh_sb_help_page_old' );

function sh_sb_help_page_old() {

	/* Add documentation */
	$contextual_help = '<h2>'.__('Help', 'shaken').' - Social Bartender</h2>';
	
	$contextual_help .= '<h3>'.__('Including the list of links in your theme', 'shaken').'</h3>';
	
	$contextual_help .= '<p>'.__('To include the list of links in your theme, you need to place the following PHP function in the location where you want the links to appear:', 'shaken').'</p>';
	
	$contextual_help .= '<code>&lt;?php social_bartender(); ?&gt;</code>';
	
	$contextual_help .= '<hr />';
	
	$contextual_help .= '<h3>'.__( 'Parameters', 'shaken' ).'</h3>';
	
	$contextual_help .= '<p><strong>link_before</strong>: '.__('(string) Sets the text or html that precedes the &lt;a&gt; tag. Default = \' \'', 'shaken' ).'</p>';
	
	$contextual_help .= '<p><strong>link_after</strong>: '.__('(string) Sets the text or html that follows the &lt;a&gt; tag. Default = \' \'', 'shaken' ).'</p>';
	
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

endif;
?>