<?php if ($block->links()->toStructure()->isNotEmpty()): ?>
    <div class="border-t border-lightgreen py-4 flex flex-col gap-4">
        <h3 id="links" class="text-2xl/tight">External Links</h3>
        <ul class="flex flex-wrap gap-2">
            <?php foreach ($block->links()->toStructure() as $link): ?>
                <li><a href="<?= $link->url() ?>" class="bg-lightgreen text-xs p-1 after:content-['↗'] after:ml-1" after="↗" target="_blank"><?= $link->text() ?></a></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>