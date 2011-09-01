## Including the list of links in your theme

To include the list of links in your theme, you need to place the following PHP function in the location where you want the links to appear:

<?php social_bartender(); ?>

## Parameters

link_before: (string) Sets the text or html that precedes the <a> tag. Default = ''

link_after: (string) Sets the text or html that follows the <a> tag. Default = ''

echo: (boolean) Toggles the display of the generated list of links or return the list as an HTML text string to be used in PHP. Default = 1

## Example Output

Using the default settings, the social_bartender() function would output the following:

<a href="http://example.com" class="sh-sb-link">
	<img src="http://mysite.com/images/icon.png" alt="Link Title" class="sh-sb-icon">
</a>

<a href="http://example.com" class="sh-sb-link">
	<img src="http://mysite.com/images/icon-2.png" alt="Link #2 Title" class="sh-sb-icon">
</a>

## Credits / Support

The Social Bartender plugin was created by Shaken and Stirred Web. If you find any bugs or have feature requests, please leave your feedback on the plugin's Github page.