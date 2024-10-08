<script setup>
import { computed } from 'vue'
import { useFormStore } from '@/stores/useFormStore'

const store = useFormStore()

const result = computed(() => store.calculationResult)
</script>

<template>
    <div v-if="result" class="mt-6">
        <h2 class="text-lg font-medium text-gray-900 mb-4">Calculation Details</h2>
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description
                </th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Amount (%)
                </th>
                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <tr v-for="(item, index) in result.details" :key="index">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ item.description }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-right">{{ item.percentage }}%</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700 text-right">{{ item.amount }}</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Final Price</td>
                <td></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">{{ result.final_price }}</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Quantity</td>
                <td></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">x{{ result.quantity }}</td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">Final Cost</td>
                <td></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 text-right">{{ result.final_cost }}</td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
