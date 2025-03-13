<?php snippet('head') ?>
<?php snippet('axis') ?>
<?php snippet('axis-labels') ?>
<div x-data="{filterOpen:false, modal:false, selectedNode: {title:'', content:'', img:''}}">
    <button class="fixed z-50 top-5 left-1/2 -translate-x-1/2" @click="filterOpen = !filterOpen">Filters</button>
    <?php snippet('filters')?>
    <?php if($page->nodes()->toStructure()->isNotEmpty()):?>
        <div class="fixed inset-0 w-full h-screen z-40">
        <?php foreach($page->nodes()->toStructure() as $node):?>
            <a 
                href="" 
                class="select-none absolute flex flex-col justify-center items-center group drop-shadow-logo"
                style="top: <?=$node->y()?>%; left: <?=$node->x()?>%;"
                x-data="{ message: '○', popover: false }"
                @mouseenter.prevent="message = '●'; popover = true" 
                @mouseleave.prevent="message = '○'; popover = false"
                @click.prevent="
                    selectedNode = { 
                        title: '<?=$node->title()?>', 
                        content: '<?=$node->text()?>', 
                        img: 'https://picsum.photos/300/200' 
                    }; 
                    modal = true;
                "
            >
                <div 
                class="text-base group-hover:text-green" 
                x-text="message"

                ></div>
                <h3 class="text-xs"><?=$node->title()?></h3>
                <div 
                    x-show="popover"
                    class="absolute p-2 min-w-80 top-10  bg-white text-black shadow-md rounded-md transition-opacity duration-300 flex gap-2"
                    x-transition
                >
                    <div class="flex-1 flex">
                        <img class="" src="https://picsum.photos/300/200" alt="">
                    </div>
                    <div class="p-2 flex-1 flex flex-col">
                        <h4 class="font-display text-3xl/tight"><?=$node->title()?>!</h4>
                        <div class="text-base flex flex-wrap gap-2"><span>Crosslucid</span><span>YYYY</span></div>
                        <div class="flex flex-wrap text-xs gap-1"><span>Content Type</span><span>Category</span><span>Concept</span><span>Tool</span></div>
                    </div>
                </div>
            </a>
        <?php endforeach?>
        </div>
    <?php endif?>
    <div 
        x-show="modal"
        class="fixed inset-0 flex items-center justify-center z-50 drop-shadow-logo"
        x-transition
        @click="modal = false"
    >
        <div 
            class="bg-white p-6 shadow-lg max-w-2xl w-full relative"
            @click.stop
        >
            <button class="absolute top-2 right-2 text-xl" @click="modal = false">&times;</button>
            <h2 class="text-xl" x-text="selectedNode.title"></h2>
            <img :src="selectedNode.img" alt="" class="mt-4 w-full rounded-md">
            <p class="mt-4" x-text="selectedNode.content"></p>
        </div>
    </div>
</div>
<?php snippet('end') ?>