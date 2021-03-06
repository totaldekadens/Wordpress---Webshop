
function vidareKnapp(){
    const is_user_logged_in = document.body.classList.contains( 'logged-in' );
    const nextButton = document.querySelector('.nasta'),
    order_review = document.querySelector('#order_review'),
    errorText = document.querySelector('.errorText'),
    order_review_heading = document.querySelector('#order_review_heading'),
    arrConvert = [...document.querySelectorAll('.input-text')]

    nextButton.addEventListener('click', ()=>{
        
        const arr = Array.from(arrConvert)
        

        if(is_user_logged_in){
            const newArr2 = arr.slice()
            newArr2.splice(7, 7)  

            newArr2.filter(item => {  
                
                if(item.value.length === 0) {
                    return (
                        errorText.style.display = 'flex',
                        order_review.style.display ='none'
                    
                    )
                    
                } else if (newArr2.every(item => item.value.length > 0)) {
                    errorText.style.display = 'none'
                    order_review_heading.style.display = 'flex'
                    order_review.style.display ='flex'
                    nextButton.style.display = 'none'
                }
            })
        }else{
            const newArr = arr.slice()
                const newArr3 = newArr.splice(2, 7)
                newArr3.filter(item => {
                if(item.value.length === 0) {
                    return (
                        errorText.style.display = 'flex',
                        order_review.style.display ='none'
                    
                    )
                    
                } else if (newArr3.every(item => item.value.length > 0)) {
                    errorText.style.display = 'none'
                    order_review_heading.style.display = 'flex'
                    order_review.style.display ='flex'
                    nextButton.style.display = 'none'
                }
            })
        }   

        document.getElementById("order_review_heading").scrollIntoView();

    })

}
vidareKnapp();

document.querySelector(".continue").addEventListener("click", () => {

    const titleOrderReview = document.getElementsByTagName("h3")[3];
    let payment = document.getElementsByClassName("wc_payment_methods")[0]
    let payment2 = document.getElementsByClassName("place-order")[0];

    titleOrderReview.style.display = 'flex';
    payment.style.display = 'block';
    payment2.style.display = 'block';

    titleOrderReview.scrollIntoView();

})