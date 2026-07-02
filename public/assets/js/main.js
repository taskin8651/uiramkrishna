/* ================================
   RKD COLLEGE PREMIUM SKELETON JS
================================ */

document.addEventListener("DOMContentLoaded", function () {
  const siteHeader = document.getElementById("siteHeader");
  const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
  const navbarCollapse = document.getElementById("mainNavbar");

  // Sticky header shadow
  function handleHeaderScroll() {
    if (window.scrollY > 40) {
      siteHeader.classList.add("is-scrolled");
    } else {
      siteHeader.classList.remove("is-scrolled");
    }
  }

  handleHeaderScroll();
  window.addEventListener("scroll", handleHeaderScroll);

  // Smooth close mobile menu on link click
  navLinks.forEach(function (link) {
    link.addEventListener("click", function () {
      if (navbarCollapse && navbarCollapse.classList.contains("show")) {
        const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
        if (bsCollapse) {
          bsCollapse.hide();
        }
      }
    });
  });

  // Active menu on scroll
  const sections = document.querySelectorAll("section[id], footer[id]");

  function setActiveMenu() {
    let currentSection = "";

    sections.forEach(function (section) {
      const sectionTop = section.offsetTop - 160;
      const sectionHeight = section.offsetHeight;

      if (window.scrollY >= sectionTop && window.scrollY < sectionTop + sectionHeight) {
        currentSection = section.getAttribute("id");
      }
    });

    navLinks.forEach(function (link) {
      link.classList.remove("active");

      const href = link.getAttribute("href");

      if (href === "#" + currentSection) {
        link.classList.add("active");
      }
    });
  }

  window.addEventListener("scroll", setActiveMenu);

  // External link handling
  const allLinks = document.querySelectorAll("a[href]");

  allLinks.forEach(function (link) {
    const href = link.getAttribute("href");

    if (
      href &&
      href.startsWith("http") &&
      !href.includes(window.location.hostname)
    ) {
      link.setAttribute("target", "_blank");
      link.setAttribute("rel", "noopener noreferrer");
    }
  });

  // Reveal animation
  const revealItems = document.querySelectorAll(
    ".section-card, .notice-card, .course-card, .department-card, .support-card, .gallery-card, .update-panel"
  );

  revealItems.forEach(function (item) {
    item.classList.add("reveal-item");
  });

  const revealObserver = new IntersectionObserver(
    function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          revealObserver.unobserve(entry.target);
        }
      });
    },
    {
      threshold: 0.12
    }
  );

  revealItems.forEach(function (item) {
    revealObserver.observe(item);
  });
});

/* Add reveal CSS dynamically */
const revealStyle = document.createElement("style");
revealStyle.innerHTML = `
  .reveal-item {
    opacity: 0;
    transform: translateY(22px);
    transition: opacity 0.65s ease, transform 0.65s ease;
  }

  .reveal-item.is-visible {
    opacity: 1;
    transform: translateY(0);
  }
`;
document.head.appendChild(revealStyle);












// Gallery Slider + Zoom Modal

document.addEventListener("DOMContentLoaded", function () {
  const slider = document.getElementById("gallerySlider");
  const slides = document.querySelectorAll(".gallery-slide");
  const prevBtn = document.getElementById("galleryPrev");
  const nextBtn = document.getElementById("galleryNext");

  let currentIndex = 0;
  let perView = 3;
  let autoSlide = null;

  function updatePerView() {
    if (window.innerWidth <= 767) {
      perView = 1;
    } else if (window.innerWidth <= 991) {
      perView = 2;
    } else {
      perView = 3;
    }
  }

  function getGap() {
    return window.innerWidth <= 767 ? 0 : 18;
  }

  function updateSlider() {
    if (!slider || slides.length === 0) return;

    updatePerView();

    const maxIndex = Math.max(slides.length - perView, 0);

    if (currentIndex > maxIndex) {
      currentIndex = 0;
    }

    const slideWidth = slides[0].getBoundingClientRect().width;
    const gap = getGap();
    const moveX = currentIndex * (slideWidth + gap);

    slider.style.transform = `translateX(-${moveX}px)`;
  }

  function nextSlide() {
    updatePerView();

    const maxIndex = Math.max(slides.length - perView, 0);
    currentIndex = currentIndex >= maxIndex ? 0 : currentIndex + 1;

    updateSlider();
  }

  function prevSlide() {
    updatePerView();

    const maxIndex = Math.max(slides.length - perView, 0);
    currentIndex = currentIndex <= 0 ? maxIndex : currentIndex - 1;

    updateSlider();
  }

  function startAutoSlide() {
    stopAutoSlide();

    if (slides.length > perView) {
      autoSlide = setInterval(nextSlide, 4500);
    }
  }

  function stopAutoSlide() {
    if (autoSlide) {
      clearInterval(autoSlide);
      autoSlide = null;
    }
  }

  if (nextBtn) {
    nextBtn.addEventListener("click", function () {
      nextSlide();
      startAutoSlide();
    });
  }

  if (prevBtn) {
    prevBtn.addEventListener("click", function () {
      prevSlide();
      startAutoSlide();
    });
  }

  if (slider) {
    slider.addEventListener("mouseenter", stopAutoSlide);
    slider.addEventListener("mouseleave", startAutoSlide);
  }

  window.addEventListener("resize", function () {
    updateSlider();
    startAutoSlide();
  });

  updateSlider();
  startAutoSlide();

  /* ================= IMAGE ZOOM MODAL ================= */

  const modal = document.getElementById("galleryModal");
  const modalImg = document.getElementById("galleryModalImg");
  const modalTitle = document.getElementById("galleryModalTitle");
  const closeBtn = document.getElementById("galleryModalClose");
  const overlay = document.querySelector(".gallery-modal-overlay");

  document.addEventListener("click", function (e) {
    const zoomBtn = e.target.closest(".gallery-zoom-btn");

    if (!zoomBtn) return;

    e.preventDefault();
    e.stopPropagation();

    const imgSrc = zoomBtn.getAttribute("data-img");
    const imgTitle = zoomBtn.getAttribute("data-title") || "Gallery Image";

    if (!modal || !modalImg || !modalTitle) return;

    modalImg.src = imgSrc;
    modalTitle.textContent = imgTitle;
    modal.classList.add("active");
    document.body.style.overflow = "hidden";
  });

  function closeModal() {
    if (!modal || !modalImg) return;

    modal.classList.remove("active");
    document.body.style.overflow = "";
    modalImg.src = "";
  }

  if (closeBtn) {
    closeBtn.addEventListener("click", closeModal);
  }

  if (overlay) {
    overlay.addEventListener("click", closeModal);
  }

  document.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      closeModal();
    }
  });
});



















