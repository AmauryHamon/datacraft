<div class="relative z-50" x-data="{menuOpen:false}">
    <div class="relative z-50 bg-gradient-to-b from-green to-50% bg-size-200 bg-pos-0 transition-all duration-300 ease-in-out hover:bg-pos-100">
        <nav
            class=" opacity-100 flex justify-between items-center px-2 py-1 sm:p-5 ">
            <a href="/" class="font-display text-3xl sm:text-5xl">
                datacraft
            </a>
            <button  @click="menuOpen = !menuOpen">
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
    <div class="opacity-20 pointer-events-none">
        <?php snippet('logo', ['showParagraph' => false])?>
    </div>
    <div 
        class="fixed inset-0 w-full h-screen z-40 bg-lightgrey flex"
        x-show="menuOpen" 
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-100"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-100"
    >
        <?php snippet('axis')?>
        <ul class="w-full grid grid-cols-1 sm:grid-cols-2 max-h-[90vh] my-[5vh] sm:max-h-none place-content-center sm:place-content-around justify-items-stretch sm:content-stretch text-3xl sm:text-4xl leading-[1]">
            <li class="flex justify-center items-center"><a class="py-4 sm:py-0 flex text-center justify-center items-center w-full h-full hover:drop-shadow-logo transition-all duration-150 ease-in-out" href="/about">About</a></li>
            <li class="flex justify-center items-center"><a class="py-4 sm:py-0 flex text-center justify-center items-center w-full h-full opacity-20 pointer-events-none" href="">Map</a></li>
            <li class="flex justify-center items-center"><a class="py-4 sm:py-0 flex text-center justify-center items-center w-full h-full opacity-20 pointer-events-none" href="">Cookbook (soon)</a></li>
            <!-- <li class="flex justify-center items-center"><a class="py-4 sm:py-0 flex text-center justify-center items-center w-full h-full" href="">Contact</a></li> -->
        </ul>
        <div class="fixed left-0 bottom-0 z-50 w-full">
            <?php snippet('footer')?>
        </div>
    </div>
</div>