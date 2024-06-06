document.addEventListener("DOMContentLoaded", function () {
    function displayDeleteSeletedButton() {
        const selectedItems = document.querySelectorAll('.row-checkbox:checked');
        const deleteSeletedItemsbtn = document.getElementById('deleteSelected');
        if (deleteSeletedItemsbtn) {
            if (selectedItems.length) {
                deleteSeletedItemsbtn.classList.toggle('hidden', false);
            } else {
                deleteSeletedItemsbtn.classList.toggle('hidden', true);
            }
        }
    }
    const itemCheckBox = () => {
        const checkAll = document.getElementById('checkAll');
        const checkboxes = document.querySelectorAll('.row-checkbox');

        const updateCartItem = async (checkbox) => {
            const row = checkbox.closest('tr');
            const rowId = row.dataset.rowId;
            const isChecked = checkbox.checked;

            try {
                const response = await fetch('/cart/update-selected-item', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                    body: JSON.stringify({ rowId, selected: isChecked })
                });

                const data = await response.json();
                if (data && data.success) {
                    let newRowId = data.rowId;
                    row.setAttribute('data-row-id', newRowId);
                }
                console.log('Cart updated:', data);
            } catch (error) {
                console.error('Error updating cart:', error);
            }
        };

        // Event listener for the "Check All" checkbox
        checkAll?.addEventListener('change', async (e) => {
            Swal.fire({
                text: "Processing..🤹‍♂️",
                showConfirmButton: false,
                allowOutsideClick: false,
                width: "400px",
                willOpen: async () => {
                    Swal.showLoading();
                    const deleteSeletedItemsbtn = document.getElementById('deleteSelected');
                    if (checkAll.checked) {
                        deleteSeletedItemsbtn.classList.toggle('hidden', false);
                    }
                    else {
                        deleteSeletedItemsbtn.classList.toggle('hidden', true);
                    }
                    const checkboxes = document.querySelectorAll('.row-checkbox');
                    const updatePromises = Array.from(checkboxes).map(checkbox => {
                        checkbox.checked = checkAll.checked;
                        return updateCartItem(checkbox);
                    });
                    updateSubtotalAndTotal();
                    await Promise.all(updatePromises);
                    Swal.close();
                }
            })
        });

        // Event listener for each individual row checkbox
        checkboxes?.forEach(checkbox => {
            checkbox.addEventListener('change', async (e) => {
                Swal.fire({
                    text: "Processing..🤹‍♂️",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    width: "400px",
                    willOpen: async () => {
                        Swal.showLoading();
                        displayDeleteSeletedButton();
                        if (!checkbox.checked) {
                            checkAll.checked = false;
                        } else {
                            const checkboxes = document.querySelectorAll('.row-checkbox');
                            const allChecked = Array.from(checkboxes).every(chk => chk.checked);
                            checkAll.checked = allChecked;
                        }
                        updateSubtotalAndTotal(e.target.closest('tr'));
                        await updateCartItem(checkbox);
                        Swal.close();
                    }
                })
            });
        });
        const updateCheckAll = (() => {
            const checkboxes = document.querySelectorAll('.row-checkbox');
            const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
            if (checkAll) checkAll.checked = allChecked;
        })();
    };

    const updateSubtotalAndTotal = (row) => {
        let quantityInput, priceElement, subtotalElement;
        if (row) {
            quantityInput = row.querySelector(".quantity-input");
            priceElement = row.querySelector(".product-price");
            subtotalElement = row.querySelector(".sub-total");

            const quantity = parseInt(quantityInput.value);
            const productPrice = parseFloat(priceElement.textContent.slice(1));
            const subtotal = productPrice * quantity;

            subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
        }

        const totalElement = document.querySelector(".total_price");
        const quantityItemElement = document.querySelector(".total_items");
        const totalSubtotalElement = document.querySelector(".total-sub-total");

        let totalQuantity = 0;
        let totalSubtotal = 0;

        document.querySelectorAll('.cart-table tbody tr').forEach(row => {
            const checkbox = row.querySelector('.row-checkbox');
            if (checkbox.checked) {
                const input = row.querySelector('.quantity-input');
                const subTotal = row.querySelector('.sub-total');

                if (input && subTotal) {
                    totalQuantity += parseInt(input.value) || 0;
                    totalSubtotal += parseFloat(subTotal.textContent.slice(1)) || 0;
                }
            }
        });

        quantityItemElement.textContent = totalQuantity;
        totalSubtotalElement.textContent = `$${totalSubtotal.toFixed(2)}`;

        const shippingFee = 30;
        const taxFee = 0.1;
        const total = totalSubtotal + shippingFee + (totalSubtotal * taxFee);

        totalElement.textContent = `$${total.toFixed(2)}`;
    };

    const deleteFromCart = async (rowId, tempQuantity) => {
        const response = await fetch(`/cart/delete/${rowId}`, {
            method: "DELETE",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
        })
        const responseJson = await response.json();
        if (responseJson.success) {
            let cartCount = document.getElementById('cart-count');
            cartCount.innerText = parseInt(cartCount.innerText) - tempQuantity;
            Swal.fire({
                title: "Deleted!",
                text: "You can continue shopping now 📈",
                icon: "success",
                preConfirm: () => {
                    if (document.querySelector('tbody').rows.length === 0) {
                        location.reload();
                    }
                }
            });
        } else {
            Swal.fire({
                title: "Error",
                icon: "error",
                text: "There was error when trying to delete the item, please try again!"
            })
        }
    }

    const deleteSeletedItem = async () => {
        const deleteSeletedItemsbtn = document.getElementById('deleteSelected');
        deleteSeletedItemsbtn?.addEventListener('click', () => {
            const selectedItems = document.querySelectorAll('.row-checkbox:checked');
            const rowIds = Array.from(selectedItems).map(item => item.closest('tr').getAttribute('data-row-id'));
            if (rowIds.length > 0) {
                Swal.fire({
                    title: "Warning!",
                    icon: 'warning',
                    text: 'Are you sure you want to delete these items?',
                    showCancelButton: true,
                    cancelButtonText: 'No, keep it',
                    confirmButtonText: 'Yes, delete it!',
                    preConfirm: async () => {
                        try {
                            Swal.showLoading();
                            const response = await fetch('/cart/delete-cart-items', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken
                                },
                                body: JSON.stringify({ rowIds })
                            })
                            const data = await response.json();
                            if (data.success) {
                                let cartCount = document.getElementById('cart-count');
                                cartCount.innerText = parseInt(cartCount.innerText) - rowIds.length;
                                rowIds.forEach(id => {
                                    document.querySelector(`tr[data-row-id="${id}"]`).remove();
                                });
                                Swal.fire({
                                    title: "Deleted!",
                                    text: "You can continue shopping now 📈",
                                    icon: "success",
                                    preConfirm: () => {
                                        if (document.querySelector('tbody').rows.length === 0) {
                                            location.reload();
                                        }
                                    }
                                });
                            } else {
                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Error when trying to delete the seleted items, please try again later..',
                                    icon: 'error'
                                });
                                console.error(data);
                            }
                        } catch (error) {
                            console.log("Error in deleteSeletedItem: ", error);
                            Swal.fire({
                                title: 'Error!',
                                text: 'Error when trying to delete the seleted items, please try again later..',
                                icon: 'error'
                            });
                        }
                    }
                })
            }
        });
    }

    document.querySelectorAll(".cart-table tbody tr").forEach(row => {
        const incrementButton = row.querySelector(".increment-button");
        const decrementButton = row.querySelector(".decrement-button");
        const deleteButton = row.querySelector('.remove-button');

        incrementButton.addEventListener("click", (e) => {
            const row = e.target.closest('tr');
            const checkbox = row.querySelector('.row-checkbox');
            const quantityInput = row.querySelector(".quantity-input");
            let quantity = parseInt(quantityInput.value) || 1;
            quantity++;
            quantityInput.value = quantity;

            if (checkbox.checked) {
                updateSubtotalAndTotal(row);
            }
        });

        decrementButton.addEventListener("click", (e) => {
            const row = e.target.closest('tr');
            const checkbox = row.querySelector('.row-checkbox');
            const quantityInput = row.querySelector(".quantity-input");
            let quantity = parseInt(quantityInput.value) || 1;
            if (quantity > 1) {
                quantity--;
                quantityInput.value = quantity;
            }

            if (checkbox.checked) {
                updateSubtotalAndTotal(row);
            }
        });

        deleteButton.addEventListener("click", (event) => {
            Swal.fire({
                title: "Warning",
                icon: "warning",
                text: "Are you sure you want to delete this item from cart?",
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, keep it'
            }).then(async (result) => {
                if (result.isConfirmed) {
                    const quantityInput = row.querySelector(".quantity-input");
                    const subTotal = row.querySelector('.sub-total');
                    let tempQuantity = parseInt(quantityInput.value);
                    subTotal.innerText = '$0';
                    quantityInput.value = 0;
                    updateSubtotalAndTotal(row);
                    const cartRowId = event.target.closest('tr').getAttribute('data-row-id');
                    row.remove();
                    Swal.fire({
                        text: 'Processing.. 👨‍🦽',
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        width: "400px",
                        willOpen: async () => {
                            Swal.showLoading();
                            await deleteFromCart(cartRowId, tempQuantity);
                        }
                    });
                }
            });
        });
    });

    function checkout() {
        const checkoutBtn = document.getElementById('checkout-btn');
        checkoutBtn?.addEventListener('click', async function (btn) {
            const checkboxes = document.querySelectorAll('.row-checkbox');
            const checkedCheckboxes = Array.from(checkboxes).filter(checkbox => checkbox.checked);
            if (checkedCheckboxes.length) {
                Swal.fire({
                    text: "Processing..💅",
                    showConfirmButton: false,
                    allowOutsideClick: false,
                    width: "400px",
                    willOpen: async () => {
                        Swal.showLoading();
                        const rows = document.querySelectorAll('.cart-table tbody tr');
                        const cartUpdates = Array.from(rows).map(row => {
                            const rowId = row.dataset.rowId;
                            const quantity = row.querySelector('.quantity-input').value;
                            return { rowId, quantity };
                        });
                        try {
                            const response = await fetch('/cart/update-quantities', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': csrfToken // Ensure you have a CSRF token available
                                },
                                body: JSON.stringify(cartUpdates)
                            });
                            const result = await response.json();
                            if (result.success) {
                                let cartCount = document.getElementById('cart-count');
                                cartCount.innerText = result.count;
                                location.href = "http://127.0.0.1:8000/checkout";
                            } else {
                                console.error('Failed to update cart');
                            }
                        } catch (error) {
                            console.error('Error during checkout:', error);
                            Swal.fire('Error!', 'There was a problem updating your cart.', 'error');
                        }
                    }
                });
            }
            else {
                Swal.fire('Error!', 'Please select at least one item before checking out.', 'error');
            }

        });
    }

    itemCheckBox();
    displayDeleteSeletedButton();
    deleteSeletedItem();
    checkout();
});
