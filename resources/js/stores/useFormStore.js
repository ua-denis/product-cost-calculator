import { defineStore } from 'pinia'
import apiClient from '@/api/apiClient'
import { ref } from 'vue'

export const useFormStore = defineStore('form', () =>
{
    const basePrice = ref('')
    const productCategory = ref(null)
    const salesLocation = ref(null)
    const units = ref('')
    const calculationResult = ref(null)
    const loading = ref(false)
    const error = ref(null)

    const calculateFinalCost = async () =>
    {
        loading.value = true
        error.value = null
        try
        {
            const response = await apiClient.post('/calculate', {
                base_price: parseFloat(basePrice.value),
                category: productCategory.value,
                location: salesLocation.value,
                quantity: parseInt(units.value, 10),
            })
            calculationResult.value = response.data
        }
        catch (err)
        {
            error.value = err.response?.data?.message || 'An error occurred.'
        }
        finally
        {
            loading.value = false
        }
    }

    return {
        basePrice,
        productCategory,
        salesLocation,
        units,
        calculationResult,
        loading,
        error,
        calculateFinalCost,
    }
})
