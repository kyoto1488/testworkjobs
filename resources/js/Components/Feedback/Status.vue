<script setup>

defineProps(['value'])

</script>

<template>
    <div>
        <div v-if="value === 'rejected'" class="mt-3 inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150">
            Rejected
        </div>
        <div v-if="value === 'approved'" class="mt-3 inline-flex items-center px-4 py-2 bg-lime-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150">
            Accepted
        </div>
        <div v-if="value === 'pending'" class="mt-3 inline-flex items-center px-4 py-2 bg-gray-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest transition ease-in-out duration-150">
            Pending
        </div>
    </div>
</template>
