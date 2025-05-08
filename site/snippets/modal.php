<div
    x-show="modal"
    class="no-scrollbar fixed top-20 left-16 bottom-16 flex gap-4 items-start justify-start z-50 drop-shadow-logo overflow-y-auto overflow-x-visible"

    x-transition:enter="transition ease-out duration-300 delay-300"
    x-transition:enter-start="opacity-0 scale-100"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-100"
    @click.outside="modal = false">
    <div
        class="bg-lightgrey p-6 shadow-lg max-w-xl w-full relative flex flex-col gap-8"
        @click.stop>
        <button class="z-[55] sticky top-2 right-2 self-end text-green drop-shadow-text" @click="modal = false"><?php snippet('cross') ?></button>
        <figure>
            <img :src="selectedNode.images" alt="" class="w-full">
            <figcaption x-text="selectedNode.alt" class="text-xs text-right text-gray-300"></figcaption>
        </figure>
        <div class="flex flex-col gap-8 text-center">
            <h2 class="text-7xl/ultratight font-display drop-shadow-logo" x-text="selectedNode.title"></h2>
            <div class="text-3xl/ultratight">
                <span x-text="selectedNode.authors"></span>,
                <span x-text="selectedNode.date"></span>
            </div>
        </div>
        <div id="synopsis" class="border-t border-lightgreen py-4 flex flex-col gap-4">
            <h3>Synopsis</h3>
            <div x-text="selectedNode.synop" class="drop-shadow-text"></div>
        </div>
        <div class="flex flex-col gap-8">
            <div id="formula" class="flex flex-col">
                <div class="relative z-[55] text-center border border-green p-8 flex flex-col gap-4 pb-16">
                    <div class="z-[54] absolute top-0 bottom-0 left-1/2 -translate-x-1/2">
                        <?php snippet('big-arrow') ?>
                    </div>
                    <h3 class="z-[55]">Input</h3>
                    <div x-text="selectedNode.input" class="text-4xl/ultratight z-[55]"></div>
                </div>
                <div class="bg-lightgreen p-8">
                    <h3 class="text-center">Formula</h3>
                    <div x-text="selectedNode.formula"></div>
                </div>
                <div class="relative z-[55] text-center border border-green p-8 flex flex-col gap-4 pb-16">
                    <div class="z-[54] absolute top-0 bottom-0 left-1/2 -translate-x-1/2">
                        <?php snippet('big-arrow') ?>
                    </div>
                    <h3 class="z-[55]">Output</h3>
                    <div x-text="selectedNode.output" class="text-4xl/ultratight z-[55]"></div>
                </div>
            </div>
            <template x-if="selectedNode.text">
                <div id="info" x-text="selectedNode.text" class="drop-shadow-text">

                </div>
            </template>
            <!-- <template x-if="selectedNode.related"> -->
            <div class="border-t border-lightgreen py-4 flex flex-col gap-4">
                <h3 class="text-2xl/tight">Related</h3>
                <ul class="flex flex-wrap gap-2">
                    <!-- <template> -->
                    <li>
                        <a
                            href=""
                            class="select-none flex flex-col justify-center items-center group drop-shadow-logo"
                            x-data="{ message: '○'}"
                            @mouseenter.prevent="message = '●'"
                            @mouseleave.prevent="message = '○'">
                            <div
                                class="text-base group-hover:text-green"
                                x-text="message"></div>
                            <h3 class="text-xs">test</h3>
                        </a>
                    </li>
                    <!-- </template> -->
                </ul>
            </div>
            <!-- </template> -->
            <!-- <template x-if="selectedNode.links"> -->
            <div class="border-t border-lightgreen py-4 flex flex-col gap-4">
                <h3 id="links" class="text-2xl/tight">External Links</h3>
                <ul class="flex flex-wrap gap-2">
                    <!-- <template x-for="link in selectedNode.links"> -->
                    <li><a href="" class="bg-lightgreen text-xs p-1 after:content-['↗'] after:ml-1" after="↗" target="_blank">test</a></li>
                    <li><a href="" class="bg-lightgreen text-xs p-1 after:content-['↗'] after:ml-1" after="↗" target="_blank">test</a></li>


                    <!-- </template> -->
                </ul>
            </div>
            <!-- </template> -->
        </div>

    </div>
    <div class=" right-[-200px] top-0 w-60 flex flex-col gap-4 sticky">
        <div class="bg-lightgrey p-4 text-xs flex flex-col gap-2">
            <h4>Roasted Index</h4>
            <p class="text-gray-400 text-xs">Lorem ipsum I code my own AI</p>
            <label for="A-E" class="flex flex-col gap-1">
                <span>Accessibility</span>
                <input type="range" name="A-E" id="A-E" min="0" max="100" :value="selectedNode.xpos" step="1" disabled>
                <span>Effort</span>
            </label>
            <label for="A-E" class="flex flex-col gap-1">
                <span>Emancipation</span>
                <input type="range" name="E-P" id="E-P" min="0" max="100" step="1" :value="selectedNode.ypos" disabled>
                <span>Productivity</span>
            </label>
        </div>
        <div class="bg-lightgrey p-4 text-xs">
            <ul class="flex flex-wrap gap-x-2 gap-y-4">
                <li> <a href="" class="cardtag" @click.stop x-text="selectedNode.concept" x-show="selectedNode.concept && selectedNode.concept.length > 0"></a></li>
                <li><a href="" class="cardtag" @click.stop x-text="selectedNode.category" x-show="selectedNode.concept && selectedNode.category.length > 0"></a></li>
                <li><a href="" class="cardtag" @click.stop x-text="selectedNode.tools" x-show="selectedNode.concept && selectedNode.tools.length > 0"></a></li>
                <li><a href="" class="cardtag" @click.stop x-text="selectedNode.context" x-show="selectedNode.concept && selectedNode.context.length > 0"></a></li>
            </ul>
        </div>
        <div class="bg-lightgrey p-4">
            <ul class="text-xs space-y-1">
                <li><a href="#synopsis" class="hover:underline" @click.stop>Synopsis</a></li>
                <li><a href="#formula" class="hover:underline" @click.stop>Formula</a></li>
                <li><a href="#info" class="hover:underline" @click.stop>Info</a></li>
                <li><a href="#links" class="hover:underline" @click.stop>Links</a></li>
            </ul>
        </div>
    </div>
</div>