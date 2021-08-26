'use strict';

// Capture the URL.
const url = window.location.href; // Use to capture the url of the current page.

// Pull the web alias off the end of the URL, if it exists.
function urlCapture(url) {
  console.log('1: App.js:', url);

  const regex = /[^\/]+$/gmi // To capture the web alias.
  const match = url.match(regex);
  let webAlias = null;
  if (match) webAlias = match.join('');
  return webAlias;
}
repsiteValidation(urlCapture(url));
