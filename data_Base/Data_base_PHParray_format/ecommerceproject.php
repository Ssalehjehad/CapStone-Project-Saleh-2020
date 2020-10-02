<?php
/**
 * Export to PHP Array plugin for PHPMyAdmin
 * @version 5.0.2
 */

/**
 * Database `ecommerceproject`
 */

/* `ecommerceproject`.`admin` */
$admin = array(
  array('admin_id' => '18','admin_email' => 's@gmail.com','admin_name' => 'saleh jehad','admin_password' => 'saleh1010','admin_phone' => '078636336','admin_img' => 'aj9O5bQ_700bwp.webp')
);

/* `ecommerceproject`.`category` */
$category = array(
  array('cat_id' => '23','cat_name' => 'Women','cat_img' => 'womens-necklace.jpg','cat_status' => 'active'),
  array('cat_id' => '24','cat_name' => 'Men','cat_img' => 'professional-man-portrait.jpg','cat_status' => 'active'),
  array('cat_id' => '25','cat_name' => 'unique','cat_img' => 'man-on-bike.jpg','cat_status' => 'active'),
  array('cat_id' => '26','cat_name' => 'Jewellery','cat_img' => 'white-faced-watch.jpg','cat_status' => 'active')
);

/* `ecommerceproject`.`contact` */
$contact = array(
);

/* `ecommerceproject`.`customer` */
$customer = array(
  array('customer_id' => '4','customer_name' => 'soleh','customer_email' => 'soleh@gmail.com','customer_password' => 'soleh','customer_phone' => '0798888888','customer_address' => 'Amman'),
  array('customer_id' => '5','customer_name' => 'Swelleh','customer_email' => 'Swelleh@gmail.com','customer_password' => 'Swelleh','customer_phone' => '0779999999','customer_address' => 'Irbid')
);

/* `ecommerceproject`.`orders` */
$orders = array(
  array('orders_id' => '13','customer_id' => '4','payment_id' => '1','order_date' => '2020-09-29 10:44'),
  array('orders_id' => '14','customer_id' => '5','payment_id' => '1','order_date' => '2020-09-29 11:05')
);

/* `ecommerceproject`.`order_details` */
$order_details = array(
  array('order_det_id' => '17','orders_id' => '13','product_id' => '18','price' => '299','quantity' => '1','size' => 'ml','color' => 'blue'),
  array('order_det_id' => '18','orders_id' => '13','product_id' => '30','price' => '110','quantity' => '2','size' => 'm','color' => 'yellow'),
  array('order_det_id' => '19','orders_id' => '14','product_id' => '25','price' => '380','quantity' => '1','size' => 'xl','color' => 'red'),
  array('order_det_id' => '20','orders_id' => '14','product_id' => '22','price' => '75','quantity' => '2','size' => 'xl','color' => 'red')
);

/* `ecommerceproject`.`payment` */
$payment = array(
  array('payment_id' => '1','payment_type' => 'visa','payment_name' => 'saleh','security_code' => '111','payment_num' => '111111','payment_exp' => '12/12/2050','allowed' => 'allowed'),
  array('payment_id' => '2','payment_type' => 'mastercard','payment_name' => 'Salameh','security_code' => '222','payment_num' => '222222','payment_exp' => '22/1/2222','allowed' => 'disabled')
);

