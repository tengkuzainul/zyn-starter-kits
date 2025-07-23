# Deployment Guide

This guide covers deploying Zyn TALL Stack Starter Kit to production environments.

## 🚀 Pre-deployment Checklist

Before deploying to production:

-   [ ] **Environment configured** for production
-   [ ] **Database optimized** and backed up
-   [ ] **Assets compiled** for production
-   [ ] **Tests passing** on all environments
-   [ ] **Security reviewed** and hardened
-   [ ] **Performance tested** under load
-   [ ] **Monitoring setup** configured
-   [ ] **Backup strategy** implemented

## 🌐 Production Environment Setup

### Server Requirements

**Minimum Requirements:**

-   **CPU**: 2 cores
-   **RAM**: 4GB
-   **Storage**: 20GB SSD
-   **PHP**: 8.2+
-   **Database**: MySQL 8.0+ or PostgreSQL 13+
-   **Web Server**: Nginx 1.18+ or Apache 2.4+

**Recommended for High Traffic:**

-   **CPU**: 4+ cores
-   **RAM**: 8GB+
-   **Storage**: 50GB+ SSD
-   **Load Balancer**: For multiple app servers
-   **CDN**: For static assets
-   **Cache**: Redis/Memcached

### Environment Configuration

Create production `.env` file:

```env
APP_NAME="Your Production App"
APP_ENV=production
APP_DEBUG=false
APP_URL=https://yourdomain.com

# Security
APP_KEY=your-generated-app-key

# Database
DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_PORT=3306
DB_DATABASE=your_production_db
DB_USERNAME=your_db_user
DB_PASSWORD=strong-password

# Cache
CACHE_DRIVER=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

# Redis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# Mail
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-smtp-user
MAIL_PASSWORD=your-smtp-password
MAIL_ENCRYPTION=tls

# Security Headers
SESSION_SECURE_COOKIE=true
SESSION_HTTP_ONLY=true
SESSION_SAME_SITE=strict
```

## 🔧 Deployment Methods

### Method 1: Manual Deployment

#### 1. Prepare Server

```bash
# Update system
sudo apt update && sudo apt upgrade -y

# Install required packages
sudo apt install -y nginx mysql-server php8.2-fpm php8.2-mysql \
    php8.2-mbstring php8.2-xml php8.2-curl php8.2-zip \
    php8.2-gd php8.2-bcmath redis-server

# Install Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Install Node.js
curl -fsSL https://deb.nodesource.com/setup_18.x | sudo -E bash -
sudo apt-get install -y nodejs
```

#### 2. Deploy Application

```bash
# Clone repository
cd /var/www
sudo git clone https://github.com/username/zyn-starter-kits.git yourdomain.com
cd yourdomain.com

# Set permissions
sudo chown -R www-data:www-data /var/www/yourdomain.com
sudo chmod -R 755 /var/www/yourdomain.com/storage
sudo chmod -R 755 /var/www/yourdomain.com/bootstrap/cache

# Install dependencies
composer install --optimize-autoloader --no-dev
npm ci --production

# Environment setup
cp .env.example .env
# Edit .env with production values
php artisan key:generate

# Database setup
php artisan migrate --force
php artisan db:seed --force

# Optimize application
php artisan config:cache
php artisan route:cache
php artisan view:cache
npm run build

# Create storage link
php artisan storage:link
```

#### 3. Configure Nginx

Create `/etc/nginx/sites-available/yourdomain.com`:

```nginx
server {
    listen 80;
    server_name yourdomain.com www.yourdomain.com;
    root /var/www/yourdomain.com/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-XSS-Protection "1; mode=block";
    add_header X-Content-Type-Options "nosniff";

    index index.html index.htm index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

Enable site:

```bash
sudo ln -s /etc/nginx/sites-available/yourdomain.com /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

#### 4. SSL Certificate

```bash
# Install Certbot
sudo apt install certbot python3-certbot-nginx

# Get SSL certificate
sudo certbot --nginx -d yourdomain.com -d www.yourdomain.com

# Auto-renewal
sudo crontab -e
# Add: 0 12 * * * /usr/bin/certbot renew --quiet
```

