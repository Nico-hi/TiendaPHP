create database if not exists virtual_store;
use virtual_store;
create table user_data(
    id_u int auto_increment,
    name_u varchar(30) not null,
    nickname_u varchar(30) not null,
    lastname_u varchar(30),
    email varchar(40) not null,
    passwd_u varchar(225) not null,
    date_registrer_u TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    primary key(id_u),
    unique(email)
    
);

create table category(
    id_c int auto_increment,
    name_c varchar(20) not null,
    img_c_t text ,
    img_c_b blob,
    primary key(id_c)
);

create table product(
    id_p int auto_increment,
    name_p varchar(50) not null,
    price_p float DEFAULT 0,
    id_c int not null,
    img_p_t text ,
    img_p_b blob,
    primary key(id_p),
    constraint fk_category_product
        foreign key (id_c) references category(id_c)
);


insert into category (name_c,img_c_t) values 
('TVs','https://images.vexels.com/media/users/3/127688/isolated/preview/0c9e6c4b22c3f4007be4db65153328e5-tv-lcd-plana.png'),
('Smartphones','https://images.vexels.com/media/users/3/208476/isolated/preview/4c2a67b8c8fbf754b795febf869c55a2-smartphone-device-illustration.png'),
('PCs','https://uxwing.com/wp-content/themes/uxwing/download/computers-mobile-hardware/computer-desktop-color-icon.png'),
('Laptops','https://freesvg.org/img/laptop-2.png'),
('Consoles','https://cdn-icons-png.freepik.com/256/13007/13007831.png?semt=ais_white_label');

