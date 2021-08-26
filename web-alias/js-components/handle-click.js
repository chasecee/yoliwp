'use strict';

// Callback function that handles when a user clicks on the add-to-cart button.
function handleClick(event) {
  event.preventDefault();
  return redirectUrl(event.target.value);
}
