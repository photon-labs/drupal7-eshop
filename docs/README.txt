====
    PHR_DrupalEshop

    Copyright (C) 1999-2013 Photon Infotech Inc.

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

            http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
====

CONTENTS OF THIS FILE
---------------------

 * Server configuration
 * Database configuration

Server configuration:
--------------------

In xampp,

1. Extract the download file.
2. Go to xampp/htdocs folder and create new folder(your site name, eg:mysite)
3. Paste the extracted files in new folder(mysite) folder.

In Apache,

1. Extract the download file.
2. Go to apache/www(root) folder and create new folder(your site name, eg:mysite)
3. Paste the extracted files in new folder(mysite) folder.




Database configuration:
----------------------

site.sql is available inside the source->sql->mysql->5.5.1(or any version) folder It contains the table 
structures and sample data. Create a database in you mysql and import this sql file to the database.



Administrator credentials:
-------------------------
username : admin
password : admin


After login as administrator please change the following settings in configuration page,

Required:
1. Please change site name as per your requirement.
2. Change the site slogan.
3. Change the site e-mail.

Optional
1. Front page settings.
2. Error page settings.


