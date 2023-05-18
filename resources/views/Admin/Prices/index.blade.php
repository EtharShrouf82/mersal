@extends('Admin.main')
@section('title','الأسعار')
@section('content')
    <div class="page-header">
        <div class="right page-title">الأسعار</div>
        <div class="searchbox left" role="search">
            <form role="form" method="get" action="{{ route('prices.index') }}">
                <div>
                    <select name="screen_type_id">
                        <option value="">نوع الشاشات</option>
                        @foreach($screenType as $screen)
                            <option @if(request('screen_type_id') == $screen->id) selected @endif value="{{ $screen->id }}">{{ $screen->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select name="plan_id">
                        <option value="">الخطة</option>
                        @foreach($plans as $plan)
                            <option @if(request('plan_id') == $plan->id) selected @endif value="{{ $plan->id }}">{{ $plan->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <input value="" type="submit">
                </div>
                <div class="separator"></div>
                <div>
                    <a href="/admin/dashboard" data-toggle="tooltip" data-placement="left" data-original-title="الرئيسية">
                        <i class="fa fa-home" aria-hidden="true"></i>
                    </a>
                    <a href="#" onclick="history.back()" data-toggle="tooltip" data-placement="left" data-original-title="رجوع">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </a>
                </div>
            </form>
        </div>
        <div class="clear"></div>
    </div>
    @can('add_service')
        <a class="addNew" href="{{ route('prices.create') }}">
            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
        </a>
    @endcan
    @if($prices->count() > 0)
        <div class="table-responsive">
            <table class="table table table-striped table-bordered">
                <thead class="thead-red">
                <tr>
                    <th scope="col" class="center">#</th>
                    <th scope="col" class="center">النوع - {{ LaravelLocalization::getCurrentLocaleNative() }}</th>
                    <th scope="col" class="center">الخطة - {{ LaravelLocalization::getCurrentLocaleNative() }}</th>
                    <th scope="col" class="center">المدة - {{ LaravelLocalization::getCurrentLocaleNative() }}</th>
                    <th scope="col" class="center">السعر</th>
                    <th scope="col" class="center">الخصم</th>
                    <th scope="col" class="center">السعر بعد الخصم</th>
                    <th scope="col" class="center">بواسطة</th>
                    <th scope="col" class="center">تاريخ الإضافة</th>
                    @can('edit_price')
                        <th scope="col" class="center">الحالة</th>
                        <th scope="col" class="center">تعديل</th>
                    @endcan
                    @can('delete_price')
                        <th scope="col" class="center">حذف</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($prices as $item)
                    <tr class="data-tr">
                        <td class="center">{{ $item->id }}</td>
                        <td class="center text-primary">{{ $item->screen_type->title ?? '' }}</td>
                        <td class="center text-success">{{ $item->plan->title ?? '' }}</td>
                        <td class="center">{{ $item->title ?? '' }}</td>
                        <td class="center">{{ $item->price ?? '' }}</td>
                        <td class="center">{{ $item->discount ?? '' }}</td>
                        <td class="center text-danger">{{ $item->getPriceAfterDiscount() ?? '' }}</td>
                        <td class="center">{{ $item->user->name }}</td>
                        <td class="center">{{ $item->created_at->toDateString() }}</td>
                        @can('edit_price')
                            <td class="center">
                                <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>
                            </td>
                            <td class="center">
                            <span title="تعديل" data-toggle="tooltip" data-placement="left">
                                <a href=" {{ route('prices.edit',$item->id) }}" class="editIcon">
                                    <i class="fa fa-pencil-square action-icon" aria-hidden="true"></i>
                                </a>
                            </span>
                            </td>
                        @endcan
                        @can('delete_price')
                            <td class="center">
                                <span title="حذف" data-toggle="tooltip" data-placement="left">
                                    <i class="fa fa-trash action-icon" id="delete-icon" deleteid="{{ $item->id }}"
                                       data-toggle="modal" data-target="#deleteModal"
                                       aria-hidden="true"></i>
                                </span>
                            </td>
                        @endcan
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-danger">لا يوجد  منتجات</div>
    @endif
    <script>

        $(document).ready(function () {
            deleteItem("prices/");
            jsSwitch("{{ route('price.update.status') }}")
        });
    </script>
@endsection
