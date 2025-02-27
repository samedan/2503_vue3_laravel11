import axios from "axios";

axios.defaults.withCredentials = true;

axios.defaults.withXSRFToken = true;

const api = axios.create({
    // baseURL: "http://127.0.0.1:8000/api/v1",
    baseURL: import.meta.env.VITE_BASE_URL,
});

export default api;
