# OroCommerce Elfsight Bundle

The bundle adds integration with the [Elfsight](https://go.elfsight.io/click?pid=233&offer_id=3) widget provider 
and adds multiple content blocks into strategic places all over the application storefront. 

Now developers can add custom forms, subscription forms, live chats, various popups, countdown timers, social feeds, 
and many other types of widgets to the storefront.

* [Widget Types](#widget-types)
    * [Form Builder](#form-builder)
    * [Subscription Form](#subscription-form)
    * [Live Chat](#live-chat)
    * [Popup](#popup)
    * [Countdown Timer](#countdown-timer)
    * [Social Feed](#social-feed)
    * [Other Widgets](#other-widgets)
* [Content Blocks](#content-blocks)
    * [All Pages](#all-pages)
    * [Home Page](#home-page)
    * [Search Results Page](#search-results-page)
    * [Product Listing Page](#product-listing-page)
    * [Product Details Page](#product-details-page)
    * [Quick Order Form Page](#quick-order-form-page)
    * [Shopping List Page](#shopping-list-page)
    * [Checkout Page](#checkout-page)
* [How To Install The Bundle](#how-to-install-the-bundle)
* [How To Add Widgets](#how-to-add-widgets)
    * [Registration](#registration)
    * [Create New Widget](#create-new-widget)
    * [Add The Widget](#add-the-widget)
* [How To Thank The Author](#how-to-thank-the-author)


## Widget Types

Here are the most popular widget types used in Ecommerce that you can add 
through this integration.

### Form Builder

[Form builder widget](https://go.elfsight.io/click?pid=233&offer_id=3&l=1677843053) can help you to build a completely 
custom form from scratch, collect the data, send email notifications, analyze the data, and many other things.

![Form Builder Example](Resources/doc/img/form_builder_example.png)

### Subscription Form

[Subscription form widget](https://elfsight.com/subscription-form-widget/) lets you collect emails of people
who want to be notified when something happens.

![Subscription Form Example](Resources/doc/img/email_subsription_example.png)

### Live Chat

[All-in-one chat widget](https://go.elfsight.io/click?pid=233&offer_id=3&l=1677841093) allows you to talk 
to your customers in real-time  and assist them when they need help.

![Live Chat Example](Resources/doc/img/live_chat_example.png)

### Popup

[Popup widget](https://elfsight.com/banner-widget/) shows a banner with your marketing materials.
It is a great tool to notify your customers about events or just say hello.

![Popup Example](Resources/doc/img/popup_example.png)

### Countdown Timer

[Countdown widget](https://go.elfsight.io/click?pid=233&offer_id=3&l=1677841108) helps you to let customers 
how much time is left till something important is going to happen.

![Countdown Example](Resources/doc/img/countdown_example.png)

### Social Feed

[Social feed widget](https://go.elfsight.io/click?pid=233&offer_id=3&l=1677843061) aggregates news 
from your social networks and shows them in a nice convenient form.

![Social Feed Example](Resources/doc/img/social_feed_example.png)

### Other Widgets

There are many other widget types that you can add to your website. 
Check the [full list of widgets](https://elfsight.com/widgets/) and find the best widget for you.


## Content Blocks

By default, you can add Elfsight widgets to any place that supports content widgets: landing pages, product or category 
descriptions, and predefined content blocks.

This bundle adds new content blocks to different pages all over the application storefront, so you can add Elfsight 
widgets to any of that blocks. Some Elfsight widgets that are always presented on the screen (e.g. live chat, popup) 
can be added to any block. Other widgets that have to be added to the right place on the page (e.g. forms, social feeds) 
should be added to the right content block.

Here are all pages with new content blocks added to them.

### All Pages

* `placeholder-general-header-before` added before the header;
* `placeholder-general-header-after` added after the header;
* `placeholder-general-menu-after` added after the main menu;
* `placeholder-general-footer-before` added before the footer;
* `placeholder-general-footer-after` added after the footer.

![General Placeholders](Resources/doc/img/placeholders_general.png)

### Home Page

* `placeholder-home-content-before` added before the home page content;
* `placeholder-home-content-after` added after the home page content.

![Home Page Placeholders](Resources/doc/img/placeholders_home_page.png)

### Search Results Page

* `placeholder-search-content-before` added before the search results grid;
* `placeholder-search-content-after` added after the search results grid.

![Search Results Page Placeholders](Resources/doc/img/placeholders_search_results.png)

### Product Listing Page

* `placeholder-plp-content-before` added before the products grid;
* `placeholder-plp-content-after` added after the products grid.

![Product Listing Page Placeholders](Resources/doc/img/placeholders_plp.png)

### Product Details Page

* `placeholder-pdp-content-before` added before the product details block;
* `placeholder-pdp-content-after` added after the product details block.

![Product Details Page Placeholders](Resources/doc/img/placeholders_pdp.png)

### Quick Order Form Page

* `placeholder-qof-content-before` added before the quick order form;
* `placeholder-qof-content-after` added after the quick order form.

![Quick Order Form Placeholders](Resources/doc/img/placeholders_qof.png)

### Shopping List Page

* `placeholder-sl-content-before` added before the shopping list content;
* `placeholder-sl-content-after` added after the shopping list content.

![Shopping List Placeholders](Resources/doc/img/placeholders_sl.png)

### Checkout Page

* `placeholder-checkout-content-before` added before the checkout content;
* `placeholder-checkout-content-after` added after the checkout content.

![Shopping List Placeholders](Resources/doc/img/placeholders_checkout.png)


## How To Install The Bundle

If you did not install the application yet, you just need to add the bundle as the composer dependency, and then
install the application.

```
composer require ys-tools/orocommerce-elfsight-bundle
```

If you already have installed the application, you need to add the bundle as the composer dependency, remove the cache, 
and upgrade the application.

```
rm -rf var/cache/prod
composer require ys-tools/orocommerce-elfsight-bundle
rm -rf var/cache/prod
bin/console oro:platform:update --force --env=prod
```


## How To Add Widgets

Here is the [video that demonstrates how to add widgets](https://www.youtube.com/watch?v=tSCyaRgmEdI). All required steps are described below. 

### Registration

The first thing you need to do before using Elfsight widgets is to register in the Elfsight portal. You need to open 
the list of content widgets under `Marketing > Content Widgets` and click the green button 
`Sign Up | Log In to Elfsight`.

![Registration Button](Resources/doc/img/registration_button.png)

You will be redirected to the Elfsight website, there you can either enter your email and register manually, or click 
the `Sign Up Free` button in the top right corner and sign up manually, via Google or Facebook.

![Elfsight Home Page](Resources/doc/img/elfsight_home_page.png)

![Elfsight Sign Up](Resources/doc/img/elfsight_sign_up.png)

Then you should go back to the OroCommerce application and open the list of content widgets under 
`Marketing > Content Widgets` again. The sign op button should disappear, and you'll see a new button 
`Manage Elfsight Widgets`. You can use it to get back to the Elfsight website and manage all your widgets and 
subscriptions there.

![Elfsight Apps](Resources/doc/img/manage_widgets_button.png)

![Elfsight Apps](Resources/doc/img/elfsight_apps.png)

### Create New Widget

The next step is adding a new Elfsight widget. You need to click `Create Content Widget` button, pick `Elfsight Widget` 
type from the dropdown, give the widget a name, and then click on the plus icon near the `Elfsight Widget` field 
in the `Options` section.

![Create Widget Button](Resources/doc/img/create_widget_button.png)

You should see a popup with a list of all available widget types. Find the one you want to use and click on it.

![Create Widget Popup](Resources/doc/img/create_widget_popup.png)

The application should open another popup where you can configure your widget. After you finish the configuration,
click `Add to Website` or `Save` button.

![Elfsight Create Countdown](Resources/doc/img/elfsight_create_countdown.png)

The popup will be closed, and you should see the identifier of your new widget in the `Elfsight Widget` field. 
You can edit your widget or remove the identifier using appropriate buttons near the `Elfsight Widget` field. 
Finally, you need to save the new content widget by clicking the `Save and Close` button.

![Create Widget Identifier](Resources/doc/img/create_widget_identifier.png)

### Add The Widget

Now, you can add your new content widget to any place that supports content blocks. For example, if you want it to
always be presented in the application header you can use `placeholder-general-header-after` content block. You need to
open the list of content blocks under `Marketing > Content Blocks`, find the required content block, edit it, and add
new content widget to this block.

![Add Block Backend](Resources/doc/img/add_block_backend.png)

Then you have to save this content block, go to the storefront, and verify that the new widget is properly rendered 
in the header.

![Add Block frontend](Resources/doc/img/add_block_frontend.png)


## How To Thank The Author

If this bundle helped you and you are feeling generous today, then you can thank the author
and support this initiative using one of the following buttons.

[![Support](https://raster.shields.io/badge/Support-PayPal-blue.png)](https://paypal.me/yshyshkin)
