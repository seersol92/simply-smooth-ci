<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/ekko-lightbox/dist/ekko-lightbox.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>admintemplate/bower_components/lightbox2/dist/css/lightbox.css">
<div class="page-header">
    <div class="page-header-title">
        <h4>E-mail Templates</h4>
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
<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
        <div class="card">
            <div class="card-block">
                <div class="table-responsive dt-responsive">
                    <table id="dom-jqry" class="table table-striped table-bordered nowrap">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Template Subject</th> 
                            <th>Template Type</th>
                                <?php echo ($tempType == 2) ? '<th>Time Delay</th>' : '' ?>
                            <th>Template Content</th>
                            <th>Added On</th>
                            <th class="text-center">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        
                        $template_types = array(
                            1=> 'Automated Emails',
                            2=> 'Follow up Email',
                            3=> 'Broadcast Email'
                        );
                            $count = 0;
                            foreach($tempList as $list) : 
                            $count++;
                        ?>
                            <tr>
                                <td><?php echo $count; ?></td>
                                <td><?php echo $list->template_name; ?></td> 
                                <td><?php echo $template_types[$list->template_type]; ?></td>
                                <?php echo ($tempType == 2) ? '<td>'.$list->time_delay.'</td>': '' ?>
                                <td width="40%"><?php echo $list->template_content ?></td>
                                <td><?php echo $list->created_at ?></td>
                                <td class="text-center">
                                    <a class="label label-inverse-info" href="<?php echo base_url().'editOld/'.$list->id; ?>" title="Edit">Edit</a> |
                                    <a class="label label-inverse-danger" href="<?= base_url().'delete-template/'.$list->id; ?>" onclick="return confirm('Are you sure you want to delete this Template?');" title="Delete Template">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        <!-- <div class="paginate-link">
                            <?php //echo $this->pagination->create_links(); ?>
                        </div>  -->

                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>