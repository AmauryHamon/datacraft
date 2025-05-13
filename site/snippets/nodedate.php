<?php
$datetype = $page->datetype()->value();

// Assume `year` is a date field like 2023-01-01
$year = $page->year()->isNotEmpty() ? $page->year()->toDate('Y') : null;

$periodStart = $page->dateperiodstart()->isNotEmpty() ? $page->dateperiodstart()->toDate('Y') : null;
$periodEnd = $page->dateperiodend()->isNotEmpty() ? $page->dateperiodend()->toDate('Y') : null;

$datetext = $page->datetext()->value();
?>

<?php if ($datetype === 'year' && $year): ?>
    <span><?= $year ?></span>

<?php elseif ($datetype === 'period' && $periodStart && $periodEnd): ?>
    <span><?= $periodStart ?>–<?= $periodEnd ?></span>

<?php elseif ($datetype === 'text' && $datetext): ?>
    <span><?= esc($datetext) ?></span>

<?php endif; ?>
