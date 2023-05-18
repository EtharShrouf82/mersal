@extends('Admin.main')
@section('title','الطلبيات')
@section('content')
    <div class="page-header">
        <div class="right page-title">الطلبيات</div>
        @include("Admin.Components.navbarButton")
    </div>
    @if($order->count() > 0)
        <div class="table-responsive">
            <table class="table table table-striped table-bordered">
                <thead class="thead-red">
                <tr>
                    <th scope="col" class="center">#</th>
                    <th scope="col">إسم المشتري</th>
                    <th scope="col" class="center">الحالة</th>
                    <th scope="col" class="center">الإداري</th>
                    <th scope="col" class="center">تفاصيل</th>
                    <th scope="col" class="center">التاريخ</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($order as $item)
                    <tr class="data-tr">
                        <th scope="row" class="center">{{ $item->id }}</th>
                        <td>{{ $item->customer->name }}</td>
                        <td class="center">{!! $item->getStatus() !!} </td>
                        <td class="center">{{ $item->user->name ?? '' }}</td>
                            <div> {{ $item->rating_text ?? '' }}</div>
                        </td>
                        <td class="center">
                            <span title="تفاصيل" data-toggle="tooltip" data-placement="left">
                                <a href=" {{ route('orders.show',$item->id) }}">
                                    <i class="fa fa-eye action-icon" aria-hidden="true"></i>
                                </a>
                            </span>
                        </td>
                        <td class="center">{{ $item->created_at }} </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
             {{ $order->links() }}
        </div>
    @else
        <div class="alert alert-danger">لا يوجد منتجات</div>
    @endif
@endsection
