'use strict';

// Render the products and add-to-cart button.
function renderProducts(url) {
  const productParent = document.getElementById('products')
  const serverUrl = 'http://localhost:80/api/products/us/lk-yespas-cn-us/en-us';
  // Call the products API 
  axios.get(serverUrl)
    .then(res => {
      const products = [res.data];
      console.log(products);
      products.forEach(product => {
        const item = new Product(product.groupDescription, product.itemDescription, product.itemCode, product.price.retailPriceFmtd, product.price.autoshipPriceFmtd, product.price.currencyCode);

        // const servingSize = document.createElement('h5');
        const productName = document.createElement('h2');
        const productDescription = document.createElement('p');
        const addToCartButton = document.createElement('button');
        const productDiv = document.createElement('div');
        const priceAndDiscount = document.createElement('p');
        
        productDiv.setAttribute('class', 'products');
        productDiv.setAttribute('name', item.name);
        productDiv.setAttribute('value', item.name);
        addToCartButton.setAttribute('id', item.itemCode);
        addToCartButton.setAttribute('value', item.itemCode);
        priceAndDiscount.setAttribute('id', 'prices');

        // servingSize.textContent = item.servingSize;
        // productDiv.appendChild(servingSize);

        productName.textContent = item.name;
        productDiv.appendChild(productName);

        productDescription.textContent = item.description;
        productDiv.appendChild(productDescription);

        addToCartButton.textContent = `Add ${item.name} to your cart`;
        addToCartButton.addEventListener('click', handleClick);
        productDiv.appendChild(addToCartButton);

        priceAndDiscount.textContent = `Retail: ${item.price} | Discounted: ${item.discount}`;
        productDiv.appendChild(priceAndDiscount);

        productParent.appendChild(productDiv);
      })
    })
    .catch(err => { 
      console.error('Could not render the product.', err)
    });
}
