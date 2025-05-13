<div
    x-show="modalOpen"
    x-transition:enter="transition ease-out duration-300 delay-300"
    x-transition:enter-start="opacity-0 scale-100"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-100"
    @click.self="closeModal"
    @click.outside="closeModal"
    class="no-scrollbar fixed top-20 left-16 bottom-16 z-50 flex gap-4 items-start justify-start drop-shadow-logo overflow-y-auto overflow-x-visible">
    <div class="bg-lightgrey p-6 shadow-lg max-w-xl w-full relative flex flex-col gap-8" @click.stop>
        <button class="z-[55] sticky top-2 right-2 self-end text-green drop-shadow-text" @click="closeModal"><?php snippet('cross') ?></button>
        <?php if ($page->images()->isNotEmpty()): ?>
            <figure>
                <img src="<?= $page->images()->first()->url() ?>" alt="" class="w-full">
                <figcaption x-text="selectedNode.alt" class="text-xs text-right text-gray-300"></figcaption>
            </figure>
        <?php endif ?>

        <div class="flex flex-col gap-8 text-center">
            <h2 class="text-7xl/ultratight font-display drop-shadow-logo"><?= $page->title() ?></h2>
            <div class="text-3xl/ultratight">
                <span><?= $page->authors() ?></span>, <span><?= $page->date() ?></span>
            </div>
        </div>

        <?php if($page->blocks()->toBlocks()->isNotEmpty()):?>
        <?php foreach ($page->blocks()->toBlocks() as $block): ?>
            <div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
                <?= $block ?>
            </div>
        <?php endforeach ?>
        <?php endif?>  
        
        
        
        
        <div id="synopsis" class="border-t border-lightgreen py-4 flex flex-col gap-4">
            <h3>Synopsis</h3>
            <div class="drop-shadow-text"><?= $page->synop() ?></div>
        </div>
        <?php if ($page->nodevideos()->toStructure()->isNotEmpty()): ?>
            <div id="videos" class="border-t border-lightgreen py-4 flex flex-col gap-4">
                <h3>Videos</h3>
                <div class="flex flex-col gap-4">
                    <?php foreach ($page->nodevideos()->toStructure() as $video): ?>
                        <?= video($video->url(), [], ['class' => 'w-full h-full aspect-video']) ?>
                    <?php endforeach ?>
                </div>
            </div>
        <?php endif ?>
        <?php if ($page->input()->isNotEmpty() && $page->formula()->isNotEmpty() && $page->output()->isNotEmpty()): ?>
        <?php endif ?>
        <div class="flex flex-col gap-8">
            <div id="formula" class="flex flex-col">
                <div class="relative z-[55] text-center border border-green p-8 flex flex-col gap-4 pb-16">
                    <div class="z-[54] absolute top-0 bottom-0 left-1/2 -translate-x-1/2">
                        <?php snippet('big-arrow') ?>
                    </div>
                    <h3 class="z-[55]">Input</h3>
                    <div class="text-4xl/ultratight z-[55]"><?= $page->input() ?></div>
                </div>
                <div class="bg-lightgreen p-8">
                    <h3 class="text-center">Formula</h3>
                    <div><?= $page->formula() ?></div>
                </div>
                <div class="relative z-[55] text-center border border-green p-8 flex flex-col gap-4 pb-16">
                    <div class="z-[54] absolute top-0 bottom-0 left-1/2 -translate-x-1/2">
                        <?php snippet('big-arrow') ?>
                    </div>
                    <h3 class="z-[55]">Output</h3>
                    <div class="text-4xl/ultratight z-[55]"><?= $page->output() ?></div>
                </div>
            </div>
            <?php if ($page->text()->isNotEmpty()): ?>
                <div id="info" class="drop-shadow-text flex flex-col gap-8"><?= $page->text()->kt() ?></div>
            <?php endif ?>
            <!-- <div class="border-t border-lightgreen py-4 flex flex-col gap-4">
                <h3 class="text-2xl/tight">Related</h3>
                <ul class="flex flex-wrap gap-2">

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

                </ul>
            </div> -->
            <?php if ($page->links()->toStructure()->isNotEmpty()): ?>
                <div class="border-t border-lightgreen py-4 flex flex-col gap-4">
                    <h3 id="links" class="text-2xl/tight">External Links</h3>
                    <ul class="flex flex-wrap gap-2">
                        <?php foreach ($page->links()->toStructure() as $link): ?>
                            <li><a href="<?= $link->url() ?>" class="bg-lightgreen text-xs p-1 after:content-['↗'] after:ml-1" after="↗" target="_blank"><?= $link->text() ?></a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
            <?php endif ?>

        </div>
    </div>
    <div class=" right-[-200px] top-0 w-60 flex flex-col gap-4 sticky">
        <div class="bg-lightgrey p-4 text-xs flex flex-col gap-2">
            <h4>Roasted Index</h4>
            <p class="text-gray-400 text-xs">Lorem ipsum I code my own AI</p>
            <label for="A-E" class="flex flex-col gap-1">
                <span>Accessibility</span>
                <input type="range" name="A-E" id="A-E" min="0" max="100" value="<?=$page->xpos()?>" step="1" disabled>
                <span>Effort</span>
            </label>
            <label for="A-E" class="flex flex-col gap-1">
                <span>Emancipation</span>
                <input type="range" name="E-P" id="E-P" min="0" max="100" step="1" value="<?=$page->ypos()?>" disabled>
                <span>Productivity</span>
            </label>
        </div>
        <div class="bg-lightgrey p-4 text-xs">
            <ul class="flex flex-wrap gap-x-2 gap-y-4">
                <?php if ($page->concept()->isNotEmpty()): ?>
                    <?php foreach ($page->concept()->split() as $concept): ?>
                        <li><a href="" class="cardtag" @click.stop><?= $concept ?></a></li>
                    <?php endforeach ?>
                <?php endif ?>
                <?php if ($page->category()->isNotEmpty()): ?>
                    <?php foreach ($page->category()->split() as $category): ?>
                        <li><a href="" class="cardtag" @click.stop><?= $category ?></a></li>
                    <?php endforeach ?>
                <?php endif ?>
                <?php if ($page->tools()->isNotEmpty()): ?>
                    <?php foreach ($page->tools()->split() as $tool): ?>
                        <li><a href="" class="cardtag" @click.stop><?= $tool ?></a></li>
                    <?php endforeach ?>
                <?php endif ?>
                <?php if ($page->context()->isNotEmpty()): ?>
                    <?php foreach ($page->context()->split() as $context): ?>
                        <li><a href="" class="cardtag" @click.stop><?= $context ?></a></li>
                    <?php endforeach ?>
                <?php endif ?>
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