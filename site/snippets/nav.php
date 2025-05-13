<div class=" relative z-[110] h-24" x-data="{menuOpen:false}">
    <div class=" relative z-[100] bg-gradient-to-b from-green to-50% bg-size-200 bg-pos-0 transition-all duration-300 ease-in-out hover:bg-pos-100">
        <nav
            class=" opacity-100 flex justify-between items-center px-2 py-1 sm:p-5 ">
            <a href="/" class=" select-none font-display text-3xl sm:text-5xl">
                datacraft
            </a>
            <div :class="subpage.includes('map') ? 'flex' : 'hidden'" class="fixed z-[100] top-8 left-1/2 -translate-x-1/2">
                <ul class="flex gap-4">
                    <li>
                        <a x-link @click="filterMap" x-bind:href="$router.resolve({c:'Project'})" :class="$router.query.c === 'Project' || !$router.query.c ? 'text-green drop-shadow-logo' : 'text-black'">Projects</a>
                    </li>
                    <li>
                        <a x-link @click="filterMap" x-bind:href="$router.resolve({c:'Historical'})" :class="$router.query.c === 'Historical' ? 'text-green drop-shadow-logo' : 'text-black'">Legacy</a>
                    </li>
                    <li>
                        <a x-link @click="filterMap" x-bind:href="$router.resolve({c:'Recipe'})" :class="$router.query.c === 'Recipe' ? 'text-green drop-shadow-logo' : 'text-black'">Recipes</a>
                    </li>

                </ul>
            </div>
            <button @click="menuOpen = !menuOpen" class="">
                <span x-show="!menuOpen">
                    <?php snippet('burger') ?>
                </span>
                <span x-show="menuOpen">
                    <?php snippet('cross') ?>
                </span>
                </template>
            </button>
        </nav>
    </div>
    <div x-show="menuOpen" class="relative opacity-20 z-40 ">
        <?php snippet('logo', ['showParagraph' => false]) ?>
    </div>
    <div
        class="fixed inset-0 w-full h-screen bg-lightgrey flex"
        x-show="menuOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-100"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-100">

        <ul class="relative w-full grid grid-cols-1 sm:grid-cols-2 max-h-[90vh] my-[5vh] sm:max-h-none place-content-center sm:place-content-around justify-items-stretch sm:content-stretch text-3xl sm:text-4xl leading-[1]">
            <?php foreach ($site->children()->listed() as $subpage): ?>
                <li class="flex justify-center items-center">
                    <a
                        x-link
                        href="<?= $subpage->url() ?>"
                        data-text="<?= $subpage->title() ?>"
                        @click="
                        loadPage('<?= $subpage->uid() ?>');
                        menuOpen = !menuOpen
                    "
                        class="hover:drop-shadow-logo transition-all duration-300 ease-in-out">
                        <?= $subpage->title() ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="fixed left-0 bottom-0 z-50 w-full">
            <?php snippet('footer') ?>
        </div>
    </div>
</div>