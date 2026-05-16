<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>(function(){var t=localStorage.getItem("nexusTheme");if(t){document.documentElement.setAttribute("data-theme",t)}})()</script>
    <meta name="description" content="Miles per gallon calculator for estimating fuel efficiency.">
    <title>Nexus Red Team Portal | Applications</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body data-page="applications">
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
                    <p class="eyebrow">Calculator</p>
                    <h1>Miles Per Gallon Calculator</h1>
                    <p class="lead">Enter mileage and fuel used to estimate fuel efficiency in seconds.</p>
                    <div class="tag-row"><span class="tag">Mileage</span><span class="tag">Fuel</span><span class="tag">Result</span></div>
                </div>
                <div class="app-shell">
                    <form class="form-grid" method="POST" action="applications.php">
                        <div class="form-field"><label for="miles">Miles Traveled</label><input id="miles" name="miles" type="number" min="1" step="0.1" placeholder="240" value="<?php echo isset($_POST['miles']) ? htmlspecialchars($_POST['miles']) : ''; ?>" required></div>
                        <div class="form-field"><label for="gallons">Gallons Used</label><input id="gallons" name="gallons" type="number" min="0.1" step="0.1" placeholder="8" value="<?php echo isset($_POST['gallons']) ? htmlspecialchars($_POST['gallons']) : ''; ?>" required></div>
                        <div class="form-field full"><button class="button button-primary" type="submit">Calculate MPG</button></div>
                    </form>
                    
                    <?php
                        // Process form submission
                        $result_html = '';
                        
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            $miles = isset($_POST['miles']) ? floatval($_POST['miles']) : null;
                            $gallons = isset($_POST['gallons']) ? floatval($_POST['gallons']) : null;
                            
                            // Validation
                            if (!$miles || !$gallons || $gallons <= 0 || $miles <= 0) {
                                $result_html = '<div class="message-box error"><strong>Enter valid numbers</strong><span>Add a distance greater than zero and a gallons-used value greater than zero.</span></div>';
                            } else {
                                // Calculate MPG
                                $mpg = $miles / $gallons;
                                
                                // Determine efficiency band
                                if ($mpg >= 30) {
                                    $efficiency = "Efficient";
                                } elseif ($mpg >= 20) {
                                    $efficiency = "Average";
                                } else {
                                    $efficiency = "Fuel Heavy";
                                }
                                
                                // Format the result (render clean HTML, not literal backslashes)
                                $result_html = '
                                    <div class="app-result-grid">
                                        <div class="app-value-card">
                                            <span class="app-value">' . number_format($mpg, 2) . '</span>
                                            <span class="app-value-label">Miles per gallon</span>
                                        </div>
                                        <div class="app-value-card">
                                            <span class="app-value">' . htmlspecialchars($efficiency) . '</span>
                                            <span class="app-value-label">Efficiency band</span>
                                        </div>
                                    </div>
                                ';
                            }
                        }
                        
                        echo $result_html;
                    ?>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-heading">
                    <p class="eyebrow">How It Works</p>
                    <h2>Understanding Your MPG</h2>
                </div>

                <div class="feature-grid">
                    <article class="feature-card">
                        <span class="feature-kicker">Step 1</span>
                        <h3>Track Your Miles</h3>
                        <p>Note the total miles you traveled since your last fill-up. Check your odometer at the beginning and end of your trip.</p>
                    </article>
                    <article class="feature-card">
                        <span class="feature-kicker">Step 2</span>
                        <h3>Measure Fuel Used</h3>
                        <p>Fill up your tank completely, then note how many gallons it takes to fill it again. That's your fuel consumption.</p>
                    </article>
                    <article class="feature-card">
                        <span class="feature-kicker">Step 3</span>
                        <h3>Calculate</h3>
                        <p>Use the calculator above to divide miles by gallons and get your instant MPG reading and efficiency rating.</p>
                    </article>
                </div>
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
