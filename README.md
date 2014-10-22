ASU-Wordpress-Web-Standards-Theme
=================================

ASU Wordpress Web Standards Theme



This theme adds a lot of new options to your project.

# Appearance

## Customize

### School Information

- Parent Organization
- Parent Organization URL
- Address
- Phone
- Fax

### Social Media

- Facebook URL
- Twitter URL
- Google+ URL
- LinkedIn URL
- Youtube URL

# Pages

## Custom Fields

- page_feature_description
  - You can have any HTML in here as well
- page_feature_title
- page_feature_image (example: "./wp-content/uploads/2014/10/hero-background-1.jpg")
  - You can have 0 to any number of "page_feature_image".
- page_feature_video (example: "./wp-content/uploads/2014/10/hero-video-1.webm")
  - You can have 0 to any number of "page_feature_video".  We recommend 4 page_feature_videos: an .mp4, an .ogv, a .3gp and a .webm.

# Shortcodes

## Containers

You can write the boiler plate for a bootstrap container using the following shortcode:

```php
[container]
  Your content
[/container]
```

The container can also be made to appear gray by specifying the gray attribute:

```php
[container gray=true]
  Your content
[/container]
```

## Sidebars

You can write a sidebar for navigating the current page by using the sidebar tag.  The markup looks like this:

```php
[sidebar title='My title']
  Text1|#idOnPage1
  Text2|#idOnPage2
  Text3|#idOnPage3
[/sidebar]
```

The title attribute is optional, it defaults to "Navigate this Doc".

# Menus

This theme supports two main menus: a main navigation menu and a footer menu. 

## Main Navigation

The main navigation menu only supports a max of three levels.  The top level
of the menu will be the pills/tabs that you see in the menu. The second level will
create a basic dropdown under that pill.  A third level will force that dropdown
to become a "Mega Menu." 

Only the lowest level of pills will actually be clickable. If you create a three level
deep menu, only the deepest pills will be links.



## Footer Menu

When creating the footer menu, we recommend clicking on "Screen Options" on the top right corner of the admin panel and selecting "CSS Classes".

Creating a Footer Menu is as easy as 1-2-3:

1. Click "Create Menu" and create top level menu items such as "Academics", "Connect", "Impact", "People", and edit these top level items to have "#" as the URL link and "h2" has the "CSS Classes (Optional)".
2. Use the "Pages" tab to add links under the top level menu items to specific pages.
3.  Click the checkbox next to "Footer Menu" in "Menu Settings" and then click "Save Menu". Your menu will now appear at the bottom of the page!



# Recommended Plugins

- [HTML Editor Syntax Highlighter](https://wordpress.org/plugins/html-editor-syntax-highlighter/) - Adds syntax highlighting to the Text Editor in Wordpress.
- [GitHub Updater](https://github.com/afragen/github-updater) - You can update themes and plugins that are hosted on GitHub.