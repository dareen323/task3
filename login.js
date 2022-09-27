let btn = document.getElementById("logInBtn");

btn.addEventListener("click", function (e) {
  e.preventDefault();

  let email = document.getElementById("email").value;
  let password = document.getElementById("password").value;

  fetch("http://localhost/task3/login.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: `email=${email}&password=${password}`,
  })
    .then((response) => response.text())
    .then((res) => {
      console.log(res);
      let str = res.split("/");
      console.log(str);
      if (str[0] == "true") {
        if (str[1] == "dareen@gmail.com")
        window.location.href = "./admin.php?email=" + str[1];

        else window.location.href = "./welcome.php?email=" + str[1];
      } 
      else {
        alert("check your password and email .Please ");
      }
    });
});