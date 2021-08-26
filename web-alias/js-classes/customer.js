'use strict';

// This class defines the product object for the client side.
class Customer {
  constructor(webAlias = 'corporphan', customerName, customerId = 50, countryCode = 'US', language = 'En') {
    this.webAlias = webAlias;
    this.name = customerName;
    this.customerId = customerId;
    this.countryCode = countryCode;
    this.language = language;
  }  
}
