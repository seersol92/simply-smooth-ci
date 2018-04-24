<div class="page-header">
    <div class="page-header-title">
        <h4>New Template</h4>
    </div>
    <div class="page-header-breadcrumb">
        <ul class="breadcrumb-title">
            <li class="breadcrumb-item">
                <a href="index-2.html">
                    <i class="icofont icofont-home"></i>
                </a>
            </li>
            <li class="breadcrumb-item"><a href="#!"><?php echo $title; ?></a>
            </li>
            <li class="breadcrumb-item"><a href="#!"><?php echo $title; ?></a>
            </li>
        </ul>
    </div>
</div>
<!-- Page header end -->
<!-- Page body start -->
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <!-- Product edit card start -->
            <div class="card">
                <div class="card-header">
                    <h5><?php echo $title; ?></h5>
                    <a class="btn btn-primary " href="<?php echo base_url(); ?>administrator/email-management" style="float: right;">
                    Email Templates</a>
                </div>
                <div class="card-block">
                    <div class="row">
                    <div class="col-sm-12">
                    <?php $this->load->helper("form"); ?>
                    <form role="form" id="addTemp" action="<?php echo base_url() ?>administrator/add-template" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="temp_name">Template Subject</label>
                                        <input type="text" class="form-control required" value="<?php echo set_value('temp_name'); ?>" id="temp_name" name="temp_name" >
                                    </div>
                                </div>
                                <div class="col-md-12">                                
                                    <div class="form-group">
                                        <label for="temp_type">Template Type</label>
                                        <select name="temp_type" id="temp_type" class="form-control" required>
                                            <option value="" selected hidden>Select Template Type</option>
                                            <option value="1">Automated Emails</option>                                            
                                            <option value="2">Follow up Email</option>
                                            <option value="3">Broadcast Email</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12" style="display: none" id="time_delay_div">
                                    <div class="form-group">
                                        <label for="time_delay">Time Delay (In hours)</label>
                                        <input type="text" class="form-control" value="<?php echo set_value('time_delay'); ?>" id="time_delay" name="time_delay" >
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="temp_type">Select Keywords</label>
                                        <select id="keywords" class="form-control" >
                                            <option value="" selected hidden>Select Keywords</option>
                                            <?php foreach ($keyword AS $key=>$name): ?>
                                            <option value="<?='{#'.$key.'#}'?>">
                                                <?=$name?>
                                            </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                    <div id="sample">
                                        <label for="temp_content">Template Content</label>
                                        <textarea name="temp_content" id="email_content" style="width: 100%; height:150px"></textarea>
                                    <div>
                                    </div>
                                </div>
                        </div><!-- /.box-body -->    
                        <div class="box-footer pull-right">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                        </div>
                    </form>
                    </div>
                    </div>
                </div>
            </div>
            <!-- Product edit card end -->
        
    </div>
            <!-- Basic Form Inputs card end -->