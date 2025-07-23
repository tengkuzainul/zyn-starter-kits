# 🚀 Zyn TALL Stack Starter Kit

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="Laravel">
  <img src="https://img.shields.io/badge/Livewire-3.x-4E56A6?style=for-the-badge&logo=livewire&logoColor=white" alt="Livewire">
  <img src="https://img.shields.io/badge/TailwindCSS-4.x-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white" alt="TailwindCSS">
  <img src="https://img.shields.io/badge/Alpine.js-3.x-8BC34A?style=for-the-badge&logo=alpine.js&logoColor=white" alt="Alpine.js">
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP">
  <img src="https://img.shields.io/badge/License-MIT-green?style=flat-square" alt="License">
  <img src="https://img.shields.io/badge/PRs-Welcome-brightgreen?style=flat-square" alt="PRs Welcome">
</p>

> **Zyn TALL Stack Starter Kit** adalah sebuah starter kit modern yang dibangun menggunakan teknologi TALL Stack (Tailwind CSS, Alpine.js, Laravel, Livewire) dengan fitur-fitur lengkap untuk memulai project web application dengan cepat dan efisien.

## ✨ Fitur Utama

-   🔐 **Sistem Autentikasi Lengkap** - Login, Register, dan manajemen user
-   👥 **Role & Permission Management** - Menggunakan Spatie Laravel Permission
-   🎨 **UI/UX Modern** - Dibangun dengan TailwindCSS 4.x terbaru
-   ⚡ **Real-time Interactions** - Powered by Livewire 3.x
-   🌐 **Multi-language Support** - Support Bahasa Indonesia dan English
-   📱 **Responsive Design** - Mobile-first approach
-   🔧 **Developer Friendly** - Pre-configured development tools
-   🚀 **Performance Optimized** - Built-in caching dan optimization

## 🛠️ Tech Stack

| Technology       | Version | Description                               |
| ---------------- | ------- | ----------------------------------------- |
| **Laravel**      | 12.x    | PHP framework yang powerful dan ekspresif |
| **Livewire**     | 3.x     | Full-stack framework untuk Laravel        |
| **TailwindCSS**  | 4.x     | Utility-first CSS framework               |
| **Alpine.js**    | 3.x     | Lightweight JavaScript framework          |
| **PHP**          | 8.2+    | Server-side scripting language            |
| **MySQL/SQLite** | Latest  | Database management system                |

## 📋 Requirements

Pastikan sistem Anda memenuhi persyaratan berikut:

-   **PHP** >= 8.2
-   **Composer** >= 2.0
-   **Node.js** >= 18.x
-   **NPM/Yarn** (Package manager)
-   **MySQL** >= 8.0 atau **SQLite** >= 3.x
-   **Git** (untuk version control)

## 🚀 Quick Start

### 1. Clone Repository

```bash
git clone https://github.com/username/zyn-starter-kits.git
cd zyn-starter-kits
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install
```

### 3. Environment Setup

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 4. Database Configuration

Edit file `.env` dan sesuaikan konfigurasi database:

```env
# MySQL Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_zyn_starter
DB_USERNAME=root
DB_PASSWORD=

# Atau gunakan SQLite (default)
DB_CONNECTION=sqlite
```

### 5. Database Migration & Seeding

```bash
# Run migrations
php artisan migrate

# Seed database with sample data
php artisan db:seed
```

### 6. Build Assets

```bash
# Development build
npm run dev

# Production build
npm run build
```

### 7. Run Application

```bash
# Start development server
php artisan serve
```

Aplikasi akan berjalan di `http://localhost:8000`

## 📁 Struktur Project

```
zyn-starter-kits/
├── app/
│   ├── Http/Controllers/     # HTTP Controllers
│   ├── Livewire/            # Livewire Components
│   │   ├── Auth/            # Authentication components
│   │   └── Pages/           # Page components
│   ├── Models/              # Eloquent Models
│   └── Traits/              # Reusable traits
├── database/
│   ├── migrations/          # Database migrations
│   ├── seeders/            # Database seeders
│   └── factories/          # Model factories
├── resources/
│   ├── css/                # Stylesheets
│   ├── js/                 # JavaScript files
│   └── views/              # Blade templates
│       └── livewire/       # Livewire views
├── routes/
│   ├── web.php             # Web routes
│   └── auth.php            # Authentication routes
└── public/                 # Public assets
```

## 🔧 Konfigurasi

### Multi-language Setup

Edit file `.env` untuk mengatur bahasa default:

```env
APP_LOCALE=id              # Default: id (Indonesia) | en (English)
APP_FALLBACK_LOCALE=en     # Fallback language
APP_FAKER_LOCALE=id_ID     # Faker locale for seeding
```

### Database Configuration

