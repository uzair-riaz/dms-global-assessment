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

## 🛠️ Technologies Used

- **Backend:**
  - Laravel 12.x - PHP framework
  - SQLite (default database)
  - InertiaJS - Server-side rendering

- **Frontend:**
  - Vue 3 - JavaScript framework with Composition API
  - TypeScript - Type-safe JavaScript
  - Tailwind CSS - Utility-first CSS framework
  - Radix UI components - Accessible UI components
  - Lucide icons - Beautiful SVG icons
  
- **Development Tools:**
  - Vite - Modern build tool
  - ESLint - JavaScript/TypeScript linter
  - Prettier - Code formatter
  - TypeScript - Static type checking

## 🚀 Setup Instructions

### Prerequisites

- PHP 8.2+
- Composer
- Node.js 18+
- npm or yarn

### Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/uzair-riaz/dms-global-assessment.git
   cd dms-global-assessment
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Set up environment variables**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Run migrations**
   ```bash
   php artisan migrate
   ```

## 🏃‍♀️ Running the Application

**Start the Laravel and Vite development server**
   ```bash
   composer run dev
   ```

3. **Access the application**
   - Open [http://localhost:8000](http://localhost:8000) in your browser

## 🧪 Running Tests

Run the tests with phpunit:

```bash
php artisan test
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
