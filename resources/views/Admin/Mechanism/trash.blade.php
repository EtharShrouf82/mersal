@extends('Admin.main')
@section('title','أقسام المنتجات ')
@section('content')
    <div class="page-header">
        <div class="right page-title">أقسام المنتجات </div>
        @include("Admin.Components.navbarButton")
    </div>
    @if($cats->count() > 0)
        <div class="table-responsive">
            <table class="table table table-striped table-bordered">
                <thead class="thead-red">
                <tr>
                    <th scope="col" class="center">#</th>
                    <th scope="col" class="center">الصوره</th>
                    <th width="35%" scope="col" class="center">الغنوان - {{ LaravelLocalization::getCurrentLocaleNative() }}</th>
                    <th scope="col" class="center">عدد المنتجات</th>
                    <th scope="col" class="center">تاريخ الإضافة</th>
                    @can('edit_cat')
                        <th scope="col" class="center">الحالة</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($cats as $item)
                    <tr class="data-tr">
                        <td class="center">{{ $item->id }}</td>
                        <td class="center"><img width="95" height="95" src="{{ $item->img }}"/></td>
                        <td class="center">{{ $item->translations->title ?? '' }}</td>
                        <td class="center">{{ $item->products_cat_count }}</td>
                        <td class="center">{{ $item->created_at->toDateString() }}</td>
                        @can('edit_cat')
                            <td class="center">
                                <input type="checkbox" data-id="{{ $item->id }}" name="trashed" class="js-switch"/>
                            </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-danger">لا يوجد أقسام</div>
    @endif
    <script>

        $(document).ready(function () {
            jsRestore("{{ route('cat.restore') }}")
        });
    </script>
@endsection
