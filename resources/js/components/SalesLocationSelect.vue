<script setup>
import { computed, onMounted, ref } from 'vue'
import apiClient from '@/api/apiClient'
import { useFormStore } from '@/stores/useFormStore'

const store = useFormStore()
const locations = ref([])
const selectedLocation = computed({
    get: () => store.salesLocation,
    set: (value) => store.salesLocation = value,
})

const fetchLocations = async () =>
{
    try
    {
        const response = await apiClient.get('/locations')
        locations.value = response.data
    }
    catch (error)
    {
        console.error('Failed to fetch locations:', error)
    }
}

onMounted(() =>
{
    fetchLocations()
})
</script>

<template>
    <div class="mb-4">
        <label for="sales-location" class="block text-sm font-medium text-gray-700">Sales Location</label>
        <select
            id="sales-location"
            v-model="selectedLocation"
            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
        >
            <option disabled value="">Select a location</option>
            <option v-for="location in locations" :key="location.id" :value="location.city">
                {{ location.city }}
            </option>
        </select>
    </div>
</template>
