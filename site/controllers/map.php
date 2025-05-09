<?php

return function($page, $pages, $site, $kirby){
    $nodes = $page->children()->listed();

    $category = 'projects';

    if(get('nodes')){
        $category = 'projects';
        if(get('nodes') == 'undefined'){
            $category = 'projects';
        } else {
            $category = get('nodes');
            $nodes = $nodes->filter(function($node) use ($category) {
                $categories = $node->category()->split(',');

                return in_array($category, $categories);
            });
        }
    } 
    return [
        "category" => $category,
        "nodes" => $nodes

        
    ];
};