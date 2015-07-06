# lazadatest
Using one of modern PHP frameworks (sf2, zf2, Laravel, Yii2) you should implement system  for API calls (no frontend part but you can add Swagger or similar tool to explore your api).  Your JSON-REST full api (not JSON-RPC) should provide CRUD access to two resources  without any security check:  ?  Post (with fields like: title, body and so on)  ?  Tags (with only name field) many-to-may relation with posts    Additional methods for API:  ?  select all posts by tag or tags  ?  count posts by tag or tags    After any post created system should send email to specified in configuration file Email.   After any post removed system should log information about it. 

#Init Configuration

After you download the application, you have to follow the following steps to initialize the installed application. I copy these steps from Yii2 Getting Started. 

1. Run command pathto\php pathto\yii init (windows) to initialize the application with a specific environment.
2. Create a new database and adjust the components['db'] configuration in common/config/main-local.php accordingly.
3. Apply migrations with console command yii migrate. This will create tables needed for the application to work.
4. Yii migrate command will create tables in database automatically.
5. Deleted post will be in log table lazadatest/backend/web/index.php?r=logs 
6. In api\config\params.php change the email to get the notification for deletee post.

## Trying it Out

### For Posts (e.g. localhost/lazadatest/api/web/v1/posts)

1. GET /posts: list all posts page by page;
2. HEAD /posts: show the overview information of post listing;
3. POST /posts: create a new post (required information title,description,username,email); 
4. GET /posts/123: return the details of the post 123;
5. HEAD /posts/123: show the overview information of post 123;
6. PATCH /posts/123 and PUT /posts/123: update the post 123;
7. DELETE /posts/123: delete the post 123;
8. OPTIONS /posts: show the supported verbs regarding endpoint /posts;
9. OPTIONS /posts/123: show the supported verbs regarding endpoint /posts/123.

### For Tags (e.g. localhost/lazadatest/api/web/v1/tags)

1. GET /tags: list all posts page by page;
2. HEAD /tags: show the overview information of tags listing;
3. POST /tags: create a new post (required information name); 
4. GET /tags/123: return the details of the tag 123;
5. HEAD /tags/123: show the overview information of tag 123;
6. PATCH /tags/123 and PUT /tags/123: update the tag 123;
7. DELETE /tags/123: delete the post 123;
8. OPTIONS /tags: show the supported verbs regarding endpoint /tag;
9. OPTIONS /tags/123: show the supported verbs regarding endpoint /tag/123.


### For PostTags (e.g. localhost/lazadatest/api/web/v1/poststags

1. POST /poststags: create a new post (required information post_id,tag_id); 
2. DELETE /poststags/123: delete the posts's tag 123;
3. GET /poststags: list all posts page by page;

#### Select all posts by tag or tags
localhost/lazadatest/api/web/v1/posts/search?tags[]=name1&tags[]=name2...

#### Count posts by tag or tags 
localhost/lazadatest/api/web/v1/posts/count?tags[]=name1&tags[]=name2...


