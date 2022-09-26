let menu = document.querySelector("#menu-btn");
let profile = document.querySelector(".header .profile-user .flex-btn");

menu.onclick = () => {
  menu.classList.toggle("fa-times");
  navbar.classList.toggle("active");
};
document.querySelector("#user-btn").onclick = () => {
  profile.classList.toggle("active");
};
window.onscroll = () => {
  menu.classList.remove("fa-times");
  navbar.classList.remove("active");
};
window.onscroll = () => {
  profile.classList.remove("active");
};

document.querySelector("#close-edit").onclick = () => {
  document.querySelector(".edit-form-container").style.display = "none";
  window.location.href = "admin.php";
};
