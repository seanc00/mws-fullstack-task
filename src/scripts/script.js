document.addEventListener('DOMContentLoaded', function() {
    const togglePassword = document.getElementById("togglePassword");
    const password = document.getElementById("password");

    togglePassword.addEventListener("click", function () {
        // toggle the type attribute
        const type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        
        // toggle the icon
        if (this.classList.contains("bi-eye-slash")) {
            this.classList.remove("bi-eye-slash");
            this.classList.add("bi-eye");
        } else {
            this.classList.add("bi-eye-slash");
            this.classList.remove("bi-eye");
        }
    });
});