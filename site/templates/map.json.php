<?php 
$nodes = [];
foreach($page->children() as $node){
    $nodes[]=[
        'title'=>$node->title()->value(),
        'category'=>$node->category()->value(),
        'xpos'=>$node->xpos()->value(),
        'ypos'=>$node->ypos()->value(),
        'date'=>$node->date()->value(),
        'authors'=>$node->authors()->value(),
        'concept'=>$node->concept()->value(),
        'tools'=>$node->tools()->value(),
        'input'=>$node->input()->value(),
        'formula'=>$node->formula()->value(),
        'output'=>$node->output()->value(),
        'context'=>$node->context()->value(),
        'links'=>$node->links()->toStructure()?->map(fn($link) => [
            'url'=>$link->url()->value(),
            'text'=>$link->text()->value()
        ])->values() ?? [], 
        'images'=>$node->images()->map(fn($image) => $image->url())->values(),
        'alt'=>$node->alt()->value(),
        'text'=>$node->text()->value(),
        'synop'=>$node->synop()->value(),
        'nodevideos'=>$node->nodevideos()->toStructure()?->map(fn($video) => [
            'url'=>$video->url()->value(),
            'text'=>$video->text()->value(),
        ])->values() ?? [], 
    ];
}
echo json_encode($nodes, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
