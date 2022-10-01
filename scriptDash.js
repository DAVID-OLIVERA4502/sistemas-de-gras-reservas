
let tab = document.querySelectorAll(".sidenav__list li");
let a = document.querySelectorAll(".a");
console.log(a);
let b = document.querySelectorAll(".b");
let c = document.querySelectorAll(".c");
let tabs = document.querySelectorAll(".tabs");

tab.forEach((element) => {
  element.addEventListener("click", () => {
    var tabVar = element.getAttribute("data-tabs");
    tabs.forEach((element2) => {
      element2.style.display = "none";
    });
    if (tabVar == "a") {
      a.forEach((a) => {
        a.style.display = "block";
      });
    } else if (tabVar == "b") {
      b.forEach((b) => {
        b.style.display = "block";
      });
    } else if (tabVar == "c") {
      c.forEach((c) => {
        c.style.display = "block";
      });
    }else {
      tabs.forEach((tabs) => {
        tabs.style.display = "block";
      });
    }
  });
});
