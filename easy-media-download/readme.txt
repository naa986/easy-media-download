=== Easy Media Download ===
Contributors: naa986
Donate link: https://noorsplugin.com/
Tags: download, downloads, digital downloads, button, buttons
Requires at least: 3.0
Tested up to: 6.0
Stable tag: 1.1.8
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Easy Media Download allows you to embed download buttons on your WordPress site. Add file download functionality with this WordPress download plugin.

== Description ==

[Easy Media Download](https://noorsplugin.com/easy-media-download-plugin-for-wordpress/) is a free download manager for WordPress. It gives your users the ability to download digital media files from your website. The plugin is lightweight and makes downloading easier. You can create beautiful download button which instantly starts the download once clicked.

https://www.youtube.com/watch?v=zjtobdjQn44&rel=0

=== Features ===

* Create quick downloads
* Free downloads for music or audio files e.g. mp3, aac, m4a, wav
* Insert download buttons into your landing page
* Free downloads for video files e.g. mp4, mov, qt (QuickTime), mpg, mpeg, flv, m4v, swf, flash, avi, wma, ogg, webm
* Allow users to directly download in all file formats
* Free downloads for document file e.g. doc, docx (OpenOffice, Microsoft Word), odt (OpenDocument), htm, html, ps, tex, xml, txt, csv
* Allow large file download (No limit on the file size)
* Free downloads for Office file e.g. xlsx (Microsoft Excel), pptx (Microsoft PowerPoint)
* Free downloads for script e.g. js, css, php
* Track/Monitor your downloads
* Free downloads for archive or compressed file e.g. tar, rar, zip, 7z, gz, z
* Force the browser to open the download prompt
* Free downloads for image file e.g. png, gif, jpg, jpeg, bmp
* Open the download in a new tab
* Free downloads for e-book e.g. pdf, epub
* Make a download button accessible to logged in users only

=== Easy Media Download Extensions ===

* [User Only Download](https://noorsplugin.com/how-to-show-a-download-button-to-logged-in-users-only/)

For more information please check the [Easy Media Download](https://noorsplugin.com/easy-media-download-plugin-for-wordpress/) documentation page

=== Embedding Shortcodes for the Downloads ===

Create a new post/page and use the following shortcode to create a download button for your digital media file:

`[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip"]`

here, url is a shortcode parameter that you need to replace with the actual URL to your digital file

You can also specify additional optional parameters in the shortcode to customize the free download button.

**Button Text**

By default the text for the download button is "Download Now". But you can choose to modify the text using the "text" parameter.

`[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" text="Free Download"]`

**Button Width**

By default the width for the download button is "153". But you can choose to modify it using the "width" parameter.

`[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" text="Free Download" width="100"]`

**Button Height**

By default the height for the download button is "41". But you can choose to modify it using the "height" parameter.

`[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" text="Free Download" width="100" height="50"]`

**Download in a new window**

By default the download starts in the same window. But you can choose to modify it using the "target" parameter.

`[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" target="_blank"]`  (opens the download in a new window)

=== Force File Download ===

Usually when a digital file is recognised by the browser it does not prompt for download. The file just opens in the browser instead. You can choose to modify this behaviour using the `force_dl` parameter in the shortcode.

`[easy_media_download url="http://example.com/wp-content/uploads/myfile.mp3" force_dl="1"]` 

=== Download Button Templates ===

Easy Media Download comes with 21 different download button templates. All you need to do is specify the style and the button will look just like it. For example:

`[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" color="red_darker"]`

* grey
* grey_light
* red
* green_dark
* green_light
* green
* blue
* blue_two
* blue_three
* blue_four
* orange
* orange_two
* orange_light
* orange_dark
* purple
* purple_dark
* purple_light
* yellow_red
* hot_pink
* pink

If you want to fully customize the download button you can use your own button image instead.

=== Link Rel ===

You can use the HTML link `rel` attribute in the shortcode to define the relationship between your page and the linked download.

`[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" rel="nofollow"]`

=== Custom CSS Class ===

In addition to various button templates, If you want to apply custom styling to a button you can do so by using the `class` parameter.

`[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" class="myclass"]`

You can specify multiple CSS classes in the shortcode.

[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" class="myclass1 myclass2 myclass3"]

=== Easy Media Download Shortcode 2 ===

With this shortcode, you can create a download button with your preferred color.

`[easy_media_download2 url="http://example.com/wp-content/uploads/myfile.zip" text="Free Download" bg_color="#CC0000"]`

**Background Color**

The background color of the download button is "#3498db" by default. You can customize it using the "bg_color" parameter.

`[easy_media_download2 url="http://example.com/wp-content/uploads/myfile.zip" bg_color="#CC0000"]`

**Font Color**

The font color of the download button is "#ffffff" by default. You can customize it using the "font_color" parameter.

`[easy_media_download2 url="http://example.com/wp-content/uploads/myfile.zip" text="Free Download" font_color="#71B02F"]`

**Hover Background Color**

The "hover_bg_color" parameter can be used to change the background color of the download button when you mouse over it.

[easy_media_download2 url="http://example.com/wp-content/uploads/myfile.zip" text="Free Download" bg_color="#3498db" hover_bg_color="#3cb0fd"]

=== Digital Download Tracking ===

Easy Media Download is integrated with the [Google Analytics](https://wordpress.org/plugins/simple-universal-google-analytics/) plugin. It allows you to see how many times a particular file has been downloaded in real time from your Google Analytics account. 

=== Languages ===

Easy Media Download can be translated into your languages. Currently it supports the following languages:

* French
* Spanish
* German
* Italian
* Dutch
* Turkish

If you are a non-English speaker please help [translate Easy Media Download](https://translate.wordpress.org/projects/wp-plugins/easy-media-download) into your language.

**Like Easy Media Download Already?**

Feel free to drop your review [here](https://wordpress.org/support/plugin/easy-media-download/reviews/?rate=5#new-post)

=== Recommended Reading ===

* Easy Media Download [Documentation](https://noorsplugin.com/easy-media-download-plugin-for-wordpress/)
* My Other [Free WordPress Plugins](https://noorsplugin.com/wordpress-plugins/)

== Installation ==

1. Go to the Add New plugins screen in your WordPress Dashboard
1. Click the upload tab
1. Browse for the plugin file (easy-media-download.zip) on your computer
1. Click "Install Now" and then hit the activate button

== Frequently Asked Questions ==

= Can this plugin be used to offer free downloads to my users? =

Yes.

= Can this plugin be used to embed free download buttons on my site? =

Yes.

== Screenshots ==

1. Download Now button demo

== Upgrade Notice ==
none

== Changelog ==

= 1.1.8 =
* Added support for the user only download option.

= 1.1.7 =
* Fixed a security issue in the plugin. The vulnerability was reported by wpscan.com.

= 1.1.5 =
* Made some security related improvements in the plugin.

= 1.1.4 =
* Added a new shortcode that can create a button with any color.

= 1.1.3 =
* Added a new parameter to support the HTML link rel attribute in the download button.

= 1.1.2 =
* Added download tracking option with the [Google Analytics](https://wordpress.org/plugins/simple-universal-google-analytics/) plugin.

= 1.1.1 =
* Added a new class parameter to the download button shortcode

= 1.1.0 =
* Easy Media Download is now compatible with WordPress 4.4

= 1.0.9 =
* Updated the translation files so the plugin can take advantage of language packs

= 1.0.8 =
* Easy media download is now compatible with WordPress 4.3

= 1.0.7 =
* Easy media download is now compatible with WordPress 3.9

= 1.0.6 =
* Added a feature where the digital media file will download instead of opening in the browser window

= 1.0.5 =
* Added translation options in the plugin
* Added more download button templates

= 1.0.4 =
* Added donation options for free downloads

= 1.0.3 =
* Easy media download is now compatible with WordPress 3.8

= 1.0.2 =
* Added a new shortcode parameter to open the download in a new window

= 1.0.1 =
* First commit
