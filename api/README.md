# nCompass | Code to Call the API and Process its Data

## Authors

Chad Larson
Nathan Cox

## Features

- [x] Repsite banner
	- [x] Displays a generic welcome message when no web alias is entered by the user into the URL's path.
	- [x] Displays a dropdown with choices of countries for the user to choose from, populated from the API; saves the selection in a cookie and redirects the user to the homepage.
	- [x] Displays a dropdown with choices of languages for the user to choose from, populated from the API; saves the selection in a cookie and redirects the user to the homepage.
	- [x] When a valid web alias is entered into the URL's path, a welcome banner with the rep's email, phone, and name is displayed.
	- [x] The rep's data is stored in a cookie, in order to return the user to the rep's site in future automatically; and for use in other areas of the site. 
	- [x] When an incorrect web alias is entered, either the generic banner is displayed, if there is no 'wordpress_current_rep' cookie, or a banner is displayed with the info of the rep in the cookie. 
	- [x] Display the country (and language) selected.

- [x] Links
	- [x] Enrollment link from "Earn" in the header is built with the web alias, when extant, or 50 when not. 
	- [x] The login link is static.
	- [x] The "Shop Now" link is built to spec from da cookie, using the web alias. 
	- [x] The product menu contains dynamically built items with dynamically built links that make use of query parameters to pass the id of the item chosen.
	- [x] The retail and subscription buy buttons include dynamically built links that redirect to Exigo.

- [x] Misc
	- [x] The home page with the home url is loaded when a web alias is included in the URL's path.
	- [x] Use dotenv (or something more php-related) to hold environment variables.
