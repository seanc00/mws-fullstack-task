document.addEventListener('DOMContentLoaded', function() {

    // Show password functionality - eye icon toggle
    if(document.getElementById("togglePassword") && document.getElementById("password")) {
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
    }

    // Mobile Dropdown Functionality
    if (document.querySelector('.mobile-dropdown-cont > .dashboard-btn') && document.querySelector('.mobile-dropdown-cont')) {
        const mobileDashboardBtn = document.querySelector('.mobile-dropdown-cont > .dashboard-btn');
        const mobileMenu = document.querySelector('.mobile-dropdown-cont');
    
        mobileDashboardBtn.addEventListener("click", function() {
            // console.log("Dashboard btn clicked");
    
            if (mobileMenu.classList.contains('closed')) {
                mobileMenu.classList.remove('closed');
            } else if (!mobileMenu.classList.contains('closed')) {
                mobileMenu.classList.add('closed');
            }
        });
    }

    // upload File Modal Popup Functionality
    if (document.querySelector('.upload-close-btn') && document.getElementById('uploadFileBtn')) {
        const closeModalBtn =  document.querySelector('.upload-close-btn');
        const openModalBtn = document.getElementById('uploadFileBtn');
        const modalPopup = document.querySelector('.modal');

        openModalBtn.addEventListener('click', () => {
            if (!modalPopup.classList.contains('open')) {
                modalPopup.classList.add('open');
            }
        });

        closeModalBtn.addEventListener('click', () => {
            if (modalPopup.classList.contains('open')) {
                modalPopup.classList.remove('open');
            }
        });
    }

    // Validate form
    function validateForm() {
        const nameField = document.forms["uploadForm"]["document_name"].value;
        const nameFieldInput = document.getElementById('document_name');

        if (nameField == "") {
            alert("Document name field is empty.");
            nameFieldInput.style.borderColor = 'red';
        }
    }
});