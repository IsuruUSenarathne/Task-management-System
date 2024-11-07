<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Task Management System

A simple Task Management System built with Laravel for the backend and Vue.js for the frontend. This system provides user authentication and task management capabilities, allowing users to create, update, delete, and view their own tasks.

## Features

- *User Authentication*: Registration and login using Laravel’s built-in authentication.
- *Task Management*:
  - Add, edit, delete tasks.
  - View tasks filtered by status (all, pending, completed).
  - Server pagination


## Technologies Used

- *Backend*: Laravel
- *Frontend*: Vue.js, Tailwind CSS
- *Database*: MySql

## API Endpoints

The application provides the following API endpoints for managing tasks:

- *POST /api/task/add*: Create a new task.
- *GET /api/task/list*: List all tasks for the authenticated user.
- *GET /api/task/{id}/show*: List task by id.
- *PUT /api/task/{id}/update*: Update an existing task.
- *DELETE /api/task/{id}/delete*: Delete a task.

## Installation

### Prerequisites

- PHP
- Composer
- Node.js & npm

### Steps

1. Clone the repository
bash
git clone https://github.com/IsuruUSenarathne/Task-management-System.git
cd Task-management-System


2. Install backend dependencies

bash
composer install

    
3. Install frontend dependencies

bash
npm install


4. Copy .env.example to .env and set the following variables:

bash
DB_HOST=<host_name>
DB_DATABASE=<database>
DB_USERNAME=<username>
DB_PASSWORD=<password>


5. Run database migrations

bash
php artisan migrate


6. Run the application
- Backend (Laravel)
    bash
    php artisan serve
    
- Frontend (Vue.js)
    bash
    npm run dev
    

7. To access application, Open http://localhost:8000 for the backend and http://localhost:5174/ for the frontend
