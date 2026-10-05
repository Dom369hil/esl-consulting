<?php $isMinimalFooter = ($footerVariant ?? 'full') === 'minimal'; ?>
<footer class="site-footer<?php echo $isMinimalFooter ? ' site-footer--minimal' : ''; ?>">
    <div class="container">

        <?php if ($isMinimalFooter): ?>
        <div class="footer-minimal-main">
            <section class="footer-column footer-brand">
                <a href="/esl-consulting/" class="footer-logo">
                    <img
                        src="/esl-consulting/static/images/logo/ESL%20Logo%20(2).png"
                        alt="ESL Consulting Ltd"
                    >
                </a>
                <div class="footer-brand-copy">
                    <h2 class="footer-heading">ESL Consulting</h2>
                    <p>Your Trusted Partner in Environment, Health, Safety and Sustainability Solutions</p>
                </div>
            </section>
        </div>
        <?php else: ?>
        <div class="footer-main">
            <section class="footer-column footer-brand">
                <h2 class="footer-heading">ESL Consulting</h2>
                <a href="/esl-consulting/" class="footer-logo">
                    <img
                        src="/esl-consulting/static/images/logo/ESL%20Logo%20(2).png"
                        alt="ESL Consulting Ltd"
                    >
                </a>
                <p>Your Trusted Partner in Environment, Health, Safety and Sustainability Solutions</p>
            </section>

            <nav class="footer-column" aria-label="Quick links">
                <h2 class="footer-heading">Quick Links</h2>
                <ul class="footer-link-list">
                    <li><a href="/esl-consulting/">Home</a></li>
                    <li><a href="/esl-consulting/about.php">About</a></li>
                    <li><a href="/esl-consulting/services.php">Services</a></li>
                    <li><a href="/esl-consulting/sectors.php">Sectors</a></li>
                    <li><a href="/esl-consulting/projects.php">Projects</a></li>
                    <li><a href="/esl-consulting/insights.php">Insights</a></li>
                    <li><a href="/esl-consulting/contact.php">Contact</a></li>
                </ul>
            </nav>

            <section class="footer-column">
                <h2 class="footer-heading">Email</h2>
                <ul class="footer-link-list footer-contact-list">
                    <li><a href="mailto:oadjei@esl-ghana.com">oadjei@esl-ghana.com</a></li>
                    <li><a href="mailto:akarmah@esl-ghana.com">akarmah@esl-ghana.com</a></li>
                    <li><a href="mailto:sbrobbey@esl-ghana.com">sbrobbey@esl-ghana.com</a></li>
                </ul>
            </section>

            <section class="footer-column">
                <h2 class="footer-heading">Contact</h2>
                <ul class="footer-link-list footer-contact-list">
                    <li><a href="tel:+233244771707">+233 (0)24 4771707 <span>— Mr. Armah (CEO)</span></a></li>
                    <li><a href="tel:+233243943889">+233 (0)24 3943889 <span>— Obed (Client Relations)</span></a></li>
                    <li><a href="tel:+233209046739">+233 (0)20 9046739 <span>— Solomon (Technical)</span></a></li>
                </ul>
                <div class="footer-website">
                    <h3 class="footer-subheading">Website</h3>
                    <a href="https://www.esl-ghana.com">www.esl-ghana.com</a>
                </div>
            </section>
        </div>

        <div class="footer-offices">
            <section>
                <h2 class="footer-subheading">Head Office</h2>
                <address>No. 8 Ago Ali (Fifth) Street,<br>Off Trinity Avenue,<br>Mempeasem, East Legon,<br>Accra-Ghana</address>
            </section>
            <section>
                <h2 class="footer-subheading">Takoradi Office</h2>
                <address>Anaji</address>
            </section>
        </div>
        <?php endif; ?>

        <div class="footer-bottom">
            <p>&copy; <?php echo date('Y'); ?> ESL Consulting Ltd. All rights reserved.</p>
        </div>
    </div>
</footer>

<script
    src="/esl-consulting/static/js/site-motion.js?v=<?php echo filemtime(__DIR__ . '/../static/js/site-motion.js'); ?>"
    defer
></script>

</body>
</html>