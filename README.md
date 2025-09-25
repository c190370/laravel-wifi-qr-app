# Laravel WiFi QR Code Generator & User Management System

A comprehensive Laravel application featuring a WiFi QR Code Generator and a complete User Management System with Bootstrap styling.

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## 🚀 Features

### WiFi QR Code Generator
- Generate WiFi QR codes for easy network sharing
- Support for WPA/WPA2, WEP, and Open networks
- Hidden network support
- Download QR codes as PNG images
- Print-friendly WiFi cards
- Responsive Bootstrap design

### User Management System
- Complete CRUD operations for users
- Bootstrap-styled forms and tables
- Form validation with error handling
- Success/error message notifications
- Global city dropdown with 200+ cities worldwide
- User profiles with avatars

## 🛠️ Technologies Used

- **Laravel 11** - PHP Framework
- **Bootstrap 5.3.0** - CSS Framework
- **Bootstrap Icons** - Icon library
- **QRious.js** - QR Code generation
- **MySQL** - Database
- **Blade Templates** - Templating engine

## 📦 Installation

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL
- XAMPP or similar local server

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/your-repo-name.git
   cd your-repo-name
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Database configuration**
   Update your `.env` file with database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_username
   DB_PASSWORD=your_password
   ```

5. **Run migrations and seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

6. **Start the development server**
   ```bash
   php artisan serve
   ```

## 🌐 Routes

| Route | Method | Description |
|-------|--------|-------------|
| `/home` | GET | WiFi QR Code Generator |
| `/user` | GET | List all users |
| `/user/{id}` | GET | View single user |
| `/adduser` | GET | Create user form |
| `/user` | POST | Store new user |
| `/user/{id}/edit` | GET | Edit user form |
| `/user/{id}` | PUT | Update user |
| `/user/{id}` | DELETE | Delete user |

## 📱 WiFi QR Code Features

- **Network Types**: WPA/WPA2, WEP, Open Network
- **Special Options**: Hidden network support
- **Export Options**: Download as PNG, Print WiFi card
- **Responsive Design**: Works on all devices
- **Real-time Generation**: Instant QR code creation

## 👥 User Management Features

- **Global City Selection**: 200+ cities from all continents
- **Form Validation**: Comprehensive input validation
- **Success Messages**: Auto-dismissing notifications
- **Responsive Design**: Bootstrap-powered interface
- **CRUD Operations**: Complete user lifecycle management

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
