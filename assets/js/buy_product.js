const selectors = {
    catalogItem: '.catalog-item',
    modal: {
        form: '#buy-form',
        productId: '#productIdField',
        product: {
            name: '.product-name',
            price: '.product-price',
            quantity: '.product-quantity .quantity-field',
            total: '.product-total'
        },
        additions: {
            item: '.additional-item',
            toggle: '.additional-toggle',
            price: '.additional-price .price',
            qty: '.additional-qty',
            total: '.additional-total'
        }
    },
    finalPrice: '#buy-form .final .total'
}

$(document).on('click', selectors.catalogItem, function() {
    const itemData = $(this).data()
    console.log('data', itemData)
})
