<?php
// Simple Admin Panel to View Contact Submissions
// TODO: Add authentication before deploying to live server!

// Database connection for live server
$host = 'localhost';
$db   = 'quranonlinemaste_db';
$user = 'quranonlinemaste_user';
$pass = 'sleekhive@786';

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

// Connection already checked above with connect_error

// Handle status update
if (isset($_POST['update_status'])) {
    $id = intval($_POST['submission_id']);
    $status = $_POST['status'];
    $notes = $_POST['notes'];
    
    $stmt = $conn->prepare("UPDATE contact_submissions SET status = ?, notes = ? WHERE id = ?");
    $stmt->bind_param("ssi", $status, $notes, $id);
    $stmt->execute();
    $stmt->close();
    
    header("Location: view_submissions.php?updated=1");
    exit();
}

// Get filter
$statusFilter = isset($_GET['status']) ? $_GET['status'] : 'all';

// Build query
$query = "SELECT * FROM contact_submissions";
if ($statusFilter != 'all') {
    $query .= " WHERE status = '" . $conn->real_escape_string($statusFilter) . "'";
}
$query .= " ORDER BY submission_date DESC";

$result = $conn->query($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Submissions - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    <style>
        body { background: #f5f5f5; padding: 20px; }
        .submission-card { margin-bottom: 20px; }
        .badge-pending { background-color: #ffc107; }
        .badge-contacted { background-color: #17a2b8; }
        .badge-enrolled { background-color: #28a745; }
        .badge-rejected { background-color: #dc3545; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1><i class="bi bi-envelope-paper"></i> Contact Submissions</h1>
                    <a href="../index.php" class="btn btn-secondary">
                        <i class="bi bi-house"></i> Back to Website
                    </a>
                </div>

                <?php if (isset($_GET['updated'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle"></i> Submission updated successfully!
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
                <?php endif; ?>

                <!-- Statistics Cards -->
                <div class="row mb-4">
                    <?php
                    $stats = [
                        'all' => $conn->query("SELECT COUNT(*) as count FROM contact_submissions")->fetch_assoc()['count'],
                        'pending' => $conn->query("SELECT COUNT(*) as count FROM contact_submissions WHERE status='pending'")->fetch_assoc()['count'],
                        'contacted' => $conn->query("SELECT COUNT(*) as count FROM contact_submissions WHERE status='contacted'")->fetch_assoc()['count'],
                        'enrolled' => $conn->query("SELECT COUNT(*) as count FROM contact_submissions WHERE status='enrolled'")->fetch_assoc()['count'],
                    ];
                    ?>
                    <div class="col-md-3">
                        <div class="card text-center">
                            <div class="card-body">
                                <h3><?php echo $stats['all']; ?></h3>
                                <p class="text-muted mb-0">Total Submissions</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center bg-warning text-white">
                            <div class="card-body">
                                <h3><?php echo $stats['pending']; ?></h3>
                                <p class="mb-0">Pending</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center bg-info text-white">
                            <div class="card-body">
                                <h3><?php echo $stats['contacted']; ?></h3>
                                <p class="mb-0">Contacted</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-center bg-success text-white">
                            <div class="card-body">
                                <h3><?php echo $stats['enrolled']; ?></h3>
                                <p class="mb-0">Enrolled</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter Buttons -->
                <div class="btn-group mb-4" role="group">
                    <a href="?status=all" class="btn btn-outline-secondary <?php echo $statusFilter == 'all' ? 'active' : ''; ?>">
                        All (<?php echo $stats['all']; ?>)
                    </a>
                    <a href="?status=pending" class="btn btn-outline-warning <?php echo $statusFilter == 'pending' ? 'active' : ''; ?>">
                        Pending (<?php echo $stats['pending']; ?>)
                    </a>
                    <a href="?status=contacted" class="btn btn-outline-info <?php echo $statusFilter == 'contacted' ? 'active' : ''; ?>">
                        Contacted (<?php echo $stats['contacted']; ?>)
                    </a>
                    <a href="?status=enrolled" class="btn btn-outline-success <?php echo $statusFilter == 'enrolled' ? 'active' : ''; ?>">
                        Enrolled (<?php echo $stats['enrolled']; ?>)
                    </a>
                    <a href="?status=rejected" class="btn btn-outline-danger <?php echo $statusFilter == 'rejected' ? 'active' : ''; ?>">
                        Rejected
                    </a>
                </div>

                <!-- Submissions List -->
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while($row = $result->fetch_assoc()): ?>
                    <div class="card submission-card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <div>
                                <strong><?php echo htmlspecialchars($row['full_name']); ?></strong>
                                <span class="badge badge-<?php echo $row['status']; ?> ms-2">
                                    <?php echo ucfirst($row['status']); ?>
                                </span>
                            </div>
                            <small class="text-muted">
                                <i class="bi bi-calendar"></i> 
                                <?php echo date('M d, Y - h:i A', strtotime($row['submission_date'])); ?>
                            </small>
                        </div>
                        <div class="card-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <p class="mb-2">
                                        <i class="bi bi-envelope"></i> 
                                        <strong>Email:</strong> 
                                        <a href="mailto:<?php echo htmlspecialchars($row['email']); ?>">
                                            <?php echo htmlspecialchars($row['email']); ?>
                                        </a>
                                    </p>
                                    <p class="mb-2">
                                        <i class="bi bi-book"></i> 
                                        <strong>Course:</strong> 
                                        <?php echo htmlspecialchars($row['preferred_course'] ?: 'Not specified'); ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <p class="mb-2">
                                        <i class="bi bi-calendar-week"></i> 
                                        <strong>Preferred Days:</strong> 
                                        <?php echo htmlspecialchars($row['preferred_days'] ?: 'Not specified'); ?>
                                    </p>
                                    <p class="mb-2">
                                        <i class="bi bi-geo-alt"></i> 
                                        <strong>IP:</strong> 
                                        <?php echo htmlspecialchars($row['ip_address']); ?>
                                    </p>
                                </div>
                            </div>

                            <?php if (!empty($row['additional_details'])): ?>
                            <div class="mb-3">
                                <strong><i class="bi bi-chat-text"></i> Additional Details:</strong>
                                <p class="text-muted mb-0 mt-1">
                                    <?php echo nl2br(htmlspecialchars($row['additional_details'])); ?>
                                </p>
                            </div>
                            <?php endif; ?>

                            <?php if (!empty($row['notes'])): ?>
                            <div class="alert alert-info mb-3">
                                <strong><i class="bi bi-sticky"></i> Admin Notes:</strong>
                                <p class="mb-0 mt-1"><?php echo nl2br(htmlspecialchars($row['notes'])); ?></p>
                            </div>
                            <?php endif; ?>

                            <!-- Update Status Form -->
                            <form method="POST" class="row g-2">
                                <input type="hidden" name="submission_id" value="<?php echo $row['id']; ?>">
                                <div class="col-md-4">
                                    <select name="status" class="form-select form-select-sm">
                                        <option value="pending" <?php echo $row['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                                        <option value="contacted" <?php echo $row['status'] == 'contacted' ? 'selected' : ''; ?>>Contacted</option>
                                        <option value="enrolled" <?php echo $row['status'] == 'enrolled' ? 'selected' : ''; ?>>Enrolled</option>
                                        <option value="rejected" <?php echo $row['status'] == 'rejected' ? 'selected' : ''; ?>>Rejected</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="notes" class="form-control form-control-sm" 
                                           placeholder="Add notes..." value="<?php echo htmlspecialchars($row['notes']); ?>">
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" name="update_status" class="btn btn-primary btn-sm w-100">
                                        <i class="bi bi-check-lg"></i> Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <div class="alert alert-info">
                        <i class="bi bi-info-circle"></i> No submissions found.
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
$conn->close();
?>

