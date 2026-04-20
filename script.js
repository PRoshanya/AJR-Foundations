const districtByProvince = {
    "Central": ["Kandy","Matale","Nuwara Eliya"]
};

//Get reference
const provinceSelect = document.getElementById("province");
const districtSelect = document.getElementById("district");

provinceSelect.addEventListeners("change",function(){
    districtSelect.innerHTML = '<option value = "">--Choose District--</option>';

    const selectedProvince = this.value;
    if(districtByProvince[selectedProvince]){
        distrcitsByProvince[selectedProvince].forEach(function(district){
            const option = document.createElement("option");
            option.value = district;
            option.textContent = district;
            districtSelect.appendChild(option);


        });
    }

});