# Mini Lead Management CRM System

A simple and fully functional Lead Management CRM System built using Laravel, MySQL, AJAX, jQuery, and Bootstrap.

---

## Features

### Authentication Module
- Admin Login
- Logout
- Session Management
- Password Hashing

### Lead Management
- Add Lead
- Edit Lead
- Delete Lead
- View Lead Details
- Search Leads
- Filter Leads by Status
- Pagination

### Dashboard
- Total Leads Count
- Converted Leads Count
- Follow-up Leads Count
- Lost Leads Count
- Dynamic Dashboard Filtering

### AJAX Features
- Live Search
- Status Update Without Reload
- Delete Confirmation

### REST API
- GET /api/leads
- POST /api/leads

---

## Technologies Used

- Laravel
- PHP
- MySQL
- Bootstrap
- jQuery
- AJAX

---

## Installation Steps

### 1. Clone Repository

```bash
git clone https://github.com/harshmodi266/Mini-Lead-Management-CRM-System.git

2. Go To Project Folder
cd Mini-Lead-Management-CRM-System

3. Install Dependencies
composer install

4. Create Environment File
cp .env.example .env

5. Generate Application Key
php artisan key:generate

6. Configure Database

Update .env file:
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=(your_pass)

7. Run Migration
php artisan migrate

8. Start Development Server
php artisan serve

Admin Login

go to the notes file 
