<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [

            ['id' => 1, 'name' => 'sliders', 'alias' => 'السلايدر', 'parent' => 0],
            ['id' => 2, 'name' => 'add_slider', 'alias' => 'إضافة سلايدر', 'parent' => 1],
            ['id' => 3, 'name' => 'edit_slider', 'alias' => 'تعديل سلايدر', 'parent' => 1],
            ['id' => 4, 'name' => 'delete_slider', 'alias' => 'حذف سلايدر', 'parent' => 1],

            ['id' => 5, 'name' => 'contact_us', 'alias' => 'إتصل بنا', 'parent' => 0],
            ['id' => 6, 'name' => 'edit_contact_us', 'alias' => 'تعديل حالة إتصل بنا', 'parent' => 5],
            ['id' => 7, 'name' => 'delete_contact_us', 'alias' => 'حذف رسائل إتصل بنا', 'parent' => 5],
            ['id' => 8, 'name' => 'reply_contact', 'alias' => 'الرد على الرسائل', 'parent' => 5],

            ['id' => 9, 'name' => 'settings', 'alias' => 'إعدادات الموقع', 'parent' => 0],
            ['id' => 10, 'name' => 'edit_settings', 'alias' => 'تعديل الإعدادات', 'parent' => 9],

            ['id' => 11, 'name' => 'admin', 'alias' => 'الإداريين', 'parent' => 0],
            ['id' => 12, 'name' => 'add_admin', 'alias' => 'إضافة إداري', 'parent' => 11],
            ['id' => 13, 'name' => 'edit_admin', 'alias' => 'تعديل إداري', 'parent' => 11],
            ['id' => 14, 'name' => 'delete_admin', 'alias' => 'حذف إداري', 'parent' => 11],

            ['id' => 15, 'name' => 'permission', 'alias' => 'الصلاحيات', 'parent' => 0],
            ['id' => 16, 'name' => 'add_permission', 'alias' => 'إضافة صلاحية', 'parent' => 15],
            ['id' => 17, 'name' => 'edit_permission', 'alias' => 'تعديل صلاحية', 'parent' => 15],
            ['id' => 18, 'name' => 'delete_permission', 'alias' => 'حذف صلاحية', 'parent' => 15],

            ['id' => 19, 'name' => 'statistics', 'alias' => 'إحصائيات الموقع', 'parent' => 0],

            ['id' => 20, 'name' => 'cats', 'alias' => 'أقسام المنتجات', 'parent' => 0],
            ['id' => 21, 'name' => 'add_cat', 'alias' => 'إضافة قسم', 'parent' => 20],
            ['id' => 22, 'name' => 'edit_cat', 'alias' => 'تعديل قسم', 'parent' => 20],
            ['id' => 23, 'name' => 'delete_cat', 'alias' => 'حذف قسم', 'parent' => 20],

            ['id' => 24, 'name' => 'products', 'alias' => 'المنتجات', 'parent' => 0],
            ['id' => 25, 'name' => 'add_product', 'alias' => 'إضافة منتج', 'parent' => 24],
            ['id' => 26, 'name' => 'edit_product', 'alias' => 'تعديل منتج', 'parent' => 24],
            ['id' => 27, 'name' => 'delete_product', 'alias' => 'حذف منتج', 'parent' => 24],

            ['id' => 28, 'name' => 'orders', 'alias' => 'طلبات الشراء', 'parent' => 0],
            ['id' => 29, 'name' => 'edit_order', 'alias' => 'تعديل طلبات الشراء', 'parent' => 28],

            ['id' => 30, 'name' => 'mechanism', 'alias' => 'أليات العمل', 'parent' => 0],
            ['id' => 31, 'name' => 'add_mechanism', 'alias' => 'إضافة', 'parent' => 30],
            ['id' => 32, 'name' => 'edit_mechanism', 'alias' => 'تعديل', 'parent' => 30],
            ['id' => 33, 'name' => 'delete_mechanism', 'alias' => 'حذف', 'parent' => 30],

            ['id' => 34, 'name' => 'about_us_subjects', 'alias' => 'مواضيع من نحن', 'parent' => 0],
            ['id' => 35, 'name' => 'add_about_us_subjects', 'alias' => 'إضافة', 'parent' => 34],
            ['id' => 36, 'name' => 'edit_about_us_subjects', 'alias' => 'تعديل', 'parent' => 34],
            ['id' => 37, 'name' => 'delete_about_us_subjects', 'alias' => 'حذف', 'parent' => 34],

            ['id' => 38, 'name' => 'services', 'alias' => 'خدماتنا', 'parent' => 0],
            ['id' => 39, 'name' => 'add_service', 'alias' => 'إضافة', 'parent' => 38],
            ['id' => 40, 'name' => 'edit_service', 'alias' => 'تعديل', 'parent' => 38],
            ['id' => 41, 'name' => 'delete_service', 'alias' => 'حذف', 'parent' => 38],

            ['id' => 42, 'name' => 'clients', 'alias' => 'عملاؤنا', 'parent' => 0],
            ['id' => 43, 'name' => 'add_client', 'alias' => 'إضافة', 'parent' => 42],
            ['id' => 44, 'name' => 'edit_client', 'alias' => 'تعديل', 'parent' => 42],
            ['id' => 45, 'name' => 'delete_client', 'alias' => 'حذف', 'parent' => 42],

            ['id' => 46, 'name' => 'screen_type', 'alias' => 'تقسيمات الشاشات', 'parent' => 0],
            ['id' => 47, 'name' => 'add_screen_type', 'alias' => 'إضافة', 'parent' => 46],
            ['id' => 48, 'name' => 'edit_screen_type', 'alias' => 'تعديل', 'parent' => 46],
            ['id' => 49, 'name' => 'delete_screen_type', 'alias' => 'حذف', 'parent' => 46],

            ['id' => 50, 'name' => 'screen', 'alias' => ' الشاشات', 'parent' => 0],
            ['id' => 51, 'name' => 'add_screen', 'alias' => 'إضافة', 'parent' => 50],
            ['id' => 52, 'name' => 'edit_screen', 'alias' => 'تعديل', 'parent' => 50],
            ['id' => 53, 'name' => 'delete_screen', 'alias' => 'حذف', 'parent' => 50],

            ['id' => 54, 'name' => 'city', 'alias' => ' المدن', 'parent' => 0],
            ['id' => 55, 'name' => 'add_city', 'alias' => 'إضافة', 'parent' => 54],
            ['id' => 56, 'name' => 'edit_city', 'alias' => 'تعديل', 'parent' => 54],
            ['id' => 57, 'name' => 'delete_city', 'alias' => 'حذف', 'parent' => 54],

            ['id' => 59, 'name' => 'plans', 'alias' => 'خطط الشاشات', 'parent' => 0],
            ['id' => 60, 'name' => 'add_plan', 'alias' => 'إضافة', 'parent' => 59],
            ['id' => 61, 'name' => 'edit_plan', 'alias' => 'تعديل', 'parent' => 59],
            ['id' => 62, 'name' => 'delete_plan', 'alias' => 'حذف', 'parent' => 59],

            ['id' => 63, 'name' => 'prices', 'alias' => 'أسعار الشاشات', 'parent' => 0],
            ['id' => 64, 'name' => 'add_price', 'alias' => 'إضافة', 'parent' => 63],
            ['id' => 65, 'name' => 'edit_price', 'alias' => 'تعديل', 'parent' => 63],
            ['id' => 66, 'name' => 'delete_price', 'alias' => 'حذف', 'parent' => 63],

            ['id' => 67, 'name' => 'jobs', 'alias' => 'الوظائف', 'parent' => 0],
            ['id' => 68, 'name' => 'add_job', 'alias' => 'إضافة', 'parent' => 67],
            ['id' => 69, 'name' => 'edit_job', 'alias' => 'تعديل', 'parent' => 67],
            ['id' => 70, 'name' => 'delete_job', 'alias' => 'حذف', 'parent' => 67],

            ['id' => 71, 'name' => 'jobs_apply', 'alias' => 'طلبات التوظيف', 'parent' => 0],

        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'id' => $permission['id'],
                'name' => $permission['name'],
                'alias' => $permission['alias'],
                'parent_id' => $permission['parent'],
            ]);
        }
    }
}
