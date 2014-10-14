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