
let dropdownImg = document.querySelector(".dropmenu")
let subMenuToBeToggled = document.querySelector(".dropdownMenu")

dropdownImg.addEventListener("click", () => {

    subMenuToBeToggled.classList.toggle("flex")

})