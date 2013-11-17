framework-30
============

Framework-30 is a super-simple and lightweight PHP framework for quickly getting started building applications that requires a user system including sign up, password encryption and login. Framework-30 also provides a small set of CRUD helper functions. 

**IMPORTANT NOTICE:** This project is still very much a work in progress and it is essentially my first experience with PHP so there are bound to be mistakes, ugly code and general unpleasentness. If you run in to a problem or have any opinions on the project I'd be very glad to hear them: shoot me an email at arvid.haggqvist@gmail.com. 

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

## Usage of CRUD helper functions

Currently there are five functions in the trait.crud.php file, all of these are intended to be used within classes that perform database operations. These four functions are queryDb, insert, updateDb and removeFromDb.

queryDb takes four parameters: $query, $parameters & $bindings and $fetch where $query is a string and the two following are arrays. It looks something like this:

    $sql = "SELECT field FROM tablename WHERE fieldname=:val";
    $result = $this->queryDb($sql, [':val'], ['correspondingValue']]);
    
The $fetch parameter is used for specifying the way the results are fetched, see php.net documentation for pdo exexute fetch statements. The default value here is PDO::FETCH_BOTH.
    
insert takes the same parameters and works in essentially the same way: 

    $sql = 'INSERT INTO tablename (field,field2) VALUES ( :value, :value2 )';
    $this->insert($sql, [':value', ':value2'], [$value, $value2]);
    
updateDb is slightly different, it takes the $query and the $bindings parameters and the SQL query should be formatted using question marks like this:

    $sql = "UPDATE tablename
            SET field=?
            WHERE fieldname=?";
    $this->updateDb($sql, [$questionmarkonevalue, $questionmarktwovalue]);
    
deleteFromDb works pretty much like the queryDb-function:

    $sql = "DELETE FROM tablename WHERE fieldname=:val";
    $this->deleteFromDb($sql, [':val'], ['correspondingValue']);
    
incrementField simplifies the task of incrementing the value of a particular field in a database table. You provide the tablename, the name of the field, the id of the row where the correct field can be located and by how much you want the field to be incremented. 

    $this->incrementField('comments', 'num_replies', $comment_id, 1);
    
