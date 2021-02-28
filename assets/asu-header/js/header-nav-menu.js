// headerMenuVars are set in functions.php
console.log(headerMenuVars);

componentsLibrary.initHeader(headerMenuVars);

// Initialize cookie consent banner if needed
AsuCookieConsent.init();
