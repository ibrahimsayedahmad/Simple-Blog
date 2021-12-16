# Simple-Blog-
This is a simple blog created using Laravel framework to solve job application assignment

# Job Assignment

A customer approached us to build a web blogging platform.

The homepage will show all the blog posts to everyone visiting the web. Any user will be able to register in the platform, login to a private area to see the posts he created and, if they want, create new ones. They won't be able to edit or delete them.

The blog posts will only contain a title, description and publication date. The users should be able to sort them by publication_date.

Also, the customer is using another blogging platform and she wants us to auto import the posts created there and add them to our new blogging platform, for that reason, she provided us the following REST api endpoint that returns the new posts "*****". 

The posts from this feed should be saved under a designated, system-created user, 'admin'.

Our customer is a very popular blogger, who generates between 2 and 3 posts an hour. The site which powers the feed linked above is a very popular one (several million visitors a month), and we are expecting a similar level of traffic on our site. One of our goals is to minimise the strain put on our system during traffic peaks, while also minimising the strain we put on the feed server.

# Features
Add, import post
Basic role-permissions system to assign permissions to users (you can add/delete permissions through configuration file config/myblog.php)

# Installation
Download all files to your local server
Install packages
`composer update`
Run Migration
`php artisan migrate`
Seed DB with admin user
`php artisan db:seed`
admin user will be created with email: **admin@system.com** and password **adpassmin**
