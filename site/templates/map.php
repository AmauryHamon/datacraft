<?php snippet('head') ?>
<?php snippet('axis') ?>
<?php snippet('axis-labels') ?>
<div x-data="map" x-init="init()" :class="modal ? 'bg-lightgreen' : 'bg-lightgrey'">
    <button class="fixed z-50 top-5 left-1/2 -translate-x-1/2" @click="filterOpen = !filterOpen">Filters</button>
    <?php snippet('filters') ?>
    <?php if ($page->children()->isNotEmpty()): ?>
        <div class="fixed inset-0 w-full h-screen z-40">
            <template x-for="node in nodes" :key="node.title">
                <a
                    href=""
                    class="select-none absolute flex flex-col justify-center items-center group drop-shadow-logo"
                    :style="'top: ' + node.ypos + '%; left: ' + node.xpos + '%;'"
                    x-data="{ message: '○', popover: false }"
                    @mouseenter.prevent="message = '●'; popover = true"
                    @mouseleave.prevent="message = '○'; popover = false"
                    @click.prevent="openModal(node)">
                    <div
                        class="text-base group-hover:text-green"
                        x-text="message"></div>
                    <h3 class="text-xs" x-text="node.title"></h3>
                    <?php snippet('popover') ?>
                </a>
            </template>
        </div>
    <?php endif ?>

    <?php snippet('modal') ?>
</div>
<?php snippet('end') ?>