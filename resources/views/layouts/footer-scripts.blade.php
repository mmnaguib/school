<!-- jquery -->
<script src="{{ URL::asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('assets/js/plugins-jquery.js') }}"></script>
<!-- plugin_path -->
<script type="text/javascript">
    var plugin_path = '{{ asset('assets/js') }}/';
</script>

<!-- chart -->
<script src="{{ URL::asset('assets/js/chart-init.js') }}"></script>
<!-- calendar -->
<script src="{{ URL::asset('assets/js/calendar.init.js') }}"></script>
<!-- charts sparkline -->
<script src="{{ URL::asset('assets/js/sparkline.init.js') }}"></script>
<!-- charts morris -->
<script src="{{ URL::asset('assets/js/morris.init.js') }}"></script>
<!-- datepicker -->
<script src="{{ URL::asset('assets/js/datepicker.js') }}"></script>
<!-- sweetalert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
@yield('js')
<script src="{{ URL::asset('assets/js/toastr.js') }}"></script>
<!-- validation -->
<script src="{{ URL::asset('assets/js/validation.js') }}"></script>
<!-- lobilist -->
<script src="{{ URL::asset('assets/js/lobilist.js') }}"></script>
<!-- noty -->
<script src="{{ asset('assets/js/noty.min.js') }}"></script>
<!-- custom -->
<script src="{{ URL::asset('assets/js/custom.js') }}"></script>
<script>
    function checkAll(className, ele) {
        var elements = document.getElementsByClassName(className);
        var length = elements.length;
        if(ele.checked){
            for(var i=0;i<length;i++){
                elements[i].checked = true;
            }
        }else{
            for(var i=0;i<length;i++){
                elements[i].checked = false;
            }
        }
    }
</script>
<script>

    $('.deleteBtn').click(function (e) {
        var that = $(this)
        e.preventDefault();
        var n = new Noty({
            text: "@lang('site.confirm_delete')",
            type: "warning",
            killer: true,
            buttons: [
                Noty.button("@lang('site.yes')", 'btn btn-danger mr-2', function () {
                    that.closest('form').submit();
                }),
                Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function () {
                    n.close();
                })
            ]
        });
        n.show();
    });//end of delete
</script>
<script>
    $(document).ready(function() {
        $('select[name="grades"]').on('change', function() {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="classrooms"]').empty();
                        $('select[name="classrooms"]').append('<option selected disabled>@lang('site.classroom')</option>');
                        $.each(data, function(key, value) {
                            $('select[name="classrooms"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('select[name="classrooms"]').on('change', function () {
            var classroom_id = $(this).val();
            if (classroom_id) {
                $.ajax({
                    url: "{{ URL::to('getSections') }}/" + classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="sections"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="sections"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('select[name="grades_new"]').on('change', function() {
            var Grade_id = $(this).val();
            if (Grade_id) {
                $.ajax({
                    url: "{{ URL::to('classes') }}/" + Grade_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="classrooms_new"]').empty();
                        $('select[name="classrooms_new"]').append('<option selected disabled>@lang('site.classroom')</option>');
                        $.each(data, function(key, value) {
                            $('select[name="classrooms_new"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('select[name="classrooms_new"]').on('change', function () {
            var classroom_id = $(this).val();
            if (classroom_id) {
                $.ajax({
                    url: "{{ URL::to('getSections') }}/" + classroom_id,
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="sections_new"]').empty();
                        $.each(data, function (key, value) {
                            $('select[name="sections_new"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            }
            else {
                console.log('AJAX load did not work');
            }
        });
    });
</script>
@livewireScripts
