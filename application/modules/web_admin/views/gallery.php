<div class="content">
    <?php $data['msg']="Welcome To Manage Gallery"; ?>
    <?php $this->load->view("message",$data) ?>
    <div class="container">
        <?php  if(hasPermission("gallery",ADD)): ?>
            <?php if(isset($add)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open_multipart("web_admin/admin/gallery_add"); ?>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" name="title" id="title" placeholder="Image Title" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="image">Image</label><span class="req">*</span><span class="label_notice">(jpg,png,jpeg, size 500KB)</span>
                                                <input type="file" required name="image" id="image" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group pull-left m-t-22 m-l-15 ">
                                                <button  type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Add</button>
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
        <?php  if(hasPermission("gallery",EDIT)): ?>
            <?php if(isset($edit)): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open_multipart("admin/galleryEdit/".$single->id); ?>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" value="<?= $single->title; ?>" name="title" id="title" placeholder="Image Title" class="form-control" >
                                                <input type="hidden" required name="id" value="<?= $single->id; ?>" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="image">Image</label><span class="label_notice">(jpg,png,jpeg, size 500KB)</span>
                                                <input type="file"  name="image" id="image" class="form-control" >
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group pull-left m-t-22 m-l-15 ">
                                                <button  type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Update</button>
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
            <div class="col-sm-12">
                <div class="panel">
                    <div class="panel-body">
                        <!-- <form id="find"> -->
                        <div class="row">
                            <?php if(isset($all_gallery)): ?>
                                <?php foreach($all_gallery as $value): ?>
                                    <div class="col-md-4">
                                        <div  class="thumbnail gallery_box">
                                            <div class="caption">
                                                <p><?= $value['title']; ?></p>
                                            </div>
                                        <img src="<?= base_url().$value['image_thumb']; ?>" alt="<?= $value['title']; ?>" style="width:100%">
                                        <div class="caption">
                                            <a href="<?= site_url("admin/galleryEdit/".$value['id']); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                            <a href="<?= site_url("admin/galleryDelete/".$value['id']); ?>" onclick="return confirm('Are You Sure?')" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                            <?php endif;?>
                        </div>
                    </div> <!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col -->
        </div> <!-- End row -->
    </div> <!-- container -->
</div>