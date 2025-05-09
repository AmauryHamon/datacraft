<?php snippet('head') ?>
<?php snippet('axis') ?>
<?php snippet('axis-labels') ?>
<div>
    <!-- <button class="fixed z-50 top-5 left-1/2 -translate-x-1/2" @click="filterOpen = !filterOpen">Filters</button> -->
    <div class="fixed z-50 top-10 left-1/2 -translate-x-1/2">
        <ul class="flex gap-4">
            <button>Projects</button>
            <button>Legacy</button>
            <button>Recipes</button>
            <button class="">…</button>
        </ul>
    </div>
    <?php if ($page->children()->isNotEmpty()): ?>
        <div class="fixed inset-0 w-full h-screen z-40">

            <?php foreach ($page->children()->listed()->values() as $index => $node): ?>
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
                    class="select-none absolute flex flex-col justify-center items-center group drop-shadow-logo transition-all duration-700 ease-out"
                    style="top: <?= $node->ypos()->value() ?>%; left: <?= $node->xpos()->value() ?>%"
                    @mouseenter.prevent="
                        message = '●';
                        popover = true;"
                    @mouseleave.prevent="message = '○'; popover = false">
                    <div class="text-base group-hover:text-green" x-text="message">○</div>
                    <h3 class="text-xs max-w-[25ch] text-center mx-auto"><?= $node->title() ?></h3>
                    <?php snippet('popover') ?>
                </a>
            <?php endforeach ?>

        </div>
    <?php endif ?>
    <?php if ($kirby->request()->header('X-Requested-With') === 'fetch'): ?>
        <?php snippet('modal', ['page' => $page]) ?>
    <?php endif ?>
</div>
<?php snippet('end') ?>