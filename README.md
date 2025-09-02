<p align="center">
  <img src="public/images/app-logo.svg" alt="Punjab Fisheries Govt Of Punjab – Digital Transformation" width="40%" height="40%">
</p>

<h1 align="center">Punjab Fisheries – Digital Transformation Platform</h1>

<p align="center">
  <a href="https://laravel.com" target="_blank"><img src="https://img.shields.io/badge/Laravel-12.x-ff2d20?style=flat-square&logo=laravel" alt="Laravel"></a>
  <a href="https://www.php.net/" target="_blank"><img src="https://img.shields.io/badge/PHP-8.4-blue?style=flat-square&logo=php" alt="PHP"></a>
  <a href="https://redis.io" target="_blank"><img src="https://img.shields.io/badge/Redis-Enabled-red?style=flat-square&logo=redis" alt="Redis"></a>
  <a href="https://tailwindcss.com" target="_blank"><img src="https://img.shields.io/badge/TailwindCSS-3.x-38bdf8?style=flat-square&logo=tailwind-css" alt="TailwindCSS"></a>
  <a href="https://alpinejs.dev" target="_blank"><img src="https://img.shields.io/badge/Alpine.js-3.x-77c1d2?style=flat-square&logo=alpine.js" alt="Alpine.js"></a>
  <a href="https://axios-http.com" target="_blank"><img src="https://img.shields.io/badge/Axios-Ready-purple?style=flat-square&logo=axios" alt="Axios"></a>
  <a href="LICENSE"><img src="https://img.shields.io/badge/License-MIT-green?style=flat-square" alt="License"></a>
</p>

---

## 📖 Overview

The **Punjab Fisheries – Digital Transformation Platform** is the official modernization project for the Punjab Fisheries Department, developed to enhance public access, streamline internal workflows, and integrate AI-powered services.

It includes:
- GIS-enabled maps for fishery resources
- AI chatbot & FAQ powered by **KurmaAI/AQUA-7B** via Hugging Face API
- Content management for news, services, and resources
- SEO automation for better reach
- Role-based admin panel for departmental operations

**Repository:** [punjabfisheries.gov.pk](https://github.com/skdevelopers/punjabfisheries.gov.pk)  
**Production Target:** https://punjabfisheries.gov.pk

---

## 🚀 Key Features

- **Modern Laravel Stack** (Laravel 12.x, PHP 8.4)
- **PostgreSQL / MySQL** support
- **Redis** for caching, queues, and sessions
- **TailwindCSS + Alpine.js + Axios** for reactive UI
- **RBAC** via Spatie Laravel Permission
- **Admin Dashboard** CMS ready
- **AI Chat & FAQ** powered by Hugging Face OpenAI Deep Seek AI
- **API-ready** with Laravel Sanctum
- **SEO Automation**
- **GIS Mapping** support with optional PostGIS

---

## 🛠 Tech Stack

| Layer           | Technology                         |
|-----------------|------------------------------------|
| **Backend**     | Laravel 12.x (PHP 8.4)             |
| **Frontend**    | TailwindCSS, Alpine.js, Axios      |
| **Database**    | PostgreSQL / MySQL Optional        |
| **Caching/Queue**| Redis                              |
| **Auth**        | Laravel Breeze (Blade) + Sanctum   |
| **RBAC**        | Spatie Laravel Permission          |
| **AI**          | Hugging Face API – KurmaAI/AQUA-7B |
| **Build Tool**  | Vite                               |
| **Hosting**     | Nginx + PHP-FPM + Redis            |

---

## 📦 Installation (Local – WSL Ubuntu)

```bash
# Clone repository
git clone https://github.com/skdevelopers/punjabfisheries.gov.pk.git
cd punjabfisheries.gov.pk

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Copy env & set key
cp .env.example .env
php artisan key:generate

# Configure .env for DB, Redis, Hugging Face, Open AI, Deep Seek API
nano .env

# Run migrations & seed
php artisan migrate --seed

# Build frontend
npm run dev

# Serve
php artisan serve

💬 AI Chatbot
Create a Hugging Face account.

Create an Open AI account.

Create a Deep Seek AI account.

Generate an Access Token.

Set in .env:

env

HUGGINGFACE_API_TOKEN=hf_xxx
HUGGINGFACE_MODEL_ID=KurmaAI/AQUA-7B Or OPenAI API
Login and visit /chat to interact with the AI bot.

📍 Admin Panel
URL: /admin/dashboard (after login)

Default Roles: admin, staff, viewer

RBAC managed by Spatie Laravel Permission

🗺 GIS Support
Optional PostGIS integration:

Install PostGIS on your PostgreSQL server

Use Laravel spatial data types for maps

Integrate with Leaflet.js or Mapbox

🛡 Security
Uses Laravel Sanctum for API token authentication

CSRF protection enabled

Redis-backed sessions for better security

RBAC limits access to sensitive modules

📜 License
This project is licensed under the MIT License. See LICENSE for details.

👥 Credits
Punjab Fisheries Department – Project Owner

Lead Developer: Mian Salman (CTO, TeqTronics Systems)

AI Model: KurmaAI/AQUA-7B

Framework: Laravel
