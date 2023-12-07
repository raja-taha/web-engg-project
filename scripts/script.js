document.addEventListener("DOMContentLoaded", function () {
  var userType = document.getElementById("userType").textContent;

  var projects = document.getElementById("add-projects");
  var conferences = document.getElementById("add-conferences");
  console.log(userType);

  if (userType === "Admin") {
    projects.style.display = "block";
    conferences.style.display = "block";
  } else {
    projects.style.display = "none";
    conferences.style.display = "none";
  }
});
