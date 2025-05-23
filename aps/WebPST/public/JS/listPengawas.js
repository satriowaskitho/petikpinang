var pengawasBuatModal = document.getElementById("pengawasBuatModal");
var pengawasBuatBtn = document.getElementById("pengawasBuatBtn");
var lihatSilang = document.querySelector(".lihatSilang");

pengawasBuatBtn.onclick = function () {
  pengawasBuatModal.style.display = "block";
};

function closeBuatModal() {
  pengawasBuatModal.style.display = "none";
}

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