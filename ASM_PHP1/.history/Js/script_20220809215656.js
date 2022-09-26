let menu = document.querySelector("#menu-btn");
let profile = document.querySelector(".header .profile-user");

menu.onclick = () => {
  menu.classList.toggle("fa-times");
  navbar.classList.toggle("active");
};
document.querySelector("#user-btn").onclick = () => {
  profile.classList.toggle("active");
};
window.onscroll = () => {
  menu.classList.remove("fa-times");
  profile.classList.remove("active");
};
console.log(profile);

document.querySelector("#close-edit").onclick = () => {
  document.querySelector(".edit-form-container").style.display = "none";
  window.location.href = "admin.php";
};
