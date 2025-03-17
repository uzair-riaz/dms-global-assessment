<script setup>
import { ref, onMounted } from 'vue';
import { useForm } from '@inertiajs/vue3';
import axios from 'axios';

const props = defineProps({
    posts: Array
});

const posts = ref(props.posts);
const form = useForm({
    title: '',
    content: ''
});

const submit = () => {
    form.post(route('posts.store'), {
        onSuccess: () => {
            form.reset();
        }
    });
};

// Real-time updates using polling
const fetchPosts = async () => {
    const response = await axios.get(route('posts.index'));
    posts.value = response.data;
};

onMounted(() => {
    setInterval(fetchPosts, 5000); // Poll every 5 seconds
});
</script>

<template>
    <div class="max-w-4xl mx-auto p-4">
        <!-- Post Form -->
        <form @submit.prevent="submit" class="mb-8 bg-white rounded-lg shadow-md p-6">
            <div class="mb-4">
                <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title</label>
                <input
                    type="text"
                    id="title"
                    v-model="form.title"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required
                >
            </div>
            <div class="mb-4">
                <label for="content" class="block text-gray-700 text-sm font-bold mb-2">Content</label>
                <textarea
                    id="content"
                    v-model="form.content"
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    rows="4"
                    required
                ></textarea>
            </div>
            <button
                type="submit"
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                :disabled="form.processing"
            >
                Create Post
            </button>
        </form>

        <!-- Posts List -->
        <div class="space-y-4">
            <div v-for="post in posts" :key="post.id" class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-xl font-bold mb-2">{{ post.title }}</h2>
                <p class="text-gray-700">{{ post.content }}</p>
                <p class="text-sm text-gray-500 mt-2">{{ new Date(post.created_at).toLocaleString() }}</p>
            </div>
        </div>
    </div>
</template> 