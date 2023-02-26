


let password = document.querySelector("form input.pwd");
let eyeButton = document.querySelector(".eyeButton");

const showPwd = (e) => {
	let className = e.classList[2]; 
	if (className == "fa-eye-slash") {
		eyeButton.classList.remove(className);
		eyeButton.classList.add("fa-eye");
		password.type = "text";
	} else {
		eyeButton.classList.remove(className);
		eyeButton.classList.add("fa-eye-slash");
		password.type = "password";
	}
}