<?php include 'includes/header.php'; ?>

<main class="contact-page">

    <!-- Page Hero -->
    <section class="page-hero">
        <div class="container">

            <p class="section-label">
                CONTACT ESL
            </p>

            <h1>
                Let's Discuss Your EHSS Requirements
            </h1>

            <p>
                Contact ESL Consulting to discuss your environmental,
                health, safety or sustainability requirements.
            </p>

        </div>
    </section>


    <!-- Contact Section -->
    <section class="contact-section">
        <div class="container">

            <div class="contact-layout">

                <!-- Contact Information -->
                <div class="contact-info">

                    <p class="section-label">
                        GET IN TOUCH
                    </p>

                    <h2>
                        Speak With Our Team
                    </h2>

                    <p>
                        Our team can discuss your requirements and help
                        identify the appropriate technical or advisory
                        support for your project.
                    </p>


                    <div class="contact-details">

                        <div class="contact-item">

                            <h3>Head Office</h3>

                            <p>
                                No. 8 Ago Ali (Fifth) Street<br>
                                Off Trinity Avenue<br>
                                Mempeasem, East Legon<br>
                                Accra, Ghana
                            </p>

                        </div>


                        <div class="contact-item">

                            <h3>Takoradi Office</h3>

                            <p>
                                Anaji<br>
                                Takoradi, Ghana
                            </p>

                        </div>


                        <div class="contact-item">

                            <h3>Phone</h3>

                            <p>
                                <a href="tel:+233244771707">+233 (0)24 4771707 — Mr. Armah (CEO)</a><br>
                                <a href="tel:+233243943889">+233 (0)24 3943889 — Obed (Client Relations)</a><br>
                                <a href="tel:+233209046739">+233 (0)20 9046739 — Solomon (Technical)</a>
                            </p>

                        </div>


                        <div class="contact-item">

                            <h3>Email</h3>

                            <p>
                                <a href="mailto:oadjei@esl-ghana.com">
                                    oadjei@esl-ghana.com
                                </a>
                            </p>

                            <p>
                                <a href="mailto:akarmah@esl-ghana.com">
                                    akarmah@esl-ghana.com
                                </a>
                            </p>

                            <p>
                                <a href="mailto:sbrobbey@esl-ghana.com">
                                    sbrobbey@esl-ghana.com
                                </a>
                            </p>

                        </div>

                    </div>

                </div>


                <!-- Consultation Form -->
                <div class="contact-form-wrapper">

                    <p class="section-label">
                        REQUEST A CONSULTATION
                    </p>

                    <h2>
                        Tell Us About Your Requirement
                    </h2>

                    <form class="contact-form" action="#" method="post">

                        <div class="form-group">
                            <label for="name">
                                Full Name
                            </label>

                            <input
                                type="text"
                                id="name"
                                name="name"
                                required
                            >
                        </div>


                        <div class="form-group">
                            <label for="company">
                                Company / Organisation
                            </label>

                            <input
                                type="text"
                                id="company"
                                name="company"
                            >
                        </div>


                        <div class="form-group">
                            <label for="email">
                                Email Address
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                required
                            >
                        </div>


                        <div class="form-group">
                            <label for="phone">
                                Phone Number
                            </label>

                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                            >
                        </div>


                        <div class="form-group">
                            <label for="service">
                                Area of Interest
                            </label>

                            <select id="service" name="service">

                                <option value="">
                                    Select an area
                                </option>

                                <option value="environment">
                                    Environment
                                </option>

                                <option value="safety-compliance">
                                    Safety & Compliance
                                </option>

                                <option value="sustainability-esg">
                                    Sustainability & ESG
                                </option>

                                <option value="other">
                                    Other / General Enquiry
                                </option>

                            </select>

                        </div>


                        <div class="form-group">

                            <label for="message">
                                Message
                            </label>

                            <textarea
                                id="message"
                                name="message"
                                rows="6"
                                required
                            ></textarea>

                        </div>


                        <button
                            type="submit"
                            class="button button-primary"
                        >
                            Submit Enquiry
                        </button>

                    </form>

                </div>

            </div>

        </div>
    </section>


    <!-- Website -->
    <section class="contact-website">
        <div class="container">

            <div class="contact-website-content">

                <p class="section-label">
                    ONLINE
                </p>

                <h2>
                    Visit ESL Consulting Online
                </h2>

                <a
                    href="https://www.esl-ghana.com"
                    target="_blank"
                    rel="noopener noreferrer"
                >
                    www.esl-ghana.com
                </a>

            </div>

        </div>
    </section>

</main>

<?php $footerVariant = 'minimal'; ?>
<?php include 'includes/footer.php'; ?>