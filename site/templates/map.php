<?php
$category = get('c'); // e.g., 'Historical'
$nodes = $page->children()->listed();

// Filter the nodes by category if one is set
if ($category) {
    $nodes = $nodes->filterBy('category', $category);
    if ($category === 'Historical') {
        $nodes = $nodes->sortBy('year', 'desc');
    }
}
?>
<?php if ($category !== 'Historical'): ?>
    <?php snippet('axis') ?>
    <?php snippet('axis-labels') ?>
<?php endif ?>
    <!-- <button class="fixed z-50 top-5 left-1/2 -translate-x-1/2" @click="filterOpen = !filterOpen">Filters</button> -->

    <?php if ($page->children()->isNotEmpty()): ?>
        <div class="pointer-events-none <?= $category === 'Historical' ? 'mt-10 sm:mt-40 relative grid grid-cols-1  gap-6 p-6 z-[40]' : 'fixed inset-0 w-full h-screen z-40' ?>">

            <?php foreach ($nodes->values() as $index => $node): ?>
                <?php if($category === 'Historical'):?>
                    <a class="pointer-events-auto" x-link @click="loadPage('<?= $node->url() ?>', true)" :href="window.location.pathname + '?c=Historical'">
                        <div
                            class="z-[100] p-2 max-w-96 bg-white text-black shadow-md rounded-md flex gap-2"
                            x-transition:enter="transition ease-out delay-500 duration-150"
                            x-transition:enter-start="opacity-0 scale-100"
                            x-transition:enter-end="opacity-100 scale-100"
                            x-transition:leave="transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 scale-100"
                            x-transition:leave-end="opacity-0 scale-100"
                        >
                            <?php if($node->images()->isNotEmpty()):?>
                                <div class="flex w-48">
                                    <img class="object-cover aspect-square" src="<?=$node->images()->first()->url()?>" alt="">
                                </div>
                            <?php endif?>

                            <div class="p-2 flex flex-col justify-between">
                                <h4 class="text-2xl/ultratight"><?=$node->title()?></h4>
                                <div class="text-base flex flex-wrap gap-2">
                                    <span><?=$node->authors()?></span>
                                    <?php snippet('nodedate', ['page'=>$node])?>
                                    
                                </div>
                                <ul class="flex flex-wrap text-xs gap-1">
                                    <?php if ($node->concept()->isNotEmpty()): ?>
                                        <?php foreach ($node->concept()->split() as $concept): ?>
                                            <li class="cardtag"><?= $concept ?></li>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                    <?php if ($node->tools()->isNotEmpty()): ?>
                                        <?php foreach ($node->tools()->split() as $tool): ?>
                                            <li class="cardtag"><?= $tool ?></li>
                                        <?php endforeach ?>
                                    <?php endif ?>
                                </ul>
                            </div>
                        </div>
                    </a>
                <?php else:?>
                
                <a
                    href="<?= $node->url() ?>"
                    x-link
                    @click.prevent="loadPage('<?= $node->url() ?>', true)"
                    x-data="{ 
                        message: '○', 
                        popover: false, 
                        visible: false,
                        node: {
                            url: '<?= $node->url() ?>',
                            title: '<?= $node->title() ?>',
                            authors: '<?= $node->authors() ?>',
                            date: '<?= $node->date() ?>',
                            images: '<?= $node->image() ? $node->image()->url() : '' ?>',
                            category: '<?= $node->category() ?>',
                            concept: '<?= $node->concept() ?>',
                            tools: '<?= $node->tools() ?>',
                            uid: '<?= $node->uid() ?>',
                            xpos: <?= $node->xpos()->isNotEmpty() ? $node->xpos()->value() : '0' ?>,
                            ypos: <?= $node->ypos()->isNotEmpty() ? $node->ypos()->value() : '0' ?>
                        }
                    }"
                    x-init="setTimeout(() => visible = true, <?= $index ?> * 50)"
                    :class="visible ? 'opacity-100' : 'opacity-0'"
                    class="hover:z-[110] select-none absolute flex flex-col justify-center items-center group drop-shadow-logo transition-all duration-700 ease-out pointer-events-auto"

                    style="top: <?=$node->ypos()->value()?>%; left: <?=$node->xpos()->value()?>%"
                    @mouseenter.prevent="
                        message = '●';
                        popover = true;"
                    @mouseleave.prevent="message = '○'; popover = false">
                    <div class="text-base group-hover:text-green" x-text="message">○</div>
                    <h3 class="text-xs max-w-[25ch] text-center mx-auto"><?= $node->title() ?></h3>
                    <?php snippet('popover') ?>
                </a>
                <?php endif?>
            <?php endforeach ?>

        </div>
    <?php endif ?>
    <?php if ($kirby->request()->header('X-Requested-With') === 'fetch'): ?>
        <?php snippet('modal', ['page' => $page]) ?>
    <?php endif ?>
</div>
<?php snippet('end') ?>