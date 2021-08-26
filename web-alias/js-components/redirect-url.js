'use strict';

// Builds the URL for the redirect to epic servers' add-to-cart page and redirects.
function redirectUrl(itemCode) {
  const jsonCustomer = localStorage.getItem('rep-data');
  const customer = JSON.parse(jsonCustomer);
  // let countryCode = ''
  const url = `https://1160-web1.vm.epicservers.com/${customer.webAlias}/additem?ItemCode=${itemCode}&Country=${customer.countryCode}&OwnerID=${customer.customerID}`;
  console.log('Add-to-cart redirect for default customer:', url);
}
