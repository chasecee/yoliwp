'use strict';

// Just playing with pinging APIs.

/*
1. User goes to yoli.com/superman.
2. document.address pull address and get webAlias
3. Append alias to api http address.
4. Make the get call.
5. Receive response.
*/
// /api/Product/us/lk-yespas-cn-us/en-us

function getApi(req, res) {
  const url1 = 'http://localhost:80/api/products/us/lk-yespas-cn-us/en-us'; //
  const url2 = 'http://localhost:80/api/alias/superman'; // Returning a customer object. (A bad extension returns corporphan as required.)
  axios.get(url1)
    .then(res => {
      const customer = JSON.stringify(res.data);
      console.log({ customer });
      localStorage.setItem('customer-data', customer);
    })
}

getApi();