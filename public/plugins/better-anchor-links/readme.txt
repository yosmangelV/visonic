=== Better Anchor Links ===
Contributors: Luděk Melichar
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=48CZMVXER28PE&lc=CZ&item_name=Plugin%20development&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donateCC_LG%2egif%3aNonHosted
Tags: anchor, anchor links, content links, content, sidebar, links, widget, better anchor links, bal, lm-bal, anchor list, auto anchor list
Requires at least: 3.0
Tested up to: 4.1
Stable tag: 1.7.5

Creates anchor links to heading tags in the content and displays automatically at the top of the content, or allows for custom placement with tags.

== Description ==

Creates anchor links to heading tags in the content and displays them automatically at the top of the content, or allows for custom placement with tags or sidebar widget.

Features:

* Has option to auto display anchor links to Heading tags in content.
* Allows control of which content to auto display links.
* Can disable plugin css to allow custom styles to be applied.
* Has widget available for display
* Insert custom title to display above links
* Clears all traces from any excerpts displayed
* Selection between numerically ordered and bulleted list 
* Auto Links indentation
* qTranslate/mqTranslate support
* Show "back to content" link next to heading

== Installation ==

1. Upload to your Wordpress plugins folder.
2. Activate in Wordpress admin area.
3. Update options under "Settings->B. Anchor Links"

== Frequently Asked Questions ==
= How Do I Place In Custom Locations? =

In Content:

1. Using the visual editor
   - Add the tag [mwm-aal-display] into your individual content using the visual editor.
2. PHP Template Tag(must be below the_content())
   - `<?php global $mwm_aal; echo $mwm_aal->output_content_links(); ?>`

In Sidebar:

1. Activate Widget
   - Go to Appearance -> Widgets in Wordpress admin "Better Anchor Links".
2. PHP Template Tag
   - `<?php global $mwm_aal; $mwm_aal->output_sidebar_links(); ?>`
		
= How Do I Add Custom Styles? =
The content display and side bar are wrapped with a `<div>` with an assigned css class. You can put the classes into your own style sheet and use further declarations to target elements within the div.
	
	For Content:(uses <ol>,Does not use an H tag for title)
		.mwm-aal-container{}
		.mwm-aal-container-title{}
		
	For Sidebar: (uses <ul>, traditional h2 tag for title)
		mwm-aal-sidebar-container{}

= How To remove lines? =
Free edit css/mwm-aal.css for any changes. You can remove all lines above and under the links by deteting section:
	`border-top:1px solid #ccc; border-bottom: 1px solid #ccc;` 

= How To qTranslate/mqTranslate support? =
Put qTranslate/mqTranslate string to List Output Title for example for EN and CZ language:
	`<!--:cs-->Obsah<!--:--><!--:en-->Contents<!--:-->`

== Screenshots ==
1. Admin options
2. Display in default wordpress template
3. Auto indent

== Changelog ==
= 1.7.5 =
* Fixed backlink off when Auto Display is on

= 1.7.4 =
* Small fixes

= 1.7.3 =
* Fixed sidebar register

= 1.7.2 =
* Fixed adding backlink to PHP Template
* Added option for backlink location

= 1.7 =
* Added margin when navbar is used (height can be set in CSS)

= 1.6.2 =
* Fixed stylesheet

= 1.6.1 =
* WP 3.8.1 compatibility

= 1.6 =
* Added "back to content" link next to heading (as asterisk by default)
* Added option for change name of backlink
* Added option for change char of backlink
* Fixed sidebar deprecated registration

= 1.5.6 =
* Headings now accept all html attributes (as id, class ... etc)
* Removed orphan tags
* Fix comments

= 1.5.5 =
* Fix short tags

= 1.5.4 =
* Locale option for Nicer

= 1.5.3 =
* Nicer looking anchor names

= 1.5.2 =
* Add qTranslate support

= 1.5.1 =
* Fix Piwik collision

= 1.5.0 =
* Heading customization in options

= 1.4.1 =
* Indentation options add

= 1.4 =
* Links indentation
* Default changed to H1-H6

= 1.3 =
* List customization (numbered or bulleted list) 

= 1.2 =
* Fixed widget issue

= 1.1 =
* Program rename
* Fixed dysfunctional save options.
* Default changed for H1 and H2 only

= 1.0 =
* Fork of Auto Anchor List.

== Upgrade Notice ==
= 1.1 =
* For upgrade from Auto Anchor List 1.0 uninstall old AAL and remove addon. Install Better Anchor Links 1.1. If you used manual tags to contents, they are compatible.

== Known issues ==

