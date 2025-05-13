<div id="formula" class="flex flex-col">
    <div class="relative z-[55] text-center border border-green p-8 flex flex-col gap-4 pb-16">
        <div class="z-[54] absolute top-0 bottom-0 left-1/2 -translate-x-1/2">
            <?php snippet('big-arrow') ?>
        </div>
        <h3 class="z-[55]">Input</h3>
        <?php 
        $inputLength = $block->input()->length();
        ?>
        <div class="<?=$inputLength > 100 ? 'text-xl/tight text-left' : 'text-center text-4xl/ultratight'?> z-[55]"><?= $block->input() ?></div>
    </div>
    <div class="bg-lightgreen p-8">
        <h3 class="text-center">Formula</h3>
        <div><?= $block->formula() ?></div>
    </div>
    <div class="relative z-[55] text-center border border-green p-8 flex flex-col gap-4 pb-16">
        <div class="z-[54] absolute top-0 bottom-0 left-1/2 -translate-x-1/2">
            <?php snippet('big-arrow') ?>
        </div>
        <h3 class="z-[55]">Output</h3>
        <div class="text-4xl/ultratight z-[55]"><?= $block->output() ?></div>
    </div>
</div>