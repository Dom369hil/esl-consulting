(() => {
    document.querySelectorAll("[data-current-year]").forEach((year) => {
        year.textContent = String(new Date().getFullYear());
    });

    const siteHeader = document.querySelector(".site-header");
    const navbar = siteHeader?.querySelector(".navbar");
    const navToggle = siteHeader?.querySelector(".nav-toggle");
    const navMenu = siteHeader?.querySelector(".nav-menu");

    if (siteHeader && navbar && navToggle && navMenu) {
        const setMenuOpen = (isOpen) => {
            navbar.classList.toggle("is-open", isOpen);
            siteHeader.classList.toggle("is-menu-open", isOpen);
            navToggle.setAttribute("aria-expanded", String(isOpen));
            navToggle.setAttribute(
                "aria-label",
                isOpen ? "Close navigation menu" : "Open navigation menu"
            );
        };

        navToggle.addEventListener("click", () => {
            setMenuOpen(navToggle.getAttribute("aria-expanded") !== "true");
        });

        navMenu.addEventListener("click", (event) => {
            if (event.target.closest("a")) {
                setMenuOpen(false);
            }
        });

        document.addEventListener("pointerdown", (event) => {
            if (!siteHeader.contains(event.target)) {
                setMenuOpen(false);
            }
        });

        document.addEventListener("keydown", (event) => {
            if (event.key === "Escape" && navbar.classList.contains("is-open")) {
                setMenuOpen(false);
                navToggle.focus();
            }
        });

        window.matchMedia("(min-width: 901px)").addEventListener("change", () => {
            setMenuOpen(false);
        });

        let previousScrollY = window.scrollY;
        const revealHeader = () => {
            siteHeader.classList.remove("is-hidden");
            siteHeader.inert = false;
        };

        window.addEventListener("scroll", () => {
            const currentScrollY = window.scrollY;
            const scrollingUp = currentScrollY < previousScrollY;
            const scrollingDown = currentScrollY > previousScrollY;
            if ((scrollingUp || scrollingDown) && navbar.classList.contains("is-open")) {
                setMenuOpen(false);
            }

            const headerHasFocus = siteHeader.contains(document.activeElement);

            if (scrollingUp || headerHasFocus) {
                revealHeader();
            } else if (scrollingDown) {
                siteHeader.classList.add("is-hidden");
                siteHeader.inert = true;
            }

            previousScrollY = currentScrollY;
        }, { passive: true });

        siteHeader.addEventListener("focusin", revealHeader);
    }

    const whySection = document.querySelector(".why-esl");
    const reasonsToggle = whySection?.querySelector(".why-esl-toggle");
    const additionalReasons = whySection?.querySelectorAll("[data-why-additional]");
    const mobileReasons = window.matchMedia("(max-width: 680px)");

    if (whySection && reasonsToggle && additionalReasons?.length) {
        let reasonsExpanded = false;

        const updateReasons = () => {
            additionalReasons.forEach((reason) => {
                reason.hidden = mobileReasons.matches && !reasonsExpanded;
            });

            reasonsToggle.hidden = !mobileReasons.matches;
            reasonsToggle.setAttribute(
                "aria-expanded",
                String(mobileReasons.matches && reasonsExpanded)
            );
            reasonsToggle.textContent = reasonsExpanded ? "Show Less" : "View All Reasons";
        };

        reasonsToggle.addEventListener("click", () => {
            reasonsExpanded = !reasonsExpanded;
            updateReasons();
        });

        mobileReasons.addEventListener("change", () => {
            reasonsExpanded = false;
            updateReasons();
        });

        updateReasons();
    }

    const contactForm = document.querySelector(".contact-page .contact-form");

    contactForm?.addEventListener("submit", (event) => {
        event.preventDefault();

        const formData = new FormData(contactForm);
        const message = [
            "ESL Consulting enquiry",
            `Name: ${formData.get("name")}`,
            `Company: ${formData.get("company")}`,
            `Email: ${formData.get("email")}`,
            `Phone: ${formData.get("phone")}`,
            `Area of Interest: ${formData.get("service")}`,
            `Message: ${formData.get("message")}`
        ].filter((line) => !line.endsWith(": ")).join("\n");

        const whatsappUrl = new URL("https://wa.me/233243943889");
        whatsappUrl.searchParams.set("text", message);
        window.open(whatsappUrl.toString(), "_blank", "noopener,noreferrer");
    });

    const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

    if (reducedMotion.matches) {
        return;
    }

    const targets = document.querySelectorAll(
        ".section-heading, .expertise-feature, .sector-card, " +
        ".why-esl [data-why-reveal], .project-card, .approach-card, " +
        ".about-layout:not(.home-about-layout), " +
        ".projects-record [data-projects-reveal], " +
        ".accreditation-item, .service-detail-header, .service-detail-image, " +
        ".service-list-item, .sector-detail-layout, .experience-card, " +
        ".contact-info, .contact-form-wrapper, .cta-content, " +
        ".vision-mission-item, .home-about [data-about-reveal], " +
        ".home-direction [data-direction-reveal]"
    );

    if ("IntersectionObserver" in window) {
        const observer = new IntersectionObserver((entries, currentObserver) => {
            entries.forEach((entry) => {
                if (!entry.isIntersecting) {
                    return;
                }

                entry.target.classList.add("is-visible");
                currentObserver.unobserve(entry.target);
            });
        }, {
            threshold: 0.12,
            rootMargin: "0px 0px -32px 0px"
        });

        targets.forEach((target) => {
            target.classList.add("motion-reveal");
            observer.observe(target);
        });
    }

    const parallaxImages = document.querySelectorAll(
        ".expertise-image-photo, .sector-card-image"
    );
    const expertiseFeatures = document.querySelectorAll(".expertise-feature");
    const sectorArc = document.querySelector("[data-sector-arc]");
    const sectorStage = sectorArc?.querySelector(".sector-arc-stage");
    const sectorTrack = sectorArc?.querySelector(".sector-grid");
    const sectorCards = sectorTrack ? [...sectorTrack.querySelectorAll(".sector-card")] : [];
    const sectorCount = sectorArc?.querySelector("[data-sector-current]");
    const sectorArcMedia = window.matchMedia(
        "(min-width: 901px), (min-width: 601px) and (min-height: 550px), " +
        "(min-width: 320px) and (max-width: 600px) and (min-height: 550px)"
    );
    let sectorArcEnabled = false;
    let parallaxFramePending = false;

    const updateSectorArc = () => {
        if (!sectorArcEnabled || !sectorCards.length) {
            return;
        }

        const stickyTop = parseFloat(getComputedStyle(sectorStage).top) || 0;
        const trackTop = sectorArc.getBoundingClientRect().top + window.scrollY;
        const travel = Math.max(1, sectorArc.offsetHeight - sectorStage.offsetHeight);
        const start = trackTop - stickyTop;
        const progress = Math.max(0, Math.min(1, (window.scrollY - start) / travel));
        const step = parseFloat(getComputedStyle(sectorTrack).getPropertyValue("--sector-arc-step")) || 22;
        const endAngle = step * (sectorCards.length - 1) / 2;
        const rotation = endAngle - progress * endAngle * 2;
        const focusedIndex = Math.round(progress * (sectorCards.length - 1));

        sectorTrack.style.setProperty("--arc-rotation", `${rotation.toFixed(2)}deg`);
        sectorCards.forEach((card, index) => {
            card.classList.toggle("is-focused", index === focusedIndex);
            card.style.zIndex = String(sectorCards.length - Math.abs(index - focusedIndex));
        });

        if (sectorCount) {
            sectorCount.textContent = String(focusedIndex + 1).padStart(2, "0");
        }
    };

    const setSectorArcMode = () => {
        sectorArcEnabled = Boolean(sectorArc && sectorArcMedia.matches && sectorCards.length);
        sectorArc?.classList.toggle("is-arc-carousel", sectorArcEnabled);
        sectorTrack?.classList.toggle("is-arc-carousel", sectorArcEnabled);

        if (!sectorArcEnabled && sectorTrack) {
            sectorTrack.style.removeProperty("--arc-rotation");
            sectorCards.forEach((card) => {
                card.classList.remove("is-focused");
                card.style.removeProperty("z-index");
            });
        }

        updateSectorArc();
    };

    const updateParallax = () => {
        parallaxFramePending = false;
        const viewportHeight = window.innerHeight || document.documentElement.clientHeight;

        expertiseFeatures.forEach((feature) => {
            const bounds = feature.getBoundingClientRect();

            if (bounds.top < viewportHeight * 0.86 && bounds.bottom > viewportHeight * 0.14) {
                feature.classList.add("is-visible");
            }
        });

        parallaxImages.forEach((image) => {
            const bounds = image.getBoundingClientRect();

            if (bounds.bottom < 0 || bounds.top > viewportHeight) {
                return;
            }

            const imageCenter = bounds.top + bounds.height / 2;
            let maximumOffset = 42;

            if (image.matches('.about-hero-image img')) {
                maximumOffset = 32;
            } else if (image.matches('.expertise-image-photo')) {
                maximumOffset = 18;
            } else if (image.matches('.sector-card-image')) {
                maximumOffset = 12;
            }

            const offset = Math.max(
                -maximumOffset,
                Math.min(maximumOffset, (viewportHeight / 2 - imageCenter) * 0.12)
            );
            image.style.setProperty("--parallax-offset", `${offset.toFixed(2)}px`);
        });

        updateSectorArc();
    };

    const scheduleParallax = () => {
        if (parallaxFramePending) {
            return;
        }

        parallaxFramePending = true;
        window.requestAnimationFrame(updateParallax);
    };

    window.addEventListener("scroll", scheduleParallax, { passive: true });
    window.addEventListener("resize", scheduleParallax);
    window.addEventListener("resize", setSectorArcMode);
    sectorArcMedia.addEventListener("change", setSectorArcMode);
    setSectorArcMode();
    updateParallax();

})();
