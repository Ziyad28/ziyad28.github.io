const menuToggle = document.getElementById("menuToggle");
const navMenu = document.getElementById("navMenu");

menuToggle.addEventListener("click", () => {
  navMenu.classList.toggle("active");
});


const contactForm = document.getElementById("contactForm");
const formMessage = document.getElementById("formMessage");

contactForm.addEventListener("submit", async (e) => {
  e.preventDefault();

  const formData = new FormData(contactForm);

  const submitBtn = contactForm.querySelector("button");
  submitBtn.disabled = true;
  submitBtn.textContent = "Sending...";

  try {
    const response = await fetch(contactForm.action, {
      method: "POST",
      body: formData,
      headers: {
        Accept: "application/json"
      }
    });

    if (response.ok) {
      formMessage.style.color = "green";
      formMessage.textContent = "Message sent successfully!";
      contactForm.reset();
    } else {
      formMessage.style.color = "red";
      formMessage.textContent = "Failed to send. Try again.";
    }

  } catch (error) {
    formMessage.style.color = "red";
    formMessage.textContent = "Error sending message.";
  }

  submitBtn.disabled = false;
  submitBtn.textContent = "Send Message";
});