# Social Feed App

A real-time social feed application built with Laravel, Inertia.js, Vue 3, and Tailwind CSS.

## Features

- Create posts with title and content
- Real-time updates using polling
- Modern UI with Tailwind CSS
- Server-side rendering with Inertia.js
- Vue 3 components with Composition API

## Technologies Used

- Laravel 10.x
- Inertia.js
- Vue 3
- Tailwind CSS
- SQLite (default database)

## Setup Instructions

1. Clone the repository
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Install Node.js dependencies:
   ```bash
   npm install
   ```
4. Copy the environment file:
   ```bash
   cp .env.example .env
   ```
5. Generate application key:
   ```bash
   php artisan key:generate
   ```
6. Run migrations:
   ```bash
   php artisan migrate
   ```
7. Start the development server:
   ```bash
   php artisan serve
   ```
8. In a separate terminal, start the Vite development server:
   ```bash
   npm run dev
   ```

## Real-time Updates

The application uses polling to achieve real-time updates. Posts are fetched every 5 seconds to ensure users see the latest content without refreshing the page.

## Project Structure

- `app/Http/Controllers/PostController.php` - Handles post creation and retrieval
- `app/Models/Post.php` - Post model with fillable fields
- `resources/js/Components/Posts.vue` - Vue component for displaying and creating posts
- `resources/js/Pages/Home.vue` - Main page component
- `database/migrations/` - Database migrations for posts table 