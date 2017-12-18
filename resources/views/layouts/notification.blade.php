
<?php $success = Loquare::success(); ?>

<div id="alert-success" class="mfp-hide popup popup--460">
    <div class="popup__inner visit-react visit-react--success">
        <div class="visit-react__title">Success!</div>
        <div class="visit-react__img">
            <img src="{{ asset('frontend/assets/icons/subscribed-success-icon.svg') }}" alt="">
        </div>
        <div class="visit-react__desc">
            <?php echo $success; ?>
        </div>
    </div>
</div>
<?php if($success != "") { ?>
<script type="text/javascript">
    $(document).ready(function(){
        $.magnificPopup.open({
            items: {
                src: '#alert-success'
            },
            type: 'inline'
        });
    });
</script>
<?php } ?>

<?php $error = Loquare::error(); ?>

<div id="alert-error" class="mfp-hide popup popup--460">
    <div class="popup__inner visit-react visit-react--fail">
        <div class="visit-react__title">Failure!</div>
        <div class="visit-react__img">
            <img src="{{ asset('frontend/assets/icons/subscribed-failure-icon.svg') }}" alt="">
        </div>
        <div class="visit-react__desc">
            <?php echo $error; ?>
        </div>
    </div>
</div>

<?php if($error != "") { ?>
<script type="text/javascript">
    $(document).ready(function(){
        $.magnificPopup.open({
            items: {
                src: '#alert-error'
            },
            type: 'inline'
        });
    });
</script>
<?php } ?>
