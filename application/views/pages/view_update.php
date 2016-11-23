
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
    echo form_open('main_controller/update_row',array('class'=>'form-horizontal', 'role'=>'form'));
    ?>
    <?php foreach ($single_row as $row): ?>
        <div class="form-group">
            <label class="control-label col-sm-2" for="id">ID :</label>
            <div class="col-sm-6">
                <input type="text" name="idText" value="<?php echo $row->id; ?>" id="id" class="form-control" placeholder="Enter Your First Name">
                <!--   --><?php /*echo form_input(array('id' => 'Fname', 'class' => 'form-control','placeholder'=>'')); */?>
                <?php echo form_error('firstNameText');?>
            </div>
        </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="fname">First Name:</label>
        <div class="col-sm-6">
            <input type="text" name="firstNameText" value="<?php echo $row->f_name; ?>" id="fname" class="form-control" placeholder="Enter Your First Name">
            <!--   --><?php /*echo form_input(array('id' => 'Fname', 'class' => 'form-control','placeholder'=>'')); */?>
            <?php echo form_error('firstNameText');?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name">Last Name:</label>
        <div class="col-sm-6">
            <input type="text" name="lastNameText" value="<?php echo $row->l_name; ?>" id="lname" class="form-control" placeholder="Enter Your Last Name">
            <?php echo form_error('lastNameText');?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-6">
            <input type="text" name="emailText" value="<?php echo $row->email; ?>" id="email" class="form-control" placeholder="Enter Your Email">
            <?php echo form_error('emailText');?>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-6">
            <input type="text" name="passwordText" value="<?php echo $row->password; ?>" id="email" class="form-control" placeholder="Enter Your Password">
            <?php echo form_error('passwordText');?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" name="submit_reg" class="btn btn-success btn-lg">Submit</button>
        </div>
    </div>
    <?php endforeach; ?>
    <?php  echo form_close();  ?>
</div>
