# Admin Panel Setup Guide

## ⚠️ IMPORTANT SECURITY NOTICE
**DO NOT deploy the admin panel to a live server without proper authentication!**

## Quick Access (Local Development)

**URL:** `http://localhost/quranonlinemaster/admin/view_submissions.php`

## Setup Authentication (REQUIRED for Live Server)

### Option 1: HTTP Basic Authentication (.htaccess)

1. **Generate Password Hash:**
   - Go to: https://www.web2generators.com/apache-tools/htpasswd-generator
   - Username: `admin` (or your choice)
   - Password: Choose a strong password
   - Copy the generated line (e.g., `admin:$apr1$xyz...`)

2. **Create .htpasswd file:**
   - Create file: `.htpasswd` in your root directory
   - Paste the generated line
   - Upload to server

3. **Update .htaccess:**
   - Edit `admin/.htaccess`
   - Replace `/path/to/.htpasswd` with actual path
   - Example: `/home/username/public_html/.htpasswd`

4. **Test:**
   - Access: `yourdomain.com/admin/view_submissions.php`
   - Enter username and password
   - You should see the admin panel

### Option 2: PHP Session Authentication (Recommended)

Create a login page:

**File: `admin/login.php`**
```php
<?php
session_start();

$valid_username = "admin";
$valid_password = "your_secure_password"; // Change this!

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === $valid_username && 
        $_POST['password'] === $valid_password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: view_submissions.php');
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center" style="margin-top: 100px;">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Admin Login</h4>
                    </div>
                    <div class="card-body">
                        <?php if (isset($error)): ?>
                        <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>
                        <form method="POST">
                            <div class="mb-3">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
```

**Add to top of `view_submissions.php`:**
```php
<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}
?>
```

## Admin Panel Features

### ✅ What You Can Do:

1. **View All Submissions** - See all contact form entries
2. **Filter by Status** - pending/contacted/enrolled/rejected
3. **Update Status** - Change submission status
4. **Add Notes** - Keep track of follow-ups
5. **View Statistics** - Dashboard with counts
6. **Contact Info** - Click email to send mail

### 📊 Statistics Dashboard

The admin panel shows:
- Total submissions
- Pending requests
- Contacted leads
- Enrolled students

### 🎯 Submission Details

Each submission shows:
- Full name
- Email address (clickable)
- Preferred course
- Preferred days
- Additional details
- IP address
- Submission date/time
- Current status
- Admin notes

## Admin Panel Actions

### Update Status:
1. Select new status from dropdown
2. Add optional notes
3. Click "Update" button
4. Status changes immediately

### Status Options:
- **Pending** - New submission, not contacted yet
- **Contacted** - Initial contact made
- **Enrolled** - Student signed up for classes
- **Rejected** - Not interested/invalid

## Security Best Practices

### ✅ MUST DO for Live Server:

1. **Add Authentication** - Use .htaccess or PHP login
2. **Strong Passwords** - Use password generator
3. **HTTPS Only** - Ensure SSL certificate installed
4. **Restrict IP** - Optional: Limit access to specific IPs
5. **Regular Backups** - Backup database regularly
6. **Update Regularly** - Keep PHP and server updated

### 🔒 Additional Security:

1. **Change default admin path:**
   - Rename `/admin/` to something unique like `/secure-admin-panel-2024/`

2. **Add CSRF protection:**
   - Use tokens in forms

3. **Session timeout:**
   - Auto-logout after inactivity

4. **Log access attempts:**
   - Track who accesses admin panel

## Troubleshooting

### Can't Access Admin Panel?

**Error: 404 Not Found**
- Check admin folder exists
- Verify file: `admin/view_submissions.php`

**Error: 500 Internal Server Error**
- Check `.htaccess` file syntax
- Verify `.htpasswd` path is correct

**Error: Database Connection Failed**
- Verify `includes/config.php` settings
- Check database credentials

### Authentication Not Working?

**For .htaccess:**
- Ensure `AllowOverride All` is set in Apache config
- Check `.htpasswd` path is absolute
- Verify username/password hash

**For PHP Login:**
- Verify `session_start()` is at top
- Check username/password match
- Clear browser cache

## Local vs Live Setup

### Local (Laragon):
- No authentication needed
- Direct access to admin panel
- Use for testing only

### Live Server:
- **MUST have authentication**
- Use HTTPS
- Restrict access
- Monitor login attempts

## Quick Commands

### Generate .htpasswd (Linux/Mac):
```bash
htpasswd -c .htpasswd admin
```

### Change File Permissions:
```bash
chmod 644 .htpasswd
chmod 644 admin/.htaccess
chmod 644 admin/view_submissions.php
```

### Set Directory Permissions:
```bash
chmod 755 admin/
```

## Next Steps

1. ✅ Test admin panel locally
2. ✅ Add authentication before going live
3. ✅ Test login system
4. ✅ Set up regular database backups
5. ✅ Monitor submissions daily

## Contact Support

If you need help:
1. Check error logs
2. Verify database connection
3. Test authentication
4. Check file permissions

---
**Setup Date**: December 12, 2025  
**Version**: 1.0  
**Status**: ⚠️ Requires Authentication for Live Use

