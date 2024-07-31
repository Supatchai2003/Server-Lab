async function fetchProducts() {
    const clothesResponse = await fetch('clothes.json');
    const electronicsResponse = await fetch('electronics.json');
    const clothesData = await clothesResponse.json();
    const electronicsData = await electronicsResponse.json();
    return { clothes: clothesData.clothes, electronics: electronicsData.electronics };
}

async function displayProducts() {
    const { clothes, electronics } = await fetchProducts();

    const productList = document.getElementById('product-list');
    const electronicList = document.getElementById('electronic-list');

    clothes.forEach(product => {
        const productCard = document.createElement('div');
        productCard.className = 'product-card';
        productCard.innerHTML = `
            <h3>${product.name}</h3>
            <p>${product.description}</p>
            <button onclick="viewProduct('${product.code}')">รายละเอียดสินค้า</button>
        `;
        productList.appendChild(productCard);
    });

    electronics.forEach(electronic => {
        const electronicCard = document.createElement('div');
        electronicCard.className = 'electronic-card';
        electronicCard.innerHTML = `
            <h3>${electronic.name}</h3>
            <p>${electronic.description}</p>
            <button onclick="viewProduct('${electronic.code}')">รายละเอียดสินค้า</button>
        `;
        electronicList.appendChild(electronicCard);
    });
}

async function viewProduct(code) {
    const { clothes, electronics } = await fetchProducts();

    let product = clothes.find(p => p.code === code) || electronics.find(e => e.code === code);
    const productDetail = document.getElementById('product-detail');
    if (product) {
        productDetail.innerHTML = `
            <h3>${product.name}</h3>
            <img src="${product.imageUrl}" alt="${product.name}" class="product-image-large">
            <p>${product.description}</p>
            ${product.size ? `<p>Size: ${product.size.join(', ')}</p>` : ''}
            ${product.color ? `<p>Color: ${product.color.join(', ')}</p>` : ''}
            ${product.material ? `<p>Material: ${product.material}</p>` : ''}
            ${product.specs ? `<p>Specs: ${product.specs}</p>` : ''}
            ${product.stock ? `<p>Stock: ${product.stock} ตัว</p>` : ''}
        `;
    } else {
        productDetail.innerHTML = '<p>ไม่พบข้อมูลสินค้า</p>';
    }
}

window.onload = displayProducts;
