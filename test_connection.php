<?php
/**
 * Database Connection Test
 * Use this to verify your database is set up correctly
 */

echo "<h2>Testing Database Connection...</h2>";

// Database credentials
$host = 'localhost';
$db   = 'quranonlinemaste_db';
$user = 'quranonlinemaste_user';
$pass = 'sleekhive@786';

// Test 1: PDO Connection
echo "<h3>Test 1: PDO Connection</h3>";
try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ]);
    echo "✅ <strong style='color:green'>PDO Connection Successful!</strong><br>";
} catch (PDOException $e) {
    echo "❌ <strong style='color:red'>PDO Connection Failed:</strong> " . $e->getMessage() . "<br>";
    exit;
}

// Test 2: Check if table exists
echo "<h3>Test 2: Check Table Exists</h3>";
try {
    $stmt = $pdo->query("SHOW TABLES LIKE 'contact_submissions'");
    $tableExists = $stmt->rowCount() > 0;
    
    if ($tableExists) {
        echo "✅ <strong style='color:green'>Table 'contact_submissions' exists!</strong><br>";
    } else {
        echo "❌ <strong style='color:red'>Table 'contact_submissions' does NOT exist!</strong><br>";
        echo "<p>Please run the SQL from database_setup.sql file</p>";
        exit;
    }
} catch (PDOException $e) {
    echo "❌ <strong style='color:red'>Error checking table:</strong> " . $e->getMessage() . "<br>";
    exit;
}

// Test 3: Check table structure
echo "<h3>Test 3: Table Structure</h3>";
try {
    $stmt = $pdo->query("DESCRIBE contact_submissions");
    $columns = $stmt->fetchAll();
    
    echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse:collapse;'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th></tr>";
    
    foreach ($columns as $column) {
        echo "<tr>";
        echo "<td>{$column['Field']}</td>";
        echo "<td>{$column['Type']}</td>";
        echo "<td>{$column['Null']}</td>";
        echo "<td>{$column['Key']}</td>";
        echo "<td>{$column['Default']}</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    echo "<br>✅ <strong style='color:green'>Table structure looks good!</strong><br>";
    
} catch (PDOException $e) {
    echo "❌ <strong style='color:red'>Error checking structure:</strong> " . $e->getMessage() . "<br>";
    exit;
}

// Test 4: Count existing records
echo "<h3>Test 4: Count Records</h3>";
try {
    $stmt = $pdo->query("SELECT COUNT(*) as count FROM contact_submissions");
    $result = $stmt->fetch();
    $count = $result['count'];
    
    echo "📊 <strong>Total submissions in database: {$count}</strong><br>";
    
    if ($count > 0) {
        echo "<br><strong>Recent 5 submissions:</strong><br>";
        $stmt = $pdo->query("SELECT id, full_name, email, submission_date FROM contact_submissions ORDER BY id DESC LIMIT 5");
        $recent = $stmt->fetchAll();
        
        echo "<table border='1' cellpadding='5' cellspacing='0' style='border-collapse:collapse;'>";
        echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Date</th></tr>";
        
        foreach ($recent as $row) {
            echo "<tr>";
            echo "<td>{$row['id']}</td>";
            echo "<td>{$row['full_name']}</td>";
            echo "<td>{$row['email']}</td>";
            echo "<td>{$row['submission_date']}</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    
} catch (PDOException $e) {
    echo "❌ <strong style='color:red'>Error counting records:</strong> " . $e->getMessage() . "<br>";
    exit;
}

echo "<br><hr>";
echo "<h3 style='color:green'>✅ All Tests Passed!</h3>";
echo "<p><strong>Your database is ready to use.</strong></p>";
echo "<ul>";
echo "<li>Contact form: <a href='contact.php'>contact.php</a></li>";
echo "<li>Admin panel: <a href='admin/view_submissions.php'>admin/view_submissions.php</a></li>";
echo "</ul>";
echo "<p style='color:red'><strong>⚠️ IMPORTANT:</strong> Delete this file (test_connection.php) after testing!</p>";
?>

