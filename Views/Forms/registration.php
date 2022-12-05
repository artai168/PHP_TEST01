<?php
    /* 
        `User_Name` VARCHAR(10) NOT NULL,
        `Password` VARCHAR(20) NOT NULL,
        `Full_Name` VARCHAR(60) NOT NULL,
        `Email_Address` VARCHAR(100) NOT NULL,
        `Date_Of_Birth` DATE,
        `Post_Address` TEXT,
        `Post_Code` VARCHAR(10) NOT NULL,
        `Account_Status` INT NOT NULL,
    */
?>

<div class="registrationForm">
        <form  action="/Assignment/Controllers/Registration_Controller.php" name="registrationform" class="form-registration" method="post">
            <h3 class="cnt">Sign up!</h3>
            <hr class="colorgraph">
            
            <label for="username">Username<span class="red">*</span>:</label>
            <input type="text" name="_username" id="username" placeholder="Username" class="input form-control" autocomplete="off" maxlength="10" size="12" required autofocus>

            <label for="email">E-mail<span class="red">*</span>:</label>
            <input type="email" name="_email" id="email" placeholder="Email" class="input form-control" autocomplete="off" required>

            <label for="password">Password<span class="red">*</span>:</label>
            <input type="password" name="_password" id="password" placeholder="Password" class="input form-control" autocomplete="off" required><br>

            <label for="fullName">Full Name<span class="red">*</span>:</label>
            <input type="text" name="_fullName" id="fullname" placeholder="Full Name" class="input form-control" autocomplete="off" required><br>

            <label for="date_of_Birth">Date Of Birth<span class="red">*</span>:</label>
            <input type="date" name="_date_of_Birth" id="date_of_Birth" placeholder="Date of Birth" class="input form-control" min="1950-01-01" max="2022-11-30">

            <label for="Address">Post Address<span class="red">*</span>:</label>
            <input type="text" name="_address" id="address" placeholder="Address" class="input form-control" autocomplete="off" required><br>

            <label for="Post_Code">Post Code<span class="red">*</span>:</label>
            <input type="text" name="_post_Code" id="post_code" placeholder="Post Code" class="input form-control" autocomplete="off" required><br>
                        
            <!--<input type="submit"  name="registration" value="Sign Up" class="btn btn-lg btn-block submit" /> -->
            <button>Submit</button>
        </form>
        
    </div>