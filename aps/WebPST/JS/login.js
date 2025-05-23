function showPass() {
  var mata = document.getElementById("mata");
  var x = document.getElementById("password");

  if (mata.classList.contains("bi-eye-slash")) {
    mata.classList.remove('bi-eye-slash');
    mata.classList.add('bi-eye');
    x.type = "text";
  } else {
    mata.classList.remove('bi-eye');
    mata.classList.add('bi-eye-slash');
    x.type = "password";
  }
}