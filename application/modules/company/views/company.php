<div class="content">
    <?php $data['msg']="Welcome To Company Setup"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <?php  if(hasPermission("company",ADD)): ?>
            <?php if(isset($add)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open_multipart("company/add"); ?>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="name">Company Name</label><small class="req"> *</small> 
                                                <input type="text" name="name" placeholder="Company Name" class="form-control" required id="name" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label style="font-size:10px;"  for="logo"> Logo</label><small class="req">*</small>
                                                <span style="font-size:7px; color:#ff0000" class="">(JPG,JPEG,GIF AND MAX SIZE 500 KB)</span>
                                                <input type="file" onchange="readURL(this);" name="logo"  class="form-control" required id="logo" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="img_show">
                                                <img id="image"  src="<?= IMG_URL ?>150.png" alt="your image" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="address">Address</label><small class="req"> *</small> 
                                                <input type="text" name="address" placeholder="Address" class="form-control" required id="address" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="mobile">Mobile No</label><small class="req"> *</small> 
                                                <input type="text" name="mobile" placeholder="Mobile Number" class="form-control" required id="mobile" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="tel">Telephone No</label>
                                                <input type="text" name="tel" placeholder="Telephone No" class="form-control"  id="tel" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" placeholder="Email Address" class="form-control"  id="email" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="web">Web</label>
                                                <input type="text" name="web"  placeholder="www.abc.com" class="form-control"  id="web" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group pull-left  m-l-15 ">
                                                <button name="add_company" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
                </div> <!-- End row -->
            <?php endif; ?>
        <?php endif; ?>
        <?php  if(hasPermission("company",EDIT)): ?>
            <?php if(isset($edit)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open_multipart("company/edit/".$single->id); ?>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="name">Name</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single->name ?>" name="name" placeholder="Company Name" class="form-control" required id="name" >
                                                <input type="hidden" value="<?php echo @$single->id ?>" name="id" class="form-control" required id="id" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label style="font-size:10px;"  for="logo"> Logo</label>
                                                <span style="font-size:7px; color:#ff0000" class="">(JPG,JPEG,GIF AND MAX SIZE 500 KB)</span>
                                                <input type="file" onchange="readURL(this);" name="logo"  class="form-control"  id="logo" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="img_show">
                                                <img id="image" src="<?= base_url().@$single->logo ?>" alt="your image" />
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="address">Address</label><small class="req"> *</small> 
                                                <input type="text" value="<?php echo @$single->address ?>" name="address" placeholder="Address" class="form-control" required id="address" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="mobile">Mobile No</label><small class="req"> *</small> 
                                                <input type="text" name="mobile" value="<?php echo @$single->mobile; ?>" placeholder="Mobile Number" class="form-control" required id="mobile" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="tel">Telephone No</label>
                                                <input type="text" name="tel" value="<?php echo @$single->tel; ?>" placeholder="Telephone No" class="form-control"  id="tel" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="<?php echo @$single->email; ?>" placeholder="Email Address" class="form-control"  id="email" >
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="web">Web</label>
                                                <input type="text" name="web" value="<?php echo @$single->web; ?>" placeholder="www.abc.com" class="form-control"  id="web" >
                                            </div>
                                        </div>
                                        <div class="col-sm-2">
                                            <div class="form-group pull-left  m-l-15 ">
                                                <button name="edit_company" type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
                </div> <!-- End row -->
            <?php endif; ?>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table id="datatable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th class="text-center">SL</th>
                                                <th class="text-center">Name</th>
                                                <th class="text-center">Logo</th>
                                                <th class="text-center">Address</th>
                                                <th class="text-center">Mobile</th>
                                                <th class="text-center">Telephone</th>
                                                <th class="text-center">Email</th>
                                                <th class="text-center">Web</th>
                                                <th class="text-center">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php if(isset($all_company)): ?>
                                            <?php foreach($all_company as $key=>$value):?>
                                                <tr>
                                                    <td class="text-center"><?php echo ++$key; ?></td>
                                                    <td class="text-center"><?php echo $value['name']; ?></td>
                                                    <td class="text-center"><img class="img-responsive" width="70px" height="40px" src="<?= base_url().$value['logo'] ?>" alt=""></td>
                                                    <td class="text-center"><?php echo $value['address']; ?></td>
                                                    <td class="text-center"><?php echo $value['mobile']; ?></td>
                                                    <td class="text-center"><?php echo $value['tel']; ?></td>
                                                    <td class="text-center"><?php echo $value['email']; ?></td>
                                                    <td class="text-center"><?php echo $value['web']; ?></td>
                                                    <td class="actions btn-group-xs text-center">
                                                        <?php if (hasPermission("company", EDIT)) : ?>
                                                            <a title="Edit" href="<?php echo site_url("company/edit/" . $value['id']); ?>" class=" btn btn-default btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View"><i class="fa fa-edit"></i></a>
                                                        <?php endif; ?>
                                                        <?php if (is_super_admin()) : ?>
                                                            <a onclick="return confirm('Are You sure want to delete this?')" href="<?php echo site_url("company/delete/" . $value['id']); ?>" title="Delete" class="text-danger btn btn-default  btn-xs  waves-effect tooltips" data-placement="top" data-toggle="tooltip" data-original-title="View" id="course"><i class="fa fa-trash"></i></a>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach;?>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Row -->

    </div> <!-- container -->
</div>
<script src="<?php echo VENDOR_URL; ?>datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo VENDOR_URL; ?>datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
       $('#datatable').dataTable({
           "info":false,
           "autoWidth": false
       });
    });
</script>
<script type="text/javascript">
    function readURL(input) {
        if(input.files.length>0)
        {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(75)
                        .height(65);
                };

                reader.readAsDataURL(input.files[0]);
            }

        }else{

            $(".img_show").html('<img id="image" src="<?= IMG_URL ?>150.png" alt="your image" />');
        }
    }
    $(".img_show").on("click","#image",function(){
        $("#logo").val('');
        $(".img_show").html('<img id="image" src="<?= IMG_URL ?>150.png" alt="your image" />');
    });
</script>