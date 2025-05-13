<?php
use Kirby\Cms\Html;

/** @var \Kirby\Cms\Block $block */
$caption = $block->caption();

if (
    $block->location() == 'kirby' &&
    $video = $block->video()->toFile()
) {
    $url   = $video->url();
    $attrs = array_filter([
        'autoplay'    => $block->autoplay()->toBool(),
        'controls'    => $block->controls()->toBool(),
        'loop'        => $block->loop()->toBool(),
        'muted'       => $block->muted()->toBool() || $block->autoplay()->toBool(),
        'playsinline' => $block->autoplay()->toBool(),
        'poster'      => $block->poster()->toFile()?->url(),
        'preload'     => $block->preload()->value(),
        'class'       => "w-full h-full aspect-video"
    ]);
} else {
    $url = $block->url();
    $attrs = array_filter([
        'autoplay'    => $block->autoplay()->toBool(),
        'controls'    => $block->controls()->toBool(),
        'loop'        => $block->loop()->toBool(),
        'muted'       => $block->muted()->toBool() || $block->autoplay()->toBool(),
        'playsinline' => $block->autoplay()->toBool(),
        'poster'      => $block->poster()->toFile()?->url(),
        'preload'     => $block->preload()->value(),
        'class'       => "w-full h-full aspect-video"
    ]);
}
?>
<?php if ($video = Html::video($url, [], $attrs ?? [])): ?>
<figure class="w-full h-full aspect-video">
  <?= $video ?>
  <?php if ($caption->isNotEmpty()): ?>
  <figcaption><?= $caption ?></figcaption>
  <?php endif ?>
</figure>
<?php endif ?>