# lazadatest
Using one of modern PHP frameworks (sf2, zf2, Laravel, Yii2) you should implement system  for API calls (no frontend part but you can add Swagger or similar tool to explore your api).  Your JSON-REST full api (not JSON-RPC) should provide CRUD access to two resources  without any security check:  ?  Post (with fields like: title, body and so on)  ?  Tags (with only name field) many-to-may relation with posts    Additional methods for API:  ?  select all posts by tag or tags  ?  count posts by tag or tags    After any post created system should send email to specified in configuration file Email.   After any post removed system should log information about it. 

#Init Configuration
After you download the application, you have to follow the following steps to initialize the installed application. I copy these steps from Yii2 Getting Started. 

1. Run command pathto\php pathto\yii init (windows) to initialize the application with a specific environment.
2. Create a new database and adjust the components['db'] configuration in common/config/main-local.php accordingly.
3. Apply migrations with console command yii migrate. This will create tables needed for the application to work.
4. Yii migrate command will create tables in database automatically.



#Trying it Out

For posts
GET /posts: list all posts page by page;
HEAD /posts: show the overview information of post listing;
POST /posts: create a new post (required information title,description,username,email); 
GET /posts/123: return the details of the post 123;
HEAD /posts/123: show the overview information of post 123;
PATCH /posts/123 and PUT /posts/123: update the post 123;
DELETE /posts/123: delete the post 123;
OPTIONS /posts: show the supported verbs regarding endpoint /posts;
OPTIONS /posts/123: show the supported verbs regarding endpoint /posts/123.
