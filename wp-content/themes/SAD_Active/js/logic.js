
let dropdownImg = document.querySelector(".dropmenu")
let subMenuToBeToggled = document.querySelector(".dropdownMenu")
let categoryMenu = document.querySelector(".catMenu")

dropdownImg.addEventListener("click", () => {

    subMenuToBeToggled.classList.toggle("flex")

})


var lastScrollTop = 0;

// element should be replaced with the actual target element on which you have applied scroll, use window in case of no target element.
window.addEventListener("scroll", function(){ // or window.addEventListener("scroll"....
   var st = window.pageYOffset || document.documentElement.scrollTop; // Credits: "https://github.com/qeremy/so/blob/master/so.dom.js#L426"
   if (st > lastScrollTop){

    let logo = document.querySelector(".headerTop")

    logo.classList.add("none")


    console.log("Du scrollar ner")

      // downscroll code 
   } else {
      // upscroll code

      let logo = document.querySelector(".headerTop")

      logo.classList.remove("none")

      console.log("Du scrollar upp")
   }
   lastScrollTop = st <= 0 ? 0 : st; // For Mobile or negative scrolling
}, false);