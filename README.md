Wagento HIBP Module
======================
This Wagento module leverages Have I Been Pwned? to check ensure your password has not been compromised. It will return your email and password and whether it has been used and/or pasted. This is accomplished by utilizing the HIBP database for passwords that exist and are the same. There is no risk since the two are not connected, but it does tell you if your password is out there.

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
 
 How to Contribute?
 --------------
 To learn about how to make a contribution, <a href="module-hibp/CONTRIBUTING.md">click here.</a>
    
 
 
