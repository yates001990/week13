<?php
$servername = "sql102.infinityfree.com";
$username = "if0_41883247";
$password = "KzCTBmLET94OQug";
$dbname = "if0_41883247_guestbook_app";

$feedbackMessage = '';
$feedbackType = '';
$entries = [];
$connectionError = '';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    $connectionError = 'Database connection failed. Check the InfinityFree host name and credentials.';
} else {
    $conn->set_charset('utf8mb4');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = trim($_POST['name'] ?? '');
        $message = trim($_POST['message'] ?? '');

        if ($name === '' || $message === '') {
            header('Location: guestbook.php?status=missing');
            exit;
        }

        $stmt = $conn->prepare('INSERT INTO guestbook_entries (name, message) VALUES (?, ?)');

        if ($stmt) {
            $stmt->bind_param('ss', $name, $message);

            if ($stmt->execute()) {
                $stmt->close();
                header('Location: guestbook.php?status=posted');
                exit;
            }

            $stmt->close();
            header('Location: guestbook.php?status=error');
            exit;
        }

        header('Location: guestbook.php?status=error');
        exit;
    }

    $result = $conn->query('SELECT id, name, message, submitted_at FROM guestbook_entries ORDER BY submitted_at DESC, id DESC');

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $entries[] = $row;
        }
        $result->free();
    }

    if (isset($_GET['status'])) {
        if ($_GET['status'] === 'posted') {
            $feedbackType = 'success';
            $feedbackMessage = 'Your message was posted to the guestbook.';
        } elseif ($_GET['status'] === 'missing') {
            $feedbackType = 'error';
            $feedbackMessage = 'Please enter both your name and a message.';
        } else {
            $feedbackType = 'error';
            $feedbackMessage = 'Something went wrong while saving the message.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>(function(){var t=localStorage.getItem("nexusTheme");if(t){document.documentElement.setAttribute("data-theme",t)}})()</script>
    <meta name="description" content="Guest book for visitors to leave notes for the Nexus Red Team site.">
    <title>Guest Book</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&amp;family=JetBrains+Mono:wght@400;500&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-page="guestbook">
    <header class="site-header">
        <div class="container nav-shell">
            <a class="brand" href="index.php">
                <span class="brand-mark">NR</span>
                <span class="brand-copy"><strong>Nexus Red Team</strong><span>Security Operations</span></span>
            </a>
            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="siteNav">
                <span></span><span></span><span></span>
            </button>
            <nav class="site-nav" id="siteNav" aria-label="Primary">
                <a href="index.php">Home</a>
                <a href="about.php">About</a>
                <a href="phish-lab.php">Phish-Lab</a>
                <a href="applications.php">Applications</a>
                <a href="guestbook.php">Guest Book</a>
                <a href="contact.php">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="page-hero">
            <div class="container two-column">
                <div>
                    <p class="eyebrow">Community</p>
                    <h1>Guest Book</h1>
                    <p class="lead">Leave a note, share feedback, or just say hello. New messages appear at the top so the latest visitors are always first.</p>
                    <div class="tag-row"><span class="tag">Messages</span><span class="tag">Community</span><span class="tag">Live updates</span></div>
                </div>
                <div class="form-card guestbook-card">
                    <p class="panel-label">Welcome</p>
                    <h2>Share your message</h2>
                    <p>This page keeps a running list of visitor notes, comments, and quick check-ins.</p>
                    <div class="guestbook-stats">
                        <div class="guestbook-stat"><strong>Latest first</strong><span>Fresh entries stay at the top.</span></div>
                        <div class="guestbook-stat"><strong>Stored safely</strong><span>Messages are saved in the site database.</span></div>
                        <div class="guestbook-stat"><strong>Public view</strong><span>Everyone can read the guest book.</span></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container guestbook-layout">
                <section class="form-card">
                    <h2>Leave a note</h2>
                    <p>Write a short message for the guest book.</p>
                    <form class="form-grid" method="POST" action="guestbook.php">
                        <div class="form-field full"><label for="name">Name</label><input id="name" name="name" type="text" maxlength="100" placeholder="Your name" required></div>
                        <div class="form-field full"><label for="message">Message</label><textarea id="message" name="message" maxlength="1000" placeholder="Write your message here." required></textarea></div>
                        <div class="form-field full"><button class="button button-primary" type="submit">Post Message</button></div>
                    </form>

                    <?php if ($feedbackMessage !== ''): ?>
                        <div class="message-box <?php echo $feedbackType === 'error' ? 'error' : 'success'; ?>">
                            <strong><?php echo $feedbackType === 'error' ? 'Submission not saved' : 'Message posted'; ?></strong>
                            <span><?php echo htmlspecialchars($feedbackMessage); ?></span>
                        </div>
                    <?php endif; ?>

                    <?php if ($connectionError !== ''): ?>
                        <div class="message-box error">
                            <strong>Connection problem</strong>
                            <span><?php echo htmlspecialchars($connectionError); ?></span>
                        </div>
                    <?php endif; ?>
                </section>

                <aside class="guestbook-panel">
                    <section class="form-card">
                        <p class="panel-label">Recent Notes</p>
                        <h2>Recent messages</h2>
                        <?php if ($connectionError === ''): ?>
                            <?php if (count($entries) > 0): ?>
                                <div class="guestbook-entry-list">
                                    <?php foreach ($entries as $entry): ?>
                                        <article class="guestbook-entry">
                                            <div class="guestbook-entry-header">
                                                <span class="guestbook-entry-name"><?php echo htmlspecialchars($entry['name']); ?></span>
                                                <time class="guestbook-entry-time"><?php echo htmlspecialchars($entry['submitted_at']); ?></time>
                                            </div>
                                            <p class="guestbook-entry-message"><?php echo nl2br(htmlspecialchars($entry['message'])); ?></p>
                                        </article>
                                    <?php endforeach; ?>
                                </div>
                            <?php else: ?>
                                <p class="guestbook-empty">No messages yet. Be the first to post one.</p>
                            <?php endif; ?>
                        <?php else: ?>
                            <p class="guestbook-empty">Messages will appear here after the database connection is fixed.</p>
                        <?php endif; ?>
                    </section>
                </aside>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <div class="container footer-grid">
            <div class="footer-brand">
                <strong>Nexus Red Team</strong>
                <p>Security operations dashboard for tools, findings, and awareness.</p>
                <address>1200 Market Street, Suite 400<br>New York, NY 10018</address>
            </div>
            <div class="footer-columns">
                <div class="footer-column">
                    <span class="footer-column-title">Pages</span>
                    <a href="index.php">Home</a>
                    <a href="about.php">About</a>
                    <a href="phish-lab.php">Phish-Lab</a>
                    <a href="guestbook.php">Guest Book</a>
                    <a href="contact.php">Contact</a>
                    <a href="applications.php">Applications</a>
                </div>
                <div class="footer-column">
                    <span class="footer-column-title">Tools</span>
                    <a href="applications.php">MPG Calculator</a>
                    <a href="about.php">About Us</a>
                </div>
                <div class="footer-column">
                    <span class="footer-column-title">Info</span>
                    <a href="contact.php">Contact</a>
                    <a href="about.php">Security Focus</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container"><p class="footer-copyright">&copy; 2026 Nexus Red Team. All rights reserved.</p></div>
        </div>
    </footer>
    <script src="js/main.js"></script>
</body>
</html>