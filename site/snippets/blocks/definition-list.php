<dl class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 text-base mb-10">
    <?php foreach ($block->items()->toStructure() as $item): ?>
        <div class="leading-[1.1]">
            <dt><?= $item->term() ?></dt>
            <dd><?= $item->description() ?></dd>
        </div>
    <?php endforeach; ?>
</dl>