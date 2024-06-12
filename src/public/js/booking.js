const seletedEl = document.querySelector('.form-container')
const bookingbtn = document.querySelector('.bookingbtn')
const cancell = document.querySelector('.cancell')
const hidden = document.querySelector('#hidden')

bookingbtn.addEventListener('click',()=>{
    seletedEl.style.transform = "translateY(0%)"
})

if(cancell){
    cancell.addEventListener('click',()=>{
        seletedEl.style.transform = "translateY(110%)"
    })
      
}
if(hidden){
    seletedEl.style.transform = "translateY(0%)"
}