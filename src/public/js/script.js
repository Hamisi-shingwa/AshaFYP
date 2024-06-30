
document.addEventListener("DOMContentLoaded", function() {
    const hideProfileDiv = document.querySelector(".hideprofile");
    const userProfileInput = document.getElementById("userprofile");
    const feedbackElement = document.querySelector(".feedback-element p");

    // Handle click event to trigger file input
    hideProfileDiv.addEventListener("click", function() {
        userProfileInput.click();
    });

    // Update image source once a file is selected
    userProfileInput.addEventListener("change", function(event) {
        if (event.target.files && event.target.files[0]) {
            const extenstion = event.target.files[0].name.split('.')[1];
            const img = hideProfileDiv.querySelector("img");
            img.src = URL.createObjectURL(event.target.files[0]);
        }
    });

    // Hide error message when the user starts typing in any input field
    const inputFields = document.querySelectorAll("input[type='text'], input[type='date'], select");
    inputFields.forEach(field => {
        field.addEventListener("input", function() {
            if (feedbackElement) {
                feedbackElement.textContent = "";
            }
        });
    });
});
//Lets us share-conatiner display logic
const shareContainer = document.querySelector('.share-container');
const shareBtn = document.querySelector('.share')


if(shareBtn && shareContainer){
    shareBtn.onclick = (e)=>{
        e.preventDefault()
        shareContainer.classList.toggle('display')
    }
}

document.querySelector('.cancel').onclick = ()=>{
    console.log("yes is clicked")
    shareContainer.style.dispay = "none"    
}

