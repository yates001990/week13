<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>(function(){var t=localStorage.getItem("nexusTheme");if(t){document.documentElement.setAttribute("data-theme",t)}})()</script>
    <meta name="description" content="Contact Nexus Red Team about assessments, training, and platform support.">
    <title>Nexus Red Team Portal | Contact</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-page="contact">
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
            <div class="container contact-layout">
                <div>
                    <p class="eyebrow">Contact</p>
                    <h1>Start a conversation about assessments, training, or platform setup.</h1>
                    <p class="lead">Reach out to discuss your needs, scheduling, or support for your team.</p>
                </div>
                <div class="contact-summary">
                    <div class="contact-summary-grid">
                        <article class="contact-summary-card"><span>Email</span><strong>ops@nexusredteam.dev</strong><p>Best for new work and support requests.</p></article>
                        <article class="contact-summary-card"><span>Hours</span><strong>Mon to Fri, 9am to 6pm</strong><p>Eastern time for standard support and scheduling.</p></article>
                        <article class="contact-summary-card"><span>Location</span><strong>New York, NY</strong><p>Remote-first with on-site sessions by request.</p></article>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container split-layout">
                <div class="form-card">
                    <h2>Send a message</h2>
                    <p>Share what you need and the best way to reach you.</p>
                    <form class="form-grid" method="POST" action="contact.php">
                        <div class="form-field"><label for="name">Name</label><input id="name" name="name" type="text" placeholder="Your name" required></div>
                        <div class="form-field"><label for="email">Email</label><input id="email" name="email" type="email" placeholder="name@example.com" required></div>
                        <div class="form-field"><label for="company">Organization</label><input id="company" name="company" type="text" placeholder="Company or team"></div>
                        <div class="form-field"><label for="interest">Interest</label><select id="interest" name="interest" required><option value="">Select an option</option><option value="Assessment">Assessment</option><option value="Training">Training</option><option value="Platform access">Platform access</option><option value="General inquiry">General inquiry</option></select></div>
                        <div class="form-field full"><label for="message">Message</label><textarea id="message" name="message" placeholder="Tell us what you would like to discuss." required></textarea></div>
                        <div class="form-field full"><button class="button button-primary" type="submit">Send Inquiry</button></div>
                    </form>
                    
                    <?php
                        // Process form submission
                        $message_html = '';
                        
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '';
                            $email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
                            $company = isset($_POST['company']) ? htmlspecialchars($_POST['company']) : '';
                            $interest = isset($_POST['interest']) ? htmlspecialchars($_POST['interest']) : '';
                            $message = isset($_POST['message']) ? htmlspecialchars($_POST['message']) : '';
                            
                            // Simple validation
                            if ($name && $email && $interest && $message) {
                                // In a real application, you would send an email here
                                // For now, just show a success message
                                $message_html = '
                                    <div class="message-box" style="border-color: #22c55e; background: rgba(34, 197, 94, 0.1); margin-top: 1rem;">
                                        <strong style="color: #22c55e;">Message Received!</strong>
                                        <span>Thank you, ' . $name . '! We have received your inquiry and will get back to you at ' . $email . ' within 24 hours.</span>
                                    </div>
                                ';
                            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $message_html = '<div class="message-box error"><strong>Please fill all required fields</strong><span>Name, email, interest, and message are required.</span></div>';
                            }
                        }
                        
                        echo $message_html;
                    ?>
                </div>
                <aside class="contact-note-panel">
                    <p class="panel-label">Helpful details</p>
                    <h2>What to include</h2>
                    <ul class="contact-note-list">
                        <li>Type of work, scope, and timeline.</li>
                        <li>Who should be included on the reply.</li>
                        <li>Any access, scheduling, or security notes.</li>
                    </ul>
                    <div class="contact-callout">
                        <span>Direct email</span>
                        <strong>ops@nexusredteam.dev</strong>
                        <p>Best for sensitive requests or quick scheduling.</p>
                    </div>
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
