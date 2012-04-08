ZEND FRAMEWORK USER SYSTEM

This is a user system that I intend to use a project base for any future projects. I used this
for the creation of the user system in the Zend CMS that I am working on. This is mearly a copy
of the system at a stage where it can be re-used for other applications. The application contains
the following functionality:

- Login system and ACL
- Forgot password functionality with email system.
- Manage Users
    + Adding new users
    + Editing Current Users
    + Removing Users (with confirmation)

This application has been built with the follwoing technology:

- ZF version 1.11.11
- Jquery Mobile (can be turned of by diabling the call in the layout file)
- PHPUnit version 3.5.15 (This is to enable ZF Tests and PHP Unit tests to work together)
    + 90% of the application has been Unit tested.

This application also contains a build folder that contains the output of the build command for phing
When I was developing this application I was using Jenkins for Continus Integration.
This means if you set Jenkins up on your server when building a new application it is best to install
the pear packages stated in the file build/phpunitCorrectVersionInstall. This will install the correct
packages that are needed. You will also need to install phing on the server and set the build path to be
that of the the build.xml file

As part of the build process the application will also deploy the database using delta files that are
located in the /db folder.

Feel Free to use this application as a starting base for ZF applications .... enjoy!

Gareth Fuller