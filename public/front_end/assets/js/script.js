


function togglePasswordVisibility(inputId, toggleId) {
    const inputElement = document.getElementById(inputId);
    const toggleElement = document.getElementById(toggleId);

    if (inputElement.type === "password") {
        inputElement.type = "text";
        toggleElement.setAttribute("name", "eye-off-outline");
    } else {
        inputElement.type = "password";
        toggleElement.setAttribute("name", "eye-outline");
    }
}


const inputs = document.querySelectorAll('.input input');

inputs.forEach((input) => {
    input.addEventListener('focus', () => {
        input.previousElementSibling.classList.add('clicked');
    });

    input.addEventListener('blur', () => {
        if (input.value === '') {
            input.previousElementSibling.classList.remove('clicked');
        }
    });
});


