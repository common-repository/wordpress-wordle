=== WordPress Wordle ===
Contributors: murraywoodman
Donate link: http://cruncht.com/donate
Tags: wordle, tags
Requires at least: 2.7.1
Tested up to: 2.8
Stable tag: trunk

Outputs text based on tags in your blog suitable for pasting into the Wordle form. The plugin provides a shortcode and a template tag.

== Description ==

Have you ever wanted to create a Wordle from the tags in your blog? If so this plugin is for you. Through the use of a shortcode or template tag you are able to print out a string of text which can be copied and pasted into the Wordle create form. You can customise the results to include or exclude whichever terms you want.

The plugin is very simple and has no admin screens.

If you have any issues with the plugin please [contact me](http://cruncht.com/contact/).


== Installation ==

1. Upload `/wordpress-wordle` to the `/wp-content/plugins/` directory

2. Activate the plugin through the 'Plugins' menu in WordPress

3. There is no admin screen to configure. That's it.

= Usage =

Use the [wordle\_tags] shortcode on any page/post or the wordle\_tags() function in templates. Both of these take 3 optional parameters:

* $include    Comma separated list of Term IDs to be included.
* $exclude    Comma separated list of Term IDs to be excluded. Include id overrides this.
* $number     The number of tags to be returned.

= Examples =

simple use:
[wordle_tags]

include term ids 1,2:
[wordle\_tags include="1,2"]

exclude term ids 3,4:
[wordle\_tags exclude="3,4"]

limit to top 100 tags:
[wordle\_tags number="100"]
[wordle\_tags include="1,2" number="100"]
[wordle\_tags exclude="3,4" number="100"]

== Frequently Asked Questions ==

= What is a Wordle? =

A Wordle is a "beautiful word cloud". You can put them on tshirts or posters they look so good. Check out [the Wordle site](http://www.wordle.net/) for more info.

= This just makes text. What use is it? =

The plugin only outputs text which can then be used to create the Wordle. It doesn't actually produce the image. The output will therefore not be particularly helpful for ordinary viewers of your site. It is recommended that you make a private page and use the shortcode on it. 

= How do I make the Wordle? =

Go to http://www.wordle.net/create and paste in the text. You can then customise the output.

= How do I discover the term ID for my tags? =

Each tag has a unique term ID. You can discover the ID for a term by following these steps:

1. Log in as admin and go to admin dashboard.

2. Click on "Tags" in the "Posts" section on the left hand side of the dashboard. You will see a list of tags.

3. Mouseover the tag you are interested in and take a look in the info bar at the bottom of the screen. You should see the tag_ID as a param for the tag link. This is the Term ID.

= Where can I see it in action? =

This [output page](http://topicmap.com/wordle/) produced this [Topic Maps Wordle](http://topicmap.com/1484/topic-maps-wordle).

== Screenshots ==

1. Editing a page with a shortcode.
2. The output of the page showing the tags to be copied and pasted.

== Changelog ==

= 0.1 =
* Initial Release 
* Supports [wordle\_tags] and wordle\_tags().