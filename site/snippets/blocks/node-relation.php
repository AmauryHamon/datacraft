<?php if($block->links()->toStructure()->isNotEmpty()):?>
<div class="border-t border-lightgreen py-4 flex flex-col gap-4">
    <h3 class="text-2xl/tight">Related</h3>
    <ul class="flex flex-wrap gap-2">
        <?php foreach($block->links()->toStructure() as $relation):?>
        <li>
            <a  
                class="select-none flex flex-col justify-center items-center group drop-shadow-logo"
                x-data="{ message: '○'}"
                @mouseenter.prevent="message = '●'"
                @mouseleave.prevent="message = '○'">
                <div
                    class="text-base group-hover:text-green"
                    x-text="message"></div>
                <h3 class="text-xs"><?=$relation->text()?></h3>
            </a>
        </li>
        <?php endforeach?>
    </ul>
</div>
<?php endif?>