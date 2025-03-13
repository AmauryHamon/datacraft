<?php 
$state = $state ?? 'default'; // Default state
?>
<div 
    x-data="{ state: '<?= $state ?>' }"
    @click="if (state !== 'disabled') state = (state === 'active' ? 'default' : 'active')"
    :class="{
        'text-lightgreen drop-shadow-logo': state === 'active',
        'bg-transparent text-black': state === 'default',
        'bg-gray-200 text-gray-500 cursor-not-allowed': state === 'disabled'
    }"
    class="px-4 py-2 rounded-md text-sm cursor-pointer select-none transition-all"
>
    <span x-text="state.charAt(0).toUpperCase() + state.slice(1)"></span>
</div>