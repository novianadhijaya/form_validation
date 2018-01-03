<style>
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
    .form-error {
        display: inline-block;
        padding: 6px 10px 4px 25px;
        color: red;
        background-image: url(<?php echo base_url(); ?>assets02/images/icon_error.png);
        background-position: 5px 7px;
        background-repeat: no-repeat;
        background-color: #F2DEDE;
    }
</style>
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<div class="container-fluid" >
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h4 class="panel-title" align="center">Form Input Customer</h4>                                          
                </div> 

                <div class="panel-body table-responsive">

                    <?php
                    echo form_open('customer_active/add');
                    ?>

                    <!--<div class="row">-->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Code</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                                    <input  name="cust_code" placeholder="isikan customer code" class="form-control"  value="<?php echo set_value('cust_code'); ?>" size="10">
                                    <?php echo form_error('cust_code','<div class="form-error">','</div>') ?>
                                </div>
                            </div>
                        </div><br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Company</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                    <input  name="cust_company" placeholder="isikan Customer Company" class="form-control"  type="text" >
                                    <?php echo form_error('cust_company','<div class="form-error">','</div>') ?>
                                </div>
                            </div>
                        </div><br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Name</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input  name="cust_name" placeholder="Isikan Company Name" class="form-control"  type="text" >
                                     <?php echo form_error('cust_name','<div class="form-error">','</div>') ?>
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Number</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input  name="cust_id_number" placeholder="Isikan Number Customer" class="form-control"  type="text" >
                                    <?php echo form_error('cust_name','<div class="form-error">','</div>') ?>
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Address 1</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                                    <input  name="cust_address1" placeholder="Isikan Company address" class="form-control"  type="text" type="text" >
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Address 2</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
                                    <input  name="cust_address2" placeholder="Isikan Company address" class="form-control"  type="text" >
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Country</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-plane"></i></span>
                                    <!--<input  id="country" name="cust_country" placeholder="Isikan Country" class="form-control"  type="text" >-->
                                    <select id="country" name="country_id" class="form-control" >
                                        <option selected="selected"></option>
                                        <?php
                                        foreach ($record as $r) {
                                            echo "<option value='$r->country_id'>$r->country_name</option>";
                                        }
                                        ?>
                                    </select>
                                    <?php echo form_error('country_id','<div class="form-error">','</div>') ?>
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Postal</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-qrcode"></i></span>
                                    
                                    <select id="postal" name="postal_id" class="form-control" >
                                        <option selected="selected"></option>
                                    </select>
                                    <?php echo form_error('postal_id','<div class="form-error">','</div>') ?>
                                </div>
                            </div>
                        </div><br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust City</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>

                                    <select id="city" name="city_id" class="form-control"  >
                                        <option selected="selected"></option>
                                    </select>
                                    <?php echo form_error('city_id','<div class="form-error">','</div>') ?>
                                </div>
                            </div>
                        </div>
                        <br><br />                       
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Phone</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input  name="cust_phone" placeholder="Isikan Phone Customer" class="form-control"  type="text" >
                                    <?php echo form_error('cust_phone','<div class="form-error">','</div>') ?>
                                </div>
                            </div>
                        </div><br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Fax</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-print"></i></span>
                                    <input  name="cust_fax" placeholder="Isikan Fax Customer" class="form-control"  type="text" >
                                     <?php echo form_error('cust_fax','<div class="form-error">','</div>') ?>
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Mobile</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                    <input  name="cust_mobile" placeholder="Isikan Mobile Customer" class="form-control"  type="text" >
                                    <?php echo form_error('cust_mobile','<div class="form-error">','</div>') ?>
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust NPWP Address 1</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                                    <input  name="cust_NPWP_Address1" placeholder="Isikan NPWP Address Customer" class="form-control"  type="text" >
                                </div>
                            </div>
                        </div><br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust NPWP Address 2</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                                    <input  name="cust_NPWP_Address2" placeholder="Isikan NPWP Address Customer" class="form-control"  type="text" >
                                </div>
                            </div>
                        </div>

                    </div>
                    <!--//end-->

                    <!--first-->
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust NPWP Name</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                                    <input  name="cust_NPWP_Name" placeholder="Isikan NPWP Name Customer" class="form-control"  type="text" >
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust NPWP</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                                    <input  name="cust_NPWP" placeholder="Isikan NPWP Name Customer" class="form-control"  type="text" >
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust NPPKP</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-check"></i></span>
                                    <input  name="cust_NPPKP" placeholder="Isikan NPPKP Customer" class="form-control"  type="text" >
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Payment</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
                                    <input  name="cust_payment" placeholder="Isikan Payment Customer" class="form-control"  type="text" >
                                    <?php echo form_error('cust_payment','<div class="form-error">','</div>') ?>
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Limit</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                                    <input  name="cust_limit" placeholder="Isikan Limit  Credit" class="form-control"  type="text"  >
                                    <?php echo form_error('cust_limit','<div class="form-error">','</div>') ?>
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust TOP</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                                    <input  name="cust_TOP" placeholder="Isikan TOP" class="form-control"  type="text" >
                                     <?php echo form_error('cust_TOP','<div class="form-error">','</div>') ?>
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Type</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
                                    <input  name="cust_Type" placeholder="Isikan Type" class="form-control"  type="text" >
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Since</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    <input  name="cust_since" placeholder="MM/DD/YYYY"  class="form-control"  type="date" >
                                </div>
                            </div>
                        </div>
                        <br><br><br>
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust SalesID</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                    <input  name="cust_salesID" placeholder="Isikan Sales ID" class="form-control"  type="text" >
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Location</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-globe"></i></span>
                                    <input  name="cust_location" placeholder="Isikan Cust Location" class="form-control"  type="text" >
                                </div>
                            </div>
                        </div>
                        <br><br />
                        <div class="form-group">
                            <label class="col-md-4 control-label">Cust Status</label>  
                            <div class="col-md-8 inputGroupContainer">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-heart"></i></span>
                                    <select name="cust_status" class="form-control">
                                        <option>active</option>
                                        <option>inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div><br><br />

                    </div>


                    <div class="col-xs-6 col-sm-12" align="center">
                        <hr>
                        <button type="submit" name="submit" class="btn btn-info btn-sm" ><i class="fa fa-save"></i> Save</button>
                        <button type="reset" class="btn btn-primary btn-sm" ><i class="fa fa-cogs"></i> Reset</button>
                        <?php echo anchor('customer_active', '<i class="fa fa-history"></i> Back', array('class' => 'btn btn-danger btn-sm')); ?>

                    </div>

                    <!--end-->

                    <?php echo form_close(); ?>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div></div></div>

        <!-- jQuery -->
<script src="<?php echo base_url(); ?>assets02/vendors/jquery/dist/jquery.js"></script> 

<script>
    $(document).ready(function () {
        $("#country").change(function () {
            var url = "<?php echo site_url('customer_active/add_ajax_postal'); ?>/" + $(this).val();
            $('#postal').load(url);
            return false;
        })

        $("#postal").change(function () {
            var url = "<?php echo site_url('customer_active/add_ajax_city'); ?>/" + $(this).val();
            $('#city').load(url);
            return false;
        })

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