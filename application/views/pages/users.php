
<section class="well">
    <h1 align="center">All Users are here</h1>
    <?php
    if($this->session->userdata("mgs_delete")){
        echo $this->session->userdata("mgs_delete");
        echo $this->input->get('id');
    }elseif($this->session->userdata("up_mgs")){
        echo $this->session->userdata("up_mgs");
        echo $this->input->get('id');
    }
    ?>
</section>
<div class="container table-responsive">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Id</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Password</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        </thead>
        <?php
        foreach($recodrs as $row):?>
        <tbody>
        <tr>
            <td><?php echo $row->id; ?></td>
            <td><?php echo $row->f_name; ?></td>
            <td><?php echo $row->l_name; ?></td>
            <td><?php echo $row->email; ?></td>
            <td><?php echo $row->password; ?></td>
            <td><img src="<?php echo base_url()."images/img/". $row->image;?>" width="100" height="100" class="img-circle img-responsive">
               <!-- --><?php /*echo base_url()."image/img/". $row->image;*/?>
            </td>
            <td>
                <a class="btn btn-success" href="<?php echo base_url()."index.php/main_controller/show_update_row/".$row->id; ?>"><span class="glyphicon glyphicon-edit"></span></a>
                 <a class="btn btn-danger" href="<?php echo base_url()."index.php/main_controller/delete_row/".$row->id; ?>"><span class="glyphicon glyphicon-trash"></a>
            </td>
        </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
    <a href="<?php echo base_url(); ?>index.php/main_controller/registration">Back home</a>
</div>



