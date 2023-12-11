<footer class="footer_area clearfix">
    <div class="container">
        <div class="row">
            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                        &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script>| Luận Văn<i class="fa fa-heart-o" aria-hidden="true"></i> <a href="">DANH</a>
                    </p>
                </div>
            </div>
        </div>

        <div class="row align-items-end">
            <div class="col-12 col-md-6">
                <div class="single_widget_area">
                    <div class="footer_social_area">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</footer>
</div>
{{--Ckeditor--}}
<link rel="stylesheet" href="{{ asset('asset/plugins/jquery/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('asset/plugins/jquery-confirm/jquery-confirm.min.css') }}">
<!-- Jquery -->
<script src="{{ asset('asset/plugins/jquery/jquery-3.6.1.min.js') }}"></script>
<script src="{{ asset('asset/plugins/jquery-confirm/jquery-confirm.min.js') }}"></script>
<script src="{{ asset('asset/plugins/loading.js') }}"></script>
{{--Datepicker--}}
<script src="{{ asset('asset/plugins/jquery-datepicker/jquery-ui.min.js') }}"></script>
<script src="{{ asset('asset/plugins/jquery-datepicker/datepicker.js') }}"></script>
<script src="{{ asset('asset/plugins/jquery-datepicker/datepicker-vi.js') }}"></script>
<!-- <script src="{{ asset('asset/plugins/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('asset/plugins/ckeditor/adapters/jquery.js') }}"></script> -->
<script src="{{asset('ad_asset/assets/vendor/jquery/dist/jquery.min.js')}}"></script>
<script src="{{asset('ad_asset/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('ad_asset/assets/vendor/js-cookie/js.cookie.js')}}"></script>
<script src="{{asset('ad_asset/assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
<script src="{{asset('ad_asset/assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js')}}"></script>
<script src="{{asset('ad_asset/assets/vendor/chart.js/dist/Chart.min.js')}}"></script>
<script src="{{asset('ad_asset/assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
<script src="{{asset('ad_asset/assets/js/argon.js?v=1.2.0')}}"></script>
<!-- <script src="{{asset('/ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js')}}"></script> -->
<script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js')}}"></script>
<script src="{{asset('//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js')}}"></script>
<script src="{{asset('https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>
<script>
$(document).ready(function() {
    $('#delete-customer-button').click(function() {
        var mkh = $(this).data('mkh');
        $.ajax({
            url: 'xoa-khach-hang.php',
            type: 'POST',
            data: { mkh: mkh },
            success: function(response) {
                alert(response);
                window.location.reload(); // Tải lại trang để cập nhật danh sách khách hàng
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    });
});
</script>

<!-- <script type="text/javascript">
    $(document).ready(function() {
        thongke();
        var char = new Morris.Area({

            element: 'chart',

            xkey: 'date',

            ykeys: ['date','IdDH'],

            labels: ['Ngay đặt','Đơn Hàng']
        });
        function thongke(){
            var text = '365 ngay qua';
            $.ajax({
                url:"modules/thong-ke.php",
                method:"POST",
                dataType:"JSON",

                success:function(data)
                {
                    char.setData(data);
                    $('#text-date').text(text);
                }
            })
        }
    });
</script> -->
</body>

</html>