truncate table product;
select * from product p order by price_p desc;
INSERT INTO product (name_p, price_p, id_c, img_p_t) VALUES
('Samsung QLED 4K', 849.99, 1, 'https://thumb.pccomponentes.com/w-530-530/articles/1092/10928314/196-samsung-q7f-qe85q7faau-85-qled-4k-ultra-hd-smart-tv-hdr-wifi-negro.jpg'),
('LG OLED C3', 1249.00, 1, 'https://www.pngegg.com/en/png-wruar-download-grunge-devices-s-black-panasonic-crt-tv'),
('Sony Bravia XR', 1349.99, 1, 'https://www.pngwing.com/en/free-png-uexme/download'),
('Hisense ULED 55P', 699.90, 1, 'https://www.pngkey.com/png/full/2-27466_hisense-uled-tvs-logo-tv-hisense.png'),
('TCL 4K Roku', 528.00, 1, 'https://www.tcl.com/content/dam/tcl/us/en/products/home-theater/4-series/55S41/55S41_Front.png'),
('Philips Ambilight OLED', 999.00, 1, 'https://www.pngwing.com/en/free-png-jzqiy/download'),
('Panasonic Smart TV', 629.99, 1, 'https://www.pngegg.com/en/png-wruar-download-grunge-devices-s-black-panasonic-crt-tv'),
('Sharp Aquos 55"', 579.49, 1, 'https://www.sharpusa.com/-/media/SharpUSA/Images/Televisions/AQUOS/4K/55FP1K/55FP1K_Front.png'),
('Samsung The Frame', 1549.00, 1, 'https://www.pngall.com/wp-content/uploads/900x939-Samsung-TV-Butterfly-Artwork-Colorful-Display-Clipart-PNG.png'),
('LG NanoCell 4K', 599.99, 1, 'https://www.pngegg.com/en/png-wruar-download-grunge-devices-s-black-panasonic-crt-tv'),
('iPhone 15 Pro', 1269.00, 2, 'https://www.webmobilefirst.com/wp-content/uploads/2023/09/apple-iphone-15-pro-max-2023-mockup.png'),
('Samsung Galaxy S23', 989.90, 2, 'https://www.gsmarena.com/pictures/more/samsung_galaxy_s23-pictures-12082-front.jpg'),
('Google Pixel 8', 799.00, 2, 'https://www.webmobilefirst.com/wp-content/uploads/2024/10/google-pixel-8-2024-mockup.png'),
('Xiaomi 13 Ultra', 819.00, 2, 'https://www.gsmarena.com/pictures/more/xiaomi_13_ultra-pictures-12236-front.jpg'),
('OnePlus 11', 749.00, 2, 'https://www.gsmarena.com/pictures/more/oneplus_11-pictures-11893-front.jpg'),
('Motorola Edge 40', 579.00, 2, 'https://www.gsmarena.com/pictures/more/motorola_edge_40-pictures-12204-front.jpg'),
('Sony Xperia 1 V', 679.00, 2, 'https://www.gsmarena.com/pictures/more/sony_xperia_1_v-pictures-12263-front.jpg'),
('Huawei P60 Pro', 799.00, 2, 'https://www.gsmarena.com/pictures/more/huawei_p60_pro-pictures-12172-front.jpg'),
('Nothing Phone 2', 649.90, 2, 'https://www.gsmarena.com/pictures/more/nothing_phone_(2)-pictures-12386-front.jpg'),
('Asus Zenfone 10', 569.00, 2, 'https://www.gsmarena.com/pictures/more/asus_zenfone_10-pictures-12380-front.jpg'),
('Dell Optiplex 7000', 1099.00, 3, 'https://www.pngegg.com/en/png-wruar-download-grunge-devices-s-black-panasonic-crt-tv'),
('HP Envy Tower', 849.00, 3, 'https://www.pngegg.com/en/png-wruar-download-grunge-devices-s-black-panasonic-crt-tv'),
('iMac 24"', 1499.00, 3, 'https://www.webmobilefirst.com/wp-content/uploads/2021/04/apple-imac-24-inch-2021-mockup.png'),
('Acer Aspire TC', 649.00, 3, 'https://www.pngegg.com/en/png-wruar-download-grunge-devices-s-black-panasonic-crt-tv'),
('Lenovo ThinkCentre', 819.99, 3, 'https://www.pngwing.com/en/free-png-uexme/download'),
('CyberPower Gaming PC', 1699.00, 3, 'https://www.cyberpowerpc.com/images/cs450/Gamer-Infinity-XLC-Front.png'),
('MSI Creator P100', 1299.00, 3, 'https://asset.msi.com/resize/image/global/product/product_3_20200807102629_5f2c9c65b7b9e.png/600.png'),
('NZXT H710 Build', 1499.00, 3, 'https://nzxt.com/assets/cms/34299/1614306043-h710-matte-black-front.png'),
('Corsair One Compact', 2099.00, 3, 'https://www.corsair.com/medias/sys_master/images/images/h7a/h3f/9645873627166/-CS-9020030-NA-Main.png'),
('HP Omen 45L', 1899.00, 3, 'https://ssl-product-images.www8-hp.com/digmedialib/prodimg/lowres/c07962610.png'),
('MacBook Air M2', 1249.00, 4, 'https://yellowimages.com/wp-content/uploads/2022/10/macbook-air-m2-mockup-103038.png'),
('ASUS Vivobook 15', 649.00, 4, 'https://www.pngwing.com/en/free-png-jzqiy/download'),
('Dell XPS 13', 1099.00, 4, 'https://www.cnet.com/a/img/resize/0e5b5b4b5b5b5b5b5b5b5b5b5b5b5b5b/i/gears/2019/01/07/xps13_2019_hero.jpg?auto=webp&fit=crop&height=900&width=1200'),
('HP Pavilion 15', 499.00, 4, 'https://www.pngwing.com/en/free-png-jzqiy/download'),
('Lenovo Yoga 9i', 969.00, 4, 'https://www.pngwing.com/en/free-png-uexme/download'),
('Razer Blade 16', 1699.00, 4, 'https://assets2.razerzone.com/images/pnx.assets/3e7a2f6b/razer-blade-16-black-front.png'),
('Acer Swift X', 799.00, 4, 'https://www.acer.com/ac/en/US/content/static/images/products/laptops/swift-x/SFX14-41G-R1S6-front.png'),
('MSI GS66 Stealth', 1299.00, 4, 'https://asset.msi.com/resize/image/global/product/product_0_20200807102630_5f2c9c6ab7b9e.png/600.png'),
('Gigabyte Aero 16', 1199.00, 4, 'https://www.gigabyte.com/FileUpload/Global/Product/4890/1.png'),
('Samsung Galaxy Book3', 949.00, 4, 'https://images.samsung.com/is/image/samsung/p6pim/us/2302/gallery/us-galaxy-book3-np750xfg-kb1us-534714165?$650_519_PNG$'),
('PlayStation 5', 599.99, 5, 'https://www.playstation.com/content/dam/global_pdc/en/corporate/hardware/ps5/ps5-console-front.png'),
('Xbox Series X', 559.99, 5, 'https://assets.xboxservices.com/assets/8e/3c/8e3c3b3b-4b7b-4b8e-9c6b-5f8b7f3c4e1e.png'),
('Nintendo Switch OLED', 349.99, 5, 'https://assets.nintendo.com/image/upload/c_fill,w_1200/q_auto:best/f_auto/dpr_2.0/ncom/en_US/switch/oled-model/white-front.png'),
('Steam Deck', 419.00, 5, 'https://cdn.cloudflare.steamstatic.com/steamdeck/images/steam-deck-front.png'),
('PlayStation 4 Slim', 379.99, 5, 'https://www.playstation.com/content/dam/global_pdc/en/corporate/hardware/ps4/ps4-slim-front.png'),
('Xbox Series S', 299.99, 5, 'https://assets.xboxservices.com/assets/8e/3c/8e3c3b3b-4b7b-4b8e-9c6b-5f8b7f3c4e1f.png'),
('Nintendo Switch Lite', 219.99, 5, 'https://assets.nintendo.com/image/upload/c_fill,w_1200/q_auto:best/f_auto/dpr_2.0/ncom/en_US/switch/lite/yellow-front.png'),
('Retro NES Classic', 79.99, 5, 'https://assets.nintendo.com/image/upload/c_fill,w_1200/q_auto:best/f_auto/dpr_2.0/ncom/en_US/products/nes-classic-edition/nes-classic-front.png'),
('PS Vita', 179.99, 5, 'https://www.playstation.com/content/dam/global_pdc/en/corporate/hardware/ps-vita/ps-vita-front.png'),
('Game Boy Advance SP', 99.99, 5, 'https://assets.nintendo.com/image/upload/c_fill,w_1200/q_auto:best/f_auto/dpr_2.0/ncom/en_US/products/game-boy-advance-sp/gba-sp-front.png');

insert into user_data (name_u,nickname_u,lastname_u,email,passwd_u) values
('user_name_default1','user_nickname_default1','user_lastname_default1','email_default1@gmail.com','$2y$10$2x5GnFIUbEkBE0fTEUUqWeuxtllD7wAR56Wkb7rK.hooTaWdnP3Mi');




select * from user_data ud  ;



