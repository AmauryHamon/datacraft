<footer class="relative z-50 p-5 flex gap-4 text-xs bg-gradient-to-t from-green to-50% bg-size-200 bg-pos-100 transition-all duration-300 ease-in-out hover:bg-pos-0">
    <div class="w-full flex flex-col sm:flex-row gap-4 items-baseline justify-between">
        <div class="flex gap-4 items-center ">
            <p><?=$site->footerlogotext()?></p>
            <ul class="flex gap-4 items-center">
                <?php foreach($site->footerlogos()->toStructure() as $logo): ?>
                    <li>
                        <a class="flex max-w-20 max-h-6" href="<?= $logo->url() ?>" target="_blank">
                        <img src="<?=$logo->image()->toFile()->url() ?>" alt="logo">
                        </a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <ul class="flex gap-4 items-center">
            <?php foreach($site->footerlinks()->toStructure() as $link): ?>
                <li>
                    <a href="<?= $link->url() ?>" target="_blank"><?= $link->text() ?></a>
                </li>
            <?php endforeach ?>
        </ul>
    </div>


</footer>