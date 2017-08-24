# Easy Media Download for WordPress

## Description

[Easy Media Download](https://noorsplugin.com/easy-media-download-plugin-for-wordpress/) is a free download manager for WordPress. It gives your users the ability to download digital media files from your website. The plugin is lightweight and makes downloading easier. You can create beautiful download button which instantly starts the download once clicked. It was developed by [noorsplugin](https://noorsplugin.com/) and is currently being used on over 10,000 websites.

## Features

* Create quick downloads
* Insert download buttons into your landing page
* Allow users to directly download in all file formats
* Allow large file download (No limit on the file size)
* Accept donations for your free digital downloads using PayPal
* Free downloads for music or audio files e.g. mp3, aac, m4a, wav
* Free downloads for video files e.g. mp4, mov, qt (QuickTime), mpg, mpeg, flv, m4v, swf, flash, avi, wma, ogg, webm
* Free downloads for document file e.g. doc, docx (OpenOffice, Microsoft Word), odt (OpenDocument), htm, html, ps, tex, xml, txt, csv
* Free downloads for Office file e.g. xlsx (Microsoft Excel), pptx (Microsoft PowerPoint) 
* Free downloads for script e.g. js, css, php
* Free downloads for archive or compressed file e.g. tar, rar, zip, 7z, gz, z
* Free downloads for image file e.g. png, gif, jpg, jpeg, bmp
* Free downloads for e-book e.g. pdf, epub
* Track/Monitor your downloads
* Ability to force a digital file download

## Adding Shortcode for Download Button

Create a new post/page and use the following shortcode to create a download button for your digital media file:
```
[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip"]
```
Here, url is a shortcode parameter that you need to replace with the actual URL to your digital file

You can also specify additional optional parameters in the shortcode to customize the free download button.

### Button Text

By default the text for the download button is **Download Now**. But you can choose to modify the text using the **text** parameter.
```
[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" text="Free Download"]
```
### Button Width

By default the width for the download button is **153**. But you can choose to modify it using the **width** parameter.
```
[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" text="Free Download" width="100"]
```
### Button Height

By default the height for the download button is **41**. But you can choose to modify it using the **height** parameter.
```
[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" text="Free Download" width="100" height="50"]
```
### Download in a new window

By default the download starts in the same window. But you can choose to modify it using the **target** parameter so the download opens in a new window.
```
[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" target="_blank"]
```
### Force File Download

Usually when a digital file is recognised by the browser it does not prompt for download. The file just opens in the browser instead. You can choose to modify this behaviour using the **force_dl** parameter in the shortcode.
```
[easy_media_download url="http://example.com/wp-content/uploads/myfile.mp3" force_dl="1"]
```
### Download Button Templates

Easy Media Download comes with 21 different download button templates. All you need to do is specify the style and the button will look just like it. For example,
```
[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" color="red_darker"]
```
**Available colors:**

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

### Custom CSS Class

In addition to various button templates, If you want to apply custom styling to a button you can do so by using the **class** parameter.
```
[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" class="myclass"]
```
You can specify multiple CSS classes in the shortcode.
```
[easy_media_download url="http://example.com/wp-content/uploads/myfile.zip" class="myclass1 myclass2 myclass3"]
```
## Adding Donation Button for Free Download

You can accept donations from users visiting your site for your free downloads. Simply use the following shortcode with your PayPal email address in it.
```
[emd_donation email="abc123@hotmail.com"]
```
### Donation Currency

The default currency is **USD**. But you can also accept payments in your preferred currency using the **currency** parameter.
```
[emd_donation email="abc123@hotmail.com" currency="CAD"]
```
In this example **CAD** will set the currency to Canadian Dollar.

### Payment Page Language

The default locale for the payment page is **US**. But you can set it to your preferred language using the **locale** parameter.
```
[emd_donation email="abc123@hotmail.com" locale="BE"]
```
In this example **BE** will set the locale to Belgium.

### Donation Button Image

You can customize the donation button by specifying your preferred image in the shortcode.
```
[emd_donation email="abc123@hotmail.com" image="http://example.com/wp-content/uploads/images/donate.jpg"]
```
## Documentation

For detailed documentation please visit the [WordPress Download Plugin](https://noorsplugin.com/easy-media-download-plugin-for-wordpress/) page.
