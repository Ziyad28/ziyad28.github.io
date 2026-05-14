const menuToggle = document.getElementById("menuToggle");
const navMenu = document.getElementById("navMenu");

if (menuToggle && navMenu) {
  menuToggle.addEventListener("click", () => {
    navMenu.classList.toggle("active");
    menuToggle.classList.toggle("active");
  });
}

const contactForm = document.getElementById("contactForm");
const formMessage = document.getElementById("formMessage");

if (contactForm && formMessage) {
  contactForm.addEventListener("submit", (e) => {
    const name = contactForm.querySelector("input[name='name']").value.trim();
    const email = contactForm.querySelector("input[name='email']").value.trim();
    const message = contactForm.querySelector("textarea[name='message']").value.trim();

    if (name === "" || email === "" || message === "") {
      e.preventDefault();
      formMessage.style.color = "red";
      formMessage.textContent = "Please fill in all fields.";
      return;
    }

    const submitBtn = contactForm.querySelector("button");
    submitBtn.disabled = true;
    submitBtn.textContent = "Sending...";
  });
}