import { ref } from "vue";
import { tasksSummary } from "../http/summary-api";
import { defineStore } from "pinia";

export const useSummaryStore = defineStore("summarystore", () => {
    const summaries = ref([]);
    const fetchTasksSummary = async (params = {}) => {
        const { data } = await tasksSummary(params);
        summaries.value = data;
    };

    return {
        summaries,
        fetchTasksSummary,
    };
});
