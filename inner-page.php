<?php require 'inc/css.php'; ?>

<body>
  <?php require 'inc/header.php' ?>
  <!-- ======= Hero Section ======= -->
  <section style="margin-top:100px;">
      <div class="container">
        
        <form method="post">
          <div class="form-row">
            <div class="col-md-4 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your FullNames" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
              <input type="text" class="form-control" name="id" id="id" placeholder="Your Idno" data-rule="idno" data-msg="Please enter a valid Idn0">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter a valid Phone">
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-4 form-group">
                <select name="agakiriro" id="agakiriro" class="form-control">
                <option value="">Select Agakiriro</option>
                <?php
                    require_once 'connect.php';
                    $select = mysqli_query($conn,"SELECT * FROM agakiriro");
                    while($row = mysqli_fetch_array($select)){
                ?>
                <option><?php echo $row['name']?></option>
                <?php 
            
                }?>
                </select>
                
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
                <select name="gender" id="gender" class="form-control">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
                <select name="capital" class="form-control">
                    <option>Select Capital..</option>
                    <option>BDF</option>
                    <option>MONEY</option>
                </select>
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="minlen:4" data-msg="Please enter email">
              <div class="validate"></div>
            </div>
          </div>
          
          <div class="text-center"><button class="form-control" type="submit" name="submit">Register Yourself</button></div>
        </form>
        <?php
            if (isset($_POST['submit'])) {
                $fullnames = $_POST['name'];
                $idno = $_POST['id'];
                $phone = $_POST['phone'];
                $temp_agakiriro = $_POST['agakiriro'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $capital = $_POST['capital'];
                $select = mysqli_query($conn,"SELECT * FROM agakiriro WHERE name='$temp_agakiriro'");
                $fetch = mysqli_fetch_array($select);
                $agakiriro = $fetch['id'];
                mysqli_query($conn,"INSERT INTO worker_app VALUES(NULL,'$fullnames','$idno','$phone','$agakiriro','$gender','$email','$capital')") or die(mysqli_error($conn));
            }
            
        ?>
      </div>
    </section><!-- End Hero -->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  <?php require 'inc/footer.php' ?>
  <?php require 'inc/js.php' ?>