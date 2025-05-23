// Get the modal
var lihatModal = document.getElementById("lihatModal");
var editModal = document.getElementById("editModal");
var hapusModal = document.getElementById("hapusModal");

// Get the button that opens the modal
var lihatBtn = document.getElementById("lihatBtn");
var editBtn = document.getElementById("editBtn");
var hapusBtn = document.getElementById("hapusBtn");

// Get the <span> element that closes the modal
var lihatSilang = document.querySelector(".lihatSilang");


// When the user clicks the button, open the modal
lihatBtn.onclick = function () {
  lihatModal.style.display = "block";
};
editBtn.onclick = function () {
  editModal.style.display = "block";
};
hapusBtn.onclick = function () {
  hapusModal.style.display = "block";
};
// When the user clicks on <span> (x), close the modal
lihatSilang.onclick = function () {
  lihatModal.style.display = "none";
};
editSilang.onclick = function () {
  editModal.style.display = "none";
};

function closeHapusModal() {
  hapusModal.style.display = 'none';
}

function closeEditModal() {
  document.getElementById("adaWA").checked = true;
  document.getElementById("tidakWA").checked = false;

  document.getElementById("adaWC").checked = true;
  document.getElementById("tidakWC").checked = false;

  document.getElementById("adaP").checked = true;
  document.getElementById("tidakP").checked = false;

  document.getElementById("catatan").value = "";

  editModal.style.display = 'none';
}