Wagento HIBP Module
======================
This Wagento module leverages Have I Been Pwned? to check ensure your password has not been compromised. It will return your email and password and whether it has been used and/or pasted. This is accomplished by utilizing the HIBP database for passwords that exist and are the same. There is no risk since the two are not connected, but it does tell you if your password is out there.

Requirements
-------------------------
* PHP 7.3+, 7.4
* Magento Open Source/Commerce 2.3+ or 2.4

Installation Instructions
-------------------------
Download the file, extract
its contents to the project root directory. The module sources should then be
available in the following sub-directory:

    app
    └── code
        └── Wagento
            └── HIBP
### Enable Module ###
Once the source files are available, make them known to the application:

    ./bin/magento module:enable Wagento_HIBP
    ./bin/magento setup:upgrade

Last but not least, flush cache and compile.

    ./bin/magento cache:flush
    ./bin/magento setup:di:compile

Uninstallation
--------------
To uninstall the module manually, run the following commands in your project
root directory:

    ./bin/magento module:disable Wagento_HIBP
    rm -rf app/code/Wagento/HIBP

Features
--------------
 Module will check, whether your password is compromise or not by utilizing the HIBP database in following Magento 2 forms
 1. Customer Registration Form
 2. Customer Reset Password Form
 3. Admin User Creation and edit Form
 
 Module is also providing system configuration under Wagento Modules > HIBP Checker > Mode: Report Only/Restrict
 
 In the Report Only mode, module will only indicate the notice but allow customer to use the compromise password. While in Restrict mode, module will restrict customer to use compromise password.
 
 Support
 ---------
 If you experience any issues or errors while using the extension, please open a
 ticket by sending an e-mail to [support@wagento.com][Support]. Be sure to
 include your domain, PHP version, Magento version, a detailed description of the
 problem including steps to reproduce it and any other relevant information. We
 do our best to respond to all legitimate inquires within 48 business hours.
 
 License
 --------
 The source code contained in this extension is licensed under [version 3.0 of
 the Open Software License (OSL-3.0)][OSL]. A full copy of the license can be
 found in the [LICENSE.txt] file.

 
 How to Contribute?
 --------------
We welcome any and all feedback, suggestions and improvements submitted via
issues and pull requests on [GitHub]. For guidelines, please see the
[CONTRIBUTING.md] document.
    
 [Support]: mailto:support@wagento.com?subject=[HIBP%20Module]%20
 [GitHub]: https://github.com/wagento/module-hibp
 [README]: ./README.md
 [LICENSE.txt]: ./LICENSE.txt
 [CONTRIBUTING.md]: ./CONTRIBUTING.md
 [CHANGELOG.md]: ./CHANGELOG.md
 [OSL]: https://opensource.org/licenses/OSL-3.0.php
 
