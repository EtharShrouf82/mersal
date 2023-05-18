@extends('Admin.main')
@section('title','إعدادات الموقع')
@section('content')
    <div class="page-header">
        <div class="right page-title">إعدادات الموقع باللغة - {{ LaravelLocalization::getCurrentLocaleNative() }}</div>
        @include("Admin.Components.navbarButton")
    </div>
    <form method="POST" action="{{ route('settings.update',1) }}">
        @csrf
        <table class="table table-striped table-bordered data-tr">
            <tr>
                <td width="20%"><span class="text-danger required">*</span>إسم الموقع</td>
                <td colspan="3"><input type="text" class="form-control" name="site_name" required
                                       value="{{ $settings->translations->site_name ?? '' }}"></td>
            </tr>
            <tr>
                <td>وصف الموقع<span class="text-danger required">*</span></td>
                <td class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                    <textarea class="form-control" required
                              name="site_description">{{ $settings->translations->site_description ?? '' }}</textarea>
                </td>
                <td>كلمات مفتاحية<span class="text-danger required">*</span></td>
                <td class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                    <textarea class="form-control" required
                              name="site_keyword">{{ $settings->translations->site_keyword ?? '' }}</textarea></td>
            </tr>
            <tr>
                <td>عن الموقع<span class="text-danger required">*</span></td>
                <td colspan="3" class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                    <textarea class="form-control" required
                              name="about">{{ $settings->translations->about ?? '' }}</textarea></td>
            </tr>
            <tr>
                <td>العنوان<span class="text-danger required">*</span></td>
                <td class="@if(LaravelLocalization::setLocale() == 'en') entd @endif">
                    <input type="text" class="form-control" name="address"
                           value="{{ $settings->translations->address ?? '' }}">
                </td>
                <td>رسالة الهيدر<span class="text-danger required">*</span></td>
                <td class="entd"><input type="text" class="form-control" name="video"
                                        value="{{ $settings->translations->header_message ?? '' }}">
                </td>
            </tr>
            <tr>
                <td>رابط صفحة الفيسبوك</td>
                <td class="entd"><input type="text" class="form-control" name="facebook"
                                        value="{{ $settings->translations->facebook ?? '' }}">
                </td>
                <td>رابط صفحة تويتر</td>
                <td class="entd"><input type="text" class="form-control" name="twitter"
                                        value="{{ $settings->translations->twitter ?? '' }}">
                </td>
            </tr>
            <tr>
                <td>رابط صفحة إنستغرام</td>
                <td class="entd"><input type="text" class="form-control" name="instagram"
                                        value="{{ $settings->translations->instagram ?? '' }}">
                </td>
                <td>رابط قناة اليوتيوب</td>
                <td class="entd"><input type="text" class="form-control" name="youtube"
                                        value="{{ $settings->translations->youtube ?? '' }}">
                </td>
            </tr>
            <tr>
                <td>رابط صفحة الواتساب</td>
                <td class="entd"><input type="text" class="form-control" name="whatsapp"
                                        value="{{ $settings->translations->whatsapp ?? '' }}">
                </td>
                <td>رابط قناة التلغرام</td>
                <td class="entd"><input type="text" class="form-control" name="telegram"
                                        value="{{ $settings->translations->telegram ?? '' }}">
                </td>
            </tr>
            <tr>
                <td>رابط حساب تك توك</td>
                <td class="entd"><input type="text" class="form-control" name="tiktok"
                                        value="{{ $settings->translations->tiktok ?? '' }}">
                </td>
                <td>رابط حساب سنابشات</td>
                <td class="entd"><input type="text" class="form-control" name="snapchat"
                                        value="{{ $settings->translations->snapchat ?? '' }}">
                </td>
            </tr>
            <tr>
                <td>رقم الهاتف الرئيسي<span class="text-danger required">*</span></td>
                <td class="entd"><input type="text" class="form-control" name="tel"
                                        value="{{ $settings->translations->tel ?? '' }}">
                </td>
                <td>البريد الإلكتروني الرئيسي<span class="text-danger required">*</span></td>
                <td class="entd"><input type="email" class="form-control" name="email"
                                        value="{{ $settings->translations->email ?? '' }}">
                </td>
            </tr>
            @can('edit_settings')
                <tr>
                    <td colspan="4" class="center">
                        <button class="btn btn-primary">تعديل</button>
                    </td>
                </tr>
            @endcan
        </table>
    </form>
    <table class="table table-striped table-bordered data-tr">
        <tr>
            <td>
                <a class="btn btn-primary btn-lg btn-block" href="settings/cacheControll">تحديث الكاش</a>
            </td>
        </tr>
    </table>
@endsection
