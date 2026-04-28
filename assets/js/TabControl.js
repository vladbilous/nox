// Tab switcher logic without nanostores dependency
document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll("[data-filter]");
  const contents = document.querySelectorAll(".tab-content");

  buttons.forEach(btn => {
    btn.addEventListener("click", (e) => {
      // Deactivate all
      buttons.forEach(b => {
        b.setAttribute("aria-pressed", "false");
        b.classList.remove("active");
        b.classList.remove("bg-foreground/10", "text-foreground");
      });
      // Activate clicked
      const target = e.currentTarget;
      target.setAttribute("aria-pressed", "true");
      target.classList.add("active");
      target.classList.add("bg-foreground/10", "text-foreground");

      // Show the matching content block
      const filter = target.getAttribute("data-filter");
      contents.forEach(content => {
        if (content.id === `tab-${filter}`) {
            content.classList.remove("hidden");
            content.classList.add("grid");
        } else {
            content.classList.add("hidden");
            content.classList.remove("grid");
        }
      });
    });
  });

  // Initialize first tab as active
  if (buttons.length > 0) {
      buttons[0].click();
  }
});
