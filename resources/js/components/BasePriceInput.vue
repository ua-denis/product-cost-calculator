<script setup>
import { computed } from 'vue';
import { useFormStore } from '@/stores/useFormStore';

const store = useFormStore();

const basePrice = computed({
    get: () => store.basePrice,
    set: (value) => store.basePrice = value,
});
</script>

<template>
    <div class="mb-4">
        <label for="base-price" class="block text-sm font-medium text-gray-700">Base Price</label>
        <input
            id="base-price"
            v-model="basePrice"
            type="number"
            step="0.01"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
            placeholder="Enter base price"
        />
    </div>
</template>
