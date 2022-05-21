function validate() {
  //   var username = document.getElementById("username").value;
  //   var usernameRgx = /^[a-z0-9_-]{3,32}$/;
  //   var Resultusername = usernameRgx.test(username);
  //   if (!Resultusername) {
  //     document.getElementById("username").value = "";
  //     document.getElementById("username").style.borderColor = "red";
  //     alert("username:" + Resultusername);

  //     return false;
  //   }
  // }
  var username = document.getElementById("username").value;
  var email = document.getElementById("email").value;
  var name = document.getElementById("name").value;
  var pwd = document.getElementById("pwd").value;
  if (ValidateUsername(username) == false) {
    document.getElementById("username").value = "";
    document.getElementById("username").style.borderColor = "red";
    return false;
  }
  if (ValidateEmail(email) == false) {
    document.getElementById("email").value = "";
    document.getElementById("email").style.borderColor = "red";
    return false;
  }
  if (ValidateName(name) == false) {
    document.getElementById("name").value = "";
    document.getElementById("name").style.borderColor = "red";
    return false;
  }
  if (Validatepass(pwd) == false) {
    document.getElementById("pwd").value = "";
    document.getElementById("pwd").style.borderColor = "red";
    return false;
  }
}
function validateform() {
  var usernamelogin = document.getElementById("usernamelogin").value;
  if (ValidateUsername(usernamelogin)) {
    document.getElementById("usernamelogin").value = "";
    document.getElementById("usernamelogin").style.borderColor = "red";
    return false;
  }
}
function ValidateEmail(mail) {
  if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
    return true;
  }
  alert("You have entered an invalid email address!");
  return false;
}

function ValidateUsername(usernameid) {
  if (/^[a-z0-9_-]{3,32}$/.test(usernameid)) {
    return true;
  }
  alert("You have entered an invalid username!");
  return false;
}
function ValidateName(nameid) {
  if (/^[a-zA-Z]{3,32}$/.test(nameid)) {
    return true;
  }
  alert("You have entered an invalid name!");
  return false;
}
function Validatepass(passid) {
  if (/^[\d]{4,32}$/.test(passid)) {
    return true;
  }
  alert("You have entered an invalid password!");
  return false;
}
function ValidateLogin() {
  var username = document.getElementById("Usernamelogin").value;
  var pwd = document.getElementById("pwd").value;
  console.log(username);
  if (ValidateUsername(username) == false) {
    document.getElementById("Usernamelogin").value = "";
    document.getElementById("Usernamelogin").style.borderColor = "red";
    return false;
  }
  if (Validatepass(pwd) == false) {
    document.getElementById("pwd").value = "";
    document.getElementById("pwd").style.borderColor = "red";
    return false;
  }
}
