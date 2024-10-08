<script setup>
import { computed } from 'vue';
import { useFormStore } from '@/stores/useFormStore';

const store = useFormStore();

const isLoading = computed(() => store.loading);
const isDisabled = computed(() => {
    return (
        !store.basePrice ||
        !store.productCategory ||
        !store.salesLocation ||
        !store.units ||
        isLoading.value
    );
});

const handleCalculate = () => {
    store.calculateFinalCost();
};
</script>

<template>
    <div class="mb-4">
        <button
            @click="handleCalculate"
            :disabled="isDisabled"
            class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500"
        >
            {{ isLoading ? 'Calculating...' : 'Calculate' }}
        </button>
    </div>
</template>
