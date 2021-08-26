'use strict';

// This class defines the product object for the client side.
class Product {
  constructor(name, description, itemCode, price, discountedPrice, currencyCode) {
    this.name = name;
    this.description = description;
    // this.servingSize = servingSize;
    this.itemCode = itemCode;
    this.price = price;
    this.discount = discountedPrice;
    this.currencyType = currencyCode;
    // this.currency = currencySymbol;
  }  
}
