<!-- Begin: Page Footer -->
<footer id="content-footer" class="affix">
    <div class="row">
        <div class="col-md-6">
            <span class="footer-legal">© 2019 AnimaDei</span>
        </div>
    </div>
</footer>
<!-- End: Page Footer -->




</section>
<!-- End: Content-Wrapper -->

</div>
<!-- End: Main -->


<style>
    /* demo page styles */
    body { min-height: 2300px; }

    .content-header b,
    .admin-form .panel.heading-border:before,
    .admin-form .panel .heading-border:before {
        transition: all 0.7s ease;
    }
    /* responsive demo styles */
    @media (max-width: 800px) {
        .admin-form .panel-body { padding: 18px 12px; }
        .option-group .option { display: block; }
        .option-group .option + .option { margin-top: 8px; }
    }
</style>

<!-- BEGIN: PAGE SCRIPTS -->

<!-- jQuery -->
<script src="/vendor/jquery/jquery-1.11.1.min.js"></script>
<script src="/vendor/jquery/jquery_ui/jquery-ui.min.js"></script>

<!-- HighCharts Plugin -->
<script src="/vendor/plugins/highcharts/highcharts.js"></script>


<!-- Theme Javascript -->
<script src="/assets/js/utility/utility.js"></script>
<script src="/assets/js/main.js"></script>




<!-- Datatables -->
<script src="/vendor/plugins/datatables/media/js/jquery.dataTables.js"></script>

<!-- Datatables Tabletools addon -->
<script src="/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>

<!-- Datatables ColReorder addon -->
<script src="/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>

<!-- Datatables Bootstrap Modifications  -->
<script src="/vendor/plugins/datatables/media/js/dataTables.bootstrap.js"></script>


<!-- Cropper Image Plugin -->
<script src="/vendor/plugins/cropper/cropper.min.js"></script>

<!-- jQuery Zoom Plugin -->
<script src="/vendor/plugins/imagezoom/jquery.elevatezoom.min.js"></script>

<!-- FileUpload Plugin -->
<script src="/vendor/plugins/fileupload/fileupload.js"></script>
<script src="/vendor/plugins/holder/holder.min.js"></script>


<script src="/assets/js/demo/demo.js"></script>


<!-- Widget Javascript -->
<script type="text/javascript">


    jQuery(document).ready(function() {

        "use strict";

        // Init Theme Core
        Core.init();



        $('#datatable2').dataTable({
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [-1]
            }],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
            },
            "iDisplayLength": 10,
            "aLengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
            "oTableTools": {
                "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
            }
        });

        $('#datatable3').dataTable({
            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [-1]
            }],
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": "",
                    "sNext": ""
                }
            },
            "iDisplayLength": 10,
            "aLengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],
            "sDom": '<"dt-panelmenu clearfix"lfr>t<"dt-panelfooter clearfix"ip>',
            "oTableTools": {
                "sSwfPath": "vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
            }
        });




        // Form Switcher
        $('#form-switcher > button').on('click', function() {
            var btnData = $(this).data('form-layout');
            var btnActive = $('#form-elements-pane .admin-form.active');

            // Remove any existing animations and then fade current form out
            btnActive.removeClass('slideInUp').addClass('animated fadeOutRight animated-shorter');
            // When above exit animation ends remove leftover classes and animate the new form in
            btnActive.one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function() {
                btnActive.removeClass('active fadeOutRight animated-shorter');
                $('#' + btnData).addClass('active animated slideInUp animated-shorter')
            });
        });

        // Cache several DOM elements
        var pageHeader = $('.content-header').find('b');
        var adminForm = $('.admin-form');
        var options = adminForm.find('.option');
        var switches = adminForm.find('.switch');
        var buttons = adminForm.find('.button');
        var Panel = adminForm.find('.panel');

        // Form Skin Switcher
        $('#skin-switcher a').on('click', function() {
            var btnData = $(this).data('form-skin');

            $('#skin-switcher a').removeClass('item-active');
            $(this).addClass('item-active')

            adminForm.each(function(i, e) {
                var skins = 'theme-primary theme-info theme-success theme-warning theme-danger theme-alert theme-system theme-dark';
                var panelSkins = 'panel-primary panel-info panel-success panel-warning panel-danger panel-alert panel-system panel-dark';
                $(e).removeClass(skins).addClass('theme-' + btnData);
                Panel.removeClass(panelSkins).addClass('panel-' + btnData);
                pageHeader.removeClass().addClass('text-' + btnData);
            });

            $(options).each(function(i, e) {
                if ($(e).hasClass('block')) {
                    $(e).removeClass().addClass('block mt15 option option-' + btnData);
                } else {
                    $(e).removeClass().addClass('option option-' + btnData);
                }
            });
            $(switches).each(function(i, ele) {
                if ($(ele).hasClass('switch-round')) {
                    if ($(ele).hasClass('block')) {
                        $(ele).removeClass().addClass('block mt15 switch switch-round switch-' + btnData);
                    } else {
                        $(ele).removeClass().addClass('switch switch-round switch-' + btnData);
                    }
                } else {
                    if ($(ele).hasClass('block')) {
                        $(ele).removeClass().addClass('block mt15 switch switch-' + btnData);
                    } else {
                        $(ele).removeClass().addClass('switch switch-' + btnData);
                    }
                }

            });
            buttons.removeClass().addClass('button btn-' + btnData);
        });

        setTimeout(function() {
            adminForm.addClass('theme-primary');
            Panel.addClass('panel-primary');
            pageHeader.addClass('text-primary');

            $(options).each(function(i, e) {
                if ($(e).hasClass('block')) {
                    $(e).removeClass().addClass('block mt15 option option-primary');
                } else {
                    $(e).removeClass().addClass('option option-primary');
                }
            });
            $(switches).each(function(i, ele) {

                if ($(ele).hasClass('switch-round')) {
                    if ($(ele).hasClass('block')) {
                        $(ele).removeClass().addClass('block mt15 switch switch-round switch-primary');
                    } else {
                        $(ele).removeClass().addClass('switch switch-round switch-primary');
                    }
                } else {
                    if ($(ele).hasClass('block')) {
                        $(ele).removeClass().addClass('block mt15 switch switch-primary');
                    } else {
                        $(ele).removeClass().addClass('switch switch-primary');
                    }
                }
            });
            buttons.removeClass().addClass('button btn-primary');
        }, 800);

    });

    function setPicture() {
        let flag = '#clear_picture';
        $(flag).attr('value', 'N');
    }
    function clearPicture(id) {
        let img = '#picture_' + id;
        let img_input = '#picture-input_' + id;
        let flag = '#clear_picture';
        $(img).attr('data-src', 'holder.js/100%x195');
        $(img).attr('alt', 'holder.js/100%x195');
        $(img).attr('src', 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iNzU4IiBoZWlnaHQ9IjE5NSIgdmlld0JveD0iMCAwIDc1OCAxOTUiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iNzU4IiBoZWlnaHQ9IjE5NSIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjI4NS41NzAzMTI1IiB5PSI5Ny41IiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjM2cHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+NzU4eDE5NTwvdGV4dD48L2c+PC9zdmc+');
        $(img).attr('data-holder-rendered', 'true');
        $(img).attr('style', 'height: 195px; width: 100%; display: block;');
        $(img_input).attr('value', '');
        $(flag).attr('value', 'Y');
    }
</script>
<!-- END: PAGE SCRIPTS -->

</body>


<!-- Mirrored from admindesigns.com/demos/absolute/1.1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 08 Oct 2015 13:21:51 GMT -->
</html>
