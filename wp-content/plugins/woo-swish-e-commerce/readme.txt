=== Woo Swish e-commerce ===
Contributors: BjornTech
Tags: swish, ecommerce, payment, woocommerce, swish-handel
Requires at least: 4.9
Tested up to: 5.9
Requires PHP: 7.0
Stable tag: 3.4.3
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

Accept Swish payments in your webshop.

== Description ==

Our plugin makes it possible for you to accept Swish as payment method in your webshop. This payment method suits you if you want to offer your customers fast, simple and safe mobile payments.

As addition to the plugin you need the service Swish e-commerce that you order from one of the Swedish banks offering the service. Ask your bank if it does. Swish e-commerce is a special service developed for e-commerce and differs from the normal private "Swish" service and the corporate Swish corporate. Some banks have made it possible to order the service online in their internet bank but most of the banks still require a filled in and signed form to be sent in.

The plugin supports three connection methods described below:

### Technical supplier
Swish offers the possiblity to use a technical supplier when connecting your webshop to your bank.

This is the easiest way to use the plugin. You select BjornTech as Technical Supplier in your internet bank and configure the plugin to use a technical supplier.

Read more about the status of Technical Supplier in your bank and how to configure it in our [guide](https://bjorntech.com/sv/swish-teknisk-leverantor?utm_source=wp-swish&utm_medium=plugin&utm_campaign=product)

### Local certificate

If your bank is not supporting the choice of technical supplier you can create a certificate of your own and place it on your webserver. You will find instructions for doing this in our installation description.

### Simulator

If you just want to see how the plugin will look like in your webshop or if you need to test payments in your staging or test environment you can configure the plugin to simulate payments.
A payment done via the simulator is done by a pre-configured fictive mobile number and will be automatically approved by the system. Because of this you can not see how the payment will look like in the Swish-app

== Installation ==

### Installation instructions for technical supplier

1.  Locate and add the plugin in wordpress by searching for "Swish".
2.  Activate the plugin through the "Plugins" menu in WordPress.
3.  Order the "Swish handel" service from your local Swedish bank.
4.  Select BjornTech as your Technical provider. This is done in your bank website.
5.  Select "BjornTech as Technical Supplier" as Connection type.
6.  Enter your merchant Swish-number in the field "Swish-number" and your mail address in the "Account mail address" field. Save the settings.
7.  Click "Connect to service".

8.  When the confirmation mail arrives in your inbox open it and click on the activation link.
9.  Make a test payment to confirm that everything is working.

### Installation instructions for local certificate

The process below requires technical skills.

1.  Locate and add the plugin in wordpress by searching for "Swish".

2.  Activate the plugin through the "Plugins" menu in WordPress.

3.  Order the "Swish handel" service from your local Swedish bank.

4.  Generate private key and CSR, at http://portal.swish.nu/company/certificates/ (see https://assets.ctfassets.net/zrqoyh8r449h/70IepbShaTPqL3ZBWPeefP/00fbc0eeed701f67fd93a07d08ee219b/Swish_Certificate_Management_Guide_1.6.pdf)

    ##### Using cpanel:

    >   Select "SSL/TLS" at the "Security" section
    >   Select "Private Keys (KEY)"
    >   Scroll down to "Generate a New Private Key" and select the key size of 4096. Type "Swish" in the "Description"-field Click "Generate"
    >   Select "Return to SSL Manager"
    >   Select "Certificate Signing Requests (CSR)"
    >   In the "Key" field select the keyname that you entered creating the keys (in our example it was "Swish")
    >
    >   Enter the following:

    >   Domains: yourwebsite.name
    >   State: State/Province
    >   Country : Sweden
    >   Company: Your company name
    >   Company Division: Department or leave blank
    >   Email: your@email.se
    >   Passphrase: Select password if you want (remember if and enter it in the Payment-Swish admin screen)
    >   Description: A description or leave blank
    >
    >   Select "Generate"
    >
    >   copy the data in the "Encoded Certificate Signing Request"-field and use it at in step 5 below.

    ##### Using MacOs terminal or Linux via SSH:

    ``
        $ openssl genrsa -out ./swish.key 4096
        $ openssl req -new -sha256 -key ./swish.key -out ./swish.csr
    ``

    >   Enter the following:

    >   Country Name (2 letter code) - SE
    >   State or Province Name (full name) - State/Province
    >   Locality Name (eg, city - City
    >   Organization Name (eg, company) - Your company name
    >   Organizational Unit Name (eg, section) - Department or leave blank
    >   Common Name (eg, fully qualified host name) - yourwebsite.name
    >   Email Address - your@email.se
    >   A challenge password - Select password if you want (remember if and enter it in the Payment-Swish admin screen)

5.  Use the data that you copied from cpanel or the file "swish.csr" created in command line to create a swish-certificate at https://comcert.getswish.net/cert-mgmt-web/authentication.html (must be done by a certified person from step 3)
    Login using your (swedish) personal id, your organisation number and your Swish-number (starting with 123)
    Click on the tab "new certificate"
    Paste the contents from cpanel or your "swish.csr"-file from step 4 into the field "Paste CSR" and make shure that the format "PEM" is selected.
    Click "Generate" to create the certificate.
    Copy and paste the certificate data to a file with the ending .pem (in our example swish.pem)
6.  Open your swish.pem file and paste the content from your swish.key file in the top of the file.
    Copy everything (including the header and footer) between:
    -----BEGIN RSA PRIVATE KEY-----
    and
    -----END RSA PRIVATE KEY-----
    and put it before
    -----BEGIN CERTIFICATE-----
    -----END CERTIFICATE-----
    -----BEGIN CERTIFICATE-----
    -----END CERTIFICATE-----
    -----BEGIN CERTIFICATE-----
    -----END CERTIFICATE-----
7.  Place the certificate file somewhere in your server filesystem.
    Use FTP or filemanager in cpanel if avaliable.
    Make a note on the full file-path and name of your certificate.
8.  Configure and activate plugin.
    Select "Use local Swish certificate" as your connection preference
    Input the location of the certificate from step 7.
    If you did create the certificate in step 4 using a password, you need to input this on the configuration screen
    Input your Swish-number (starting with 123)
    Change the rest of the configuration parameters as you wish.
    Save the settings.
9.  Make a test payment to ensure that everything is working as it should.


== Frequently Asked Questions ==
Q:  I have a private Swish-number (using my mobile number). Can I use this number as merchant number in the plugin?
A:  No, you need the service "Swish handel". Contact your bank to order it.
Q:  I have a corporate Swish-number (starting with 123). Can I use this number as merchant number in the plugin?
A:  No, you need the service "Swish handel". Contact your bank to order it.
Q:  The plugin installation page tells me that my system is using NSS. What does that mean?
A:  A small number of installations are using NSS as mechanism for certificate handling rather than OpenSSL. Your installation is one of theese. The plugin can be configured to work with NSS but this requires deep NSS knowledge. If you do not have this knowledge we do recommend to use our service as Technical supplier.
== Screenshots ==


== Changelog ==
= 3.4.3 =
* Verified to work with WooCommerce 6.3
= 3.4.2 =
* Verified to work with WooCommerce 6.1 and Wordpress 5.9
* New: Added option to disable polling for payment status from Swish.
* New: Added option to disable use of shutdown hook for processing.
= 3.4.1 =
* Verified to work with WooCommerce 6.0
= 3.4.0 =
* Verified to work with WooCommerce 5.7
* Added Swish Authorization token to the settings page
* Fix: Changed translation domain for Swish thank you message
= 3.3.3 =
* Verified to work with WooCommerce 5.6
* Fix: Retrieving a Swish-payment with the "Retrieve" button failed because a faulty call.
= 3.3.2 =
* Fix: Faulty call when starting background check for pyments caused the status payment status page not to update in some cases.
= 3.3.1 =
* Verified to work with Wordpress 5.8 and WooCommerce 5.5
* Fix: Changed 'swish-completed' from id to class.
* Fix: Added logging of data sent to the Swish service.
* Fix: Error was not logged correctly the transaction sent to Swish could not be formatted.
= 3.3.0 =
* Verified to work with WooCommerce 5.3
* Fix: Klarna is setting payment-reference also on Swish-orders created by us, this caused payments not to be marked as PAID.
* Fix: In some cases the order retrevial process when handling callbacks fails due to the use of a order-child.
* Fix: The settings page did not load correclty in some browsers.
= 3.2.0 =
* New: Improved handling of callbacks. Sites with performance issues did not respond within Swish timeout time causing callbacks to fail in processing.
* New: Implemented a status check for transaction-status in order to give customers correct info also when Swish callback fails. Now the plugin asks Swish on transaction status every 10:th second on an ongoing transaction.
= 3.1.0 =
* Verified to work with WooCommerce 5.1
* Verified to work with Wordpress 5.7
* Fix: Minor clean-up of the Swish-number field.
* Fix: Removing url parameters from url before loading image.
* Fix: Callback for refunds was not correctly processed.
* Fix: Fatal error when refunding caused by logging function.
* New: Added the possibility to set a placeholder for the Swish-number field.
* New: Sending webhooks through service in order to get better trouble-shooting capabilities.
= 3.0.9 =
* Verified to work with Wordpress 5.6
* Verified to work with WooCommerce 4.8
* Fix: Improved error handling when connecting to the Swish-service
= 3.0.8 =
* Fix: Handle only one parameter instead of two in the filter 'woocommerce_gateway_icon' to handle the situation where other gateways are using only one.
= 3.0.7 =
* Fix: Jquery was using class instead of if causing order details not to show when payment is ready
* Verified to work with WooCommerce 4.7
= 3.0.6 =
* Fix: Order-id not found in checkout if url was using fragment identifier (#)
= 3.0.5 =
* Fix: Some sites did not accept PUT calls for admin, resulting in problems when connecting to service.
* Fix: The Swish-simulator connection type did not work after 3.0.0
* Fix: Error handling in two funxtions did use the wrong logging functions.
* Fix: Check payment reference for unwanted characters and lenght.
* Fix: Moved back to old callback handling
= 3.0.2 =
* Fix: Incorrect creation of UUID caused payment to generate error because of an incorrect payment reference
= 3.0.1 =
* Fix: Swish checkout image did now show for users in all themes.
= 3.0.0 =
* New: ** IMPORTANT ** Forcing the use of TLS 1.2 - Swish requires this from Nov 1st 2020. An error message will be displayed if your site does not support TLS 1.2, Contact your hosting provider if you get this error message.
* Verified to work with WooCommerce 4.6
* New: Changed checkout page to not show order details until payment is ready.
* New: Possibility to set a minimum age for purchase on the website.
* New: Possibility to set a minimum age for purchase on each product.
* New: Using WooCommerce REST api functions for callbacks.
* New: Added a filter for users of local certificates to add CURLOPT if needed.
* Fix: Changing the way to get callback url in order to be compatible with WPML permalinks
* Fix: Settings page did show error message when saving.
= 2.5.2 =
* Verified to work with WooCommerce 4.4
* Verified to work with Wordpress 5.5
= 2.5.1 =
* Fix: In some installations the faulty refund-message did still show, logic for refund handling changed to prevent this.
= 2.5.0 =
* New: Added function to retrieve payment info if callback from Swish failed.
* Fix: Incorrect handling of Swish callback caused refund messages to be incorrectly logged on successful payments. Please disregard the refund messages.
= 2.4.1 =
* Fix: New number and certificates for the test-service
= 2.4.0 =
* New: SEB and Danske bank as technical supplier.
* Fix: Activation as technical supplier failed in some cases.
* Fix: Multiple refunds did not work.
* Fix: Order is always set to 'pending' when sent.
= 2.3.2 =
* Verified to work with WooCommerce 4.0
* Verified to work with Wordpress 5.4
= 2.3.1 =
* Fix: No need for plugin to load texdomain, this is done by Wordpress
* Fix: Better matching of order id in from checkout page to prevent failure to find order if some other plugin adds something in the checout url
* Fix: The plugin did always check for a certificate file causing the check to fail and log errors if no certificate was used.
= 2.3.0 =
* Verified to work with WooCommerce 3.9.
* New: Added setting to change the name of the Swish number field.
* Fix: The reason text in refunds was not checked for lenght and illegal characters, causing refunds to fail.
* Fix: Test mode text was not translatable.
= 2.2.2 =
* New: Technical supplier works for Handelsbanken
= 2.2.1 =
* Fix: Modal information screen did not show when connecting to Technical supplier
* Fix: Additional CSS changes to get the Swish-logo in the correct size in some themes.
= 2.2.0 =
* Verified to work with Wordpress 5.3 and WooCommerce 3.8
* New: Added setting to select what status a paid order should end up in.
* Fix: The logo in modal is sometimes VERY large. Changed CSS to ensure that the size is normal
* Fix: Added message to end customer if something goes wrong when checking for payment
= 2.1.0 =
* New: Technical supplier works for Nordea
* New: Saving order id as metadata.
* New: Saving payment id in order when callback is received.
* New: Logging certificate details.
* New: Warning when certificate is about to expire or has expired.
* Fix: Preventing the learndash plugin to set the order to completed at all times.
* Fix: Swish image did not show in modal sometimes.
* Fix: Some sites using alternate checkout url format did experience "Unknown error from Swish".
* Fix: Added new BankId status messages.
= 2.0.9 =
* Fix: Minor text changes
* Verified to work with WooCommerce 3.7.0
= 2.0.8 =
* Fix: Added a better more clear error message for the cases where Technical Provider was not selected in the bank
* Fix: More checks of the Swish-number when enrolling to the Swish service.
= 2.0.7 =
* Fix: Some translations did not upload to Wordpress correctly.
= 2.0.6 =
* Fix: Config from previous version was not properly converted to the new.
= 2.0.5 =
* New: Certificate service added, no creation of certificate needed for customers using Swedbank (more banks coming soon).
* New: New modal checkout layout, select it in the configuration page. It is not working with all themes. Contact us if you have issues with modal checkout in your theme.


== Upgrade Notice ==