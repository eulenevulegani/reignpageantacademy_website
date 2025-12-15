    <!-- Footer -->
    <footer id="contact">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="footer-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/logo-white.png" alt="Logo">
                    </div>
                    <p style="color: #999;">A Legacy of Royalty. Developing the next generation of leaders and queens.</p>
                </div>
                <div class="footer-col">
                    <h4>Contact</h4>
                    <ul>
                        <li><i class="fas fa-envelope text-gold"></i> reignpageantacademy@gmail.com</li>
                        <li><i class="fab fa-instagram text-gold"></i> @reignpageantacademy</li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Quick Links</h4>
                    <ul>
                        <li><a href="<?php echo home_url('#about'); ?>">About</a></li>
                        <li><a href="<?php echo home_url('/audition'); ?>">Auditions</a></li>
                        <li><a href="<?php echo home_url('/my-account'); ?>">Client Portal <i class="fas fa-lock" style="font-size: 0.7rem;"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Reign Pageant Academy. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>
