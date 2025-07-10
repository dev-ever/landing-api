  // Lenis scroll suave
  const lenis = new Lenis();
  function raf(time) {
    lenis.raf(time)
    requestAnimationFrame(raf)
  }
  requestAnimationFrame(raf)

  // GSAP Hero animación
  gsap.timeline()
    .to(".hero-content h1", { opacity: 1, y: 0, duration: 1 })
    .to(".hero-content p", { opacity: 1, y: 0, duration: 1 }, "-=0.5")
    .to(".cta-button", { opacity: 1, y: 0, duration: 1 }, "-=0.5")

  // ScrollTrigger: animar secciones al hacer scroll
  gsap.from(".nosotros-text", {
    scrollTrigger: {
      trigger: ".nosotros-text",
      start: "top 80%",
    },
    opacity: 0,
    x: -100,
    duration: 1
  });

  gsap.from(".nosotros-image", {
    scrollTrigger: {
      trigger: ".nosotros-image",
      start: "top 80%",
    },
    opacity: 0,
    x: 100,
    duration: 1
  });