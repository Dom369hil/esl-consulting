(() => {
    const showcase = document.querySelector(".project-showcase");

    if (!showcase) {
        return;
    }

    const slides = [...showcase.querySelectorAll("[data-project-slide]")];
    const category = showcase.querySelector("[data-showcase-category]");
    const description = showcase.querySelector("[data-showcase-description]");
    const currentCount = showcase.querySelector("[data-showcase-current]");
    const counter = showcase.querySelector(".project-showcase-counter");
    const copy = showcase.querySelector(".project-showcase-copy");
    const previousButton = showcase.querySelector("[data-showcase-previous]");
    const nextButton = showcase.querySelector("[data-showcase-next]");
    const reducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

    if (
        slides.length !== 9 ||
        !category ||
        !description ||
        !currentCount ||
        !counter ||
        !copy ||
        !previousButton ||
        !nextButton
    ) {
        return;
    }

    let activeIndex = 0;
    let isTransitioning = false;

    const updateSlides = () => {
        slides.forEach((slide, index) => {
            const relativeIndex = (index - activeIndex + slides.length) % slides.length;
            slide.classList.remove("is-active", "is-previous", "is-next");

            if (relativeIndex === 0) {
                slide.classList.add("is-active");
                slide.setAttribute("aria-hidden", "false");
            } else if (relativeIndex === 1) {
                slide.classList.add("is-next");
                slide.setAttribute("aria-hidden", "true");
            } else if (relativeIndex === slides.length - 1) {
                slide.classList.add("is-previous");
                slide.setAttribute("aria-hidden", "true");
            } else {
                slide.setAttribute("aria-hidden", "true");
            }
        });

        const activeSlide = slides[activeIndex];
        const slideNumber = String(activeIndex + 1).padStart(2, "0");
        category.textContent = activeSlide.dataset.category;
        description.textContent = activeSlide.dataset.description;
        currentCount.textContent = slideNumber;
        counter.setAttribute("aria-label", `Slide ${activeIndex + 1} of ${slides.length}`);
    };

    const showRelativeSlide = (step) => {
        if (isTransitioning) {
            return;
        }

        isTransitioning = true;
        copy.classList.add("is-changing");

        const textDelay = reducedMotion.matches ? 0 : 180;
        const transitionDuration = reducedMotion.matches ? 0 : 650;

        window.setTimeout(() => {
            activeIndex = (activeIndex + step + slides.length) % slides.length;
            updateSlides();
            copy.classList.remove("is-changing");
        }, textDelay);

        window.setTimeout(() => {
            isTransitioning = false;
        }, transitionDuration);
    };

    previousButton.addEventListener("click", () => showRelativeSlide(-1));
    nextButton.addEventListener("click", () => showRelativeSlide(1));
})();