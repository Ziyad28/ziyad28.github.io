<?php include 'db_connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Ziyad Alghadban | Portfolio</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>

  <div class="container">

    <header>
      <div class="logo">
        <img src="Logo.png" alt="Z Logo">
      </div>

      <button class="menu-toggle" id="menuToggle">☰</button>

      <nav id="navMenu">
        <ul class="nav-links">
          <li><a href="#projects">Projects</a></li>
          <li><a href="#skills">Skills</a></li>
          <li><a href="#certifications">Certifications</a></li>
          <li><a href="#experience">Experience</a></li>
          <li><a href="#contact">Contact</a></li>
        </ul>
      </nav>
    </header>

    <section class="hero">
      <div class="hero-content">
        <h1>Hi, I'm <span>Ziyad</span></h1>

        <?php
        $aboutResult = $conn->query("SELECT * FROM about_me LIMIT 1");
        if ($about = $aboutResult->fetch_assoc()) {
          echo "<p>" . htmlspecialchars($about['description']) . "</p>";
        }
        ?>

        <div class="hero-btns">
          <a href="#projects" class="btn btn-black">View Projects</a>
          <a href="#contact" class="btn btn-outline">Contact Me</a>
        </div>
      </div>

      <div class="hero-image">
        <img src="myphoto.png" alt="Ziyad Profile">
      </div>
    </section>

    <section id="projects" class="section">
      <h2 class="section-title">Projects</h2>

      <div class="projects-grid">
        <?php
        $projectsResult = $conn->query("SELECT * FROM projects");

        while ($row = $projectsResult->fetch_assoc()) {
          echo "
          <div class='project-card'>
            <h3>" . htmlspecialchars($row['title']) . "</h3>
            <p>" . htmlspecialchars($row['description']) . "</p>
            <p><strong>Built with:</strong> " . htmlspecialchars($row['technologies']) . "</p>

            <div class='project-links'>
              <a href='" . htmlspecialchars($row['live_link']) . "' target='_blank'>Live Demo</a>
              <a href='" . htmlspecialchars($row['github_link']) . "' target='_blank'>GitHub</a>
            </div>
          </div>
          ";
        }
        ?>
      </div>
    </section>

    <section id="skills" class="section">
      <h2 class="section-title">Skills</h2>

      <div class="quick-info">
        <?php
        $skillsResult = $conn->query("SELECT * FROM skills");

        while ($row = $skillsResult->fetch_assoc()) {
          echo "<div class='chip " . htmlspecialchars($row['category']) . "'>" . htmlspecialchars($row['skill_name']) . "</div>";
        }
        ?>
      </div>
    </section>

    <section id="certifications" class="section">
      <h2 class="section-title">Certifications</h2>

      <div class="cert-grid">
        <?php
        $certResult = $conn->query("SELECT * FROM certifications");

        while ($row = $certResult->fetch_assoc()) {
          echo "
          <div class='cert-card'>
            <h3>" . htmlspecialchars($row['title']) . "</h3>
            <p>" . htmlspecialchars($row['description']) . "</p>
            <a href='" . htmlspecialchars($row['certificate_link']) . "' target='_blank'>Open Certificate</a>
          </div>
          ";
        }
        ?>
      </div>
    </section>

    <section id="experience" class="section">
      <h2 class="section-title">Experience</h2>

      <div class="timeline">
        <?php
        $expResult = $conn->query("SELECT * FROM experience");

        while ($row = $expResult->fetch_assoc()) {
          echo "
          <div class='timeline-item'>
            <div class='timeline-dot'></div>

            <div class='timeline-content'>
              <h3>" . htmlspecialchars($row['title']) . " <span>(" . htmlspecialchars($row['period']) . ")</span></h3>
              <ul>
                <li>" . htmlspecialchars($row['description']) . "</li>
              </ul>
            </div>
          </div>
          ";
        }
        ?>
      </div>
    </section>

    <section id="contact" class="section">
      <h2 class="section-title contact-title">Contact</h2>

      <div class="contact-buttons">
        <a href="mailto:lzyad717@gmail.com" class="contact-btn email">Email Me</a>
        <a href="tel:0509531424" class="contact-btn call">Call Me</a>
        <a href="https://wa.me/966509531424" target="_blank" class="contact-btn whatsapp">WhatsApp</a>
      </div>

      <?php
      if (isset($_GET['message']) && $_GET['message'] == 'success') {
        echo "<p id='formMessage'>Message sent successfully!</p>";
      } elseif (isset($_GET['message']) && $_GET['message'] == 'error') {
        echo "<p id='formMessage' class='error-msg'>Something went wrong.</p>";
      }
      ?>

      <form class="contact-form" id="contactForm" action="send_message.php" method="POST">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Send Message</button>
      </form>

      <div class="mini-social-links">
        <a href="https://github.com/Ziyad28" target="_blank">GitHub</a>
        <a href="https://www.linkedin.com/in/ziyad-alghadhban-1a018a36b" target="_blank">LinkedIn</a>
        <a href="CV_Ziyad Ali Alghadhban.pdf" target="_blank">View CV</a>
      </div>
    </section>

    <footer>
      <h3>Ziyad Alghadban</h3>
      <p>Software Engineering Portfolio © 2026</p>
    </footer>

  </div>

  <script src="script.js"></script>
</body>
</html>