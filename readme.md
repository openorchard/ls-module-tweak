# ls-module-tweak
LemonStand module that assists in theme development, by providing global site settings.

## Installation
1. Download Tweak
1. Create a folder named `tweak` in the `modules` directory.
1. Extract all files into the `modules/tweak` directory (`modules/tweak/readme.md` should exist).
1. Create a new partial in CMS -> Partials named `site:settings`
1. Return an object with settings, like this:

		<?
		
		if(!function_exists('site_settings')) {
			function site_settings() {
				return (object) array(
					'date' => date('F, j'),
					'charset' => 'utf-8',
					'company' => (object) array(
						'title' => Shop_CompanyInformation::get()->name,
						'slogan' => '',
						'sales_email' => 'sales@site.com',
						'info_email' => 'info@site.com',
						'twitter_page' => 'http://twitter.com/',
						'facebook_page' => 'http://facebook.com/',
						'youtube_page' => 'http://www.youtube.com/'
					),
					'customer' => (object) array(
						'default_email' => 'E-mail address', // display on home, login, register pages
					),
					'meta' => (object) array(
						'default_description' => "",
						'default_keywords' => "",
					),
					'search' => (object) array(
						'path' => '/search',
						'products_per_page' => 6
					),
					'store' => (object) array(
						'path' => '/store',
						'product_path' => '/store/product',
						'category_path' => '/store/category',
						'cart_path' => '/store/cart',
						'checkout_path' => '/store/checkout',
						'pay_path' => '/store/pay',
						'product_considered_new' => 7 * 24 * 60 * 60,
						'invoice' => (object) array(
							'product' => (object) array(
								'max_title_length' => 999,
								'max_description_length' => 999,
								'default_thumb_path' => 'resources/ui/product-default-thumb.png',
								'image' => (object) array(
									'width' => 87,
									'height' => 87
								)
							)
						),
						'category' => (object) array(
							'products_per_page' => 11,
							'max_title_length' => 24,
							'default_thumb_path' => '/resources/ui/category-default-thumb.jpg',
							'image' => (object) array(
								'small_width' => 20,
								'small_height' => 20,
								'large_width' => 40,
								'large_height' => 40
							),
							'product' => (object) array(
								'max_title_length' => 999,
								'max_description_length' => 999,
								'default_thumb_path' => 'resources/ui/product-default-thumb.png',
								'image' => (object) array(
									'width' => 87,
									'height' => 87
								)
							)
						),
						'product' => (object) array(
							'default_thumb_path' => 'resources/ui/product-detail-default-thumb.png',
							'image' => (object) array(
								'small_width' => 60,
								'small_height' => 60,
								'medium_width' => 385,
								'medium_height' => 350,
								'large_width' => 385 * 3,
								'large_height' => 350 * 3
							),
							'related' => (object) array(
								'max_title_length' => 999,
								'max_description_length' => 23,
									'per_page' => 8,
								'default_thumb_path' => '/resources/ui/product-default-thumb.png',
								'discount_path' => '/resources/ui/price-strike.png',
								'image' => (object) array(
									'width' => 145,
									'height' => 145
								)
							)
						),
						'frontpage' => (object) array(
							'max_title_length' => 999,
							'max_description_length' => 23,
							'default_thumb_path' => '/resources/ui/product-default-thumb.png',
							'discount_path' => '/resources/ui/price-strike.png',
							'image' => (object) array(
								'width' => 116,
								'height' => 113
							)
						),
						'cart' => (object) array(
							'product' => (object) array(
								'max_title_length' => 999,
								'max_description_length' => 999,
								'default_thumb_path' => '/resources/ui/product-default-thumb.png',
								'image' => (object) array(
									'width' => 55,
									'height' => 45
								)
							)
						)
					),
					'blog' => (object) array(
						'path' => '/blog/',
						'per_page' => 5,
						'preview' => (object) array(
							'trim_length' => 300
						),
						'rss' => (object) array(
							'per_page' => 20
						)
					),
					'account' => (object) array(
						'path' => '/account',
						'orders_path' => '/account/orders',
						'order_path' => '/account/order'
					)
				);
			}
		}
		
		return site_settings();

1. Done!

## Usage
Use your now global site settings like this:

	<h1><?= $site_settings->company->title ?></h1>