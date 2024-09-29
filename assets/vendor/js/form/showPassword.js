export const showPassword = () => {
  const togglePasswords = document.querySelectorAll(".togglePassword");
  const passwordInputs = document.querySelectorAll(".password");
  
  togglePasswords.forEach((togglePassword, index) => {
    const passwordInput = passwordInputs[index]; 
    const iconShow = togglePassword.querySelector(".iconShow");
    const iconHide = togglePassword.querySelector(".iconHide");

    // Cek jika event listener sudah ditambahkan
    if (!togglePassword.dataset.listenerAdded) {
      togglePassword.dataset.listenerAdded = "true";

      // Toggle function
      const toggle = () => {
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
        passwordInput.setAttribute("type", type);

        // Ubah ikon
        if (type === "text") {
          iconShow.classList.add("hidden");
          iconHide.classList.remove("hidden");
        } else {
          iconShow.classList.remove("hidden");
          iconHide.classList.add("hidden");
        }
      };

      // Assign click event directly
      togglePassword.addEventListener("click", toggle);
    }
  });
};
