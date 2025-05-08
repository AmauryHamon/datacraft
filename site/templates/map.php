<?php snippet('head') ?>
<?php snippet('axis') ?>
<?php snippet('axis-labels') ?>
<div x-data="map" x-init="init()" :class="modal ? 'bg-lightgreen' : 'bg-lightgrey'">
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
            <template x-for="(node, index) in nodes" :key="node.title">
                <a
                    href=""
                    
                    x-data="{ message: '○', popover: false, visible: false }"
                    x-init="setTimeout(()=>visible = true, index * 50)"
                    :class="visible ? 'opacity-100' : 'opacity-0'"
                    class="select-none absolute hover:z-[100] flex flex-col justify-center items-center group drop-shadow-logo transition-all duration-700 ease-out"
                    :style="'top: ' + node.ypos + '%; left: ' + node.xpos + '%;'"
                    @mouseenter.prevent="message = '●'; popover = true"
                    @mouseleave.prevent="message = '○'; popover = false"
                    @click.prevent="openModal(node)">
                    <div
                        class="text-base group-hover:text-green"
                        x-text="message"></div>
                    <h3 class="text-xs max-w-[25ch] text-center mx-auto" x-text="node.title"></h3>
                    <?php snippet('popover') ?>
                </a>
            </template>
        </div>
    <?php endif ?>

    <?php snippet('modal') ?>
</div>
<?php snippet('end') ?>