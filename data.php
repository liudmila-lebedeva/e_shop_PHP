<?php

$data = [
    1=> [
        "name" => "apple",
        "price" => 12,
        "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
        "image" => "images/2.jpg"
   ],

    2 => [
        "name" => "strawberry",
        "price" => 10,
        "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
        "image" => "images/1.jpg"
    ],

    3 => [
        "name" => "lemon",
        "price" => 10,
        "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
        "image" => "images/3.jpg"
    ],

    4 => [
        "name" => "grapes",
        "price" => 14,
        "description" => "Lorem ipsum dolor sit amet, consectetur adipiscing elit",
        "image" => "images/4.jpg"
    ]
];

function load_goods() {
    global $data;   // otherwise php doesnt see it 
    $loaded = [];
    
    foreach ($data as $key => $value) {   
        //key - the key number, value = all inside
        $loaded[$key] = $data[$key]['name'];  //what I have under the name
    }
    
    return $loaded;
}

function get_goods($key) {
    global $data;
    return $data[$key];
}
