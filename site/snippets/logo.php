<div class="pointer-events-none fixed z-30 inset-0 w-full h-screen flex flex-col gap-4 items-center justify-center">
    <h1 class="text-lightgreen text-[15vw] font-display select-none drop-shadow-logo leading-[0.7] mb-8"
    :class="subpage === 'home' ? 'opacity-100' : 'opacity-20'"
    >datacraft</h1>
    <?php if ($showParagraph ?? false): ?>
        <p x-show="subpage === 'home'"class="select-none mt-20 absolute top-1/2 text-center text-xs sm:text-base">
            <?=$site->tagline()?>
        </p>
    <?php endif; ?>
</div>