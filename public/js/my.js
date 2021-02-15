function myFunction() {
    var x = document.getElementById("show_password");
    if (x.type === "password") {
      x.type = "text";
    } else {
      x.type = "password";
    }
  } 