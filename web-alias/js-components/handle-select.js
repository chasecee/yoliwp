'use strict';

// Receives the value selected in the language and country dropdowns and does something with it; currently, it just console logs it.
function handleSelect(event) {
  event.preventDefault();
  // localStorage.setItem('country-language', [...event]);
  console.log(event.target.value);

}