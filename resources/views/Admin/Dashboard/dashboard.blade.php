@extends('Admin.main')
@section('title','إحصائيات الموقع')
@section('content')
    <div class="page-header">
        <div class="right page-title">الإحصائيات</div>
        @include("Admin.Components.navbarButton")
        <div class="clear"></div>
    </div>
    <div class="row cart-box">
        <div class="col-3">
            <div class="cart">
                <div class="cart-icon cart-rose">
                    {{ $contact }}
                </div>
                <div class="cart-title">الرسائل الجديدة</div>
                <div class="cart-data">
                    <a href="{{ route('contact_us.index') }}">الرسائل الجديدة </a>
                </div>
            </div>
        </div>
{{--        <div class="col-3">--}}
{{--            <div class="cart">--}}
{{--                <div class="cart-icon cart-primary">--}}
{{--                    {{ $users }}--}}
{{--                </div>--}}
{{--                <div class="cart-title">الطلاب المسجلين</div>--}}
{{--                <div class="cart-data">--}}
{{--                    <a href="{{ route('students.index') }}">الطلاب المسجلين</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-3">--}}
{{--            <div class="cart">--}}
{{--                <div class="cart-icon cart-info">--}}
{{--                    {{ $activeStudent }}--}}
{{--                </div>--}}
{{--                <div class="cart-title">الطلاب المسجلين بالدورات</div>--}}
{{--                <div class="cart-data">--}}
{{--                    <a href="/admin/students?name=&countrie_id=&have_course=1">الطلاب المسجلين بالدورات</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-3">--}}
{{--            <div class="cart">--}}
{{--                <div class="cart-icon cart-success">--}}
{{--                    {{ $activeCourse }}--}}
{{--                </div>--}}
{{--                <div class="cart-title">دورات تم تنفيذها</div>--}}
{{--                <div class="cart-data">--}}
{{--                    <a href="{{ route('activeCourse.index') }}">دورات تم تنفيذها</a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="col-4">
            <div class="cart">
                <div class="cart-icon cart-danger">
                    <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                </div>
                <div class="cart-title">الزوار والصفحات</div>
                <div class="cart-data">
                    <div id="" style="height: 250px"></div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="cart">
                <div class="cart-icon cart-danger">
                    <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                </div>
                <div class="cart-title">مصادر الزيارة</div>
                <div class="cart-data">
                    <div id="" style="height: 250px"></div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="cart">
                <div class="cart-icon cart-danger">
                    <i class="fa fa-lightbulb-o" aria-hidden="true"></i>
                </div>
                <div class="cart-title">الدول</div>
                <div class="cart-data">
                    <div id="" style="height: 250px"></div>
                </div>
            </div>
        </div>
    </div>

{{--    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>--}}
{{--    <script type="text/javascript">--}}
{{--        $(function () {--}}
{{--            google.charts.load('current', {'packages':['corechart']});--}}
{{--            google.charts.setOnLoadCallback(drawChart);--}}

{{--            function drawChart() {--}}

{{--                var data = google.visualization.arrayToDataTable([--}}
{{--                    ['الدولة', 'عدد الطلاب من كل دولة'],--}}
{{--                    @php--}}
{{--                        echo $charData--}}
{{--                    @endphp--}}
{{--                ]);--}}

{{--                var options = {--}}
{{--                    title: ''--}}
{{--                };--}}

{{--                var chart = new google.visualization.PieChart(document.getElementById('piechart'));--}}

{{--                chart.draw(data, options);--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}
{{--    <script type="text/javascript">--}}
{{--        $(function () {--}}
{{--            google.charts.load('current', {'packages':['corechart']});--}}
{{--            google.charts.setOnLoadCallback(drawChart);--}}

{{--            function drawChart() {--}}

{{--                var data = google.visualization.arrayToDataTable([--}}
{{--                    ['الدولة', 'عدد الطلاب من كل دولة'],--}}
{{--                    @php--}}
{{--                        echo $courseData--}}
{{--                    @endphp--}}
{{--                ]);--}}

{{--                var options = {--}}
{{--                    title: ''--}}
{{--                };--}}

{{--                var chart = new google.visualization.PieChart(document.getElementById('pie2chart'));--}}

{{--                chart.draw(data, options);--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}

@endsection
