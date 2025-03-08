<?php snippet('head') ?>


<?php if ($page->text()->isNotEmpty()): ?>
    <div class="relative z-40 flex flex-col gap-8 p-3 sm:p-5 max-w-screen-md mx-auto">
        <?php foreach ($page->text()->toBlocks() as $block): ?>
            <div id="<?= $block->id() ?>" class="block block-type-<?= $block->type() ?>">
                <?= $block ?>
            </div>
        <?php endforeach ?>
    </div>
<?php endif ?>
<?php snippet('logo', ['showParagraph' => false])?>
<?php snippet('footer')?>
<?php snippet('end') ?>