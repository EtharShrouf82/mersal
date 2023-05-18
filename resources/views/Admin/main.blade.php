<html>
<head>
    <link href="/admin/froala/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="/admin/froala/js/froala_editor.pkgd.min.js"></script>
    {{--        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>--}}
    <link rel="stylesheet" href="/admin/css/app.css">
    <link rel="stylesheet" href="/admin/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/admin/css/adminstyle.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    {{--    <link rel="stylesheet" href="/css/editor.foundation.min.css"/>--}}
    {{--    <link rel="stylesheet" href="/css/editor.semanticui.min.css"/>--}}

    <script type="text/javascript" src="/admin/js/mjquery.js"></script>
    <script type="text/javascript" src="/admin/js/popper.min.js"></script>
    <script type="text/javascript" src="/admin/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/admin/js/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.1.1/Chart.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>--}}
    {{--    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.1.1/Chart.min.js"></script>--}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css"/>
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.rtl.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{--    <script type="text/javascript" src="/js/editor.semanticui.min.js"></script>--}}
    {{--    <script type="text/javascript" src="/js/editor.foundation.min.js"></script>--}}

    <script type="text/javascript" src="/admin/js/jquery.mark.min.js"></script>
    {{--    <script type="text/javascript" src="/js/datatables.mark.min.js"></script>--}}

    {{--    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>--}}
    {{--    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/dataTables.buttons.min.js"></script>--}}
    {{--    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.html5.min.js"></script>--}}
    {{--    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.4.1/js/buttons.print.min.js"></script>--}}
    {{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>--}}
    <meta name="_token" content="{{ csrf_token() }}"/>

    <title>LaraVue CMS | @yield('title')</title>
</head>
<body>
<sidebar>
    <div class="welcome">
        <div class="right persimg">
            <img src="@if(Auth::user()->photo) {{ Auth::user()->photo }} @else /admin/img/person.png @endif" width="60"
                 height="60" class="rounded-circle">
        </div>
        <div class="right persinfo">
            <div>أهلا بك {{Auth::user()->name}}</div>
            <div>{{Auth::user()->email}}</div>
        </div>
        <div class="clear"></div>
        <div class="flex welcome-icon">
            <a href="/" target="_blank"><i class="fa-2x fa fa-home" aria-hidden="true"></i></a>
            <a href="{{ route('admin.logout') }}"
               onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                <i class="fa-2x fa fa-lock" aria-hidden="true"></i>
            </a>
            <form id="frm-logout" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            <a href="/admin/dashboard"><i class="fa fa-line-chart" aria-hidden="true"></i></a>
            <a href="/admin/help"><i class="fa-2x fa fa-lightbulb-o" aria-hidden="true"></i></a>
        </div>
    </div>
    <div class="lang-box">
        <ul>
            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li>
                        <a class="nav-link @if(LaravelLocalization::setLocale() == $localeCode) active @endif" rel="alternate" hreflang="{{ $localeCode }}"
                           href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                            {{ $properties['native'] }}
                        </a>
                    </li>
            @endforeach
        </ul>
    </div>
    <div class="list-search-div">
        <input type="text" class="list-search" placeholder="البحث في القائمة" id="list-search">
        <input value="" type="submit">
    </div>
    <ul class="sidebar-menu">
        @can('statistics')
            <li class="mainLi">
                <a href="{{ route('dashboard.index') }}" class="maina {{ (request()->segment(3) == 'dashboard') ? 'active' : '' }}">
                    <i class="fa fa-line-chart" aria-hidden="true"></i><span>إحصائيات الموقع</span>
                    <span class="counter left"></span>
                </a>
            </li>
        @endcan
        @can('settings')
            <li class="mainLi">
                <a href="{{ route('settings') }}" class="maina {{ (request()->segment(3) == 'settings') ? 'active' : '' }}">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span>إعدادات الموقع</span>
                    <span class="counter left"></span>
                </a>
            </li>
        @endcan
            @can('users')
                <li class="mainLi">
                    <a href="{{ route('users.index') }}" class="maina {{ (request()->segment(3) == 'users') ? 'active' : '' }}">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <span>المستخدمين</span>
                        <span class="counter left"></span>
                    </a>
                </li>
            @endcan
        @can('permission')
            <li class="mainLi">
                <a href="{{ route('role.index') }}" class="maina {{ (request()->segment(3) == 'role') ? 'active' : '' }}">
                    <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                    <span>الصلاحيات</span>
                    <span class="counter left"></span>
                </a>
            </li>
            @endcan
            @can('sliders')
                <li class="mainLi">
                    <a href="{{ route('slider.index') }}" class="maina {{ (request()->segment(3) == 'slider') ? 'active' : '' }}">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <span>السلاير والبنرات</span>
                        <span class="counter left"></span>
                    </a>
                </li>
            @endcan
{{--            @can('city')--}}
{{--                <li class="mainLi">--}}
{{--                    <a href="{{ route('city.index') }}" class="maina {{ (request()->segment(3) == 'city') ? 'active' : '' }}">--}}
{{--                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>--}}
{{--                        <span>المدن الفلسطينية</span>--}}
{{--                        <span class="counter left"></span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            @endcan--}}
            @can('screen_type')
                <li class="mainLi">
                    <a href="{{ route('screen_type.index') }}" class="maina {{ (request()->segment(3) == 'screen_type') ? 'active' : '' }}">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <span>أنواع الشاشات</span>
                        <span class="counter left"></span>
                    </a>
                </li>
            @endcan
            @can('screen')
                <li class="mainLi">
                    <a href="{{ route('screens.index') }}" class="maina {{ (request()->segment(3) == 'screens') ? 'active' : '' }}">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <span> الشاشات</span>
                        <span class="counter left"></span>
                    </a>
                </li>
            @endcan
            @can('plans')
                <li class="mainLi">
                    <a href="{{ route('plans.index') }}" class="maina {{ (request()->segment(3) == 'plans') ? 'active' : '' }}">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <span> خطط الشاشات</span>
                        <span class="counter left"></span>
                    </a>
                </li>
            @endcan
            @can('prices')
                <li class="mainLi">
                    <a href="{{ route('prices.index') }}" class="maina {{ (request()->segment(3) == 'prices') ? 'active' : '' }}">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <span> أسعار الشاشات</span>
                        <span class="counter left"></span>
                    </a>
                </li>
            @endcan
            @can('cats')
                <li class="mainLi">
                    <a href="{{ route('cats.index') }}" class="maina {{ (request()->segment(3) == 'cats') ? 'active' : '' }}">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <span>أقسام المنتجات</span>
                        <span class="counter left"></span>
                    </a>
                </li>
            @endcan
            @can('products')
                <li class="mainLi">
                    <a href="{{ route('products.index') }}" class="maina {{ (request()->segment(3) == 'products') ? 'active' : '' }}">
                        <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                        <span>المنتجات</span>
                        <span class="counter left"></span>
                    </a>
                </li>
            @endcan
            @can('services')
                <li class="mainLi">
                    <a href="{{ route('service.index') }}" class="maina {{ (request()->segment(3) == 'service') ? 'active' : '' }}">
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        <span>خدماتنا</span>
                        <span class="counter left"></span>
                    </a>
                </li>
            @endcan
            @can('clients')
                <li class="mainLi">
                    <a href="{{ route('clients.index') }}" class="maina {{ (request()->segment(3) == 'clients') ? 'active' : '' }}">
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        <span>عملاؤنا</span>
                        <span class="counter left"></span>
                    </a>
                </li>
            @endcan
            @can('mechanism')
                <li class="mainLi">
                    <a href="{{ route('mechanism.index') }}" class="maina {{ (request()->segment(3) == 'mechanism') ? 'active' : '' }}">
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        <span>أليات العمل</span>
                        <span class="counter left"></span>
                    </a>
                </li>
            @endcan
            @can('about_us_subjects')
                <li class="mainLi">
                    <a href="{{ route('about_us.index') }}" class="maina {{ (request()->segment(3) == 'about_us') ? 'active' : '' }}">
                        <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                        <span>لماذا نحن</span>
                        <span class="counter left"></span>
                    </a>
                </li>
            @endcan
        @can('contact_us')
            <li class="mainLi">
                <a href="{{ route('contact_us.index') }}" class="maina {{ (request()->segment(3) == 'contact_us') ? 'active' : '' }}">
                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                    <span>إتصل بنا</span>
                    <span class="counter left"></span>
                </a>
            </li>
        @endcan
        <hr/>
    </ul>
</sidebar>
<div class="pageView">
    @yield('content')
    @if (session('success'))
        <script>
            swal({
                title: "{{ session('success') }}",
                icon: "success",
                button: "إغلاق",
            });
        </script>
    @endif
    @if(session('error'))
        <div class="alert alert-success">
            {{session()->get('error')}}
        </div>
    @endif
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="msg-area">
                <h5>جاري عملية الحذف</h5>
                <div class="image_msg"></div>
            </div>
            <div class="modal-header model-header-relative">
                <h5 class="modal-title" id="exampleModalLabel">حذف العنصر</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-footer">
                <button type="submit" id="button_delete" class="btn btn-primary">نعم</button>
                <input type="hidden" name="category_id" id="cat_id" value=""/>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">لا</button>
            </div>
        </div>
    </div>
</div>
<script>
    var token = $('meta[name="_token"]').attr('content');

    var editor = new FroalaEditor(".edit", {
        key: '1CC3kD9A5E4B4B3C3bHIMFF1EWBXIJb1BZLZFh1i1MXQLjE4C3F3I3B4D6B6E3D3G2==',
        imageUploadURL: '{{ route('uploadforalaimg') }}',
        imageUploadParams: {
            class: "edit",
            froala: 'true', // This allows us to distinguish between Froala or a regular file upload.
            _token: "{{ csrf_token() }}" // This passes the laravel token with the ajax request.
        },
        imageUploadMethod: 'POST',
        imageMaxSize: 5 * 1024 * 1024,
        imageAllowedTypes: ['jpeg', 'jpg', 'png'],
        fileUploadParams: {class: "edit"},

        imageManagerLoadURL: {user_id: 4219762},

        fileUploadURL: "{{ route('uploadforalafile') }}",
        fileUploadParams: {
            class: "edit",
            froala: 'true', // This allows us to distinguish between Froala or a regular file upload.
            _token: "{{ csrf_token() }}" // This passes the laravel token with the ajax request.
        },
        fileUploadMethod: 'POST',
        fileMaxSize: 20 * 1024 * 1024,
        fileAllowedTypes: ['*'],

        // videoUploadURL: '/upload_video',
        // videoUploadParams: {id: 'edit'},
        // videoUploadMethod: 'get',
        // videoMaxSize: 50 * 1024 * 1024,
        // videoAllowedTypes: ['webm', 'jpg', 'ogg'],
        videoUploadURL: "{{ route('uploadFroalaVideo') }}",
        videoUploadParams: {
            class: "edit",
            froala: 'true', // This allows us to distinguish between Froala or a regular file upload.
            _token: "{{ csrf_token() }}" // This passes the laravel token with the ajax request.
        },
        videoUploadMethod: 'POST',
        videoMaxSize: 20 * 1024 * 1024,
        videoAllowedTypes: ['webm', 'mp4', 'ogg'],
    });
</script>
<script type="text/javascript">
    function multiChick(checkedVal, valueInput) {
        $(checkedVal).on('change', function () {
            var string = $(checkedVal).filter(":checked").map(function (i, v) {
                return this.value;
            }).get().join("،");
            $(valueInput).val(string);
        });
    }

    function uploadFile(url, folder) {
        $("#file").change(function () {
            var name = document.getElementById("file").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg','svg']) == -1) {
                alert("Invalid Image File");
            }
            var f = document.getElementById("file").files[0];
            var fsize = f.size || f.fileSize;
            if (fsize > 2000000) {
                alert("Image File Size is very big");
            } else {
                form_data.append("file", document.getElementById('file').files[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: url,
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                    },
                    success: function (data) {
                        var imgData = '';
                        imgData = '<img style="max-width: 200px" src="/images/' + folder + '/' + data + '" class="img-thumbnail" />';
                        imgData += '<input id="vimg" type="hidden" value="' + data + '" name="vimg"/>';
                        $('#uploaded_image').html(imgData);
                    }
                });
            }
        });
    }

    function uploadFile2(url, folder) {
        $("#map_file").change(function () {
            var name = document.getElementById("map_file").files[0].name;
            var form_data = new FormData();
            var ext = name.split('.').pop().toLowerCase();
            if (jQuery.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
            }
            var f = document.getElementById("map_file").files[0];
            var fsize = f.size || f.fileSize;
            if (fsize > 2000000) {
                alert("Image File Size is very big");
            } else {
                form_data.append("file", document.getElementById('map_file').files[0]);
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    url: url,
                    method: "POST",
                    data: form_data,
                    contentType: false,
                    cache: false,
                    processData: false,
                    beforeSend: function () {
                        $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
                    },
                    success: function (data) {
                        var imgData = '';
                        imgData = '<img src="/images/' + folder + '/' + data + '" class="img-thumbnail" />';
                        imgData += '<input id="map_imgs" type="hidden" value="' + data + '" name="map_img"/>';
                        $('#map_uploaded_image').html(imgData);
                    }
                });
            }
        });
    }

    function deleteItem(url) {
        $("#button_delete").click(function (e) {
            var id = $("#cat_id").val();
            $(".msg-area").css('top', '0');
            $.ajax({
                url: url + id,
                type: 'delete',
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                },
                data: {
                    id: id,
                },
                success: function (data) {
                    setInterval(() => {
                        if (data == 1) {
                            $(".msg-area").addClass('success_delete')
                            $(".msg-area h5").text('تمت عملية الحذف بنجاح..')
                            setInterval(() => {
                                location.reload();
                            }, 1000);
                        } else {
                            $(".msg-area").addClass('error_delete');
                            $(".emjoy").css('color', 'red');
                            $(".msg-area h5").text('هناك خطئ في عملية الحذف يرجى المحاولة مرى أخرى ...');
                        }
                    }, 1000);
                }
            });
        });
    }

    $(document).on('click', '#delete-icon', function () {
        var id = $(this).attr("deleteid");
        $(".modal-footer #cat_id").val(id);
    });

    $("#checkAll").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $(function () {
        var $input = $("#list-search"),
            $context = $(".sidebar-menu li a")
        $input.on("keyup", function () {
            var term = $(this).val();
            $context.show().unmark();
            if (term) {
                $context.mark(term, {
                    done: function () {
                        $context.not(":has(mark)").hide();
                    }
                });
            }
        });
    });
    $("[data-toggle='tooltip']").tooltip();

    function goBack() {
        window.history.back();
    }

    $('.treeview-title').click(function () {
        if ($(this).next().is(':hidden')) {
            $(".treeview-title").next().slideUp("");
            $(this).next().slideDown("");
        } else {
            $(".treeview-title").next().slideUp("200");
        }
        return false;
    });

</script>
<script>
    let elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    elems.forEach(function (html) {
        let switchery = new Switchery(html, {size: 'small'});
    });

    function jsSwitch(route) {
        $('.js-switch').change(function () {
            let status = $(this).prop('checked') === true ? 1 : 2;
            let id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: route,
                data: {'status': status, 'id': id},
                success: function (data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 50;
                    toastr.options.positionClass = 'toast-top-center';
                    toastr.success(data.message);
                }
            });
        });
    }
    function jsRestore(route) {
        $('.js-switch').change(function () {
            let status = $(this).prop('checked') === true ? 1 : 2;
            let id = $(this).data('id');
            $.ajax({
                type: "GET",
                dataType: "json",
                url: route,
                data: {'status': status, 'id': id},
                success: function (data) {
                    toastr.options.closeButton = true;
                    toastr.options.closeMethod = 'fadeOut';
                    toastr.options.closeDuration = 50;
                    toastr.options.positionClass = 'toast-top-center';
                    toastr.success(data.message);
                    setTimeout(
                        function() {
                            location.reload();
                        }, 1000);

                }
            });
        });
    }
</script>
@yield('javascript')
</body>
</html>
