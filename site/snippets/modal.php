<template x-if="modalContent">
    <div x-html="modalContent"
        x-transition:enter="transition ease-out duration-300 delay-300"
        x-transition:enter-start="opacity-0 scale-100"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-100"
        @click.self="closeModal"
    ></div>
</template>