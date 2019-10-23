<div class="content">
    <?php $data['msg'] = "Welcome To Manage Slider"; ?>
    <?php $this->load->view("message", $data) ?>
    <div class="container">
        <?php if (hasPermission("slider", ADD)) : ?>
            <?php if (isset($add)) : ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open_multipart("web_admin/admin/slider_add"); ?>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="title">Title</label><span class="req">*</span>
                                            <input type="text" required name="title" id="title" placeholder="Image Title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="details">Details</label><span class="req">*</span>
                                            <input type="text" required name="details" id="details" placeholder="Image Details" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="order">Order</label><span class="req">*</span>
                                            <input type="text" required name="order" id="order" placeholder="Order" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="image">Image</label><span class="req">*</span><span class="label_notice">(jpg,png,jpeg, size 1MB)</span>
                                            <input type="file" required name="image" id="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group pull-left m-t-22 m-l-15 ">
                                            <button type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Add</button>
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
        <?php if (hasPermission("slider", EDIT)) : ?>
            <?php if (isset($edit)) : ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="panel">
                            <div class="panel-body">
                                <!-- <form id="find"> -->
                                <?php echo form_open_multipart("admin/sliderEdit/" . $single->id); ?>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="title">Title</label><span class="req">*</span>
                                            <input type="text" required value="<?= $single->title; ?>" name="title" id="title" placeholder="Image Title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="details">Details</label><span class="req">*</span>
                                            <input type="text" required value="<?= $single->details ?>" name="details" id="details" placeholder="Image Details" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="order">Order</label><span class="req">*</span>
                                            <input type="text" required name="order" value="<?= $single->position; ?>" id="order" placeholder="Order" class="form-control">
                                            <input type="hidden" required name="id" value="<?= $single->id; ?>">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for="image">Image</label><span class="label_notice">(jpg,png,jpeg, size 1MB)</span>
                                            <input type="file" name="image" id="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group pull-left m-t-22 m-l-15 ">
                                            <button type="submit" class="btn btn-primary"><i class="md md-add m-r-5"></i>Update</button>
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
                            <?php if (isset($all_slider)) : ?>
                                <?php foreach ($all_slider as $value) : ?>
                                    <div class="col-md-4 singlethumb">
                                        <div class="thumbnail">
                                            <div class="caption">
                                                <p><?= $value['title']; ?></p>
                                            </div>
                                            <img src="<?= base_url() . $value['image']; ?>" alt="<?= $value['title']; ?>" style="width:100%">
                                            <div class="caption">
                                                <p>Position: <?= $value['position']; ?></p>
                                                <p class="m-b-10"><?= textshorten($value['details'], 100); ?></p>
                                                <a href="<?= site_url("admin/sliderEdit/" . $value['id']); ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                                                <a href="<?= site_url("admin/sliderDelete/" . $value['id']); ?>" class="btn btn-danger deleteRow"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                    </div> <!-- panel-body -->
                </div> <!-- panel -->
            </div> <!-- col -->
        </div> <!-- End row -->
    </div> <!-- container -->
</div>

<script>
    $(document).on("click", ".deleteRow", function(e) {
        e.preventDefault();
        // debugger;
        var element = $(this);
        var confirmation = confirm('Are You sure want to delete this?');
        var url = element.attr('href');

        if (confirmation != true) {
            return false;
        } else {
            $.ajax({
                url: url,
                cache: false,
                success: function(data) {
                    if (data == 1) {
                        element.closest('.singlethumb').remove();
                    } else if (data == 3) {
                        alert('Warning! Permission Denied.');
                    } else {
                        alert('Danger! Can\'t Delete this.');
                    }
                    console.log(data);
                }
            });
        }
    });
</script>