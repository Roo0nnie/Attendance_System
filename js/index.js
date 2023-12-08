// add hovered class to selected list item


let list = document.querySelectorAll(".navigation li");

function activeLink() {
  list.forEach((item) => {
    item.classList.remove("hovered");
  });
  this.classList.add("hovered");
}

list.forEach((item) => item.addEventListener("click", activeLink));

// Menu Toggle
let toggle = document.querySelector(".toggle");
let navigation = document.querySelector(".navigation");
let main = document.querySelector(".main");

toggle.onclick = function () {
  navigation.classList.toggle("active");
  main.classList.toggle("active");
};

var cards = document.getElementsByClassName("card");
var titles = document.getElementsByClassName("title");

for (var i = 0; i < titles.length; i++) {
 titles[i].addEventListener("click", function() {
    // Find the card that is currently active
    var currentActiveCard = document.querySelector(".card.active");
    
    // Remove the active class from the current active card
    if (currentActiveCard) {
      currentActiveCard.classList.remove("active");
    }
    
    // Get the index of the clicked title
    var clickedTitleIndex = Array.from(titles).indexOf(this)-1;
    
    // Find the corresponding card by using the clicked title index
    var clickedCard = cards[clickedTitleIndex];
    
    // Add the active class to the clicked card
    clickedCard.classList.add("active");
 });
}