-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 25, 2023 lúc 06:37 AM
-- Phiên bản máy phục vụ: 10.5.16-MariaDB
-- Phiên bản PHP: 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id20799246_candiecandle`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`) VALUES
(1, 'Valentine'),
(2, 'Flower'),
(3, 'Dalat'),
(4, 'The basic'),
(5, 'Bộ quà tặng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_orders`
--

CREATE TABLE `tbl_orders` (
  `order_id` int(11) NOT NULL,
  `order_date` date DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `pd_quantity` int(11) NOT NULL,
  `pd_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_pd_details`
--

CREATE TABLE `tbl_pd_details` (
  `pd_id` int(11) NOT NULL,
  `pd_cat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_scent` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_ingredients_wax` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_ingredients_smell` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_weight` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_duration` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_pd_details`
--

INSERT INTO `tbl_pd_details` (`pd_id`, `pd_cat`, `pd_description`, `pd_scent`, `pd_ingredients_wax`, `pd_ingredients_smell`, `pd_weight`, `pd_duration`) VALUES
(1, 'Nến thơm Quà tặng 14/2 & 8/3 | EROS', 'Cùng những nốt hương từ hoa và quả giúp mang lại cảm giác tươi mới và ngọt ngào, Eros sẽ đưa bạn sống lại những ký ức thật trong trẻo của thuở chớm yêu - nơi bạn có thể là một đứa trẻ, nơi không có sự hiện diện của những tất bật, lo toan từ cuộc sống của những người trưởng thành.', 'Quả nho, táo xanh, lily, diên vĩ, xạ hương, quả đào, hổ phách', 'Sáp cọ, sáp đậu nành, sáp ong', 'Dầu hương thơm đến từ nhà hương xứ Anh Quốc', '150g', '30-40 giờ'),
(2, 'Nến thơm Quà tặng 14/2 & 8/3 | AMOUR', 'Từ những nốt hương có nguồn gốc từ gỗ, tận hưởng mùi thơm từ Amour mang lại cảm giác tương tự như khi bạn ngồi cạnh bạn đời, bật một bản nhạc cổ điển, trong một khung cảnh ấm áp, nhâm nhi một ly rượu vang và tận hưởng không gian chỉ có hai người.', 'Xô thơm, linh lan, oải hương, bạch đậu khấu, gỗ đàn hương xạ hương, đậu tonka, vani', 'Sáp cọ, sáp đậu nành, sáp ong', 'Dầu hương thơm đến từ nhà hương xứ Anh Quốc', '150g', '30-40 giờ'),
(3, 'Candie Candle\'s Signature | JASMINE', 'Bộ sưu tập khởi đầu câu chuyện khởi nghiệp của chúng tôi...', 'Hương hoa lài thuần túy, nhẹ nhàng và bay bổng, làn hương hòa quyện tạo ra không gian thanh mát nhẹ nhàng', 'Sáp cọ, sáp đậu nành, sáp ong. JAROS không sử dụng sáp paraffin vì có những nghiên cứu đã chỉ rằng sáp paraffin gây hại đến sức khỏe người tiêu dùng.', 'JAROS chọn nhà hương đến từ Anh Quốc làm nhà cung cấp hương cho các sản phẩm', '150g', '30-40 giờ'),
(4, 'Candie Candle\'s Signature | ROSE', 'Bộ sưu tập khởi đầu câu chuyện khởi nghiệp của chúng tôi...', 'Hương của những hoa hồng ở giai đoạn nở rộ đẹp nhất, nồng nàn, quý phái và sang trọng', 'Sáp cọ, sáp đậu nành, sáp ong. JAROS không sử dụng sáp paraffin vì có những nghiên cứu đã chỉ rằng sáp paraffin gây hại đến sức khỏe người tiêu dùng.', 'JAROS chọn nhà hương đến từ Anh Quốc làm nhà cung cấp hương cho các sản phẩm', '150g', '30-40 giờ'),
(5, 'Nến thơm Hương Thường Xanh | EVERGREEN', 'Tập hợp những nốt hương xanh mát của loài cây thường xanh xen lẫn với chút vị cay nồng của gừng tươi.', 'Thông đỏ, gừng tươi, hoắc hương, tuyết tùng', 'Sáp cọ, sáp đậu nành, sáp ong', 'Dầu hương thơm đến từ nhà hương xứ Anh Quốc', '220g', '40 giờ'),
(6, 'Nến thơm Hương Tiệm Bánh Nướng | BAKED COOKIES', 'Hương bơ béo ngậy thơm lừng từ tiệm bánh nướng', 'Bánh quy bơ, mật ong, sữa, caramel', 'Sáp cọ, sáp đậu nành, sáp ong', 'Dầu hương thơm đến từ nhà hương xứ Anh Quốc', '220g', '40 giờ'),
(7, 'Nến thơm Hương Tách Trà Cam Gừng | A CUP OF TEA', 'Tách trà đậm vị cam gừng, hương thơm vừa bay bổng vừa nồng ấm', 'Cam ngọt, trà đen, trà xanh, gừng già', 'Sáp cọ, sáp đậu nành, sáp ong', 'Dầu hương thơm đến từ nhà hương xứ Anh Quốc', '220g', '40 giờ'),
(8, 'Candie Candle The Basic | FRUITY SUMMER', 'Bộ sưu tập nến với các hương cơ bản thường gặp trong ngành hương, khách hàng có thể trải nghiệm và tìm ra \"gu\" của chính mình.', 'Mùa hè tươi mát với nốt hương táo cam trẻ trung, năng động', 'Sáp cọ, sáp đậu nành, sáp ong', 'JAROS chọn nhà hương đến từ Anh Quốc làm nhà cung cấp hương cho các sản phẩm', '100g', '30-40 giờ'),
(9, 'Candie Candle The Basic | THE FOREST', 'Bộ sưu tập nến với các hương cơ bản thường gặp trong ngành hương, khách hàng có thể trải nghiệm và tìm ra \"gu\" của chính mình.', 'Mùa hè tươi mát với nốt hương táo cam trẻ trung, năng động', 'Sáp cọ, sáp đậu nành, sáp ong', 'JAROS chọn nhà hương đến từ Anh Quốc làm nhà cung cấp hương cho các sản phẩm', '100g', '30-40 giờ'),
(10, 'Candie Candle The Basic | GARDENY', 'Bộ sưu tập nến với các hương cơ bản thường gặp trong ngành hương, khách hàng có thể trải nghiệm và tìm ra \"gu\" của chính mình.', 'Mùa hè tươi mát với nốt hương táo cam trẻ trung, năng động', 'Sáp cọ, sáp đậu nành, sáp ong', 'JAROS chọn nhà hương đến từ Anh Quốc làm nhà cung cấp hương cho các sản phẩm', '100g', '30-40 giờ'),
(11, 'Candie Candle The Basic | A SPA DAY', 'Bộ sưu tập nến với các hương cơ bản thường gặp trong ngành hương, khách hàng có thể trải nghiệm và tìm ra \"gu\" của chính mình.', 'Tách trà cho ngày thư giãn cuối tuần, có chút sự cay và nồng ấm', 'Sáp cọ, sáp đậu nành, sáp ong', 'JAROS chọn nhà hương đến từ Anh Quốc làm nhà cung cấp hương cho các sản phẩm', '100g', '30-40 giờ'),
(12, 'Candie Candle The Basic | FORGIVENESS', ' Bộ sưu tập nến với các hương cơ bản thường gặp trong ngành hương, khách hàng có thể trải nghiệm và tìm ra \"gu\" của chính mình.', 'Mùa hè tươi mát với nốt hương táo cam trẻ trung, năng động', 'Sáp cọ, sáp đậu nành, sáp ong', 'JAROS chọn nhà hương đến từ Anh Quốc làm nhà cung cấp hương cho các sản phẩm', '100g', '30-40 giờ'),
(13, 'Candie Candle The Basic | LOST IN DA LAT', 'Bộ sưu tập nến với các hương cơ bản thường gặp trong ngành hương, khách hàng có thể trải nghiệm và tìm ra \"gu\" của chính mình.', 'Mùi hương của rừng già, khác biệt và mạnh mẽ', 'Sáp cọ, sáp đậu nành, sáp ong', 'JAROS chọn nhà hương đến từ Anh Quốc làm nhà cung cấp hương cho các sản phẩm', '100g', '30-40 giờ'),
(14, 'Candie Candle The Gift | GIFT01', 'Hộp quà cao cấp bao gồm nhiều phụ kiện trang trí xinh xắn. Thiệp viết tay chữ nắn nót tỉ mỉ với nội dung theo yêu cầu. Bộ phụ kiện dùng nến chuyên nghiệp: bật lửa USB an toàn, đáy lót nến/nắp chụp ngăn tạo khói, kéo cắt bấc chuyên dụng, túi vải nhung cao cấp.', 'Mùi hương của rừng già, khác biệt và mạnh mẽ', 'Sáp cọ, sáp đậu nành, sáp ong', 'JAROS chọn nhà hương đến từ Anh Quốc làm nhà cung cấp hương cho các sản phẩm', '100gx2', '30-40 giờ'),
(15, 'Candie Candle The Gift | GIFT02', 'Hộp quà cao cấp bao gồm nhiều phụ kiện trang trí xinh xắn. Thiệp viết tay chữ nắn nót tỉ mỉ với nội dung theo yêu cầu. Bộ phụ kiện dùng nến chuyên nghiệp: bật lửa USB an toàn, đáy lót nến/nắp chụp ngăn tạo khói, kéo cắt bấc chuyên dụng, túi vải nhung cao cấp.', 'Mùi hương của rừng già, khác biệt và mạnh mẽ', 'Sáp cọ, sáp đậu nành, sáp ong', 'JAROS chọn nhà hương đến từ Anh Quốc làm nhà cung cấp hương cho các sản phẩm', '100gx2', '30-40 giờ'),
(16, 'Candie Candle The Gift | GIFT03', 'Hộp quà cao cấp bao gồm nhiều phụ kiện trang trí xinh xắn. Thiệp viết tay chữ nắn nót tỉ mỉ với nội dung theo yêu cầu. Bộ phụ kiện dùng nến chuyên nghiệp: bật lửa USB an toàn, đáy lót nến/nắp chụp ngăn tạo khói, kéo cắt bấc chuyên dụng, túi vải nhung cao cấp.', 'Mùi hương của rừng già, khác biệt và mạnh mẽ', 'Sáp cọ, sáp đậu nành, sáp ong', 'JAROS chọn nhà hương đến từ Anh Quốc làm nhà cung cấp hương cho các sản phẩm', '100gx2', '30-40 giờ'),
(17, 'Candie Candle The Gift | GIFT04', 'Hộp quà cao cấp bao gồm nhiều phụ kiện trang trí xinh xắn. Thiệp viết tay chữ nắn nót tỉ mỉ với nội dung theo yêu cầu. Bộ phụ kiện dùng nến chuyên nghiệp: bật lửa USB an toàn, đáy lót nến/nắp chụp ngăn tạo khói, kéo cắt bấc chuyên dụng, túi vải nhung cao cấp.', 'Mùi hương của rừng già, khác biệt và mạnh mẽ', 'Sáp cọ, sáp đậu nành, sáp ong', 'JAROS chọn nhà hương đến từ Anh Quốc làm nhà cung cấp hương cho các sản phẩm', '100gx2', '30-40 giờ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_products`
--

CREATE TABLE `tbl_products` (
  `pd_id` int(11) NOT NULL,
  `pd_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_img` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pd_price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_products`
--

INSERT INTO `tbl_products` (`pd_id`, `pd_name`, `pd_img`, `pd_price`, `category_id`) VALUES
(1, 'EROS', '/candiecandle/images/p11.JPG', 120000, 1),
(2, 'AMOUR', '/candiecandle/images/p12.JPG', 120000, 1),
(3, 'JASMINE', '/candiecandle/images/p21.JPG', 150000, 2),
(4, 'ROSE', '/candiecandle/images/p22.JPG', 150000, 2),
(5, 'EVERGREEN', '/candiecandle/images/p31.JPG', 200000, 3),
(6, 'BAKED COOKIES', '/candiecandle/images/p32.JPG', 200000, 3),
(7, 'A CUP OF TEA', '/candiecandle/images/p33.JPG', 200000, 3),
(8, 'FRUITY SUMMER', '/candiecandle/images/p41.JPG', 125000, 4),
(9, 'THE FOREST', '/candiecandle/images/p41.JPG', 125000, 4),
(10, 'GARDENY', '/candiecandle/images/p41.JPG', 125000, 4),
(11, 'A SPA DAY', '/candiecandle/images/p41.JPG', 125000, 4),
(12, 'FORGIVENESS', '/candiecandle/images/p41.JPG', 125000, 4),
(13, 'LOST IN DA LAT', '/candiecandle/images/p41.JPG', 125000, 4),
(14, 'Bộ quà tặng nến thơm 01', '/candiecandle/images/p41.JPG', 250000, 5),
(15, 'Bộ quà tặng nến thơm 02', '/candiecandle/images/p41.JPG', 250000, 5),
(16, 'Bộ quà tặng nến thơm 03', '/candiecandle/images/p41.JPG', 250000, 5),
(17, 'Bộ quà tặng nến thơm 04', '/candiecandle/images/p41.JPG', 250000, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_phone` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_order` (`user_id`);

--
-- Chỉ mục cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD KEY `order_dt` (`order_id`),
  ADD KEY `pd_order` (`pd_id`),
  ADD KEY `pd_price` (`pd_price`);

--
-- Chỉ mục cho bảng `tbl_pd_details`
--
ALTER TABLE `tbl_pd_details`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `pd_dt` (`pd_id`);

--
-- Chỉ mục cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `category` (`category_id`),
  ADD KEY `pd_price` (`pd_price`);

--
-- Chỉ mục cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tbl_orders`
--
ALTER TABLE `tbl_orders`
  ADD CONSTRAINT `tbl_orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`user_id`) ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD CONSTRAINT `tbl_order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `tbl_orders` (`order_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_order_details_ibfk_2` FOREIGN KEY (`pd_id`) REFERENCES `tbl_products` (`pd_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `tbl_order_details_ibfk_3` FOREIGN KEY (`pd_price`) REFERENCES `tbl_products` (`pd_price`) ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_pd_details`
--
ALTER TABLE `tbl_pd_details`
  ADD CONSTRAINT `tbl_pd_details_ibfk_1` FOREIGN KEY (`pd_id`) REFERENCES `tbl_products` (`pd_id`) ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD CONSTRAINT `tbl_products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_categories` (`category_id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
