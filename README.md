# ToDo_App
Introduction
This project is a Laravel-based web application designed to manage todos, user invitations, and role-based access control.
It provides a comprehensive admin dashboard for managing various aspects of the application.

Features
Role-based access control
Admins can view all posts, create todos, assign todos to employees, and invite new users.
Regular users can only see their todos and update their statuses.
User invitation and registration system
Toaster notifications for alert messages
Tailwind CSS for styling

Installation
Clone the repository:
git clone https://github.com/yourusername/yourproject.git

composer install
npm install
npm run dev
php artisan key:generate

Configuration
Configure the following environment variables in your .env file:

Database settings/Mail
Mail settings for 
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=sakshiburghate17@gmail.com
MAIL_PASSWORD=acsqvajnsadmydir

MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=sakshiburghate17@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laraveltodo
DB_USERNAME=root
DB_PASSWORD=

php artisan migrate
php artisan db:seed --class=UserSeeder
php artisan serve

Usage
Admin Dashboard
Invitation Link: Only visible on the admin dashboard.
Create Todo: Only accessible to administrators.
Assign to Employee Dropdown: Visible only to admins on the create todo page.
Regular Users
Can view their own todo list.
Can update the status of their todos.

For login as Admin
use credentail 
email-admin123@gmail.com
pass-123456789


