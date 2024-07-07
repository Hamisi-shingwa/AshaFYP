
<div class="upload-new-post">
   <div class="head">
       <h4>Upload your clip(video or audio) or design(image) here</h4>
       <a href="./main.php?page=profile&&required=all">x</a>
   </div>
   <form id='newpost-form' action="./user_post/process_newpost.php" method="post" enctype="multipart/form-data">
       <input type="file" name="media" id='userprofile'>
       <div class="hideprofile displayed-media">
           <img src="../assets/Icons/upload.png" alt="">
       </div>
       <input type="text" name="title" placeholder="title">
       <textarea name="description" id="description" cols="30" rows="10" placeholder="description"></textarea>
       <button id="chose-file" name='sbtn'>Submit your clip</button>
       
       <div class="feedback-element">
       <p><?php if(isset($_GET['msg'])) echo base64_decode($_GET['msg'])?></p>
       </div>
       <div class="upload-description">
           <p>To improve your talent you have to rise up your own effort to made your own work</p>
           <p>Upload it and tell us more about your work then publish to public</p>
       </div>
   </form>
</div>



