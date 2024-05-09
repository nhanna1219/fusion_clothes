const apiUrl =
    "https://vietnam-administrative-division-json-server-swart.vercel.app";
const apiEndpointDistrict = apiUrl + "/district/?idProvince=";
const apiEndpointCommune = apiUrl + "/commune/?idDistrict=";

async function getDistrict(idProvince) {
    const { data: districtList } = await axios.get(
        apiEndpointDistrict + idProvince
    );
    return districtList;
}

async function getCommune(idDistrict) {
    const { data: communeList } = await axios.get(
        apiEndpointCommune + idDistrict
    );
    return communeList;
}

let cityProv = document.getElementById("city-province");
if (cityProv) {
    cityProv.addEventListener("change", async () => {
        const idProvince = document.querySelector("#city-province").value;
        let outputCommune = "<option value='0'>&nbspSelect Ward</option>";
        document.querySelector("#ward-commune").innerHTML = outputCommune;
        const districtList = (await getDistrict(idProvince)) || [];
        let outputDistrict = "<option value='0'>&nbspSelect District</option>";
        for (let i = 0; i < districtList.length; i++) {
            if (districtList[i].idProvince === idProvince) {
                outputDistrict += `<option value='${districtList[i].idDistrict}'>&nbsp${districtList[i].name}</option>`;
            }
        }
        document.querySelector("#district-town").innerHTML = outputDistrict;
    });
}

let districtTown = document.getElementById("district-town");
if (districtTown) {
    districtTown.addEventListener("change", async () => {
        const idDistrict = document.querySelector("#district-town").value;
        const communeList = (await getCommune(idDistrict)) || [];
        let outputCommune = "<option value='0'>&nbspSelect Ward</option>";
        for (let i = 0; i < communeList.length; i++) {
            if (communeList[i].idDistrict === idDistrict) {
                outputCommune += `<option value='${communeList[i].idCommune}'>&nbsp${communeList[i].name}</option>`;
            }
        }
        document.querySelector("#ward-commune").innerHTML = outputCommune;
    });
}
