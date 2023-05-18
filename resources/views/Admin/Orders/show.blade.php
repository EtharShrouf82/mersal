@extends('Admin.main')
@section('title','الطلبيات')
@section('content')
    <div class="page-header">
        <div class="right page-title">الطلبيات</div>
        @include("Admin.Components.navbarButton")
    </div>
    @if($order->count() > 0)
        <div class="container-fluid mt-3">
            <div class="row">
                <div class="col-6">
                    <div class="card edited-card">
                        <h6 class="card-header text-white bg-dark"><i class="fa fa-user" aria-hidden="true"></i> معلومات
                            المشتري والتوصيل</h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fa fa-user" aria-hidden="true"></i> الإسم
                                : {{ $order->customer->name }}</li>
                            <li class="list-group-item"><i class="fa fa-mobile" aria-hidden="true"></i>
                                الدولة : {{ $order->address->country->name_ar }}
                            </li>
                            <li class="list-group-item"><i class="fa fa-mobile" aria-hidden="true"></i>
                                المدينة : {{ $order->address->city }}
                            </li>
                            <li class="list-group-item"><i class="fa fa-mobile" aria-hidden="true"></i>
                                العنوان الأول : {{ $order->address->first_street_address }}
                            </li>
                            @if($order->address->secondary_street_address)
                                <li class="list-group-item"><i class="fa fa-mobile" aria-hidden="true"></i>
                                    العنوان الثاني : {{ $order->address->secondary_street_address }}
                                </li>
                            @endif
                            <li class="list-group-item"><i class="fa fa-mobile" aria-hidden="true"></i>
                                رقم الهاتف : {{ $order->address->phone }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card edited-card">
                        <h6 class="card-header text-white bg-dark"><i class="fa fa-shopping-cart"
                                                                      aria-hidden="true"></i> معلومات الطلب </h6>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i> رقم الطلب
                                : {{ $order->id }}</li>
                            <li class="list-group-item"><i class="fa fa-calendar" aria-hidden="true"></i> تاريخ الطلب
                                : {{ $order->created_at }}</li>
                            <li class="list-group-item"><i class="fa fa-star" aria-hidden="true"></i> حالة الطلب
                                : {!! $order->getStatus() !!}</li>
{{--                            <li class="list-group-item"><i class="fa fa-map-marker" aria-hidden="true"></i>--}}
{{--                                عنوان التوصيل : {{ $order->user_addresses->city->name_ar }}--}}
{{--                                - {{ $order->user_addresses->address }}--}}
{{--                            </li>--}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <h5 class="edited-card-header card-header">الطلبية</h5>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">إسم المنتج</th>
                            <th scope="col" class="center">صورة</th>
                            <th scope="col" class="center">اللون</th>
                            <th scope="col" class="center">الحجم</th>
                            <th scope="col" class="center">السعر</th>
                            <th scope="col" class="center">الكمية</th>
                            <th scope="col" class="center">المجموع</th>
                            <th scope="col" class="center">حذف</th>
                        </tr>
                        </thead>
                        @php
                            $total = 0;
                        @endphp
                        @foreach($order->items as $prod)
                            <tr>
                                <td>{{ $prod->product->title }}</td>
                                <td class="imgTd center"><img src="{{ $prod->product->img }}"/></td>
                                <td class="center">
                                    @if($prod->color)
                                        <div class=" m-auto color product_color" style="background-color: #{{ $prod->color->value }}"></div>
                                    @endif
                                </td>
                                <td class="center">
                                    @if($prod->size)
                                        {{ $prod->size->title }}
                                    @endif
                                </td>
                                <td class="center">{{ $prod->price }} {{ $order->currency->icon }}</td>
                                <td class="center">{{ $prod->qty }}</td>
                                <td class="center total">
                                    {{ $prod->price * $prod->qty }}
                                    <span>{{ $order->currency->icon }}</span>
                                </td>
                                <td class="center">
                                  <span title="حذف" data-toggle="tooltip" data-placement="left">
                                    <i class="fa fa-trash action-icon" id="delete-icon" deleteid="{{ $prod->id }}"
                                       data-toggle="modal" data-target="#deleteModal"
                                       aria-hidden="true"></i>
                                </span>
                            </tr>
                            @php $total += $prod->price * $prod->qty;@endphp
                        @endforeach
                        <tr>
                            <td class="center" colspan="4"><h6>مجموع الطلبية</h6></td>
                            <td class="center" colspan="4">
                                <h6>
                                    {{ $total }}
                                    <span>{{ $order->currency->icon }}</span>
                                </h6>
                            </td>
                        </tr>
                        <tr>
{{--                            <td class="center" colspan="4"><h6>تكلفة التوصيل</h6></td>--}}
{{--                            <td class="center" colspan="2"><h6>{{ $order->user_addresses->city->price }}</h6></td>--}}
                        </tr>
{{--                        <tr>--}}
{{--                            <td class="center" colspan="4"><h5>المجموع</h5></td>--}}
{{--                            <td class="center" colspan="2"><h5>{{ $total + $order->user_addresses->city->price }}</h5>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
                    </table>
                    @if($cancelWhy)
                        <div class="card mt-3">
                            <h5 class="text-white bg-dark card-header">سبب إلغاء الطلبية</h5>
                            <div class="card-body">
                                <ul>
                                    @foreach($cancelWhy as $cancel)
                                        <li>{{ $cancel->getCancelWhy($cancel->why) }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @else
                        @can('edit_order')
                            <div class="action-table">
                                <form method="POST" action="{{ route('orders.update',$order->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <table class="table table table-striped table-bordered">
                                        <tr>
                                            <td width="25%">الإجراء</td>
                                            <td>
                                                <select name="status" required class="form-control">
                                                    <option value="1" @if($order->status == 1) selected @endif>طلب جديد
                                                    </option>
                                                    <option value="2" @if($order->status == 2 ) selected @endif>قيد
                                                        التحضير
                                                    </option>
                                                    <option value="3" @if($order->status == 3) selected @endif>قيد
                                                        التغليف
                                                    </option>
                                                    <option value="4" @if($order->status == 4) selected @endif>تم الشحن
                                                    </option>
                                                    <option value="5" @if($order->status == 5) selected @endif>تم
                                                        التسليم
                                                    </option>
                                                    <option value="6" @if($order->status == 6) selected @endif>ملغي
                                                    </option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>الوقت المقدر للتسليم</td>
                                            <td><input class="form-control" type="datetime-local" name="delivery_at"
                                                       value="{{ $order->delivery_at }}"/></td>
                                        </tr>
                                        <tr>
                                            <td>السبب</td>
                                            <td><textarea class="form-control"
                                                          name="comment">{{ $order->comment }}</textarea></td>
                                        </tr>
                                        <tr>
                                            <td>إرسال إشعار</td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" name="send_notification"
                                                           type="checkbox"
                                                           value="1" id="flexSwitchCheckChecked" checked>
                                                    <label class="form-check-label" for="flexSwitchCheckChecked">إرسال
                                                        إشعار</label>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" class="center"><input class="btn btn-info" type="submit"
                                                                                  name="sendreason" value="إرسال"></td>
                                        </tr>
                                    </table>
                                </form>
                            </div>
                        @endcan
                    @endif
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-danger">لا يوجد منتجات</div>
    @endif
@endsection
