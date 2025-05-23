var hapusModal = document.getElementById("hapusModal");
var editModal = document.getElementById("editModal");

editBtn.onclick = function () {
  editModal.style.display = "block";
};
function closeEditModal() {
  editModal.style.display = 'none';
}

hapusBtn.onclick = function () {
  hapusModal.style.display = "block";
};
function closeHapusModal() {
  hapusModal.style.display = 'none';
}
