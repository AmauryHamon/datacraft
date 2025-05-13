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
    class="no-scrollbar fixed top-20 left-6 right-6 xl:left-16 bottom-16 z-50 flex flex-col-reverse md:flex-row gap-4 items-start justify-start drop-shadow-logo overflow-y-auto overflow-x-visible">
    <div class="bg-lightgrey p-6 shadow-lg max-w-full lg:max-w-2xl xl:max-w-3xl w-full relative flex flex-col gap-8" @click.stop>
        <button class="z-[55] sticky top-2 right-2 self-end text-green drop-shadow-text" @click="closeModal"><?php snippet('cross') ?></button>
        <?php if ($page->cover()->isNotEmpty()): ?>
            <figure>
                <img src="<?= $page->cover()->toFile()->url() ?>" alt="" class="w-full">
            </figure>
        <?php endif ?>
        <div class="flex flex-col gap-8 text-center">
            <h2 class="text-4xl/ultratight md:text-7xl/ultratight font-display drop-shadow-logo"><?= $page->title() ?></h2>
            <div class="text-xl/ultratight md:text-3xl/ultratight">
                <span><?= $page->authors() ?></span>, <?php snippet('nodedate', ['page'=>$page])?>
            </div>
        </div>
        <?php if($page->blocks()->toBlocks()->isNotEmpty()):?>
        <?php foreach ($page->blocks()->toBlocks() as $block): ?>
            <div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
                <?= $block ?>
            </div>
        <?php endforeach ?>
        <?php endif?>  
    </div>
    <div class="flex-1 sm:flex-none md:right-[-200px] top-0 w-full md:w-60 flex flex-row md:flex-col gap-4 md:sticky">
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
        <div class="flex-1 flex flex-col-reverse gap-4">
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
            <div class="bg-lightgrey p-4 flex-1">
                <ul class="text-xs space-y-1">
                    <li><a href="#synopsis" class="hover:underline" @click.stop>Synopsis</a></li>
                    <li><a href="#formula" class="hover:underline" @click.stop>Formula</a></li>
                    <li><a href="#info" class="hover:underline" @click.stop>Info</a></li>
                    <li><a href="#links" class="hover:underline" @click.stop>Links</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>