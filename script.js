const districtByProvince = {
  "Central": ["Kandy", "Matale", "Nuwara Eliya"],
  "Eastern": ["Batticaloa", "Trincomalee", "Ampara"],
  "Northern": ["Jaffna", "Kilinochchi", "Mannar", "Vavuniya", "Mullaitivu"],
  "North Central": ["Anuradhapura", "Polonnaruwa"],
  "North Western": ["Kurunegala", "Puttalam"],
  "Sabaragamuwa": ["Ratnapura", "Kegalle"],
  "Southern": ["Galle", "Matara", "Hambantota"],
  "Western": ["Colombo", "Gampaha", "Kalutara"],
  "Uva": ["Badulla", "Monaragala"]
};

// Get reference
const provinceSelect = document.getElementById("province");
const districtSelect = document.getElementById("district");

provinceSelect.addEventListener("change", function() {
  districtSelect.innerHTML = '<option value="">--Choose District--</option>';

  const selectedProvince = this.value;
  if (districtByProvince[selectedProvince]) {
    districtByProvince[selectedProvince].forEach(function(district) {
      const option = document.createElement("option");
      option.value = district;
      option.textContent = district;
      districtSelect.appendChild(option);
    });
  }
});
