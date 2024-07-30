<!DOCTYPE html>
<html lang="en">
      <?php
        session_start();
        ?>

      <head>
          <title>Registration Form</title>
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="register.css">
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css"
           integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
           integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
          <?php

            include 'connect.php';
            $uniqueid = '';
            if (isset($_GET['id'])) {
                $uniqueid = $_GET['id'];
                // get the student detail for id rquested
                $fetch_query = "select * from regist_form where unique_id = $uniqueid";

                $result = mysqli_query($connection, $fetch_query);
                $row_array = mysqli_fetch_array($result);

                $facility_query = "select * from facility where unique_id = $uniqueid";
                $result_facility = mysqli_query($connection, $facility_query);

                $result_student = mysqli_query($connection, $fetch_query);
            }
            $sqlcat = 'select * from category_master';
            $resultcat = mysqli_query($connection, $sqlcat);
            ?>
      </head>

      <body>
          <form action="form.php" method="POST">
              <div class="set mb-4">
                  <div class="box mb-4">
                      <h1>Registration form</h1>
                      <h6>First name</h6>
                      <input class="form-control" name="f_name" type="text" placeholder="First name" aria-label="default input example" Required value="<?php
                                                if (is_numeric($uniqueid)) echo $row_array['firstname']; ?>">
                      <h6>Last name</h6>
                      <input class="form-control" name="l_name" type="text" placeholder="Last name" aria-label="default input example" Required value="<?php
                                                     if (is_numeric($uniqueid)) echo $row_array['lastname']; ?>">
                      <h6>Phone Number</h6>
                      <input class="form-control" name="phone" type="text" placeholder="Phone no." aria-label="default input example" Required value="<?php
                                                    if (is_numeric($uniqueid)) echo $row_array['number']; ?>">
                      <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Email address</label>
                          <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" Required value="<?php
                                                    if (is_numeric($uniqueid)) echo $row_array['email']; ?>">
                      </div>
                      <div class="mb-3">
                          <label for="exampleFormControlInput1" class="form-label">Password</label>
                          <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="give a new password" Required value="<?php
                                                    if (is_numeric($uniqueid)) echo $row_array['password']; ?>">
                      </div>
                      <h6>date of birth</h6>
                      <input class="form-control" type="date" id="birthday" name="birthday" placeholder="dd/mm/yyyy" aria-label="default input example" Required value="<?php
                                                    if (is_numeric($uniqueid)) echo $row_array['birthday']; ?>">

                      <div aria-required="true" required>
                          <h6>Gender</h6>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="male" value="Male" <?php
                                                if (is_numeric($uniqueid) and $row_array['gender'] == 'Male') echo 'checked';
                                                        else echo ''; ?>>
                              <label class="form-check-label" for="inlineRadio">Male</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="female" value="Female" <?php
                                if (is_numeric($uniqueid) and $row_array['gender'] == 'Female')    echo 'checked';
                                                               else echo '';  ?>>
                              <label class="form-check-label" for="inlineRadio">Female</label>
                          </div>
                          <div class="form-check form-check-inline">
                              <input class="form-check-input" type="radio" name="gender" id="otherGender" value="Others" <?php
                                    if (is_numeric($uniqueid) and $row_array['gender'] == 'Others') echo 'checked';
                                    else echo ''; ?>>
                              <label class="form-check-label" for="otherGender">Other</label>
                          </div>
                      </div required>

                      <div class="col-md-6 mb-4">
                          <label class="form-label" name="category"> Travel Category</label>
                          <?php
                            $cat_selected = '';
                            $sqlcat = 'select * from category_master';
                            $resultcat = mysqli_query($connection, $sqlcat);
                            while ($fetched_data = mysqli_fetch_array($resultcat)) {
                                if (is_numeric($uniqueid))
                                    if ($fetched_data['categoryid'] == $row_array['category']) {
                                        $cat_selected = 'checked';
                                    } else {
                                        $cat_selected = '';
                                    }
                            ?>
                              <!-- <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="sccaste" name="caste" value="SC" >
                                <label class="form-check-label" for="inlineRadio">SC</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="stcaste" name="caste" value="ST" >
                                <label class="form-check-label" for="inlineRadio">ST</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="obcaste" name="caste" value="OBC">
                                <label class="form-check-label" for="inlineRadio">OBC</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" id="gecaste" name="caste" value="GENERAL" >
                                <label class="form-check-label" for="inlineRadio">GENERAL</label>
                            </div> -->
                              <label style="margin-top: 1rem; margin-left: 2px;display: block;">
                                  <input type="radio" name="category" id="category" value="<?php echo $fetched_data['categoryid'] ?>">
                                  <?php echo $fetched_data['categoryname'] ?>
                              </label>
                          <?php
                            }
                            ?>
                      </div>

                      <div class="col-md-6 mb-4">
                          <label class="form-label" name="facility">Facilities You Want</label>
                          <?php
                            $fac_select = '';
                            $sqlfac = 'select * from facility_master';
                            $resultfac = mysqli_query($connection, $sqlfac);
                            while ($fetched_fac = mysqli_fetch_array($resultfac)) {
                               if (is_numeric($uniqueid)) {
                                  
                                    while ($facility_array = mysqli_fetch_array($result_facility)) {
                                        if ($fetched_fac['facilityid'] == $facility_array['unique_id']) {
                                            $fac_select = 'checked';
                                            break;
                                        } else {
                                            $fac_select = '';
                                        }
                                    }
                                } else {
                                    $fac_select = '';
                                } 
                            ?>
                              <label style="margin-top: 1rem; margin-left: 2px;">
                                  <input type="checkbox" name="facility[]" value="<?php echo $fetched_fac['facilityid'] ?>" <?php echo  $fac_select; ?>>
                                  <?php echo $fetched_fac['facilityname'] ?>
                              </label>
                          <?php
                            }
                            ?>
                          <!-- <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="htfac" name="facilities" value="Hostel" >
                                <label class="form-check-label" for="inlineRadio">hostel</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="cnfac" name="facilities" value="Canteen" >
                                <label class="form-check-label" for="inlineRadio">Canteen</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="lifac" name="facilities" value="Library">
                                <label class="form-check-label" for="inlineRadio">Library</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="gyfac" name="facilities" value="Gym" >
                                <label class="form-check-label" for="inlineRadio">Gym</label>
                            </div> -->
                      </div>
                      <div class="submit">
                          <button type="submit" name="submit" value="submit" class="btn btn-dark">Register</button>
                          <button type="edit" name="edit" value="edit" class="btn btn-dark" ><a href="Report.php">Edit</a></button>
                          <!-- <form  enctype="multipart/form-data" action=" -->
                          <?php 
                        //   if(is_numeric($uniqueid))
                        //    echo "form.php";
                        //    else
                        //    echo "Report.php";
                        //    ?>
                        <!-- " method="POST" id="contact_form" name="traveldetails"> -->
                            <?php
                        //    if(is_numeric($uniqueid))
                        //    {
                        //     echo '<input type=hidden name=travel_id value='.$travel_id.'>';
                        //     echo '<input type=hidden name=action value='.$_GET['action'].'>';

                        //    }
                           ?>
                           <!-- </form> -->

                      </div>
                  </div>
              </div>

          </form>
      </body>

      </html>