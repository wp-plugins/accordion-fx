=== Accordion FX ===
Contributors: flashxml
Tags: images, photos, widget, post, plugin, posts, sidebar, free, flash, accordion, xml, scroll, auto, slideshow, gallery, zoom, ken, burns, portfolio, image, photo, as3, text, effects, transition, preloader, button, horizontal, vertical
Requires at least: 2.8.0
Tested up to: 2.9.2
Stable tag: trunk

== Description ==

The Accordion FX might be the most advanced Flash accordion on the web. Fully XML customizable, without using Flash. And it's free!

= Main features =

You can place this Accordion on any website for free without even using Flash. The overall width and height can be customized up to 1680 x 1050 pixels. You may also have an unlimited number of images, advanced text effects, zoom image effects and auto play options.The tooltip is HTML/CSS formatted. Supports images (JPG, GIF, PNG, BMP), SWFs and also has external PNGs (changeable) for play-pause and next-previous buttons.

== Installation ==

Make sure your Wordpress version is equal or greater than 2.8 and your hosting provider is using PHP5.

1. Upload the `accordion-fx` folder along with all its subfolders and files to the `/wp-content/plugins/` folder
2. Activate the plugin from the **Plugins** menu in WordPress Dashboard
3. In the post editor use the following tag to embed the Accordion: `[accordion-fx][/accordion-fx]`. Or add `<?php accordionfx_echo_embed_code(); ?>` in your templates
4. Go to [FlashXML.net](http://www.flashxml.net/ "Free Flash Components") and [customize your Accordion](http://www.flashxml.net/accordion.html "Accordion") using the Live Demo. Generate the `settings.xml` text and use it to overwrite `accordion-fx/component/settings.xml`
5. To use your own images, upload them to the `accordion-fx/component/images` folder and update the `accordion-fx/component/images.xml` file accordingly

= Additional settings file =

To embed the Accordion more than once, you will need another settings file and (probably) another set of images. Let's assume your new file is called **settings2.xml**. From the post editor, use the following code: `[accordion-fx settings="settings2.xml"][/accordion-fx]`. From the PHP files of your theme, add the file name as *the first argument* of the `accordionfx_echo_embed_code()` function call. If you use a separate set of images, don't forget to create a new XML file for that and update the `imagesXML` value in the settings file.

= No Flash support text =

To support visitors without Adobe Flash, you can provide alternative textual content. From the post editor, add the text between `[accordion-fx]` and `[/accordion-fx]`. From the PHP files of your theme, add the text as *the second argument* of the `accordionfx_echo_embed_code()` function call.

== Screenshots ==

1. The Live Demo on [FlashXML.net](http://www.flashxml.net/accordion.html "Accordion") is the utility that helps easily customize your Accordion to fit all of your needs.