<?php
namespace Uistacks\Categories\Seeds;

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    }
}

/*
--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `slug`, `parent_id`, `created_by`, `updated_by`, `active`, `class_name`, `options`, `is_featured`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'web-design-and-mobile-app-development', 0, 2, 2, 1, '', '{\"media\":{\"main_image_id\":\"1\"}}', 0, 1, '2018-09-24 18:58:59', '2018-09-24 18:58:59'),
(2, 'finance-and-business-services', 0, 2, 2, 1, '', '{\"media\":{\"main_image_id\":\"2\"}}', 0, 2, '2018-09-24 19:01:06', '2018-09-24 19:01:06'),
(3, 'design-and-multimedia', 0, 2, 2, 1, '', '{\"media\":{\"main_image_id\":\"3\"}}', 0, 3, '2018-09-24 19:01:57', '2018-09-24 19:01:57'),
(4, 'customer-service-and-support', 0, 2, 2, 1, '', '{\"media\":{\"main_image_id\":\"4\"}}', 0, 4, '2018-09-24 19:03:16', '2018-09-24 19:03:16'),
(5, 'web-programming', 1, 2, 2, 1, '', '{\"media\":{\"main_image_id\":null}}', 0, 5, '2018-09-24 19:04:19', '2018-09-24 19:04:19'),
(6, 'web-design', 1, 2, 2, 1, '', '{\"media\":{\"main_image_id\":null}}', 0, 6, '2018-09-24 19:04:43', '2018-09-24 19:04:43'),
(7, 'ecommerce-online-store', 1, 2, 2, 1, '', '{\"media\":{\"main_image_id\":null}}', 0, 7, '2018-09-24 19:05:05', '2018-09-24 19:05:05'),
(8, 'accounting', 2, 2, 2, 1, '', '{\"media\":{\"main_image_id\":null}}', 0, 8, '2018-09-24 19:05:48', '2018-09-24 19:05:48'),
(9, 'hr-payroll', 2, 2, 2, 1, '', '{\"media\":{\"main_image_id\":null}}', 0, 9, '2018-09-24 19:06:13', '2018-09-24 19:06:13'),
(10, 'legal', 2, 2, 2, 1, '', '{\"media\":{\"main_image_id\":null}}', 0, 10, '2018-09-24 19:06:32', '2018-09-24 19:06:32'),
(11, 'business-consulting', 2, 2, 2, 1, '', '{\"media\":{\"main_image_id\":null}}', 0, 11, '2018-09-24 19:06:51', '2018-09-24 19:06:51'),
(12, 'employers-relationship-management-crm', 2, 2, 2, 1, '', '{\"media\":{\"main_image_id\":null}}', 0, 12, '2018-09-24 19:07:22', '2018-09-24 19:07:22'),
(13, 'page-and-book-design', 3, 2, 2, 1, '', '{\"media\":{\"main_image_id\":null}}', 0, 13, '2018-09-24 19:07:53', '2018-09-24 19:07:53'),
(14, 't-shirt-design', 3, 2, 2, 1, '', '{\"media\":{\"main_image_id\":null}}', 0, 14, '2018-09-24 19:08:20', '2018-09-24 19:08:20'),
(15, 'business-card-design', 3, 2, 2, 1, '', '{\"media\":{\"main_image_id\":null}}', 0, 15, '2018-09-24 19:08:46', '2018-09-24 19:08:47');

--
-- Dumping data for table `categories_trans`
--

INSERT INTO `categories_trans` (`id`, `category_id`, `name`, `description`, `page_seo_title`, `page_meta_keywords`, `page_meta_descriptions`, `lang`, `created_at`, `updated_at`) VALUES
(1, 1, 'Web design and mobile app development', 'Web design and mobile app development', 'Web design and mobile app development', 'Web design and mobile app development', 'Web design and mobile app development', 'en', '2018-09-24 18:58:59', '2018-09-24 18:58:59'),
(2, 2, 'Finance and business services', 'Finance and business services', 'Finance and business services', 'Finance and business services', 'Finance and business services', 'en', '2018-09-24 19:01:06', '2018-09-24 19:01:06'),
(3, 3, 'Design and Multimedia', 'Design and Multimedia', 'Design and Multimedia', 'Design and Multimedia', 'Design and Multimedia', 'en', '2018-09-24 19:01:57', '2018-09-24 19:01:57'),
(4, 4, 'Customer Service and Support', 'Customer Service and Support', 'Customer Service and Support', 'Customer Service and Support', 'Customer Service and Support', 'en', '2018-09-24 19:03:16', '2018-09-24 19:03:16'),
(5, 5, 'Web Programming', 'Web Programming', 'Web Programming', 'Web Programming', 'Web Programming', 'en', '2018-09-24 19:04:19', '2018-09-24 19:04:19'),
(6, 6, 'Web Design', 'Web Design', 'Web Design', 'Web Design', 'Web Design', 'en', '2018-09-24 19:04:43', '2018-09-24 19:04:43'),
(7, 7, 'Ecommerce / Online Store', 'Ecommerce / Online Store', 'Ecommerce / Online Store', 'Ecommerce / Online Store', 'Ecommerce / Online Store', 'en', '2018-09-24 19:05:05', '2018-09-24 19:05:05'),
(8, 8, 'Accounting', 'Accounting', 'Accounting', 'Accounting', 'Accounting', 'en', '2018-09-24 19:05:48', '2018-09-24 19:05:48'),
(9, 9, 'HR / Payroll', 'HR / Payroll', 'HR / Payroll', 'HR / Payroll', 'HR / Payroll', 'en', '2018-09-24 19:06:13', '2018-09-24 19:06:13'),
(10, 10, 'Legal', 'Legal', 'Legal', 'Legal', 'Legal', 'en', '2018-09-24 19:06:32', '2018-09-24 19:06:32'),
(11, 11, 'Business Consulting', 'Business Consulting', 'Business Consulting', 'Business Consulting', 'Business Consulting', 'en', '2018-09-24 19:06:52', '2018-09-24 19:06:52'),
(12, 12, 'Employers Relationship Management (CRM)', 'Employers Relationship Management (CRM)', 'Employers Relationship Management (CRM)', 'Employers Relationship Management (CRM)', 'Employers Relationship Management (CRM)', 'en', '2018-09-24 19:07:22', '2018-09-24 19:07:22'),
(13, 13, 'Page and Book Design', 'Page and Book Design', 'Page and Book Design', 'Page and Book Design', 'Page and Book Design', 'en', '2018-09-24 19:07:53', '2018-09-24 19:07:53'),
(14, 14, 'T-Shirt Design', 'T-Shirt Design', 'T-Shirt Design', 'T-Shirt Design', 'T-Shirt Design', 'en', '2018-09-24 19:08:20', '2018-09-24 19:08:20'),
(15, 15, 'Business Card Design', 'Business Card Design', 'Business Card Design', 'Business Card Design', 'Business Card Design', 'en', '2018-09-24 19:08:47', '2018-09-24 19:08:47');
*/
