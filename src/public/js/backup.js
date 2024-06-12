document.addEventListener("DOMContentLoaded", function () {
    const hideProfileDiv = document.querySelector(".hideprofile");
    const userProfileInput = document.getElementById("userprofile");
    const feedbackElement = document.querySelector(".feedback-element p");
  
    // Handle click event to trigger file input
    hideProfileDiv.addEventListener("click", function () {
      userProfileInput.click();
    });
  
    // Update content display based on file type
    userProfileInput.addEventListener("change", function (event) {
      const file = event.target.files[0];
  
      if (file) {
        const extenstion = file.name.split('.')[1].toLowerCase(); // Ensure lowercase extension
  
        if (extenstion === "mp3" || extenstion === "wav" || extenstion === "ogg" || extenstion === "oga") { // Handle common audio extensions
          hideProfileDiv.textContent = "Audio file uploaded: " + file.name;
        } else if (extenstion === "mp4" || extenstion === "webm" || extenstion === "ogg" || extenstion === "ogv") { // Handle common video extensions
          hideProfileDiv.textContent = "Video file uploaded: " + file.name;
        } else {
          // Handle other file types or display a generic message
          const reader = new FileReader();
          reader.onload = function (e) {
            const isText = isTextFile(e.target.result); // Check if text file
            if (isText) {
              hideProfileDiv.textContent = "Text file uploaded: " + file.name;
            } else {
              hideProfileDiv.textContent = "File uploaded: " + file.name; // Generic message
            }
          };
          reader.readAsText(file, "UTF-8"); // Read file content for text detection (optional)
        }
  
        // Remove any previously displayed image (optional)
        const img = hideProfileDiv.querySelector("img");
        if (img) {
          img.remove();
        }
      }
    });
  
    // Function to identify text files (optional, but improves accuracy)
    function isTextFile(content) {
      const textRegex = /^\s*[\w\s!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]*\s*$/;
      return textRegex.test(content.slice(0, 100)); // Check first 100 characters
    }
  
    // Hide error message when the user starts typing (unchanged)
    const inputFields = document.querySelectorAll("input[type='text'], input[type='date'], select");
    inputFields.forEach(field => {
      field.addEventListener("input", function () {
        if (feedbackElement) {
          feedbackElement.textContent = "";
        }
      });
    });
  });
  