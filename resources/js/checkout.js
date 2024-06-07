document.addEventListener("DOMContentLoaded", function () {
    const apiUrl = "https://vietnam-administrative-division-json-server-swart.vercel.app";
    const apiEndpointDistrict = apiUrl + "/district/?idProvince=";
    const apiEndpointCommune = apiUrl + "/commune/?idDistrict=";

    async function fetchData(url) {
        try {
            const response = await axios.get(url);
            return response.data || [];
        } catch (error) {
            console.error('Error fetching data:', error);
            return [];
        }
    }

    async function updateDistricts(idProvince) {
        const districtList = await fetchData(apiEndpointDistrict + idProvince);
        const districtDropdown = document.querySelector("#district-town");
        districtDropdown.innerHTML = "<option value='0'>Select District</option>";
        districtDropdown.innerHTML += districtList.map(district =>
            `<option value='${district.idDistrict}'>${district.name}</option>`
        ).join('');
        districtDropdown.disabled = false; // Re-enable dropdown after update
    }

    async function updateCommunes(idDistrict) {
        const communeList = await fetchData(apiEndpointCommune + idDistrict);
        const communeDropdown = document.querySelector("#ward-commune");
        communeDropdown.innerHTML = "<option value='0'>Select Ward</option>";
        communeDropdown.innerHTML += communeList.map(commune =>
            `<option value='${commune.idCommune}'>${commune.name}</option>`
        ).join('');
        communeDropdown.disabled = false; // Re-enable dropdown after update
    }

    document.getElementById("city-province")?.addEventListener("change", async function () {
        const idProvince = this.value;
        document.getElementById("district-town").disabled = true; // Disable dropdown during loading
        document.getElementById("ward-commune").innerHTML = "<option value='0'>&nbspSelect Ward</option>";
        await updateDistricts(idProvince);
    });

    document.getElementById("district-town")?.addEventListener("change", async function () {
        const idDistrict = this.value;
        document.getElementById("ward-commune").disabled = true; // Disable dropdown during loading
        await updateCommunes(idDistrict);
    });

    const addressRadios = document.querySelectorAll('input[name="address"]');
    const newAddressForm = document.getElementById('new-address-form');

    function toggleNewAddressForm() {
        const isNewAddress = document.getElementById('newAddress')?.checked;
        newAddressForm?.querySelectorAll('input, select').forEach(field => {
            if (isNewAddress) {
                field.setAttribute('required', true);
            } else {
                field.removeAttribute('required');
            }
        });
        if (newAddressForm) newAddressForm.style.display = isNewAddress ? 'block' : 'none';
    }

    const existingAddressRadio = document.querySelector('input[name="address"]:checked');
    if (newAddressForm){
        if (existingAddressRadio && existingAddressRadio.value !== 'new') {
            newAddressForm.style.display = 'none';
        } else {
            newAddressForm.style.display = 'block';
        }
    }
    toggleNewAddressForm();

    addressRadios?.forEach(radio => {
        radio.addEventListener('change', toggleNewAddressForm);
    });

    // Payment method button
    document.querySelectorAll('.payment-method-btn')?.forEach(button => {
        button.addEventListener('click', function(e) {
            document.getElementById('payment_method').value = e.target.value;
        });
    });

    // Checkout submit
    document.getElementById('checkout-form')?.addEventListener('submit', async function (event) {
        event.preventDefault();
        Swal.fire({
            text: "Processing, please wait.. 🎏",
            icon: "info",
            allowOutsideClick: false,
            showConfirmButton: false,
            willOpen: async () => {
                Swal.showLoading();
                const formData = new FormData(this);
                const firstName = document.getElementById('first-name').value;
                const lastName = document.getElementById('last-name').value;
                const citySelect = document.getElementById('city-province');
                const districtSelect = document.getElementById('district-town');
                const wardSelect = document.getElementById('ward-commune');
                const addressLine1 = document.getElementById('address-line1').value;
                const addressLine2 = document.getElementById('address-line2').value;
                const phone = document.getElementById('phone').value;
                const paymentMethod = document.getElementById('payment_method').value;

                const cityText = citySelect.options[citySelect.selectedIndex].text;
                const districtText = districtSelect.options[districtSelect.selectedIndex].text;
                const wardText = wardSelect.options[wardSelect.selectedIndex].text;

                formData.set('first_name', firstName);
                formData.set('last_name', lastName);
                formData.set('city', cityText);
                formData.set('district', districtText);
                formData.set('ward', wardText);
                formData.set('address_line1', addressLine1);
                formData.set('address_line2', addressLine2);
                formData.set('payment_method', paymentMethod);
                formData.set('phone', phone);

                try {
                    const response = await fetch('/checkout/place-order', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                        },
                        body: formData
                    });

                    if (!response.ok) {
                        Swal.fire('Opps..', 'The system is currently issue an problem, please try checkout again when posible.', 'error');
                        return;
                    }

                    const data = await response.json();
                    if (data.success) {
                        const redirectUrl = new URL(data.redirect_url);
                        if (!data.redirect_url.includes('test-payment')){
                            if (redirectUrl)
                                redirectUrl.searchParams.append('order_id', data.order_id);
                        }

                        window.location.href = redirectUrl.toString();
                    } else {
                        Swal.fire('Oops..', 'Order creation failed. Please try again.', 'error');
                    }
                } catch (error) {
                    console.error('Errors in checkout: ', error);
                    Swal.fire('Opps..', 'The system is currently issue an problem, please try checkout again when posible.', 'error');
                }
            }
        })
    });

});
