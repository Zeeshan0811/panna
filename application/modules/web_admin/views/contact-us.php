<div class="content">
    <?php $data['msg']="Welcome To Manage About Us"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <?php  if(hasPermission("about_us",VIEW)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open("admin/contact-us"); ?>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Company Name</label><span class="req">*</span>
                                                <input type="text" required id="name" name="name" value="<?= @$single->name ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="address">Address</label><span class="req">*</span>
                                                <input type="text" required id="address" name="address" value="<?= @$single->address ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="email">Email</label><span class="req">*</span>
                                                <input type="email" required id="email" name="email" value="<?= @$single->email ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="mobile">Mobile</label><span class="req">*</span>
                                                <input type="text" required id="mobile" name="mobile" value="<?= @$single->mobile ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="web">Web</label>
                                                <input type="text"  id="web" name="web" value="<?= @$single->web ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="facebook">Facebook</label>
                                                <input type="text"  id="facebook" name="facebook" value="<?= @$single->facebook ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="twitter">Twitter</label>
                                                <input type="text"  id="twitter" name="twitter" value="<?= @$single->twitter ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="linkedin">Linkedin</label>
                                                <input type="text"  id="linkedin" name="linkedin" value="<?= @$single->linkedin ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-sm-4 m-t-22">
                                            <button type="submit" class="btn btn-info">Update</button>
                                        </div>
                                    </div>
                                </form>
                            </div> <!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col -->
                </div> <!-- End row -->
        <?php endif; ?>
    </div> <!-- container -->
</div>