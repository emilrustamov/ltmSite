window.onscroll = function() {scrollFunction()};
// document.getElementById("about_company").onscroll = function() {scrollFunction()};

function scrollFunction() {
    var scrollVal = window.pageYOffset;
    var scrollSlow  = (scrollVal / 4);

//   if (document.getElementById("about_company").scrollTop > 50 || document.documentElement.scrollTop > 4850) {
    document.each.getElementById("h3").style.width = Math.min(Math.max(scrollSlow, 0), 46) + "%";

}

// window.onscroll = function() {
//   scrollFunction();
// };

// function scrollFunction() {
//   var scrollVal = window.pageYOffset;
//   var scrollSlow = scrollVal / 4;

//   // Select all elements with the class "scrollable-element"
//   var elements = document.querySelectorAll(".scrollable-element");

//   elements.forEach(function(element) {
//     element.style.width = Math.min(Math.max(scrollSlow, 0), 46) + "%";
//   });
// }

// var aDiv = document.getElementById("h1");

// function changeWidth() 
// {
//     var scrollVal = window.pageYOffset;
//     var scrollSlow  = (scrollVal / 4);
    
//     //Changing CSS Width
//     aDiv.style.width = Math.min(Math.max(scrollSlow, 20), 100) + "%";
// }

// window.addEventListener('scroll', function() 
// {
//     requestAnimationFrame(changeWidth);
// }, false);