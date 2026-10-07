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
            </section>

            <section class="footer-column footer-offices">
                <div class="footer-office">
                    <h2 class="footer-subheading">Head Office</h2>
                    <address>No. 8 Ago Ali (Fifth) Street,<br>Off Trinity Avenue,<br>Mempeasem, East Legon,<br>Accra-Ghana</address>
                </div>
                <div class="footer-office">
                    <h2 class="footer-subheading">Takoradi Office</h2>
                    <address>Anaji</address>
                </div>
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