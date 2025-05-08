<div
                x-show="popover"
                
                class="absolute z-[100] p-2 max-w-96 bg-white text-black shadow-md rounded-md flex gap-2"
                x-bind:style="'top: calc(' + node?.ypos + '% + 1.5rem); left: ' + node?.xpos + '%;'"
                x-transition:enter="transition ease-out delay-500 duration-150"
                x-transition:enter-start="opacity-0 scale-100"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-300"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-100"
            >

                <div class="flex w-48" x-show="node?.images">
                    <img class="object-cover aspect-square" :src="node?.images" alt="">
                </div>

                <div class="p-2 flex flex-col justify-between">
                    <h4 class="text-2xl/ultratight" x-text="node?.title"></h4>
                    <div class="text-base flex flex-wrap gap-2">
                        <span x-text="node?.authors"></span>
                        <span x-text="node?.date"></span>
                    </div>
                    <div class="flex flex-wrap text-xs gap-1">
                        <span x-show="node?.category" class="cardtag" x-text="node?.category"></span>
                        <span x-show="node?.concept" class="cardtag" x-text="node?.concept"></span>
                        <span x-show="node?.tools" class="cardtag" x-text="node?.tools"></span>
                    </div>
                </div>
            </div>