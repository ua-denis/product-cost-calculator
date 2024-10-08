<script setup>
import { computed, onMounted, ref } from 'vue'
import apiClient from '@/api/apiClient'
import { useFormStore } from '@/stores/useFormStore'

const store = useFormStore()
const categories = ref([])
const selectedCategory = computed({
    get: () => store.productCategory,
    set: (value) => store.productCategory = value,
})

const fetchCategories = async () =>
{
    try
    {
        const response = await apiClient.get('/categories')
        categories.value = response.data
    }
    catch (error)
    {
        console.error('Failed to fetch categories:', error)
    }
}

onMounted(() =>
{
    fetchCategories()
})
</script>

<template>
    <div class="mb-4">
        <label for="product-category" class="block text-sm font-medium text-gray-700">Product Category</label>
        <select
            id="product-category"
            v-model="selectedCategory"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        >
            <option disabled value="">Select a category</option>
            <option v-for="category in categories" :key="category.id" :value="category.name">
                {{ category.name }}
            </option>
        </select>
    </div>
</template>
