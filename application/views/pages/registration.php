
<!-- Content Header (Page header) -->
<section class="well">

    <h1 style="text-align: center">Your Registration Here</h1>
    <?php
    if($this->session->userdata("mgs")){
        echo $this->session->userdata("mgs");
    }
    ?>
</section>
<div class="container">
        <?php
        echo form_open_multipart('main_controller/user_reg',array('class'=>'form-horizontal', 'role'=>'form'));
        ?>
        <div class="form-group">
            <label class="control-label col-sm-2" for="fname">First Name:</label>
            <div class="col-sm-6">
                <input type="text" name="firstNameText" id="fname" class="form-control" placeholder="Enter Your First Name">
             <!--   --><?php /*echo form_input(array('id' => 'Fname', 'class' => 'form-control','placeholder'=>'')); */?>
                <?php echo form_error('firstNameText');?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Last Name:</label>
            <div class="col-sm-6">
                <input type="text" name="lastNameText" id="lname" class="form-control" placeholder="Enter Your Last Name">
                <?php echo form_error('lastNameText');?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-6">
                <input type="text" name="emailText" id="email" class="form-control" placeholder="Enter Your Email">
                <?php echo form_error('emailText');?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-6">
                <input type="text" name="passwordText" id="email" class="form-control" placeholder="Enter Your Password">
                <?php echo form_error('passwordText');?>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="file">Upload file:</label>
            <div class="col-sm-6">
                <input type="file" name="uploadImage" id="file" size="20">
                <?php /*echo form_error('uploadImage');*/?>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" name="submit_reg" class="btn btn-success btn-lg">Submit</button>
            </div>
        </div>
    <?php  echo form_close();  ?>
</div>
