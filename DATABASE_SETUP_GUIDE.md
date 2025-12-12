# Database Setup Guide - Contact Form

## Overview
This guide will help you set up the database and contact form functionality for your Quran Academy Online website.

## Files Created

1. **`database_setup.sql`** - SQL queries to create database tables
2. **`includes/config.php`** - Database configuration file
3. **`process_contact.php`** - Form processing script
4. **`contact.php`** - Updated with AJAX form submission

## Step-by-Step Setup

### Step 1: Create Database

1. Open **phpMyAdmin** in Laragon (or your hosting control panel)
2. Click on **"New"** in the left sidebar
3. Create a new database named: `quran_academy`
4. Set Collation to: `utf8mb4_unicode_ci` (for Arabic text support)
5. Click **"Create"**

### Step 2: Import SQL Tables

1. Select your `quran_academy` database
2. Click on the **"SQL"** tab
3. Open the `database_setup.sql` file
4. Copy the **first CREATE TABLE statement** (for `contact_submissions`)
5. Paste it into the SQL query box
6. Click **"Go"** to execute

You should see a success message confirming the table was created.

### Step 3: Configure Database Connection

1. Open `includes/config.php`
2. Update the database credentials:

```php
define('DB_HOST', 'localhost');          // Usually 'localhost'
define('DB_USER', 'root');                // Your database username
define('DB_PASS', '');                    // Your database password
define('DB_NAME', 'quran_academy');       // Database name
```

**For Laragon (Local Development):**
- DB_HOST: `localhost`
- DB_USER: `root`
- DB_PASS: `` (empty)
- DB_NAME: `quran_academy`

**For Live Server:**
- Get these details from your hosting control panel (cPanel → MySQL Databases)

### Step 4: Test the Form

1. Open your website in a browser
2. Go to the Contact page: `http://localhost/quranonlinemaster/contact.php`
3. Fill out the form
4. Click "Submit Request"
5. You should see a success message

### Step 5: Verify Data Saved

1. Go back to phpMyAdmin
2. Click on your `quran_academy` database
3. Click on `contact_submissions` table
4. Click on **"Browse"** tab
5. You should see your submitted data

## Database Table Structure

### Table: `contact_submissions`

| Column | Type | Description |
|--------|------|-------------|
| `id` | INT(11) | Primary key, auto-increment |
| `full_name` | VARCHAR(255) | Student/parent name (nullable) |
| `email` | VARCHAR(255) | Email address (nullable) |
| `preferred_course` | VARCHAR(255) | Selected course (nullable) |
| `preferred_days` | VARCHAR(255) | Preferred class days (nullable) |
| `additional_details` | TEXT | Extra information (nullable) |
| `submission_date` | TIMESTAMP | Auto-filled with submission time |
| `ip_address` | VARCHAR(45) | User's IP address |
| `status` | ENUM | pending/contacted/enrolled/rejected |
| `notes` | TEXT | Admin notes (nullable) |

## Form Features

### ✅ What's Included:

1. **AJAX Form Submission** - No page reload
2. **Client-Side Validation** - Instant feedback
3. **Server-Side Validation** - Security
4. **Success/Error Messages** - User-friendly feedback
5. **Loading Spinner** - Better UX
6. **IP Address Tracking** - Security
7. **UTF-8 Support** - Arabic text compatible
8. **XSS Protection** - Input sanitization
9. **SQL Injection Prevention** - Prepared statements

### 📧 Email Notifications (Optional)

To enable email notifications when a form is submitted:

1. Open `process_contact.php`
2. Find line with `// sendEmailNotification($fullName, $email, $prefCourse);`
3. Remove the `//` to uncomment it
4. Update the email address in the `sendEmailNotification()` function

## Viewing Submissions

### Option 1: phpMyAdmin
1. Login to phpMyAdmin
2. Select `quran_academy` database
3. Click `contact_submissions` table
4. Click "Browse" to see all entries

### Option 2: Create Admin Panel (Future Enhancement)
You can create a simple admin panel to view and manage submissions.

## Security Best Practices

### ✅ Already Implemented:
- Prepared SQL statements (prevents SQL injection)
- Input sanitization (prevents XSS attacks)
- CSRF protection ready (can be added)
- IP address logging

### 🔒 Additional Security (Recommended for Live):
1. Add CAPTCHA (Google reCAPTCHA)
2. Rate limiting (prevent spam)
3. HTTPS/SSL certificate
4. Regular database backups

## Troubleshooting

### Form Not Submitting?

**Check 1: Database Connection**
```php
// Test connection
$conn = getDatabaseConnection();
if ($conn) {
    echo "Connected successfully!";
} else {
    echo "Connection failed!";
}
```

**Check 2: PHP Error Logs**
- Check `C:\laragon\www\quranonlinemaster\error_log` (if exists)
- Or enable error display in PHP temporarily

**Check 3: Browser Console**
- Press F12 in browser
- Check Console tab for JavaScript errors
- Check Network tab to see AJAX request

### "Database Error" Message?

1. Verify database credentials in `config.php`
2. Verify table exists in phpMyAdmin
3. Check table name matches exactly: `contact_submissions`
4. Verify user has INSERT permissions

### Email Not Sending?

1. Check if your server supports `mail()` function
2. Configure SMTP settings (recommended for production)
3. Use PHPMailer library for better email handling

## File Permissions (For Live Server)

Set proper permissions:
- Files (.php): `644`
- Directories: `755`
- Config file: `600` (more secure)

```bash
chmod 644 *.php
chmod 755 includes/
chmod 600 includes/config.php
```

## Next Steps

### Recommended Enhancements:

1. **Admin Panel** - View and manage submissions
2. **Email Templates** - Professional automated emails
3. **SMS Notifications** - Via Twilio or similar
4. **WhatsApp Integration** - Auto-send to WhatsApp
5. **Dashboard** - Statistics and analytics
6. **Export Feature** - Export to Excel/CSV
7. **Auto-Responder** - Thank you email to users

## Support

If you encounter any issues:
1. Check error logs
2. Verify database connection
3. Test on localhost first
4. Check file permissions on live server

---
**Setup Date**: December 12, 2025  
**Version**: 1.0  
**Status**: ✅ Ready to Use

