=== Accordion FX ===
Contributors: flashxml
Tags: images, photos, widget, post, plugin, posts, sidebar, free, flash, accordion, xml, scroll, auto, slideshow, gallery, images, zoom, ken, burns, portfolio, image, photo, as3, text, effects, transition, preloader, button, horizontal, vertical
Requires at least: 2.8.0
Tested up to: 3.0
Stable tag: trunk

== Description ==

The Accordion FX might be the most advanced Flash accordion on the web. Fully XML customizable, without using Flash. And it's free!

= Main features =

You can place this Accordion on any website for free without even using Flash. The overall width and height can be customized up to 1680 x 1050 pixels. You may also have an unlimited number of images, advanced text effects, zoom image effects and auto play options. The tooltip is HTML/CSS formatted. Supports images (JPG, GIF, PNG, BMP), SWFs and also has external PNGs (changeable) for play-pause and next-previous buttons.

== Installation ==

Make sure your Wordpress version is greater than 2.8 and your hosting provider is using PHP5.

1. [Download](http://www.flashxml.net/free/download/accordion.zip "Accordion FX") or [purchase](http://www.flashxml.net/accordion.html#swmi-license "Accordion FX") the Accordion FX Flash component
2. Create a new folder inside your `/wp-content/` directory called `flashxml/accordion-fx` and copy the content of the archive to this folder
3. Install [the plugin](http://downloads.wordpress.org/plugin/accordion-fx.zip "Accordion FX Plugin") or upload the `accordion-fx` folder along with all its files to `/wp-content/plugins/` directory
4. Activate the plugin from the **Plugins** tab in **WordPress Dashboard**
5. Go to **Accordion FX** from the **Settings** tab and update the path in case you used a different one
6. In the post editor use the following tag to embed the Accordion FX: `[accordion-fx][/accordion-fx]`. You could also add `<?php accordionfx_echo_embed_code(); ?>` in the PHP file of your theme
7. Go to [FlashXML.net](http://www.flashxml.net/ "Free Flash Components") and [customize your Accordion FX](http://www.flashxml.net/accordion.html "Accordion FX") using the Live Demo. Generate the `settings.xml` text and use it to overwrite `flashxml/accordionfx/settings.xml`
8. To use your own images, upload them to the `flashxml/accordionfx/images` folder and update the `flashxml/accordionfx/images.xml` file accordingly

= Additional settings file =

To embed the Accordion FX more than once, you will need another settings file and (probably) another set of images. Let's assume your new file is called **settings2.xml**. From the post editor, use the following code: `[accordion-fx settings="settings2.xml"][/accordion-fx]`. From the PHP files of your theme, add the file name as *the first argument* of the `accordionfx_echo_embed_code()` function call. If you use a separate set of images, don't forget to create a new XML file for that and update the value in the settings file.

= No Flash support text =

To support visitors without Adobe Flash, you can provide alternative textual content. From the post editor, add the text between `[accordion-fx]` and `[/accordion-fx]`. From the PHP files of your theme, add the text as *the second argument* of the `accordionfx_echo_embed_code()` function call.

= If you have PHP4 =

To make it work if you're using PHP4, add the following code `[accordion-fx width="600" height="300"][/accordion-fx]` in the post editor. From the PHP files of your theme, add the width and height as *the third and fourth argument* of the `accordionfx_echo_embed_code()` function call. Don't forget to provide your own width and height values, since 600 and 300 are just examples.

== Screenshots ==

1. The Live Demo on [FlashXML.net](http://www.flashxml.net/accordion.html "Accordion FX") is the utility that helps easily customize your Accordion FX to fit all your needs.