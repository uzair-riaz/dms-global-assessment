<script setup lang="ts">
import { Button } from '@/components/ui/button';
import AppLayout from '@/layouts/AppLayout.vue';
import { type BreadcrumbItemType } from '@/types';
import { Head, useForm } from '@inertiajs/vue3';
import { LoaderCircle } from 'lucide-vue-next';
import { onMounted, onUnmounted, ref } from 'vue';

interface User {
  id: number;
  name: string;
  email: string;
}

interface Post {
  id: number;
  content: string;
  created_at: string;
  updated_at: string;
  user: User;
}

interface Props {
  posts: Post[];
}

interface FormData {
  content: string;
}

interface NewPostEvent {
  post: Post;
}

const props = defineProps<Props>();
const posts = ref<Post[]>(props.posts);

const breadcrumbs: BreadcrumbItemType[] = [
    {
        title: 'Feed',
        href: '/',
    },
];

const form = useForm<FormData>({
  content: '',
});

onMounted(() => {
  Echo.private('posts')
    .listen('NewPost', (event: NewPostEvent) => {
      posts.value = [event.post, ...posts.value];
    });
});

onUnmounted(() => {
  if (Echo) {
      Echo.leave('posts');
  }
});

const submitForm = () => {
  form.post('/posts', {
    onSuccess: () => {
      form.reset();
    },
  });
};
</script>

<template>
    <Head title="Feed" />

    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="flex h-full flex-1 flex-col gap-4 rounded-xl p-4">
            <!-- Post Creation Form -->
            <div class="rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border">
                <h2 class="mb-4 text-xl font-semibold">Create a New Post</h2>
                <form @submit.prevent="submitForm">
                    <div class="mb-4">
                        <textarea
                            v-model="form.content"
                            class="w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2"
                            placeholder="What's on your mind?"
                            rows="3"
                            required
                        ></textarea>
                    </div>
                    <Button type="submit" :disabled="form.processing">
                        <LoaderCircle v-if="form.processing" class="h-4 w-4 animate-spin mr-2" />
                        Post
                    </Button>
                </form>
            </div>

            <!-- Posts List -->
            <div class="flex-1 rounded-xl border border-sidebar-border/70 p-4 dark:border-sidebar-border">
                <h2 class="mb-4 text-xl font-semibold">Recent Posts</h2>

                <div v-if="posts.length === 0" class="py-10 text-center text-gray-500">
                    No posts available yet. Be the first to post!
                </div>

                <div v-else class="space-y-4">
                    <div
                        v-for="post in posts"
                        :key="post.id"
                        class="rounded-lg border border-sidebar-border/70 p-4 dark:border-sidebar-border"
                    >
                        <div class="mb-2 flex items-center">
                            <span class="font-medium">{{ post.user.name }}</span>
                            <span class="ml-2 text-sm text-gray-500">{{ new Date(post.created_at).toLocaleString() }}</span>
                        </div>
                        <p class="whitespace-pre-line">{{ post.content }}</p>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
