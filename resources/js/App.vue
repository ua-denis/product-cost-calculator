<script setup>
import BasePriceInput from '@/components/BasePriceInput.vue';
import ProductCategorySelect from '@/components/ProductCategorySelect.vue';
import SalesLocationSelect from '@/components/SalesLocationSelect.vue';
import UnitsInput from '@/components/UnitsInput.vue';
import CalculateButton from '@/components/CalculateButton.vue';
import ResultTable from '@/components/ResultTable.vue';
import { useFormStore } from '@/stores/useFormStore';

const store = useFormStore();
</script>

<template>
    <div class="max-w-2xl mx-auto p-6">
        <h1 class="text-2xl font-bold mb-6">Product Cost Calculator</h1>
        <BasePriceInput />
        <ProductCategorySelect />
        <SalesLocationSelect />
        <UnitsInput />
        <CalculateButton />
        <ResultTable />
        <div v-if="store.error" class="mt-4 text-red-500">
            {{ store.error }}
        </div>
    </div>
</template>
