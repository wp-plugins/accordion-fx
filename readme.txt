=== Accordion FX ===
Contributors: flashxml
Tags: images, photos, widget, post, plugin, posts, sidebar, free, flash, accordion, xml, scroll, auto, slideshow, gallery, images, zoom, ken, burns, portfolio, image, photo, as3, text, effects, transition, preloader, button, horizontal, vertical
Requires at least: 2.8.0
Tested up to: 3.0.1
Stable tag: trunk

The Accordion FX might be the most advanced Flash accordion on the web. Fully XML customizable, without using Flash. And it's free!

== Description ==

You can place this Accordion on any website for free without even using Flash. The overall width and height can be customized up to 1680 x 1050 pixels. You may also have an unlimited number of images, advanced text effects, zoom image effects and auto play options. The tooltip is HTML/CSS formatted. Supports images (JPG, GIF, PNG, BMP), SWFs and also has external PNGs (changeable) for play-pause and next-previous buttons.

== Installation ==

Make sure your Wordpress version is greater than 2.8 and your hosting provider is using PHP5.

1. There are two files to download: [WordPress Plugin](http://downloads.wordpress.org/plugin/accordion-fx.zip "Accordion FX Plugin") (that you have to install and activate) & [Free archive](http://www.flashxml.net/free/download/accordion.zip "Accordion FX")
2. Create a new folder inside your **wp-content** folder called **flashxml**, inside this folder create a new one called **accordion-fx** and copy the content of the **free archive** there
3. If you copied the **free archive** to a location different than the one above, go to **Accordion FX** from the **Settings** tab in your **WordPress Dashboard** and update the path accordingly
4. Add `[accordion-fx][/accordion-fx]` where you want the Flash to show up in your post/page
5. If you want to make the Accordion FX part of your theme, edit the template files and add `<?php accordionfx_echo_embed_code(); ?>` where you want it to show up
6. Go to [FlashXML.net](http://www.flashxml.net/ "Free Flash Components") and [customize your Accordion FX](http://www.flashxml.net/accordion.html "Accordion FX") using the Live Demo. Generate the `settings.xml` text and use it to overwrite `wp-content/flashxml/accordion-fx/settings.xml`
7. To use your own images, upload them to `wp-content/flashxml/accordion-fx/images/` and update the `wp-content/flashxml/accordion-fx/images.xml` file accordingly

= Additional settings file =

To embed the Accordion FX more than once, you will need another settings file and (probably) another set of images. Let's assume your new file is called `settings2.xml`. Add `[accordion-fx settings="settings2.xml"][/accordion-fx]` where you want the Flash to show up in your post/page. If you made the Flash part of your theme, add the file name as **the first argument** of the `accordionfx_echo_embed_code()` function call (for example `<?php accordionfx_echo_embed_code("settings2.xml"); ?>`).

= No Flash support text =

To support visitors without Adobe Flash Player, you can provide alternative content by adding the text between `[accordion-fx]` and `[/accordion-fx]`. If you made the Flash part of your theme, add the text as **the second argument** of the `accordionfx_echo_embed_code()` function call (for example `<?php accordionfx_echo_embed_code("","Alternative content"); ?>`).

= If you have PHP4 =

To make it work with PHP4, add `[accordion-fx width="600" height="300"][/accordion-fx]` where you want the Flash to show up in your post/page. If you made the Flash part of your theme, add the width and height as **the third and fourth argument** of the `accordionfx_echo_embed_code()` function call. Don't forget to provide your own width and height values, since 600 and 300 are just examples.

= Getting rid of the FlashXML.net label =

To remove the FlashXML.net label from the top-left corner you'll need to buy the [commercial archive](http://www.flashxml.net/accordion.html#swmi-license "Accordion FX"). Once you'll do that, simply use the SWF file from the commercial archive to overwrite the SWF file from the `wp-content/flashxml/accordion-fx/` folder.

== Screenshots ==

1. The Live Demo on [FlashXML.net](http://www.flashxml.net/accordion.html "Accordion FX") is the utility that helps easily customize your Accordion FX to fit all your needs.