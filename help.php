<?php

/* Outputs Page Content */
function sh_sb_help_page(){ ?>

	<div class="wrap">
		<?php screen_icon( 'plugins' ); ?>
		<h2><?php _e( 'Help', 'shaken' ); ?> - Social Bartender</h2>
		
		<h3><?php _e( 'Including the list of links in your theme', 'shaken' ); ?></h3>
		
		<p><?php _e( 'To include the list of links in your theme, you need to place the following PHP function in the location where you want the links to appear:', 'shaken' ); ?></p>
		
		<code>
			&lt;?php social_bartender(); ?&gt;
		</code>
		
		<hr />
		
		<h3><?php _e( 'Parameters', 'shaken' ); ?></h3>
		
		<p><strong>link_before</strong>: <?php _e( '(string) Sets the text or html that precedes the &lt;a&gt; tag. Default = \'\'', 'shaken' ); ?></p>
		
		<p><strong>link_after</strong>: <?php _e( '(string) Sets the text or html that follows the &lt;a&gt; tag. Default = \'\'', 'shaken' ); ?></p>
		
		<p><strong>echo</strong>: <?php _e( '(boolean) Toggles the display of the generated list of links or return the list as an HTML text string to be used in PHP. Default = 1', 'shaken' ); ?></p>
		
		<hr />
		
		<h3><?php _e( 'Example Output', 'shaken' ); ?></h3>
		
		<p><?php _e( 'Using the default settings, the <code>social_bartender()</code> function would output the following:', 'shaken' ); ?></p>
		
		<hr />
		
<pre><code>&lt;a href="http://example.com" class="sh-sb-link"&gt;
	&lt;img src="http://mysite.com/images/icon.png" alt="Link Title" class="sh-sb-icon"&gt;
&lt;/a&gt;

&lt;a href="http://example.com" class="sh-sb-link"&gt;
	&lt;img src="http://mysite.com/images/icon-2.png" alt="Link #2 Title" class="sh-sb-icon"&gt;
&lt;/a&gt;</code></pre>

		<hr />
		
		<h3><?php _e( 'Credits / Support', 'shaken' ); ?></h3>
		
		<p><?php _e( 'The Social Bartender plugin was created by', 'shaken' ); ?> <a href="http://shakenandstirredweb.com">Shaken and Stirred Web</a>. <?php _e( 'If you find any bugs or have feature requests, please leave your feedback on the plugin\'s <a href="https://github.com/sawyerh/social-bartender">GitHub page</a>.', 'shaken' ); ?></p>
		
<?php } ?>