<script setup>
import { computed } from 'vue';
import { useFormStore } from '@/stores/useFormStore';

const store = useFormStore();

const units = computed({
    get: () => store.units,
    set: (value) => store.units = value,
});
</script>

<template>
    <div class="mb-4">
        <label for="units" class="block text-sm font-medium text-gray-700">Number of Units</label>
        <input
            id="units"
            v-model="units"
            type="number"
            min="1"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            placeholder="Enter number of units"
        />
    </div>
</template>
