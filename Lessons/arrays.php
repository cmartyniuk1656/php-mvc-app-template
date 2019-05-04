<?php

class Post {

    public $title;
    public $published;


    public function __construct($title, $author, $published) {

        $this->title = $title;
        $this->author = $author;
        $this->published = $published;

    }
}


$posts = [

    new Post('My First Post', 'Chris Martyniuk', true),
    new Post('My Second Post', 'Chris Martyniuk', true),
    new Post('My Third Post', 'Chris Martyniuk', true),
    new Post('My Fourth Post', 'Chris Martyniuk', false)


];

//Filters an array, returning a result set where condition of the enclosed function is true for each result. ($array, $function())
$unpublishedPosts = array_filter($posts, function ($post) {

    return $post->published === false;

});

var_dump($unpublishedPosts);


//Iterate through an array, preforming the enclosed function on each item in the array. ($function($item){}, $array)
$modifiedArray = array_map(function ($post) {

    return ['title' => $post->title];

}, $posts);

var_dump($modifiedArray);


//Iterate through an associative array and create a new result set containing the values from a specific key. ($array, 'key')
$titles = array_column($posts, 'title');

var_dump($titles);