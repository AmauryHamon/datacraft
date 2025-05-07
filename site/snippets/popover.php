<div
    x-show="popover"
    class="absolute z-[100] p-2 min-w-96 top-10  bg-white text-black shadow-md rounded-md transition-opacity duration-300 flex gap-2"
    x-transition:enter="transition ease-out delay-500 duration-150"
    x-transition:enter-start="opacity-0 scale-100"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-100"
    >

    <div class="flex w-48" x-show="node.images.length > 0">
        <img class=" object-cover aspect-square" :src="node.images" alt="">
    </div>

    <div class="p-2 flex flex-col justify-between">
        <h4 class="text-2xl/ultratight" x-text="node.title"></h4>
        <div class="text-base flex flex-wrap gap-2"><span x-text="node.authors"></span><span x-text="node.date"></span></div>
        <div class="flex flex-wrap text-xs gap-1">
            <span x-show="node.category.length > 0" class="cardtag" x-text="node.category"></span>
            <span x-show="node.concept.length > 0" class="cardtag" x-text="node.concept"></span>
            <span x-show="node.tools.length > 0" class="cardtag" x-text="node.tools"></span>
        </div>
    </div>
</div>