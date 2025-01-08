
# Order Email Notification Module for Magento 2

## Overview

This Magento 2 module automatically sends email notifications to customers after they place an order. It's designed to work with MailHog for local development and testing.

## Features

* Automatic email notifications after order placement
* Customizable email templates
* Integration with MailHog for local testing
* Order details included in email notification

## Installation

### Prerequisites

* Magento 2.4.x
* PHP 7.4 or higher
* MailHog installed and running (for local development)

### Steps

* Create the following directory structure in your Magento installation:
    `app/code/Vendor/OrderEmail/`
* Clone or copy the module files into this directory
* Enable the module:

`php bin/magento module:enable Vendor_OrderEmail`

`php bin/magento setup:upgrade`

`php bin/magento setup:di:compile`

`php bin/magento cache:clean`

## MailHog Configuration

1. Make sure MailHog is running on your local machine  
2. Configure your Magento 2 SMTP settings:    


   * Host: localhost     
   * Port: 1025      
   * Protocol: SMTP



## Configuration 

### Email Template Customization    

The email template can be customized by modifying:
`app/code/Vendor/OrderEmail/view/frontend/email/order_notification.html  `


Available variables in the template:

* `{{var order_id}}:` The order increment ID
* `{{var customer_name}}`: Customer's full name
* `{{var order}}`: The complete order object

### Sender Configuration    

Default sender details can be modified in:  
`app/code/Vendor/OrderEmail/Model/EmailSender.php`  

## Testing

1. Install and start MailHog:

`Start MailHog:  
mailhog`

2. Access MailHog interface:

`Copyhttp://localhost:8025`

3. Place a test order in your Magento store    
4. Check MailHog interface for the received email

## Troubleshooting     

### Common Issues

1. Emails not appearing in MailHog:

* Verify MailHog is running   
* Check Magento SMTP configuration    
* Clear Magento cache


2. Module not working after installation:

`php bin/magento cache:flush `    
`php bin/magento setup:upgrade `  
`php bin/magento setup:di:compile`

3. Permission issues:

`chmod -R 777 var/ generated/ pub/static/`    

### Contributing    

Contributions are welcome! Please feel free to submit a Pull Request.
### Support     

For issues and support, please create an issue in the repository or contact **[anasskh2004@gamil.com]()**