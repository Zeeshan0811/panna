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
                                <?php echo form_open_multipart("admin/about-us"); ?>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="about_us">About Us</label><span class="req">*</span>
                                                <textarea required cols="5" rows="10" name="about_us" placeholder="About Us" id="about_us" class="form-control"><?= $single->description; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
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