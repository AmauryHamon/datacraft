<div
        class="fixed bg-lightgrey z-40 inset-0 w-full h-screen "
        x-show="filterOpen"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 scale-100"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-100">
        <div class="flex flex-col gap-4 py-24 px-5">
            <div class="flex flex-col gap-2">
                <label for="filter-1">Content</label>
                <input type="checkbox" id="filter-1">
            </div>
            <div class="flex flex-col gap-2">
                <label for="filter-2">Concept</label>
                <input type="checkbox" id="filter-2">
            </div>
            <div class="flex flex-col gap-2">
                <label for="filter-3">Categories</label>
                <input type="checkbox" id="filter-3">
            </div>
            <div class="flex flex-col gap-2">
                <label for="filter-4">Tools</label>
                <input type="checkbox" id="filter-4">
                <?php snippet('tag')?>
            </div>
            <div class="flex flex-col gap-2">
                Roasted Index
                <label 
                    for="accessibility-effort"
                    class="h-8 px-2 py-1 flex flex-1 gap-2 items-center hover:opacity-80"
                >
                    
                <span>Accessibility</span>
                <input
                    type="range"
                    name="accessibility-effort"
                    id="filter-accessibility-effort"
                    min="0"
                    max="100"
                    step="1"
                    class=""
                />
                <span>Effort</span>
                </label>
                <label 
                    for="emancipation-productivity"
                    class="h-8 px-2 py-1 flex flex-1 gap-2 items-center hover:opacity-80"
                >
                    
                <span>Emancipation</span>
                <input
                    type="range"
                    name="accessibility-effort"
                    id="filter-accessibility-effort"
                    min="0"
                    max="100"
                    step="1"
                    class=""
                />
                <span>Productivity</span>
                </label>
            </div>
        </div>

    </div>