function vidareKnapp(){

    const nextButton = document.querySelector('.nasta'),
    order_review = document.querySelector('#order_review'),
    errorText = document.querySelector('.errorText'),
    order_review_heading = document.querySelector('#order_review_heading')
    arrConvert = [...document.querySelectorAll('.input-text')] 
    

    nextButton.addEventListener('click', ()=>{

    
    const arr = Array.from(arrConvert)
    const newArr = arr.splice(2, 7)


        newArr.filter(item => {
            if(item.value.length === 0) {
                return (
                    errorText.style.display = 'flex',
                    order_review.style.display ='none'
                
                )
                
            } else if (newArr.every(item => item.value.length > 0)) {
                errorText.style.display = 'none'
                order_review_heading.style.display = 'flex'
                order_review.style.display ='flex'
                nextButton.style.display = 'none'
            }
        })

        document.getElementById("order_review_heading").scrollIntoView();

    })

}
vidareKnapp();