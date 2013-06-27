framework-30
============

Framework-30 is a super-simple and lightweight PHP framework for quickly getting started building applications that requires a user system including sign up, password encryption and login. Framework-30 also provides a small set of CRUD helper functions. 

## Requirments

Framework-30 requires PHP 5.4+ and an SQL database. 

## Known problems

There have been problems when using the crud-trait together with Xcache do if there's a problem with the trait for you this could be the cause. 

## Instructions on usage

0. Download the entire folder and rename it. Put it in htdocs, www, or the equivalent directory
1. Start by changing the values in includes/connection.php so that you can connect to your database
2. Create a table called 'users', containing four fields: id(integer, auto-increment), username(varchar, any given length), password(same as username) and email(same).
3. Remove any purely educational files if you do not need them, such as class.samplecrud.php or sampleaction.php
4. Get started building and modifying your project
