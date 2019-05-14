<?php

namespace Uistacks\Settings\Seeds;

use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
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
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `created_by`, `updated_by`, `page_url`, `active`, `static`, `published`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'about-us', 0, 1, 1, '2018-10-07 09:41:04', '2018-10-07 09:41:04'),
(2, 1, 1, 'terms-conditions', 0, 1, 1, '2018-10-07 09:41:04', '2018-10-07 09:41:04'),
(3, 1, 1, 'privacy-policy', 0, 1, 1, '2018-10-07 09:41:04', '2018-10-07 09:41:04');

--
-- Dumping data for table `pages_trans`
--

INSERT INTO `pages_trans` (`id`, `page_id`, `title`, `body`, `page_seo_title`, `page_meta_keywords`, `page_meta_descriptions`, `lang`, `created_at`, `updated_at`) VALUES
(1, 1, 'About Us', 'About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us ', 'About Us', 'About Us', 'About Us', 'en', '2018-10-07 09:41:04', '2018-10-07 09:41:04'),
(2, 2, 'About Us', 'About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us ', 'About Us', 'About Us', 'About Us', 'en', '2018-10-07 09:41:04', '2018-10-07 09:41:04'),
(3, 3, 'About Us', 'About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us About Us ', 'About Us', 'About Us', 'About Us', 'en', '2018-10-07 09:41:04', '2018-10-07 09:41:04');
*/
