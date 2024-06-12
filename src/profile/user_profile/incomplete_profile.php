 <div class="incomplete-profile-container">
    <h4>More information about you is needed</h4>
    <form action="./user_profile/process_incomplete_profile.php" method="post" enctype="multipart/form-data">
        <div class="form-data-container">
        <div class="left-form-data"> 
            <div class="user-profile-capture">
            <input type="file" name='profile' id='userprofile'>
            <div class="hideprofile"><img src="../assets/Icons/person.png" alt=""></div>
            <div class="textlable">Upload your profile</div>
            </div>
            <select name="talent" id="talent">
                <option value="">What Talented you are</option>
                <option value="Musician">Musician</option>
                <option value="Artist">Artist</option>
            </select>
            <input type="text" name="username" placeolder="Tell user name">
        </div>

        <div class="right-form-data">
            <input type="text" name="fullname" placeholder="Full name">
            <input type="date" name="birthdate" placeholder="Date of birth">
            <input type="text" name="location" placeholder="Location of birth">
            <input type="text" name="address" placeholder="Current Address">
        </div>
        </div>
        <input type="submit" value="Submit to us">
        <div class="feedback-element">
        <p><?php if(isset($_GET['msg'])) echo base64_decode($_GET['msg'])?></p>
        </div>
    </form>
</div>