/* `ecommerceproject`.`product` */
$product = array(
  array('product_id' => '9','cat_id' => '23','sub_cat_id' => '10','vendor_id' => '3','product_name' => 'Cool T-shirt','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '25','product_discount' => '20','product_quantity' => '25','product_status' => 'active'),
  array('product_id' => '10','cat_id' => '23','sub_cat_id' => '10','vendor_id' => '3','product_name' => 'Lovely T-shirt','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '35','product_discount' => '35','product_quantity' => '50','product_status' => 'active'),
  array('product_id' => '11','cat_id' => '23','sub_cat_id' => '10','vendor_id' => '3','product_name' => 'Everyday T-shirt','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '10','product_discount' => '8','product_quantity' => '100','product_status' => 'active'),
  array('product_id' => '12','cat_id' => '23','sub_cat_id' => '10','vendor_id' => '3','product_name' => 'Great T-shirt','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '25','product_discount' => '25','product_quantity' => '50','product_status' => 'active'),
  array('product_id' => '13','cat_id' => '23','sub_cat_id' => '11','vendor_id' => '3','product_name' => 'Soft Dress','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '75','product_discount' => '55','product_quantity' => '10','product_status' => 'active'),
  array('product_id' => '14','cat_id' => '23','sub_cat_id' => '11','vendor_id' => '3','product_name' => 'Summer Dress','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '35','product_discount' => '35','product_quantity' => '5','product_status' => 'active'),
  array('product_id' => '15','cat_id' => '24','sub_cat_id' => '12','vendor_id' => '4','product_name' => 'Everyday T-shirt','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '15','product_discount' => '15','product_quantity' => '100','product_status' => 'active'),
  array('product_id' => '16','cat_id' => '24','sub_cat_id' => '12','vendor_id' => '4','product_name' => 'Cool T-shirt','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '35','product_discount' => '29','product_quantity' => '50','product_status' => 'active'),
  array('product_id' => '17','cat_id' => '24','sub_cat_id' => '13','vendor_id' => '4','product_name' => 'Cool Suit','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '150','product_discount' => '150','product_quantity' => '10','product_status' => 'active'),
  array('product_id' => '18','cat_id' => '24','sub_cat_id' => '13','vendor_id' => '4','product_name' => 'VIP Suit','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '350','product_discount' => '299','product_quantity' => '5','product_status' => 'active'),
  array('product_id' => '19','cat_id' => '24','sub_cat_id' => '14','vendor_id' => '4','product_name' => 'Formal is the new Informal','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '50','product_discount' => '50','product_quantity' => '15','product_status' => 'active'),
  array('product_id' => '20','cat_id' => '24','sub_cat_id' => '14','vendor_id' => '4','product_name' => 'Formal Clean Cut','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '75','product_discount' => '60','product_quantity' => '15','product_status' => 'active'),
  array('product_id' => '21','cat_id' => '25','sub_cat_id' => '15','vendor_id' => '5','product_name' => 'This Season Best Of','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '90','product_discount' => '75','product_quantity' => '13','product_status' => 'active'),
  array('product_id' => '22','cat_id' => '25','sub_cat_id' => '15','vendor_id' => '5','product_name' => 'New Trend','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '80','product_discount' => '75','product_quantity' => '10','product_status' => 'active'),
  array('product_id' => '23','cat_id' => '25','sub_cat_id' => '15','vendor_id' => '5','product_name' => 'Cool Trendy Trend','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '100','product_discount' => '100','product_quantity' => '15','product_status' => 'active'),
  array('product_id' => '24','cat_id' => '25','sub_cat_id' => '16','vendor_id' => '5','product_name' => 'Get Married Now','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '290','product_discount' => '290','product_quantity' => '5','product_status' => 'active'),
  array('product_id' => '25','cat_id' => '25','sub_cat_id' => '16','vendor_id' => '5','product_name' => 'Shine and Rise','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '500','product_discount' => '380','product_quantity' => '4','product_status' => 'active'),
  array('product_id' => '26','cat_id' => '26','sub_cat_id' => '17','vendor_id' => '3','product_name' => 'Get Shiny','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '65','product_discount' => '55','product_quantity' => '15','product_status' => 'active'),
  array('product_id' => '27','cat_id' => '26','sub_cat_id' => '17','vendor_id' => '3','product_name' => 'Be Pretty','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '95','product_discount' => '80','product_quantity' => '10','product_status' => 'active'),
  array('product_id' => '28','cat_id' => '26','sub_cat_id' => '18','vendor_id' => '3','product_name' => 'Circle Of Happeness','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '150','product_discount' => '150','product_quantity' => '10','product_status' => 'active'),
  array('product_id' => '29','cat_id' => '26','sub_cat_id' => '18','vendor_id' => '3','product_name' => 'Love Yourself','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '200','product_discount' => '150','product_quantity' => '5','product_status' => 'active'),
  array('product_id' => '30','cat_id' => '26','sub_cat_id' => '19','vendor_id' => '3','product_name' => 'Dress Timelessly','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '120','product_discount' => '110','product_quantity' => '10','product_status' => 'active'),
  array('product_id' => '31','cat_id' => '26','sub_cat_id' => '19','vendor_id' => '3','product_name' => 'Catch The Moments','product_desc' => 'Made with love from love and more love, to suite all of your needs and to meet your expectations .','product_price' => '230','product_discount' => '230','product_quantity' => '10','product_status' => 'active')
);

/* `ecommerceproject`.`pro_images` */
$pro_images = array(
  array('pro_images_id' => '32','product_id' => '9','img1' => '1601409027.fun-at-carnival.jpg','img2' => '1601409027.young-woman-holding-sunglasses.jpg','img3' => '1601409027.young-woman-riding-swings-at-fair.jpg','img4' => '1601409027.young-woman-smiling-on-swing-ride.jpg'),
  array('pro_images_id' => '33','product_id' => '10','img1' => '1601409284.model-poses-casually-on-ride.jpg','img2' => '1601409284.smiles-at-the-carnival.jpg','img3' => '1601409284.summer-fashion-woman.jpg','img4' => '1601409284.young-hip-woman-at-carnival.jpg'),
  array('pro_images_id' => '34','product_id' => '11','img1' => '1601409642.simple-red-t-shirt.jpg','img2' => '1601409642.striped-fashion-shirt.jpg','img3' => '1601409642.striped-t-shirt.jpg','img4' => '1601409642.white-tee-with-pocket.jpg'),
  array('pro_images_id' => '35','product_id' => '12','img1' => '1601409693.bold-summer-outfit.jpg','img2' => '1601409693.fashionable-woman-in-stripes.jpg','img3' => '1601409693.stylish-young-woman-posing.jpg','img4' => '1601409693.woman-looking-down.jpg'),
  array('pro_images_id' => '36','product_id' => '13','img1' => '1601409836.fashion-model-poses-with-scarf.jpg','img2' => '1601409836.model-in-red-with-heart-detail.jpg','img3' => '1601409836.model-poses-in-red-pansuit.jpg','img4' => '1601409836.red-on-red-fashion.jpg'),
  array('pro_images_id' => '37','product_id' => '14','img1' => '1601409894.boho-top-sleeve-detail.jpg','img2' => '1601409894.lace-edge-detail-summer-dress.jpg','img3' => '1601409894.summer-fashion-top-lace.jpg','img4' => '1601409894.womens-boho-dress.jpg'),
  array('pro_images_id' => '38','product_id' => '15','img1' => '1601409970.cobalt-blue-t-shirt.jpg','img2' => '1601409970.green-t-shirt.jpg','img3' => '1601409970.purple-t-shirt.jpg','img4' => '1601409970.simple-beige-mens-shirt.jpg'),
  array('pro_images_id' => '39','product_id' => '16','img1' => '1601410056.back-of-mens-white-shirt.jpg','img2' => '1601410056.blank-colored-t-shirts.jpg','img3' => '1601410056.rack-of-tshirts.jpg','img4' => '1601410056.white-tshirt-template.jpg'),
  array('pro_images_id' => '40','product_id' => '17','img1' => '1601410101.man-pointing-at-you.jpg','img2' => '1601410101.mens-business-fashion.jpg','img3' => '1601410101.stylish-man-in-bow-tie.jpg','img4' => '1601410101.tie-clip.jpg'),
  array('pro_images_id' => '41','product_id' => '18','img1' => '1601410149.business-man-checks-mobile.jpg','img2' => '1601410149.mens-suit-in-the-city.jpg','img3' => '1601410149.single-breasted-mens-suit-on-model.jpg','img4' => '1601410149.three-piece-suit.jpg'),
  array('pro_images_id' => '42','product_id' => '19','img1' => '1601410213.mans-portrait-above.jpg','img2' => '1601410213.professional-man-office.jpg','img3' => '1601410213.professional-man-on-pink.jpg','img4' => '1601410213.professional-man-portrait.jpg'),
  array('pro_images_id' => '43','product_id' => '20','img1' => '1601410292.autumn-fashion-on-man-with-glasses.jpg','img2' => '1601410292.casual-sweater-and-jeans-mens-fashion.jpg','img3' => '1601410292.man-wearing-bluetooth-headphones.jpg','img4' => '1601410292.mens-denim-fashion.jpg'),
  array('pro_images_id' => '44','product_id' => '21','img1' => '1601410902.man-on-bike.jpg','img2' => '1601410902.man-posing-with-bike.jpg','img3' => '1601410902.mens-fashion-and-bike.jpg','img4' => '1601410902.stylish-man-outdoors.jpg'),
  array('pro_images_id' => '45','product_id' => '22','img1' => '1601410992.man-relaxes-and-smiles.jpg','img2' => '1601410992.man-sitting-in-city.jpg','img3' => '1601410992.man-with-hands-together.jpg','img4' => '1601410992.young-man-in-bright-fashion.jpg'),
  array('pro_images_id' => '46','product_id' => '23','img1' => '1601411002.makeup-and-jewelry.jpg','img2' => '1601411002.mens-watch-and-ring.jpg','img3' => '1601411002.white-faced-watch.jpg','img4' => '1601411002.wrist-watch-on-driving-arm.jpg'),
  array('pro_images_id' => '47','product_id' => '24','img1' => '1601411117.beaded-detail-on-wedding-dress.jpg','img2' => '1601411117.beautiful-wedding-bouquet-and-bride.jpg','img3' => '1601411117.bridal-fashion-model-in-modern-wedding-gown.jpg','img4' => '1601411117.wedding-gown-and-smiling-bride.jpg'),
  array('pro_images_id' => '48','product_id' => '25','img1' => '1601411127.pexels-daniel-moises-magulado-1500881.jpg','img2' => '1601411127.pexels-trung-nguyen-1603884.jpg','img3' => '1601411127.pexels-wesner-rodrigues-3204420.jpg','img4' => '1601411127.pexels-милана-кушнирович-3739003.jpg'),
  array('pro_images_id' => '49','product_id' => '26','img1' => '1601411509.anchor-bracelet-gold.jpg','img2' => '1601411509.moon-friendship-bracelet.jpg','img3' => '1601411509.sun-friendship-bracelet.jpg','img4' => '1601411509.white-lace-choker-product-photo.jpg'),
  array('pro_images_id' => '50','product_id' => '27','img1' => '1601411522.anchor-bracelet-for-men.jpg','img2' => '1601411522.anchor-bracelet-mens.jpg','img3' => '1601411522.hipster-man.jpg','img4' => '1601411522.mens-anchor-bracelet.jpg'),
  array('pro_images_id' => '51','product_id' => '28','img1' => '1601411540.necklace-detail.jpg','img2' => '1601411540.origami-crane-necklace-gold.jpg','img3' => '1601411540.silver-origami-necklace.jpg','img4' => '1601411540.womens-necklace-set.jpg'),
  array('pro_images_id' => '52','product_id' => '29','img1' => '1601411556.dreamcatcher-pendant-necklace.jpg','img2' => '1601411556.elegant-woman.jpg','img3' => '1601411556.womens-gold-necklace.jpg','img4' => '1601411556.young-professional.jpg'),
  array('pro_images_id' => '53','product_id' => '30','img1' => '1601411665.classic-quartz-wrist-watch.jpg','img2' => '1601411665.grooms-prep-kit-for-wedding.jpg','img3' => '1601411665.modern-time-pieces.jpg','img4' => '1601411665.wrist-watches.jpg'),
  array('pro_images_id' => '54','product_id' => '31','img1' => '1601411674.marble-fashion-wristwatch.jpg','img2' => '1601411674.modern-bamboo-wristwatch.jpg','img3' => '1601411674.watches-in-black-white.jpg','img4' => '1601411674.wood-leather-watches.jpg')
);

/* `ecommerceproject`.`sub_category` */
$sub_category = array(
  array('sub_cat_id' => '10','cat_id' => '23','subcat_name' => 'T-shirts','sub_cat_img' => 'striped-fashion-shirt.jpg','sub_cat_status' => 'active'),
  array('sub_cat_id' => '11','cat_id' => '23','subcat_name' => 'Dresses','sub_cat_img' => 'fashion-model-poses-with-scarf.jpg','sub_cat_status' => 'active'),
  array('sub_cat_id' => '12','cat_id' => '24','subcat_name' => 'T-shirts','sub_cat_img' => 'white-tshirt-template.jpg','sub_cat_status' => 'active'),
  array('sub_cat_id' => '13','cat_id' => '24','subcat_name' => 'Suits','sub_cat_img' => 'single-breasted-mens-suit-on-model.jpg','sub_cat_status' => 'active'),
  array('sub_cat_id' => '14','cat_id' => '24','subcat_name' => 'Formal','sub_cat_img' => 'mens-denim-fashion.jpg','sub_cat_status' => 'active'),
  array('sub_cat_id' => '15','cat_id' => '25','subcat_name' => 'Men Fashion','sub_cat_img' => 'man-relaxes-and-smiles.jpg','sub_cat_status' => 'active'),
  array('sub_cat_id' => '16','cat_id' => '25','subcat_name' => 'Wedding Dresses','sub_cat_img' => 'pexels-daniel-moises-magulado-1500881.jpg','sub_cat_status' => 'active'),
  array('sub_cat_id' => '17','cat_id' => '26','subcat_name' => 'Bracelet','sub_cat_img' => 'anchor-bracelet-gold.jpg','sub_cat_status' => 'active'),
  array('sub_cat_id' => '18','cat_id' => '26','subcat_name' => 'Neckles','sub_cat_img' => 'gemstone-jewelry.jpg','sub_cat_status' => 'active'),
  array('sub_cat_id' => '19','cat_id' => '26','subcat_name' => 'Watches','sub_cat_img' => 'makeup-and-jewelry.jpg','sub_cat_status' => 'active')
);

/* `ecommerceproject`.`vendor` */
$vendor = array(
  array('vendor_id' => '3','vendor_name' => 'Saleh Jehad','vendor_email' => 'salehjehad@gmail.com','vendor_pass' => 'salehjehad','vendor_phone' => '0788888888','vendor_company' => 'FashionTM','vendor_status' => 'active'),
  array('vendor_id' => '4','vendor_name' => 'Salameh','vendor_email' => 'Salameh@gmail.com','vendor_pass' => 'Salameh','vendor_phone' => '0799999999','vendor_company' => 'BestFabrics','vendor_status' => 'active'),
  array('vendor_id' => '5','vendor_name' => 'Anas','vendor_email' => 'Anas@gmail.com','vendor_pass' => 'Anas','vendor_phone' => '0777777777','vendor_company' => 'SmoothSilk','vendor_status' => 'active')
);