#### MySQL

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_zyn_starter
DB_USERNAME=root
DB_PASSWORD=your_password
```

#### SQLite (Recommended for development)

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

## 👥 Default Users

Setelah menjalankan seeder, Anda dapat login dengan akun berikut:

| Role        | Email                 | Password   |
| ----------- | --------------------- | ---------- |
| Super Admin | superadmin@example.id | superadmin |
| User        | user@example.id       | user       |

## 🎨 Customization

### Menambah Livewire Component

```bash
# Buat component baru
php artisan make:livewire ComponentName

# Atau dengan namespace
php artisan make:livewire Pages/Dashboard
```

### Styling dengan TailwindCSS

File konfigurasi TailwindCSS terletak di `tailwind.config.js`. Anda dapat menyesuaikan tema, warna, dan utility classes sesuai kebutuhan.

### Menambah Route

Tambahkan route baru di `routes/web.php`:

```php
Route::get('/dashboard', Dashboard::class)->name('dashboard');
```

## 🔐 Authentication & Authorization

Starter kit ini menggunakan sistem autentikasi built-in Laravel dengan tambahan:

-   **Spatie Laravel Permission** untuk role & permission management
-   **Livewire Auth Components** untuk UI yang reactive
-   **Multi-guard support** (jika diperlukan)

### Contoh Penggunaan Permission

```php
// Dalam Livewire component
public function mount()
{
    $this->authorize('view-dashboard');
}

// Dalam Blade template
@can('edit-users')
    <button>Edit User</button>
@endcan
```

## 🧪 Testing

```bash
# Run all tests
php artisan test

# Run specific test
php artisan test --filter=AuthTest

# Run tests with coverage
php artisan test --coverage
```

## 📦 Deployment

### Production Deployment

1. **Environment Setup**

```bash
cp .env.example .env.production
# Edit .env.production dengan konfigurasi production
```

2. **Optimize Application**

```bash
composer install --optimize-autoloader --no-dev
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build
```

3. **Set Permissions**

```bash
chmod -R 755 storage bootstrap/cache
```

### Docker Deployment

```dockerfile
# Dockerfile example
FROM php:8.2-fpm

# Install dependencies dan setup application
# (Detail dockerfile configuration)
```

## 🤝 Contributing

Kami sangat menghargai kontribusi dari komunitas! Berikut cara berkontribusi:

1. **Fork** repository ini
2. **Create** feature branch (`git checkout -b feature/AmazingFeature`)
3. **Commit** perubahan (`git commit -m 'Add some AmazingFeature'`)
4. **Push** ke branch (`git push origin feature/AmazingFeature`)
5. **Open** Pull Request

### Contribution Guidelines

-   Ikuti PSR-12 coding standards
-   Tulis tests untuk fitur baru
-   Update dokumentasi jika diperlukan
-   Gunakan commit message yang deskriptif

## 📝 Changelog

### v1.0.0 (2025-07-24)

-   ✨ Initial release
-   🔐 Complete authentication system
-   👥 Role & permission management
-   🎨 TailwindCSS 4.x integration
-   ⚡ Livewire 3.x components
-   🌐 Multi-language support

## 🐛 Bug Reports & Feature Requests

Jika Anda menemukan bug atau ingin mengajukan fitur baru:

1. Cek [Issues](https://github.com/username/zyn-starter-kits/issues) yang sudah ada
2. Buat [Issue baru](https://github.com/username/zyn-starter-kits/issues/new) dengan detail yang lengkap
3. Gunakan template yang disediakan

## 📖 Documentation

-   [Laravel Documentation](https://laravel.com/docs)
-   [Livewire Documentation](https://livewire.laravel.com)
-   [TailwindCSS Documentation](https://tailwindcss.com/docs)
-   [Alpine.js Documentation](https://alpinejs.dev)
-   [Spatie Permission Documentation](https://spatie.be/docs/laravel-permission)

## 🎯 Roadmap

-   [ ] Dashboard admin yang lebih lengkap
-   [ ] API endpoints dengan Laravel Sanctum
-   [ ] Real-time notifications
-   [ ] File upload management
-   [ ] Email verification system
-   [ ] Two-factor authentication
-   [ ] Advanced caching strategies
-   [ ] Docker containerization

## ❤️ Support

Jika project ini membantu Anda, silakan berikan ⭐ di GitHub!

## 📄 License

Project ini dilisensikan under [MIT License](LICENSE) - lihat file LICENSE untuk detail lengkap.

---

<p align="center">
  Made with ❤️ by <a href="https://github.com/tengkuzainul">Tengku Muhammad Zainul Aprilizar</a>
</p>

<p align="center">
  <a href="#-zyn-tall-stack-starter-kit">Back to Top</a>
</p>
