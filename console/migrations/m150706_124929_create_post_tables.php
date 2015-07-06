<?php

use yii\db\Schema;
use yii\db\Migration;

class m150706_124929_create_post_tables extends Migration
{
    public function up()
    {
    	$tableOptions = null;
    	if ($this->db->driverName === 'mysql') {
    		// http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
    		$tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
    	}
    	
    	$this->createTable('{{%posts}}', [
    			'id' => Schema::TYPE_PK,
    			'username' => Schema::TYPE_STRING . ' NOT NULL',
    			'title' => Schema::TYPE_STRING . '(30) NOT NULL',
    			'description' => Schema::TYPE_TEXT . ' NOT NULL',
    			'username' => Schema::TYPE_STRING.'(30) NOT NULL',
    			'email' => Schema::TYPE_STRING . '(50) NOT NULL',
    			'created' => Schema::TYPE_DATETIME . '',
    			'modified' => Schema::TYPE_DATETIME . '',
    			], $tableOptions);
    	
    	$this->createTable('{{%posts_tags}}', [
    			'id' => Schema::TYPE_PK,
    			'post_id' => Schema::TYPE_INTEGER . ' NOT NULL',
    			'tag_id' => Schema::TYPE_INTEGER . ' NOT NULL',
    			'created' => Schema::TYPE_DATETIME . '',
    			'modified' => Schema::TYPE_DATETIME . '',
    			], $tableOptions);
    	
    	//$this->addForeignKey("fk_post_id", "posts_tags", "post_id", "posts", "id", "CASCADE");
    	//$this->addForeignKey("fk_tag_id", "posts_tags", "tag_id", "tags", "id", "CASCADE");
    	
    	$this->createTable('{{%tags}}', [
    			'id' => Schema::TYPE_PK,
    			'name' => Schema::TYPE_STRING . '(30) NOT NULL',
    			'created' => Schema::TYPE_DATETIME . '',
    			'modified' => Schema::TYPE_DATETIME . '',
    			], $tableOptions);
    	
    	$this->createTable('{{%logs}}', [
    			'id' => Schema::TYPE_PK,
    			'model' => Schema::TYPE_STRING . '(20) NOT NULL',
    			'model_id' => Schema::TYPE_INTEGER . '(20) NOT NULL',
    			'description' => Schema::TYPE_TEXT . ' NOT NULL',
    			'created' => Schema::TYPE_DATETIME . '',
    			'modified' => Schema::TYPE_DATETIME . '',
    			], $tableOptions);
    	
    	
    	
    	
    	/*
    	 *
    	 * 
    	 * CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(20) NOT NULL,
  `model_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
    	 * CREATE TABLE `posts_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tag_id` (`tag_id`),
  KEY `fk_post_id` (`post_id`),
  CONSTRAINT `fk_post_id` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fk_tag_id` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
    	 * 
    	 */

    }

    public function down()
    {
        echo "m150706_124929_create_post_tables cannot be reverted.\n";

        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
