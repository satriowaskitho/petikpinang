const body = document.querySelector("body");
const sidebar = document.querySelector(".sidebar");
const main = document.querySelector(".main");
const submenuItems = document.querySelectorAll(".submenu_item");
const sidebarClose = document.querySelector(".collapse_sidebar");
const sidebarExpand = document.querySelector(".expand_sidebar");

const sidebarOpen = document.querySelector("#sidebarOpen");

sidebarOpen.addEventListener("click", () => {
  sidebar.classList.toggle("close");
  sidebar.classList.remove("hoverable");
  main.classList.remove("hp");
});

// window.addEventListener('load', function() {
//   main.classList.remove("close");
// });

sidebarClose.addEventListener("click", () => {
  sidebar.classList.remove("nothoverable");
  if (window.innerWidth < 768) {
    sidebar.classList.toggle("close");
    sidebar.classList.add("hoverable");
    main.classList.add("hp");
  } else {
    sidebar.classList.add("close", "hoverable");
    main.classList.add("close");
  }
});
sidebarExpand.addEventListener("click", () => {
  sidebar.classList.remove("close", "hoverable");
  sidebar.classList.add("nothoverable");
  if (window.innerWidth < 768) {
    main.classList.remove("hp");
  } else {
    main.classList.remove("close");
  }
});

sidebar.addEventListener("mouseenter", () => {
  if (sidebar.classList.contains("hoverable")) {
    if (window.innerWidth < 768) {
      main.classList.remove("hp");
    } else {
      sidebar.classList.remove("close");
      main.classList.remove("close");
    }
  }
});
sidebar.addEventListener("mouseleave", () => {
  if (sidebar.classList.contains("hoverable")) {
    sidebar.classList.add("close");
    if (window.innerWidth < 768) {
      main.classList.add("hp");
    } else {
      main.classList.add("close");
    }
  }
});

submenuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    item.classList.toggle("show_submenu");
    submenuItems.forEach((item2, index2) => {
      if (index !== index2) {
        item2.classList.remove("show_submenu");
      }
    });
  });
});

if (window.innerWidth < 768) {
  sidebar.classList.add("close");
  main.classList.remove("close");
  main.classList.add("hp");
} else {
  sidebar.classList.remove("close");
  main.classList.remove("hp");
}

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))