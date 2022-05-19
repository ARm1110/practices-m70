/*!
 * Start Bootstrap - Simple Sidebar v6.0.5 (https://startbootstrap.com/template/simple-sidebar)
 * Copyright 2013-2022 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-simple-sidebar/blob/master/LICENSE)
 */
//
// Scripts
//

function validateForm() {
  let x = document.forms["registerForm"]["firstName"].value;
  
  if (empty(x)) {
    alert("Name must be filled out");
    return false;
  }
}


