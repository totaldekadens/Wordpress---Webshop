
let dropdownImg = document.querySelector(".dropmenu")
let subMenuToBeToggled = document.querySelector(".dropdownMenu")

dropdownImg.addEventListener("click", () => {

    subMenuToBeToggled.classList.toggle("flex")

})





/* let productCard = document.querySelector(".woocommerce-LoopProduct-link")
let productInCatImg = document.createElement("div")
productInCatImg.classList.add("productInCatImg")

let productImage = document.querySelector(".attachment-woocommerce_thumbnail")



let productInCatInfo = document.createElement("div")
productInCatInfo.classList.add("productInCatInfo")



let productTitleCat = document.querySelector(".woocommerce-loop-product__title")
productTitleCat.classList.add("productTitleCat")
let productPriceCat = document.querySelector(".price")
productPriceCat.classList.add("productPriceCat")
let productPriceAmount = document.querySelector(".woocommerce-Price-amount amount")
productPriceAmount.classList.add("productPriceAmount")


productCard.append(productInCatImg, productInCatInfo )
productInCatImg.append(productImage)
productInCatInfo.append(productTitleCat, productPriceCat, productPriceAmount ) 

 */