### Method 2: Using Deployment Scripts

Create `deploy.sh`:

```bash
#!/bin/bash

set -e

echo "🚀 Starting deployment..."

# Variables
REPO_URL="https://github.com/username/zyn-starter-kits.git"
DEPLOY_PATH="/var/www/yourdomain.com"
BRANCH="main"

# Pull latest changes
cd $DEPLOY_PATH
git pull origin $BRANCH

# Install/update dependencies
composer install --optimize-autoloader --no-dev
npm ci --production

# Build assets
npm run build

# Laravel optimizations
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan queue:restart

# Set permissions
sudo chown -R www-data:www-data $DEPLOY_PATH
sudo chmod -R 755 $DEPLOY_PATH/storage
sudo chmod -R 755 $DEPLOY_PATH/bootstrap/cache

# Reload services
sudo systemctl reload nginx
sudo systemctl reload php8.2-fpm

echo "✅ Deployment completed successfully!"
```

Make executable and run:

```bash
chmod +x deploy.sh
./deploy.sh
```

### Method 3: CI/CD with GitHub Actions

Create `.github/workflows/deploy.yml`:

```yaml
name: Deploy to Production

on:
    push:
        branches: [main]

jobs:
    deploy:
        runs-on: ubuntu-latest

        steps:
            - uses: actions/checkout@v4

            - name: Deploy to server
              uses: appleboy/ssh-action@v0.1.5
              with:
                  host: ${{ secrets.HOST }}
                  username: ${{ secrets.USERNAME }}
                  key: ${{ secrets.PRIVATE_KEY }}
                  script: |
                      cd /var/www/yourdomain.com
                      git pull origin main
                      composer install --optimize-autoloader --no-dev
                      npm ci --production
                      npm run build
                      php artisan migrate --force
                      php artisan config:cache
                      php artisan route:cache
                      php artisan view:cache
                      php artisan queue:restart
                      sudo systemctl reload nginx
```

## 🗄️ Database Optimization

### MySQL Configuration

Edit `/etc/mysql/mysql.conf.d/mysqld.cnf`:

```ini
[mysqld]
# Basic settings
max_connections = 200
innodb_buffer_pool_size = 2G
innodb_log_file_size = 256M
innodb_flush_log_at_trx_commit = 2

# Query cache
query_cache_type = 1
query_cache_size = 256M

# Slow query log
slow_query_log = 1
slow_query_log_file = /var/log/mysql/slow.log
long_query_time = 2
```

### Database Backup Strategy

Create backup script `backup-db.sh`:

```bash
#!/bin/bash

DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/var/backups/mysql"
DB_NAME="your_production_db"

mkdir -p $BACKUP_DIR

mysqldump --single-transaction --routines --triggers \
  $DB_NAME > $BACKUP_DIR/backup_$DATE.sql

# Compress backup
gzip $BACKUP_DIR/backup_$DATE.sql

# Keep only last 30 days
find $BACKUP_DIR -name "*.gz" -mtime +30 -delete

echo "Backup completed: backup_$DATE.sql.gz"
```

Schedule with cron:

```bash
# Daily backup at 2 AM
0 2 * * * /path/to/backup-db.sh
```

## 📊 Performance Optimization

### PHP-FPM Configuration

Edit `/etc/php/8.2/fpm/pool.d/www.conf`:

```ini
; Process manager
pm = dynamic
pm.max_children = 50
pm.start_servers = 10
pm.min_spare_servers = 5
pm.max_spare_servers = 35
pm.max_requests = 500

; Performance
php_admin_value[memory_limit] = 256M
php_admin_value[max_execution_time] = 300
php_admin_value[upload_max_filesize] = 50M
php_admin_value[post_max_size] = 50M
```

### Redis Configuration

Edit `/etc/redis/redis.conf`:

```ini
# Memory management
maxmemory 1gb
maxmemory-policy allkeys-lru

# Persistence
save 900 1
save 300 10
save 60 10000

# Network
tcp-keepalive 60
timeout 300
```

### Laravel Optimization

