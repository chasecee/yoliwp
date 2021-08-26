'use strict';

// Renders the language and countries dropdown menus on a repsite.
function renderLanguageDropdown() {
  const dropdownParent = document.getElementById('repsite-banner');
  const dropdownLabel = document.createElement('label');
  dropdownLabel.setAttribute('for', 'languages');
  dropdownLabel.addEventListener('input', handleSelect);
  const dropdown = document.createElement('select');
  dropdown.setAttribute('name', 'languages');
  dropdownLabel.appendChild(dropdown);
  dropdownParent.appendChild(dropdownLabel);

  const serverUrl = `http://localhost:3001/api/languages`;
  axios.get(serverUrl)
    .then(res => {
      res.data.forEach(item => {
        const selection = document.createElement('option');
        selection.setAttribute('value', item.languageCode);
        selection.textContent = item.languageCode;
        dropdown.appendChild(selection);
      })
    })
}

function renderCountriesDropdown() {
  const dropdownParent = document.getElementById('repsite-banner');
  const dropdownLabel = document.createElement('label');
  dropdownLabel.setAttribute('for', 'countries');
  dropdownLabel.addEventListener('input', handleSelect);
  const dropdown = document.createElement('select');
  dropdown.setAttribute('name', 'countries');
  const placeholder = document.createElement('option');
  placeholder.setAttribute('placeholder', 'Country');
  placeholder.textContent = 'Country';
  dropdown.appendChild(placeholder);
  dropdownLabel.appendChild(dropdown);
  dropdownParent.appendChild(dropdownLabel);

  const serverUrl = 'http://localhost:3001/api/countries';
  axios.get(serverUrl)
    .then(res => {
      res.data.forEach(item => {
        const selection = document.createElement('option');
        selection.setAttribute('value', item.countryName);
        selection.textContent = item.countryName;
        dropdown.appendChild(selection);
      })
    })
}
