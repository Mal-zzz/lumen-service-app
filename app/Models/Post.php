<?php 

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;

    class Post extends Model 
    {

        // Post -> table name = posts
        // Custome table name :
        protected $table = 'posts';

        // define column name
        protected $fillable = array('title', 'content', 'status', 'user_id');

        public $timestamps = true;

    }


    

?>