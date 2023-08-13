<!--**********************************
            Footer start
        ***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">DexignZone</a> 2022
        </p>
    </div>
</div>
<!--**********************************
            Footer end
        ***********************************-->

<!--**********************************
           Support ticket button start
        ***********************************-->

<!--**********************************
           Support ticket button end
        ***********************************-->


</div>
<!--**********************************
        Main wrapper end
    ***********************************-->

<!--**********************************
        Scripts
    ***********************************-->
<!-- Required vendors -->
<script src="/vendor/global/global.min.js"></script>
<script src="/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/vendor/bootstrap-datetimepicker/js/moment.js"></script>
<script src="/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
<!-- Chart piety plugin files -->
<script src="/vendor/peity/jquery.peity.min.js"></script>
<script src="/vendor/select2/js/select2.min.js"></script>
{{-- <script src="/js/plugins-init/select2-init.js"></script> --}}

<script src="/js/custom.min.js"></script>
<script src="/js/deznav-init.js"></script>
<script src="/js/demo.js"></script>
<script src="/js/styleSwitcher.js"></script>
<script>
    jQuery('.SlideToolHeader').on('click', function() {
        var el = jQuery(this).hasClass('expand');
        if (el) {
            jQuery(this).removeClass('expand').addClass('collapse');
            jQuery(this).parents('.cm-content-box').find('.cm-content-body').slideUp(300);
        } else {
            jQuery(this).removeClass('collapse').addClass('expand');
            jQuery(this).parents('.cm-content-box').find('.cm-content-body').slideDown(300);
        }
    });
</script>


@yield('scripts')

</body>


</html>
