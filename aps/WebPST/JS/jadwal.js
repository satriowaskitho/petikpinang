var jadwalBuatModal = document.getElementById("jadwalBuatModal");
var judulBuatBtn = document.getElementById("judulBuatBtn");

judulBuatBtn.onclick = function () {
  jadwalBuatModal.style.display = "block";
};

function closeBuatModal() {
  jadwalBuatModal.style.display = "none";
}