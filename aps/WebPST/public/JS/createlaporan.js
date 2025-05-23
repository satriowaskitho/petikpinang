const defaultInputValueWA = "Tidak ada chat Whatsapp"; // Set your default value here
const defaultInputValueWC = "Tidak ada chat Web Chat"; 
const defaultInputValueP = "Tidak ada Pengunjung";

document.getElementById("lockedInputWA").value = defaultInputValueWA;
document.getElementById("lockedInputWC").value = defaultInputValueWC;
document.getElementById("lockedInputP").value = defaultInputValueP;

function toggleInputWA(radio) {
  const inputFieldWA = document.getElementById("lockedInputWA");

  if (radio.value == 1) {
    inputFieldWA.value = ""; // Resetting the value when Option 1 is selected
    inputFieldWA.removeAttribute('readonly');
    inputFieldWA.required = true;
  } else {
    inputFieldWA.value = defaultInputValueWA; // Setting default value when Option 2 is selected
    inputFieldWA.setAttribute('readonly', true);
    inputFieldWA.required = false;
  }
}

function toggleInputWC(radio) {
  const inputFieldWC = document.getElementById("lockedInputWC");

  if (radio.value == 1) {
    inputFieldWC.value = ""; // Resetting the value when Option 1 is selected
    inputFieldWC.removeAttribute('readonly');
    inputFieldWC.required = true;
  } else {
    inputFieldWC.value = defaultInputValueWC; // Setting default value when Option 2 is selected
    inputFieldWC.setAttribute('readonly', true);
    inputFieldWC.required = false;
  }
}

function toggleInputP(radio) {
  const inputFieldP = document.getElementById("lockedInputP");

  if (radio.value == 1) {
    inputFieldP.value = ""; // Resetting the value when Option 1 is selected
    inputFieldP.removeAttribute('readonly');
    inputFieldP.required = true;
  } else {
    inputFieldP.value = defaultInputValueP; // Setting default value when Option 2 is selected
    inputFieldP.setAttribute('readonly', true);
    inputFieldP.required = false;
  }
}