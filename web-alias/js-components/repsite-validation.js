'use strict';

// If repsite is entered (e.g., yoli.com/webalias), this function pulls the webAlias out of the URL, validates it via the API and, if valid, stores it in session storage with the returned customerId and countryCode and returns the homepage--its URL reformatted not to show the web alias(?)--with products rendered dynamically and the welcome banner of the repsite showing; else it rediects to the homepage and sets the rep as corporphan (id = 50).

function repsiteValidation(webAlias) {
  // console.log('2: web alias in repsiteValidation:', webAlias);
  
  const baseUrl = 'http://localhost/api/alias/';
  if (!webAlias) return renderProducts();

  // Capitalize the first letter of the web alias for rendering.
  const firstLetter = webAlias[0].toUpperCase();
  const webAliasArray = webAlias.split('');
  webAliasArray.splice(0, 1, firstLetter);
  const capitalizedWebAlias = webAliasArray.join('');

  // Concat the server url.
  const serverUrl = `${baseUrl}${webAlias}`;

  // Get the rep from local storage, if there is any.
  const getRep = async () => {
    // console.log('Inside getRep.');
    const storedRep = await localStorage.getItem('rep-data');
    if (!storedRep) return;
    const currentRep = JSON.parse(storedRep);
    console.log({currentRep});
    return currentRep.webAlias.toLowerCase();
  }

  // If there is a rep in local storage, do this:
  if (getRep() === webAlias.toLowerCase()) {
    renderRepsiteBanner(capitalizedWebAlias);
    renderProducts();

  // If there isn't a rep in local storage, get the rep body. 
  } else {
    axios.get(serverUrl)
      .then(res => {
        // If the web alias entered === a rep's web alias, store the rep obj locally and render the products' page with a repsite banner.
        console.log('Res.data:', res.data);
        if (res.data.webAlias.toLowerCase() === webAlias) {
          localStorage.setItem('rep-data', JSON.stringify(res.data));
          renderRepsiteBanner(capitalizedWebAlias);
          renderProducts();

        // If corporphan is returned, store it and render the products page without a repsite banner.
        } else {
          // Corporphan
          localStorage.setItem('rep-data', JSON.stringify(res.data));
          renderProducts();
        }
      })
      .catch(err => {
        console.log(err);
      })
  }
}