```bash
# Production optimizations
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache

# Optimize Composer autoloader
composer install --optimize-autoloader --no-dev

# Enable OPcache
echo "opcache.enable=1" >> /etc/php/8.2/fpm/php.ini
echo "opcache.memory_consumption=256" >> /etc/php/8.2/fpm/php.ini
echo "opcache.max_accelerated_files=20000" >> /etc/php/8.2/fpm/php.ini
```

## 🔐 Security Hardening

### Firewall Configuration

```bash
# Install and configure UFW
sudo ufw default deny incoming
sudo ufw default allow outgoing
sudo ufw allow ssh
sudo ufw allow 'Nginx Full'
sudo ufw enable
```

### Fail2Ban Setup

```bash
# Install Fail2Ban
sudo apt install fail2ban

# Configure for Nginx
sudo tee /etc/fail2ban/jail.local << EOF
[nginx-http-auth]
enabled = true
port = http,https
logpath = /var/log/nginx/error.log

[nginx-limit-req]
enabled = true
port = http,https
logpath = /var/log/nginx/error.log
maxretry = 10
EOF

sudo systemctl enable fail2ban
sudo systemctl start fail2ban
```

### Laravel Security

```bash
# Set proper permissions
find /var/www/yourdomain.com -type f -exec chmod 644 {} \;
find /var/www/yourdomain.com -type d -exec chmod 755 {} \;
chmod -R 755 /var/www/yourdomain.com/storage
chmod -R 755 /var/www/yourdomain.com/bootstrap/cache

# Hide sensitive files
echo "deny all;" > /var/www/yourdomain.com/.env.nginx
```

## 📈 Monitoring and Logging

### Log Management

Configure log rotation in `/etc/logrotate.d/laravel`:

```
/var/www/yourdomain.com/storage/logs/*.log {
    daily
    missingok
    rotate 52
    compress
    delaycompress
    notifempty
    create 644 www-data www-data
}
```

### Application Monitoring

Install monitoring tools:

```bash
# Install monitoring stack
sudo apt install prometheus grafana telegraf

# Configure for Laravel metrics
# (specific configuration depends on your monitoring needs)
```

## 🔄 Deployment Rollback

Create rollback script `rollback.sh`:

```bash
#!/bin/bash

if [ -z "$1" ]; then
    echo "Usage: ./rollback.sh <commit-hash>"
    exit 1
fi

COMMIT=$1
DEPLOY_PATH="/var/www/yourdomain.com"

echo "🔄 Rolling back to commit: $COMMIT"

cd $DEPLOY_PATH
git checkout $COMMIT

# Rebuild application
composer install --optimize-autoloader --no-dev
npm ci --production
npm run build

# Run migrations if needed
php artisan migrate --force

# Clear caches
php artisan config:cache
php artisan route:cache
php artisan view:cache

sudo systemctl reload nginx

echo "✅ Rollback completed!"
```

## 📋 Post-Deployment Checklist

After deployment:

-   [ ] **Test all major features**
-   [ ] **Verify SSL certificate**
-   [ ] **Check application logs**
-   [ ] **Monitor server resources**
-   [ ] **Test backup restoration**
-   [ ] **Verify email functionality**
-   [ ] **Check performance metrics**
-   [ ] **Test error pages (404, 500)**

## 🆘 Troubleshooting Production Issues

### Common Production Issues

#### 500 Internal Server Error

```bash
# Check Laravel logs
tail -f /var/www/yourdomain.com/storage/logs/laravel.log

# Check Nginx logs
tail -f /var/log/nginx/error.log

# Check PHP-FPM logs
tail -f /var/log/php8.2-fpm.log
```

#### Database Connection Issues

```bash
# Test database connection
php artisan tinker
DB::connection()->getPdo();

# Check database server status
sudo systemctl status mysql
```

#### Permission Issues

```bash
# Reset permissions
sudo chown -R www-data:www-data /var/www/yourdomain.com
sudo chmod -R 755 /var/www/yourdomain.com/storage
sudo chmod -R 755 /var/www/yourdomain.com/bootstrap/cache
```

---

**Next**: [Configuration Guide](configuration.md) | [Troubleshooting](troubleshooting.md)
