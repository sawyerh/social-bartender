=== Social Bartender ===
Contributors: Sawyer Hollenshead
Tags: social, social networks, social links, social icons, theme option
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=TAPWP9QGK6NDG
Requires at least: 3.1
Tested up to: 3.2.1
Stable tag: 1.0.1

A simple solution for adding a list of social network links (images or text) anywhere you want.

== Description ==

Social Bartender adds a new settings page where you can create a list of social network links and place them anywhere you want with one little function or widget. Users can select from the collection of social network icons that come with the plugin, select from a collection of icons provided with the theme (if support is built-in), or upload their own icons. 

== Installation ==

Option 1) Use the sidebar widget

Option 2) Place the following PHP function in the location where you want the links to appear:

`<?php if( function_exists( 'social_bartender' ) ){ social_bartender(); } ?>`

If you would like to make your own icon set available to users in the Icon Box, just place the images inside of an "images/sb-icons" folder of your theme.

= Parameters =

link_before: (string) Sets the text or html that precedes the `<a>` tag. Default = ''

link_after: (string) Sets the text or html that follows the `<a>` tag. Default = ''

echo: (boolean) Toggles the display of the generated list of links or return the list as an HTML text string to be used in PHP. Default = 1

== Screenshots ==

1. The admin screen where links are created.

== Other Notes ==

The Social Bartender plugin was created by Shaken and Stirred Web. If you find any bugs, have feature requests, or would like to contribute, please leave your feedback on the plugin's GitHub page.

Contributors on Twitter: @sawyerh, @devinsays, @NickHamze, and @thelukemcdonald

== Changelog ==

= 1.0 =

* Initial release

= 1.0.1 =

* Widget added