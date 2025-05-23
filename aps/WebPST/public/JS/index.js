function updateContent() {
  const laporanContent = document.getElementById("laporanContent");
  const presensiElement = document.getElementById("presensiContent");

  if (window.innerWidth < 768) {
    laporanContent.textContent = "L";
    presensiElement.textContent = "P";
  } else {
    laporanContent.textContent = "Laporan";
    presensiElement.textContent = "Presensi";
  }
}
updateContent();

window.addEventListener("resize", () => {
  updateContent(); // Update content whenever the window is resized
});
