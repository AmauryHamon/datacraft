<?php

return function($page, $pages, $site, $kirby){
    $nodes = $page->children()->listed();

    $category = get('c') ?? 'Project';


    $nodes = $nodes->filter(function($node) use ($category) {
        $categories = $node->category()->split(',');
        return in_array($category, $categories);
    });
    return [
        "category" => $category,
        "nodes" => $nodes

        
    ];
};