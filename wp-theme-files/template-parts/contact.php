<?php $formId = get_field("contact_form", "options");
if ($formId): ?>
    <div class="container-fluid container-md">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center">
                <div class="post-title">
                    <h1>Contact Us</h1>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <?php echo FrmFormsController::get_form_shortcode(array('id' => $formId, 'title' => false, 'description' => false)); ?>
            </div>
        </div>
    </div>
<?php endif;
