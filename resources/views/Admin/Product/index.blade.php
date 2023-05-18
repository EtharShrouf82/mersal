@extends('Admin.main')
@section('title','المنتجات')
@section('content')
    <div class="page-header">
        <div class="right page-title">المنتجات</div>
        <div class="searchbox left" role="search">
            <form role="form" method="get" action="/admin/products">
                <div>
                    <input type="text" value="{{ request('title') }}" name="title" placeholder="البحث عن منتج">
                </div>
                <div>
                    <select name="brand_id">
                        <option value="">القسم</option>
                        @foreach($cats as $cat)
                            <option @if(request('cat_id') == $cat->id) selected @endif value="{{ $cat->id }}">{{ $cat->title }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <select name="status">
                        <option value="">الحالة</option>
                        <option @if(request('status') == 1) selected @endif value="1">مفعل</option>
                        <option @if(request('status') == 2) selected @endif value="2">غير مفعل</option>
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
    @can('add_product')
        <a class="addNew" href="{{ route('products.create') }}">
            <i class="fa fa-pencil fa-2x" aria-hidden="true"></i>
        </a>
    @endcan
    @if($products->count() > 0)
        <div class="table-responsive">
            <table class="table table table-striped table-bordered">
                <thead class="thead-red">
                <tr>
                    <th scope="col" class="center">#</th>
                    <th scope="col" class="center">الصوره</th>
                    <th width="20%" scope="col" class="center">الغنوان - {{ LaravelLocalization::getCurrentLocaleNative() }}</th>
                    <th width="6%" scope="col" class="center">السعر</th>
                    <th width="20%" scope="col" class="center">الأقسام</th>
                    <th scope="col" class="center">المشاهدات</th>
                    <th scope="col" class="center">بواسطة</th>
                    <th scope="col" class="center">تاريخ الإضافة</th>
                    @can('edit_product')
                        <th scope="col" class="center">الحالة</th>
                        <th scope="col" class="center">تعديل</th>
                    @endcan
                    @can('delete_product')
                        <th scope="col" class="center">حذف</th>
                    @endcan
                </tr>
                </thead>
                <tbody>
                @foreach ($products as $item)
                    <tr class="data-tr">
                        <td class="center">{{ $item->id }}</td>
                        <td class="center">
                            <a href="/product/{{ $item->id }}" target="_blank">
                                <img style="max-width: 50px" src="{{ $item->img }}"/></td>
                            </a>
                        <td class="center">
                            <a href="/product/{{ $item->id }}" target="_blank">{{ $item->title ?? '' }}</a>
                        </td>
                        <td class="center">{{ $item->price ?? '' }}</td>
                        <td class="center">
                            @foreach($item->cats as $cat)
                                <label class="badge badge-success">{{ $cat->translations->title ?? '' }}</label>
                            @endforeach
                        </td>
                        <td class="center">{{ $item->views }}</td>
                        <td class="center">{{ $item->user->name }}</td>
                        <td class="center">{{ $item->created_at->toDateString() }}</td>
                        @can('edit_product')
                            <td class="center">
                                <input type="checkbox" data-id="{{ $item->id }}" name="status" class="js-switch" {{ $item->status == 1 ? 'checked' : '' }}>
                            </td>
                            <td class="center">
                            <span title="تعديل" data-toggle="tooltip" data-placement="left">
                                <a href=" {{ route('products.edit',$item->id) }}" class="editIcon">
                                    <i class="fa fa-pencil-square action-icon" aria-hidden="true"></i>
                                </a>
                            </span>
                            </td>
                        @endcan
                        @can('delete_product')
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
             {{ $products->links() }}
        </div>
    @else
        <div class="alert alert-danger">لا يوجد  منتجات</div>
    @endif
    <script>

        $(document).ready(function () {
            deleteItem("products/");
            jsSwitch("{{ route('product.update.status') }}")
        });
    </script>
@endsection
