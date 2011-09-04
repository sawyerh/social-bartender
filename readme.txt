For more in-depth documentation, view the plugin's help page in WordPress after you activate it.

== Including the list of links in your theme ==

To include the list of links in your theme, you need to place the following PHP function in the location where you want the links to appear:

<?php social_bartender(); ?>

== Parameters ==

link_before: (string) Sets the text or html that precedes the <a> tag. Default = ''

link_after: (string) Sets the text or html that follows the <a> tag. Default = ''

echo: (boolean) Toggles the display of the generated list of links or return the list as an HTML text string to be used in PHP. Default = 1

== Theme Developers ==

If you would like to make your own icon set available to users in the Icon Box, just place the images inside of an "images/sb-icons" folder of your theme.

== Credits / Support ==

The Social Bartender plugin was created by Shaken and Stirred Web. If you find any bugs, have feature requests, or would like to contribute, please leave your feedback on the plugin's GitHub page.

Contributors: @sawyerh, @devinsays, @NickHamze, and @thelukemcdonald

== Changelog ==

== 1.0 ==

* Initial release