# 📱 Social Feed App

A modern real-time social feed application built with Laravel, Inertia.js, Vue 3, and Tailwind CSS.

![Laravel](https://img.shields.io/badge/Laravel-12.2-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Vue.js](https://img.shields.io/badge/Vue.js-3.5-4FC08D?style=for-the-badge&logo=vue.js&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-3.4-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![TypeScript](https://img.shields.io/badge/TypeScript-5.2-3178C6?style=for-the-badge&logo=typescript&logoColor=white)

## ✨ Features

- 🔄 Real-time post updates using polling (every 5 seconds)
- 📝 Create and share posts with the community
- 👤 User authentication and profile management
- 🎨 Modern, responsive UI with Tailwind CSS
- 🔄 Server-side rendering with Inertia.js
- 📱 Mobile-friendly design
- 🌙 Dark mode support
- 🔐 Email verification
- 🔑 Password reset functionality

## 🚀 Setup Instructions

### Prerequisites

- Docker
- Docker Compose

## Docker Setup

This project is configured to run using Docker with MySQL for database and Redis for caching.

### Requirements

- Docker
- Docker Compose

### Getting Started

1. Clone the repository
2. Navigate to the project directory
3. Build and start the containers:
    ```bash
    docker-compose up -d
    ```

4. The application will be available at: http://localhost:8000

5. To stop the containers:
    ```bash
    docker-compose down
    ```

## 📁 Project Structure

- `app/`
  - `Http/Controllers/PostController.php` - Handles post creation and retrieval
  - `Http/Controllers/Auth/` - Authentication controllers
  - `Models/` - Eloquent models (User, Post)
  
- `resources/`
  - `js/` - JavaScript/Vue files
    - `Pages/` - Top-level Vue components
      - `Feed.vue` - Main feed page
      - `auth/` - Authentication pages
    - `Components/` - Reusable Vue components
  - `views/` - Blade templates
  
- `routes/`
  - `web.php` - Web routes
  - `auth.php` - Authentication routes
  
- `tests/` - Test files
  - `Feature/` - Feature tests
  - `Unit/` - Unit tests

## 🔄 Real-time Updates

The application uses polling to achieve real-time updates. Posts are fetched every 5 seconds to ensure users see the latest content without refreshing the page.
