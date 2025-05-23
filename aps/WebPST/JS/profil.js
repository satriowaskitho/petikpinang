var pengawasEditModal = document.getElementById("pengawasEditModal");
var pengawasEditBtn = document.getElementById("pengawasEditBtn");
var hapusModal = document.getElementById("hapusModal");
var hapusBtn = document.getElementById("hapusBtn");

hapusBtn.onclick = function () {
  hapusModal.style.display = "block";
};
function closeHapusModal() {
  hapusModal.style.display = 'none';
}

pengawasEditBtn.onclick = function () {
  pengawasEditModal.style.display = "block";
};

function closeBuatModal() {
  pengawasEditModal.style.display = "none";
}

function showPW() {
  var divtutup = document.getElementById("divtutup");
  var divbuka = document.getElementById("divbuka");

  if (divbuka.hidden) {
    divtutup.hidden = true;
    divbuka.hidden = false;
  } else {
    divtutup.hidden = false;
    divbuka.hidden = true;
  }
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