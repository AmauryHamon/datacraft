<dl class="grid grid-cols-2 gap-4 text-base mb-10">
    <?php foreach ($block->items()->toStructure() as $item): ?>
        <div class="leading-[1.1]">
            <dt><?= $item->term() ?></dt>
            <dd>
                <div>
                    <?= $item->bio() ?>
                </div>
                <div>
                    <?= $item->role() ?>
                </div>
            </dd>
        </div>
    <?php endforeach; ?>
</dl>