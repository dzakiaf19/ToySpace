# 🧸 ToySpace – E-Commerce Platform for Toy Store

ToySpace is an e-commerce platform developed as a final college project. Designed to simplify the online shopping experience for toys, the platform offers a clean, responsive UI and robust backend functionalities powered by Laravel.

## ✨ Features

- 🛍️ Product catalog with category filtering and detailed view  
- 📦 Dynamic shipping cost calculation based on destination and courier  
- 🔐 Secure user authentication and checkout process  
- 💳 Order management and payment confirmation system  
- 🧑‍💼 Admin dashboard to manage products, inventory, and orders  
- 📱 Responsive design for mobile and desktop users  

## 🛠️ Tech Stack

- **Back-End:** Laravel, PHP, MySQL  
- **Front-End:** Blade, SCSS, JavaScript, CSS  
- **Tools:** Composer, Git, Laravel Artisan  

## 👥 Contributors

- **Dzaki Ahmad Fajrianto** – Back-End Developer  
- **Moch Surya** – UI Designer  
- **Ayu Wulandari** – Front-End Developer  
- **Gabriel Radith Widianto** – Front-End Developer  

## 🚀 Installation

```bash
git clone https://github.com/username/toyspace.git
cd toyspace
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
