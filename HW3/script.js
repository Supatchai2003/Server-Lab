function basket() {
    const products = [];
    const customerId = prompt("กรุณากรอกรหัสลูกค้า:");
    
    return function(productId, quantity) {
        if (products.length < 3) {
            products.push({ customerId, productId, quantity });
        }
        console.log(`รหัสลูกค้า ${customerId} - ลำดับรายการ ${products.length} - รหัสสินค้า ${productId}, จำนวนสินค้า = ${quantity} ชิ้น`);
    }
}

const addToBasket = basket();
addToBasket(23, 1);
addToBasket(17, 2);
addToBasket(2, 3);