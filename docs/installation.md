# Installation Guide

This guide will walk you through the complete installation process of Zyn TALL Stack Starter Kit.

## 📋 Prerequisites

Before starting, ensure your system meets these requirements:

### System Requirements

-   **PHP** >= 8.2 with extensions:
    -   BCMath
    -   Ctype
    -   Fileinfo
    -   JSON
    -   Mbstring
    -   OpenSSL
    -   PDO
    -   Tokenizer
    -   XML
-   **Composer** >= 2.0
-   **Node.js** >= 18.x
-   **NPM** or **Yarn**
-   **Git**

### Database Requirements

Choose one:

-   **MySQL** >= 8.0
-   **PostgreSQL** >= 13
-   **SQLite** >= 3.x (recommended for development)

### Web Server

For production:

-   **Apache** >= 2.4 or **Nginx** >= 1.18
-   **PHP-FPM** (for Nginx)

For development:

-   Laravel's built-in server

## 🚀 Step-by-Step Installation

### 1. Clone the Repository

```bash
# Using HTTPS
git clone https://github.com/username/zyn-starter-kits.git

# Using SSH
git clone git@github.com:username/zyn-starter-kits.git

# Navigate to project directory
cd zyn-starter-kits
```

### 2. Install PHP Dependencies

```bash
composer install
```

If you encounter memory issues:

```bash
php -d memory_limit=-1 /usr/local/bin/composer install
```

### 3. Install Node.js Dependencies

```bash
# Using NPM
npm install

# Using Yarn (alternative)
yarn install
```

### 4. Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

### 5. Configure Environment Variables

Edit the `.env` file with your settings:

```env
# Application
APP_NAME="Your App Name"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost:8000

# Locale Settings
APP_LOCALE=id
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=id_ID

# Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database_name
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 6. Database Setup

#### Option A: MySQL/PostgreSQL

1. Create a new database:

```sql
CREATE DATABASE your_database_name;
```

2. Update `.env` with your database credentials

3. Run migrations:

```bash
php artisan migrate
```

#### Option B: SQLite (Recommended for Development)

1. Update `.env`:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/absolute/path/to/database.sqlite
```

2. Create SQLite file:

```bash
touch database/database.sqlite
```

3. Run migrations:

```bash
php artisan migrate
```

### 7. Seed Database (Optional)

```bash
# Seed with sample data
php artisan db:seed

# Seed specific seeder
php artisan db:seed --class=UserTableSeeder
```

### 8. Build Frontend Assets

```bash
# Development build
npm run dev

# Production build
npm run build

# Watch for changes (development)
npm run dev
```

### 9. Set File Permissions (Linux/macOS)

```bash
# Set proper permissions
chmod -R 755 storage bootstrap/cache

# For SELinux systems
setsebool -P httpd_can_network_connect on
setsebool -P httpd_can_network_connect_db on
```

### 10. Start Development Server

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser.

## 🔧 Advanced Configuration

### Caching Configuration

For better performance:

```bash
# Cache configuration
php artisan config:cache

# Cache routes
php artisan route:cache

# Cache views
php artisan view:cache
```

### Queue Configuration

If using queues:

```env
QUEUE_CONNECTION=database
```

Then run:

```bash
php artisan queue:table
php artisan migrate
php artisan queue:work
```

### Storage Configuration

Link storage for public file access:

```bash
php artisan storage:link
```

## 🐳 Docker Installation (Alternative)

### Using Laravel Sail

```bash
# Clone repository
git clone https://github.com/username/zyn-starter-kits.git
cd zyn-starter-kits

# Install dependencies
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

# Copy environment
cp .env.example .env

# Start containers
./vendor/bin/sail up -d

# Generate key
./vendor/bin/sail artisan key:generate

# Run migrations
./vendor/bin/sail artisan migrate --seed

# Install frontend dependencies
./vendor/bin/sail npm install
./vendor/bin/sail npm run dev
```

## 🚨 Troubleshooting

### Common Issues

#### Composer Install Fails

```bash
# Clear composer cache
composer clear-cache

# Install with different memory limit
php -d memory_limit=-1 composer install
```

#### NPM Install Fails

```bash
# Clear npm cache
npm cache clean --force

# Delete node_modules and reinstall
rm -rf node_modules
npm install
```

#### Permission Denied

```bash
# Fix storage permissions
sudo chmod -R 755 storage bootstrap/cache
sudo chown -R www-data:www-data storage bootstrap/cache
```

#### Database Connection Error

1. Check database credentials in `.env`
2. Ensure database server is running
3. Verify database exists
4. Test connection:

```bash
php artisan tinker
DB::connection()->getPdo();
```

#### Vite Build Fails

```bash
# Clear Vite cache
rm -rf node_modules/.vite

# Reinstall dependencies
npm install
npm run build
```

### Laravel Specific Issues

#### Class Not Found

```bash
# Dump autoload
composer dump-autoload

# Clear and cache config
php artisan config:clear
php artisan config:cache
```

#### Route Not Found

```bash
# Clear route cache
php artisan route:clear

# List all routes
php artisan route:list
```

## ✅ Verification

After installation, verify everything is working:

1. **Home Page**: Visit `http://localhost:8000`
2. **Authentication**: Try login/register
3. **Database**: Check if migrations ran successfully
4. **Assets**: Ensure CSS/JS are loading
5. **Console**: Check for any errors in browser console

### Test Login Credentials

If you ran the seeders:

-   **Admin**: admin@admin.com / password
-   **User**: user@user.com / password

## 🔄 Next Steps

After successful installation:

1. **Customize the application** for your needs
2. **Update branding** and styling
3. **Configure additional services** (email, etc.)
4. **Set up production environment**
5. **Deploy to your server**

## 📞 Getting Help

If you encounter issues:

1. Check this documentation
2. Search existing [GitHub issues](https://github.com/username/zyn-starter-kits/issues)
3. Create a new issue with detailed information
4. Join our community discussions

---

**Next**: [Configuration Guide](configuration.md) | [Deployment Guide](deployment.md)
