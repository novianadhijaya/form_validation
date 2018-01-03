<style> 
    /*    .btn {
            margin-left: 4%;
        }*/
    table{
        margin: 0 auto;
        width: 100%;
        clear: both;
        border-collapse: collapse;
        table-layout: fixed; // ***********add this
        word-wrap:break-word; // ***********and this
    }
    .form-control {
        height: auto!important;
        padding: 8px 12px !important;
    }
    .input-group {
        -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
        -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
        box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    }

    #myBtn {
        display: none;
        position: fixed;
        bottom: 20px;
        right: 30px;
        z-index: 99;
        border: none;
        outline: none;
        background-color: red;
        color: white;
        cursor: pointer;
        padding: 15px;
        border-radius: 10px;
    }

    #myBtn:hover {
        background-color: #555;
    }

    .modal-header, h4, .close {
        /*background-color: #5cb85c;*/
        background-color: #cc0000;
        color:white !important;
        text-align: center;
        font-size: 30px;
    }
    .modal-footer {
        background-color: #f9f9f9;
    }
    .modal-80p {
    width:80%; /* 80% of page to provide space for labels */
  }
</style>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<div class="container-fluid">
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" align="center">Data Customers</h3>                                            
                </div><br /><!-- /.box-header -->

                <!-- Large modal -->
                <div class="row">
                    <div class="col-xs-12 col-md-2" align='center'>
                        <?php echo anchor('customer_active/add/' . $this->uri->segment(3), '<i class="fa fa-plus-circle" aria-hidden="true"></i> Add New Data', "title='Tambah Data' class='btn btn-info btn-sm'"); ?>
                    </div>
                    <div class="col-xs-12 col-md-8" >
                        <table class="table table-hover" >
                            <tr class="success">
                                <td align="center">
                                    <a class="btn btn-success btn-sm" href="<?php echo base_url('customer_all'); ?>"><i class="fa fa-users" aria-hidden="true"></i> All Total <span class="badge">
                                            <?php $jumlah = $this->db->get("tbl_customer")->num_rows(); ?>
                                            <?php echo $jumlah ?>
                                        </span></a> 
                                    <a class="btn btn-primary btn-sm" href="<?php echo base_url('customer_active'); ?>" role="button"><i class="fa fa-users" aria-hidden="true"></i> Active <span class="badge">
                                            <?php $jumlah = $this->db->query("SELECT tcr.*,tc.country_name,tp.postal_name,ty.city_name
                                                                          FROM tbl_customer as tcr, tbl_country as tc, tbl_postal as tp, tbl_city as ty
                                                                          WHERE tcr.country_id=tc.country_id and tcr.postal_id=tp.postal_id and tcr.city_id=ty.city_id and tcr.cust_status='active'")->num_rows(); ?>
                                            <?php echo $jumlah ?></span></a>  
                                    <a class="btn btn-danger btn-sm" href="<?php echo base_url('customer_inactive'); ?>"><i class="fa fa-user-times" aria-hidden="true"></i> In Active <span class="badge">
                                            <?php
                                            $jumlah = $this->db->query("SELECT tcr.*,tc.country_name,tp.postal_name,ty.city_name "
                                                            . "FROM tbl_customer as tcr, tbl_country as tc, tbl_postal as tp, tbl_city as ty "
                                                            . "WHERE tcr.country_id=tc.country_id and tcr.postal_id=tp.postal_id and tcr.city_id=ty.city_id and tcr.cust_status='inactive'")->num_rows();
                                            ?>
                                            <?php echo $jumlah ?>
                                        </span></a>  
                                    <a class="btn btn-warning btn-sm" href="<?php echo base_url('customer_pending'); ?>"><i class="fa fa-wheelchair" aria-hidden="true"></i> Pending <span class="badge"> 
                                            <?php
                                            $jumlah = $this->db->query("SELECT tcr.*,tc.country_name,tp.postal_name,ty.city_name "
                                                            . "FROM tbl_customer as tcr, tbl_country as tc, tbl_postal as tp, tbl_city as ty "
                                                            . "WHERE tcr.country_id=tc.country_id and tcr.postal_id=tp.postal_id and tcr.city_id=ty.city_id and tcr.cust_status='pending'")->num_rows();
                                            ?>
                                            <?php echo $jumlah ?></span></a> 
                                    <a class="btn btn-info btn-sm" href="<?php echo base_url('customer_reject'); ?>"><i class="fa fa-trash" aria-hidden="true"></i> Reject <span class="badge">
                                            <?php
                                            $jumlah = $this->db->query("SELECT tcr.*,tc.country_name,tp.postal_name,ty.city_name "
                                                            . "FROM tbl_customer as tcr, tbl_country as tc, tbl_postal as tp, tbl_city as ty "
                                                            . "WHERE tcr.country_id=tc.country_id and tcr.postal_id=tp.postal_id and tcr.city_id=ty.city_id and tcr.cust_status='reject'")->num_rows();
                                            ?>
                                            <?php echo $jumlah ?></span></a>
                                </td>
                            </tr>
                        </table>

                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-md-12">

                        <div class="box-body table-responsive panel-body">
                            <div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
                            <div id="notifications"><?php echo $this->session->flashdata('msgdelete'); ?></div>
                            <table  class="table table-responsive table-striped table-bordered table-hover"  id='mydata'>

                                <thead>
                                    <tr class="info">
                                        <th width='10px'>No</th>
                                        <th width='50px'>Cust Code</th>
                                        <th width='120px'>Cust Company</th>
                                        <th width='120px'>Cust Name</th>
                                        <th width='120px'>Cust Address 1</th>
                                        <th width='120px'>Cust Address 2</th>
                                        <th width='60px'>Cust Country</th>
                                        <th width='120px'>Cust Postal</th>
                                        <th width='180px'>Cust City</th>
                                        <th width='60px'>Cust Phone</th>
                                        <th width='60px'>Cust Fax</th>
                                        <th width='60px'>Cust Mobile</th>
                                        <th width='60px'>Cust ID Number</th>
                                        <th width='80px'>Cust NPWP</th>
                                        <th width='160px'>Cust NPWP Address 1</th>
                                        <th width='160px'>Cust NPWP Address 2</th>
                                        <th width='60px'>Cust NPWP Name</th>
                                        <th width='60px'>Cust NPPKP</th>
                                        <th width='60px'>Cust Payment</th>
                                        <th width='60px'>Cust Limit</th>
                                        <th width='60px'>Cust TOP</th>
                                        <th width='60px'>Cust Type</th>
                                        <th width='60px'>Cust Location</th>
                                        <th width='60px'>Cust Since</th>
                                        <th width='60px'>Cust SalesID</th>
                                        <th width='60px'>Cust Status</th>
                                        <th width='220px'>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($active->result_array() as $i):
                                        $customer_id = $i['customer_id'];
                                        $cust_code = $i['cust_code'];
                                        $cust_company = $i['cust_company'];
                                        $cust_name = $i['cust_name'];
                                        $cust_address1 = $i['cust_address1'];
                                        $cust_address2 = $i['cust_address2'];
                                        $country_id = $i['country_name'];
                                        $postal_id = $i['postal_name'];
                                        $city_id = $i['city_name'];
                                        $cust_phone = $i['cust_phone'];
                                        $cust_fax = $i['cust_fax'];
                                        $cust_mobile = $i['cust_mobile'];
                                        $cust_id_number = $i['cust_id_number'];
                                        $cust_NPWP = $i['cust_NPWP'];
                                        $cust_NPWP_Address1 = $i['cust_NPWP_Address1'];
                                        $cust_NPWP_Address2 = $i['cust_NPWP_Address2'];
                                        $cust_NPWP_Name = $i['cust_NPWP_Name'];
                                        $cust_NPPKP = $i['cust_NPPKP'];
                                        $cust_payment = $i['cust_payment'];
                                        $cust_limit = $i['cust_limit'];
                                        $cust_TOP = $i['cust_TOP'];
                                        $cust_Type = $i['cust_Type'];
                                        $cust_location = $i['cust_location'];
                                        $cust_since = $i['cust_since'];
                                        $cust_salesID = $i['cust_salesID'];
                                        $cust_status = $i['cust_status'];
                                        ?>
                                        <?php $no++; ?>
                                        <tr>
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $cust_code; ?></td>
                                            <td><?php echo $cust_company; ?></td>
                                            <td><?php echo $cust_name; ?></td>
                                            <td><?php echo $cust_address1; ?></td>
                                            <td><?php echo $cust_address2; ?></td>
                                            <td><?php echo $country_id; ?></td>
                                            <td><?php echo $postal_id; ?></td>
                                            <td><?php echo $city_id; ?></td>
                                            <td><?php echo $cust_phone; ?></td>
                                            <td><?php echo $cust_fax; ?></td>
                                            <td><?php echo $cust_mobile; ?></td>
                                            <td><?php echo $cust_id_number; ?></td>
                                            <td><?php echo $cust_NPWP_Name; ?></td>
                                            <td><?php echo $cust_NPWP; ?></td>
                                            <td><?php echo $cust_NPWP_Address1; ?></td>
                                            <td><?php echo $cust_NPWP_Address2; ?></td>
                                            <td><?php echo $cust_NPPKP; ?></td>
                                            <td><?php echo $cust_payment; ?></td>
                                            <td><?php echo $cust_limit; ?></td>
                                            <td><?php echo $cust_TOP; ?></td>
                                            <td><?php echo $cust_Type; ?></td>
                                            <td><?php echo $cust_location; ?></td>
                                            <td><?php echo $cust_since; ?></td>
                                            <td><?php echo $cust_salesID; ?></td>
                                            <td><?php echo $cust_status; ?></td>

                                            <td>
                                                <a class="btn btn-xs btn-success" href="<?php echo base_url('customer_active/edit_code/') . $customer_id  ?>"><i class="fa fa-calendar-check-o"></i> Edit Code</a>
                                                <a class="btn btn-xs btn-info" href="<?php echo base_url('customer_active/edit/') . $customer_id  ?>"><i class="fa fa-refresh"></i> Edit Data</a>
                                                <a class="btn btn-xs btn-danger" data-toggle="modal" data-target="#modal_active<?php echo $customer_id; ?>"><i class="fa fa-user-times"></i> Inactive</a>
                                            </td>
                                        </tr>

                                    <?php endforeach; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div></div></div>

<?php
foreach ($active->result_array() as $r):
    $customer_id = $r['customer_id'];
    $cust_status = $r['cust_status'];
    ?>
    <!--================= END ARRAY INACTIVE =============-->

    <div class="modal fade " id="modal_active<?php echo $customer_id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel" >
                        <strong >Warning!</strong> Do you want to inactive this customer ?
                    </h3>
                </div>

                <form class="form-horizontal" data-whatever="@form-user" method="post" action="<?php echo base_url() . 'customer_active/inactive' ?>">
                    <div class="modal-body">
                        <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                        <div class="form-group">
                            <label class="control-label col-xs-3" >Customer Status</label>
                            <div class="col-xs-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-off"></i></span>    
                                    <select name="cust_status" class="form-control">
                                        <option>INACTIVE</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-xs-3" >Descrition</label>
                            <div class="col-xs-8">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
                                    <textarea name="status" class="form-control" type="text" placeholder="Description Inactive Customer..." required></textarea>
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove"></span> Close</button>
                        <button class="btn btn-info" name="submit"><span class="glyphicon glyphicon-send"></span> Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php endforeach; ?>
<!--END MODAL INACTIVE-->



<!--MODAL EDIT CUSTOMER-->
<?php
foreach ($active->result_array() as $r):
    $customer_id = $r['customer_id'];
    $cust_code = $r['cust_code'];
    ?>
    <!--================= END ARRAY INACTIVE =============-->

    <div class="modal fade " id="modal_edit<?php echo $customer_id; ?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                    <h3 class="modal-title" id="myModalLabel" >
                        <strong >FORM EDIT CUSTOMER</strong>
                    </h3>
                </div>

                <form class="form-horizontal" data-whatever="@form-user" method="post" action="<?php echo base_url() . 'customer_active/edit' ?>">
                    <div class="modal-body">
                        <input type="hidden" name="customer_id" value="<?php echo $customer_id; ?>">
                        <div class="form-group form-group-sm">
                            <!-- left column -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="new_discount" class="col-sm-2 control-label">Cust Code</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon">%</span>
                                            <input type="text" class="form-control" id="new_discount" placeholder="" value="<?php echo $cust_code; ?>">
                                            <?php echo form_error('cust_code', '<div class="form-error">', '</div>') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_subname" class="col-sm-2 control-label">Subname</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_subname" placeholder="">
                                    </div>
                                </div>


                                <p class="lead">Ship to address</p>
                                <div class="form-group">
                                    <label for="new_address" class="col-sm-2 control-label bg-danger">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_address" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_addresssub" class="col-sm-2 control-label">Address 2</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_addresssub" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_zip" class="col-sm-2 control-label bg-danger">Zip</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" id="new_zip" placeholder="">
                                    </div>
                                    <div class="col-sm-7">
                                        <label for="new_zip_detail" class="sr-only">City, State Country</label>
                                        <input type="text" class="form-control" id="new_zip_detail" placeholder="City, State Country" disabled="">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="new_phone" class="col-sm-2 control-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="phone" class="form-control" id="new_phone" placeholder="">
                                    </div>
                                </div>


                                <p class="lead">Bill to address</p>
                                <div class="form-group">
                                    <label for="new_qbnameid" class="col-sm-2 control-label">QBNAMEID</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_qbnameid" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_billadditional" class="col-sm-2 control-label">Name (if other)</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_billadditional" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_billto_addr" class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_billto_addr" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_billto_addrsub" class="col-sm-2 control-label">Address 2</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_billto_addsubr" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="new_billto_zip" class="col-sm-2 control-label">Zip</label>
                                    <div class="col-sm-3">
                                        <label for="new_billto_zip" class="sr-only">City, State Country</label>
                                        <input type="text" class="form-control" id="new_billto_zip" placeholder="">
                                    </div>
                                    <div class="col-sm-7">
                                        <label for="new_billto_zip_detail" class="sr-only">City, State Country</label>
                                        <input type="text" class="form-control" id="new_billto_zip_detail" placeholder="City, State Country" disabled="">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="new_www" class="col-sm-2 control-label">Website</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="new_www" placeholder="">
                                    </div>
                                </div>
                            </div>





                            <!-- right column -->
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="new_company_identity" class="col-sm-2 control-label">Company Identity</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="new_company_identity">
                                            <option value="1">Default</option>
                                            <option value="2">Company 2</option>
                                            <option value="3">Company 3</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="new_bol_require" class="col-sm-2 control-label">BOL Required</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="new_bol_require">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                    <label for="new_pod_require" class="col-sm-2 control-label">POD Required</label>
                                    <div class="col-sm-4">
                                        <select class="form-control" id="new_pod_require">
                                            <option value="0">No</option>
                                            <option value="1">Yes</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="new_discount" class="col-sm-2 control-label">Discount</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <input type="number" class="form-control" id="new_discount" placeholder="0.00">
                                            <span class="input-group-addon">%</span>
                                        </div>
                                    </div>
                                    <label for="new_credit" class="col-sm-2 control-label">Credit Limit</label>
                                    <div class="col-sm-4">
                                        <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                            <input type="number" class="form-control" id="new_credit" placeholder="0.00">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="new_terms" class="col-sm-2 control-label">Terms</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="new_terms">
                                            <option value="Net 15">Net 15</option>
                                            <option value="Net 30">Net 30</option>
                                            <option value="Due on receipt">Due on receipt</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group form-group-sm">
                                    <label for="new_comcode" class="col-sm-2 control-label">Sales Rep</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="new_comcode">
                                            <option value="0">N/A</option>
                                            <option value="1">Alice</option>
                                            <option value="2">Bob</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="new_active" class="col-sm-2 control-label">Active</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" id="new_active">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>


                                <!-- Begin contact information -->
                                <div id="tabs">
                                    <ul>
                                        <li><a href="#normalcontact">Normal Contact</a></li>
                                        <li><a href="#billcontact">Bill Contact</a></li>
                                        <!--<li><a href="#testcontact">Test Contact</a></li>-->
                                    </ul>

                                    <!-- Normal Contact Begin -->
                                    <div id="normalcontact">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <span class="label label-default">Name</span>
                                                <input type="text" class="form-control" id="new_contact" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <span class="label label-default">Phone</span>
                                                <input type="text" class="form-control" id="new_phone" placeholder="">
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="label label-default">Alt Phone</span>
                                                <input type="text" class="form-control" id="new_otherphone" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <span class="label label-default">Cell</span>
                                                <input type="text" class="form-control" id="new_cellphone" placeholder="">
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="label label-default">Fax</span>
                                                <input type="text" class="form-control" id="new_fax" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <span class="label label-default">Email</span>
                                                <input type="text" class="form-control" id="new_email" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Normal Contact End -->

                                    <!-- Bill Contact Begin -->
                                    <div id="billcontact">
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <span class="label label-default">Name</span>
                                                <input type="text" class="form-control" id="new_billcontact" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <span class="label label-default">Phone</span>
                                                <input type="text" class="form-control" id="new_billphone" placeholder="">
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="label label-default">Alt Phone</span>
                                                <input type="text" class="form-control" id="new_billotherphone" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <span class="label label-default">Cell</span>
                                                <input type="text" class="form-control" id="new_billcellphone" placeholder="">
                                            </div>
                                            <div class="col-sm-6">
                                                <span class="label label-default">Fax</span>
                                                <input type="text" class="form-control" id="new_billfax" placeholder="">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <span class="label label-default">Email</span>
                                                <input type="text" class="form-control" id="new_billemail" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Bill Contact End -->

                                </div>
                                <!-- End contact information -->
                            </div>
                        </div>


                        <!-- End main input boxes, starting a new "row" -->

                        <div class="form-group form-group-sm">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="new_comments" class="col-sm-1 control-label">Comments</label>
                                    <div class="col-sm-11">
                                        <textarea class="form-control" rows="3" id="new_comments"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-default">Reset</button>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" name="submit">Create Record</button>
                        </div><!-- End Modal Footer -->




                </form>
            </div> <!-- End modal body div -->
        </div> <!-- End modal content div -->
    </div> <!-- End modal dialog div -->
    </div> <!-- End modal div -->
<!--MODAL END CUSTOMER-->


<?php endforeach; ?>
<!--END MODAL INACTIVE-->



<!-- jQuery -->
<script src="<?php echo base_url(); ?>assets02/vendors/jquery/dist/jquery.js"></script> 
<script>
    $(document).ready(function () {
        $('#mydata').DataTable();
    });
</script>

<script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            document.getElementById("myBtn").style.display = "block";
        } else {
            document.getElementById("myBtn").style.display = "none";
        }
    }

// When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }

</script>





