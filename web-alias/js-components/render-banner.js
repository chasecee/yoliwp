'use strict';

function renderRepsiteBanner(formattedWebAlias) {
  console.log('3: the capitalized web alias in renderRepsiteBanner:', formattedWebAlias);;
  const repJson = localStorage.getItem('rep-data');
  const rep = JSON.parse(repJson);
  const repsiteBannerParent = document.getElementById('header');
  console.log({rep});
  if (rep.webAlias !== 'Corporphan') {
    const repsiteBannerDiv = document.createElement('div');
    const repsiteBannerElement = document.createElement('h5');
    repsiteBannerDiv.setAttribute('id', 'repsite-banner');
    repsiteBannerElement.setAttribute('id', 'webAlias');
    repsiteBannerElement.textContent = `Welcome to ${formattedWebAlias}'s experience.`;
    repsiteBannerDiv.appendChild(repsiteBannerElement);
    repsiteBannerParent.appendChild(repsiteBannerDiv);

    renderLanguageDropdown();
    renderCountriesDropdown();
  }
}
