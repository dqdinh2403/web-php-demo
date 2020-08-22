-- insert data to khachhang 
INSERT INTO khachhang (`kh_tendangnhap`,`kh_matkhau`,`kh_ten`,`kh_gioitinh`,`kh_diachi`,`kh_dienthoai`,`kh_email`,`kh_ngaysinh`,`kh_thangsinh`,`kh_namsinh`,`kh_cmnd`,`kh_makichhoat`,`kh_trangthai`,`kh_quantri`)
	VALUES ('admin','0192023a7bbd73250516f069df18b500','Administrator',1,'Số 1 - Lý Tự Trọng','0123.456.789','ducdonghoshop@gmail.com',01,01,1991,null,null,1,1);

INSERT INTO khachhang (`kh_tendangnhap`,`kh_matkhau`,`kh_ten`,`kh_gioitinh`,`kh_diachi`,`kh_dienthoai`,`kh_email`,`kh_ngaysinh`,`kh_thangsinh`,`kh_namsinh`,`kh_cmnd`,`kh_makichhoat`,`kh_trangthai`,`kh_quantri`)
	VALUES ('guest','fcf41657f02f88137a1bcf068a32c0a3','Guest',1,'Số 2 - Trần Bình Trọng','0949.949.949','ahihi@gmail.com',02,02,1992,null,null,1,0);


-- insert data to hinhthucthanhtoan
INSERT INTO hinhthucthanhtoan (`httt_ten`)
	VALUES ('Tiền mặt');
INSERT INTO hinhthucthanhtoan (`httt_ten`)
	VALUES ('Chuyển khoản');
INSERT INTO hinhthucthanhtoan (`httt_ten`)
	VALUES ('Paypal');
INSERT INTO hinhthucthanhtoan (`httt_ten`)
	VALUES ('Bitcoin');

-- insert data to loaisanpham
INSERT INTO loaisanpham (`lsp_ten`,`lsp_mota`)
	VALUES ('adidas nam','Đồng hồ adidas nam');
INSERT INTO loaisanpham (`lsp_ten`,`lsp_mota`)
	VALUES ('citizen nam','Đồng hồ citizen nam');
INSERT INTO loaisanpham (`lsp_ten`,`lsp_mota`)
	VALUES ('dw nam','Đồng hồ daniel wellington nam');
INSERT INTO loaisanpham (`lsp_ten`,`lsp_mota`)
	VALUES ('festina nam','Đồng hồ festina nam');
INSERT INTO loaisanpham (`lsp_ten`,`lsp_mota`)
	VALUES ('adidas nữ','Đồng hồ adidas nữ');
INSERT INTO loaisanpham (`lsp_ten`,`lsp_mota`)
	VALUES ('bulova nữ','Đồng hồ bulova nữ');
INSERT INTO loaisanpham (`lsp_ten`,`lsp_mota`)
	VALUES ('danish nữ','Đồng hồ danish nữ');
INSERT INTO loaisanpham (`lsp_ten`,`lsp_mota`)
	VALUES ('emporio nữ','Đồng hồ emporio nữ');


-- insert data to nhasanxuat
INSERT INTO nhasanxuat (`nsx_ten`,`nsx_mota`)
	VALUES ('adidas','Nhà sản xuất đồng hồ adidas');
INSERT INTO nhasanxuat (`nsx_ten`,`nsx_mota`)
	VALUES ('citizen','Nhà sản xuất đồng hồ citizen');
INSERT INTO nhasanxuat (`nsx_ten`,`nsx_mota`)
	VALUES ('dw','Nhà sản xuất đồng hồ daniel wellington');
INSERT INTO nhasanxuat (`nsx_ten`,`nsx_mota`)
	VALUES ('festina','Nhà sản xuất đồng hồ festina');
INSERT INTO nhasanxuat (`nsx_ten`,`nsx_mota`)
	VALUES ('bulova','Nhà sản xuất đồng hồ bulova');
INSERT INTO nhasanxuat (`nsx_ten`,`nsx_mota`)
	VALUES ('danish','Nhà sản xuất đồng hồ danish');
INSERT INTO nhasanxuat (`nsx_ten`,`nsx_mota`)
	VALUES ('emporio','Nhà sản xuất đồng hồ emporio');


-- insert data to sanpham
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (1,'ĐH Adidas Nam ADP3245',2050000,2000000,'Sản phẩm của adidas','Sản phầm đồng hồ adidas giành cho nam giới được sản xuất năm 2017','2017-7-1',11,1,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (2,'ĐH Adidas Nam ADH2947',3468000,3000000,'Sản phẩm của adidas','Sản phầm đồng hồ adidas giành cho nam giới được sản xuất năm 2017','2017-7-2',12,1,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (3,'ĐH Adidas Nam ADH2906',3468000,3000000,'Sản phẩm của adidas','Sản phầm đồng hồ adidas giành cho nam giới được sản xuất năm 2017','2017-7-3',13,1,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (4,'ĐH Adidas Nam ADH2836',3468000,3000000,'Sản phẩm của adidas','Sản phầm đồng hồ adidas giành cho nam giới được sản xuất năm 2017','2017-7-4',14,1,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (5,'ĐH Adidas Nam ADH3002',4798000,4000000,'Sản phẩm của adidas','Sản phầm đồng hồ adidas giành cho nam giới được sản xuất năm 2017','2017-7-5',15,1,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (6,'ĐH Adidas Nam ADH2895',1948000,1000000,'Sản phẩm của adidas','Sản phầm đồng hồ adidas giành cho nam giới được sản xuất năm 2017','2017-7-6',16,1,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (7,'ĐH Adidas Nam ADH2802',2280000,2000000,'Sản phẩm của adidas','Sản phầm đồng hồ adidas giành cho nam giới được sản xuất năm 2017','2017-7-7',17,1,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (8,'ĐH Adidas Nam ADH2772',2850000,2000000,'Sản phẩm của adidas','Sản phầm đồng hồ adidas giành cho nam giới được sản xuất năm 2017','2017-7-8',18,1,1,null);

INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (9,'ĐH Citizen Nam NY4056-58P',8645000,8000000,'Sản phẩm của citizen','Sản phầm đồng hồ citizen giành cho nam giới được sản xuất năm 2017','2017-7-9',19,2,2,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (10,'ĐH Citizen Nam NH8350-59E',4988000,4000000,'Sản phẩm của citizen','Sản phầm đồng hồ citizen giành cho nam giới được sản xuất năm 2017','2017-7-10',20,2,2,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (11,'ĐH Citizen Nam BL8144-89H',15675000,15000000,'Sản phẩm của citizen','Sản phầm đồng hồ citizen giành cho nam giới được sản xuất năm 2017','2017-7-11',21,2,2,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (12,'ĐH Citizen Nam BL8142-84E',15675000,15000000,'Sản phẩm của citizen','Sản phầm đồng hồ citizen giành cho nam giới được sản xuất năm 2017','2017-7-12',22,2,2,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (13,'ĐH Citizen Nam BL8140-80L',14820000,14000000,'Sản phẩm của citizen','Sản phầm đồng hồ citizen giành cho nam giới được sản xuất năm 2017','2017-7-13',23,2,2,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (14,'ĐH Citizen Nam AN8162-06E',4750000,4000000,'Sản phẩm của citizen','Sản phầm đồng hồ citizen giành cho nam giới được sản xuất năm 2017','2017-7-14',24,2,2,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (15,'ĐH Citizen Nam AN8160-52A',4275000,4000000,'Sản phẩm của citizen','Sản phầm đồng hồ citizen giành cho nam giới được sản xuất năm 2017','2017-7-15',25,2,2,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (16,'ĐH Citizen Nam CC9015-54E',53675000,53000000,'Sản phẩm của citizen','Sản phầm đồng hồ citizen giành cho nam giới được sản xuất năm 2017','2017-7-16',26,2,2,null);

INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (17,'ĐH Daniel Wellington Nam DW00100127',5277000,5000000,'Sản phẩm của dw','Sản phầm đồng hồ dw giành cho nam giới được sản xuất năm 2017','2017-7-1',11,3,3,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (18,'ĐH Daniel Wellington Nam DW00100133',5277000,5000000,'Sản phẩm của dw','Sản phầm đồng hồ dw giành cho nam giới được sản xuất năm 2017','2017-7-2',12,3,3,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (19,'ĐH Daniel Wellington Nam DW00100125',5277000,5000000,'Sản phẩm của dw','Sản phầm đồng hồ dw giành cho nam giới được sản xuất năm 2017','2017-7-3',13,3,3,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (20,'ĐH Daniel Wellington Nam DW00100131',5277000,5000000,'Sản phẩm của dw','Sản phầm đồng hồ dw giành cho nam giới được sản xuất năm 2017','2017-7-4',14,3,3,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (21,'ĐH Daniel Wellington Nam DW00100134',5277000,5000000,'Sản phẩm của dw','Sản phầm đồng hồ dw giành cho nam giới được sản xuất năm 2017','2017-7-5',15,3,3,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (22,'ĐH Daniel Wellington Nam DW00100132',5277000,5000000,'Sản phẩm của dw','Sản phầm đồng hồ dw giành cho nam giới được sản xuất năm 2017','2017-7-6',16,3,3,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (23,'ĐH Daniel Wellington Nam DW00100149',4494000,4000000,'Sản phẩm của dw','Sản phầm đồng hồ dw giành cho nam giới được sản xuất năm 2017','2017-7-7',17,3,3,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (24,'ĐH Daniel Wellington Nam DW00100115',5737000,5000000,'Sản phẩm của dw','Sản phầm đồng hồ dw giành cho nam giới được sản xuất năm 2017','2017-7-8',18,3,3,null);

INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (25,'ĐH Festina Nam F16488-1',4864000,4000000,'Sản phẩm của festina','Sản phầm đồng hồ festina giành cho nam giới được sản xuất năm 2017','2017-7-9',19,4,4,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (26,'ĐH Festina Nam F16599-1',9652000,9000000,'Sản phẩm của festina','Sản phầm đồng hồ festina giành cho nam giới được sản xuất năm 2017','2017-7-10',20,4,4,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (27,'ĐH Festina Nam F16599-2',9652000,9000000,'Sản phẩm của festina','Sản phầm đồng hồ festina giành cho nam giới được sản xuất năm 2017','2017-7-11',21,4,4,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (28,'ĐH Festina Nam F16599-5',9652000,9000000,'Sản phẩm của festina','Sản phầm đồng hồ festina giành cho nam giới được sản xuất năm 2017','2017-7-12',22,4,4,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (29,'ĐH Festina Nam F16600-1',8037000,8000000,'Sản phẩm của festina','Sản phầm đồng hồ festina giành cho nam giới được sản xuất năm 2017','2017-7-13',23,4,4,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (30,'ĐH Festina Nam F16600-6',8037000,8000000,'Sản phẩm của festina','Sản phầm đồng hồ festina giành cho nam giới được sản xuất năm 2017','2017-7-14',24,4,4,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (31,'ĐH Festina Nam F16601-1',8037000,8000000,'Sản phẩm của festina','Sản phầm đồng hồ festina giành cho nam giới được sản xuất năm 2017','2017-7-15',25,4,4,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (32,'ĐH Festina Nam F16603-4',5615000,5000000,'Sản phẩm của festina','Sản phầm đồng hồ festina giành cho nam giới được sản xuất năm 2017','2017-7-16',26,4,4,null);

INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (33,'ĐH Adidas Nữ ADH3015',2327000,2000000,'Sản phẩm của addidas','Sản phầm đồng hồ adidas giành cho nữ giới được sản xuất năm 2017','2017-7-1',11,5,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (34,'ĐH Adidas Nữ ADH2945',3753000,3000000,'Sản phẩm của addidas','Sản phầm đồng hồ adidas giành cho nữ giới được sản xuất năm 2017','2017-7-2',12,5,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (35,'ĐH Adidas Nữ ADH2860',3847000,3000000,'Sản phẩm của addidas','Sản phầm đồng hồ adidas giành cho nữ giới được sản xuất năm 2017','2017-7-3',13,5,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (36,'ĐH Adidas Nữ ADH2667',3562000,3000000,'Sản phẩm của addidas','Sản phầm đồng hồ adidas giành cho nữ giới được sản xuất năm 2017','2017-7-4',14,5,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (37,'ĐH Adidas Nữ ADH2618',3562000,3000000,'Sản phẩm của addidas','Sản phầm đồng hồ adidas giành cho nữ giới được sản xuất năm 2017','2017-7-5',15,5,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (38,'ĐH Adidas Nữ ADP6126',1520000,1000000,'Sản phẩm của addidas','Sản phầm đồng hồ adidas giành cho nữ giới được sản xuất năm 2017','2017-7-6',16,5,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (39,'ĐH Adidas Nữ ADP3209',1567000,1000000,'Sản phẩm của addidas','Sản phầm đồng hồ adidas giành cho nữ giới được sản xuất năm 2017','2017-7-7',17,5,1,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (40,'ĐH Adidas Nữ ADH9059',2327000,2000000,'Sản phẩm của addidas','Sản phầm đồng hồ adidas giành cho nữ giới được sản xuất năm 2017','2017-7-8',18,5,1,null);

INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (41,'ĐH Bulova Nữ 97S116',8075000,8000000,'Sản phẩm của bulova','Sản phầm đồng hồ bulova giành cho nữ giới được sản xuất năm 2017','2017-7-9',19,6,5,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (42,'ĐH Bulova Nữ 98W210',12635000,12000000,'Sản phẩm của bulova','Sản phầm đồng hồ bulova giành cho nữ giới được sản xuất năm 2017','2017-7-10',20,6,5,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (43,'ĐH Bulova Nữ 98S154',7505000,7000000,'Sản phẩm của bulova','Sản phầm đồng hồ bulova giành cho nữ giới được sản xuất năm 2017','2017-7-11',21,6,5,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (44,'ĐH Bulova Nữ 97L156',5225000,5000000,'Sản phẩm của bulova','Sản phầm đồng hồ bulova giành cho nữ giới được sản xuất năm 2017','2017-7-12',22,6,5,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (45,'ĐH Bulova Nữ 97L154',4655000,4000000,'Sản phẩm của bulova','Sản phầm đồng hồ bulova giành cho nữ giới được sản xuất năm 2017','2017-7-13',23,6,5,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (46,'ĐH Bulova Nữ 96S169',6935000,6000000,'Sản phẩm của bulova','Sản phầm đồng hồ bulova giành cho nữ giới được sản xuất năm 2017','2017-7-14',24,6,5,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (47,'ĐH Bulova Nữ 96X130',6869000,6000000,'Sản phẩm của bulova','Sản phầm đồng hồ bulova giành cho nữ giới được sản xuất năm 2017','2017-7-15',25,6,5,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (48,'ĐH Bulova Nữ 96P150',6869000,6000000,'Sản phẩm của bulova','Sản phầm đồng hồ bulova giành cho nữ giới được sản xuất năm 2017','2017-7-16',26,6,5,null);

INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (49,'ĐH Danish Design Nữ IV11Q1173',3104000,3000000,'Sản phẩm của danish','Sản phầm đồng hồ danish giành cho nữ giới được sản xuất năm 2017','2017-7-1',11,7,6,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (50,'ĐH Danish Design Nữ IV64Q1143',4337000,4000000,'Sản phẩm của danish','Sản phầm đồng hồ danish giành cho nữ giới được sản xuất năm 2017','2017-7-2',12,7,6,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (51,'ĐH Danish Design Nữ IV63Q1060',3386000,3000000,'Sản phẩm của danish','Sản phầm đồng hồ danish giành cho nữ giới được sản xuất năm 2017','2017-7-3',13,7,6,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (52,'ĐH Danish Design Nữ IV62Q923',4661000,4000000,'Sản phẩm của danish','Sản phầm đồng hồ danish giành cho nữ giới được sản xuất năm 2017','2017-7-4',14,7,6,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (53,'ĐH Danish Design Nữ IV05Q747',4253000,4000000,'Sản phẩm của danish','Sản phầm đồng hồ danish giành cho nữ giới được sản xuất năm 2017','2017-7-5',15,7,6,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (54,'ĐH Danish Design Nữ IV13Q991',3469000,3000000,'Sản phẩm của danish','Sản phầm đồng hồ danish giành cho nữ giới được sản xuất năm 2017','2017-7-6',16,7,6,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (55,'ĐH Danish Design Nữ IV65Q1073',4337000,4000000,'Sản phẩm của danish','Sản phầm đồng hồ danish giành cho nữ giới được sản xuất năm 2017','2017-7-7',17,7,6,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (56,'ĐH Danish Design Nữ IV67Q987',5225000,5000000,'Sản phẩm của danish','Sản phầm đồng hồ danish giành cho nữ giới được sản xuất năm 2017','2017-7-8',18,7,6,null);

INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (57,'ĐH EMPORIO ARMANI Nữ AR1886',8930000,8000000,'Sản phẩm của emporio','Sản phầm đồng hồ emporio giành cho nữ giới được sản xuất năm 2017','2017-7-9',19,8,7,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (58,'ĐH EMPORIO ARMANI Nữ AR1885',8930000,8000000,'Sản phẩm của emporio','Sản phầm đồng hồ emporio giành cho nữ giới được sản xuất năm 2017','2017-7-10',20,8,7,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (59,'ĐH EMPORIO ARMANI Nữ AR1884',8930000,8000000,'Sản phẩm của emporio','Sản phầm đồng hồ emporio giành cho nữ giới được sản xuất năm 2017','2017-7-11',21,8,7,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (60,'ĐH EMPORIO ARMANI Nữ AR0359',8930000,8000000,'Sản phẩm của emporio','Sản phầm đồng hồ emporio giành cho nữ giới được sản xuất năm 2017','2017-7-12',22,8,7,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (61,'ĐH EMPORIO ARMANI Nữ AR7361',7933000,7000000,'Sản phẩm của emporio','Sản phầm đồng hồ emporio giành cho nữ giới được sản xuất năm 2017','2017-7-13',23,8,7,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (62,'ĐH EMPORIO ARMANI Nữ AR7352',7933000,7000000,'Sản phẩm của emporio','Sản phầm đồng hồ emporio giành cho nữ giới được sản xuất năm 2017','2017-7-14',24,8,7,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (63,'ĐH EMPORIO ARMANI Nữ AR7351',7933000,7000000,'Sản phẩm của emporio','Sản phầm đồng hồ emporio giành cho nữ giới được sản xuất năm 2017','2017-7-15',25,8,7,null);
INSERT INTO sanpham (`sp_ma`,`sp_ten`,`sp_gia`,`sp_giacu`,`sp_mota_ngan`,`sp_mota_chitiet`,`sp_ngaycapnhat`,`sp_soluong`,`lsp_ma`,`nsx_ma`,`km_ma`)
	VALUES (64,'ĐH EMPORIO ARMANI Nữ AR6063',7933000,7000000,'Sản phẩm của emporio','Sản phầm đồng hồ emporio giành cho nữ giới được sản xuất năm 2017','2017-7-16',26,8,7,null);


-- insert data to hinhsanpham
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (1,'m-adidas-sp1-1.jpg',1);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (2,'m-adidas-sp1-2.jpg',1);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (3,'m-adidas-sp1-3.jpg',1);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (4,'m-adidas-sp2.png',2);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (5,'m-adidas-sp3.png',3);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (6,'m-adidas-sp4.png',4);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (7,'m-adidas-sp5.png',5);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (8,'m-adidas-sp6.png',6);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (9,'m-adidas-sp7.png',7);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (10,'m-adidas-sp8.png',8);

INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (11,'m-citizen-sp1.png',9);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (12,'m-citizen-sp2.png',10);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (13,'m-citizen-sp3.png',11);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (14,'m-citizen-sp4.png',12);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (15,'m-citizen-sp5.png',13);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (16,'m-citizen-sp6.png',14);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (17,'m-citizen-sp7.png',15);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (18,'m-citizen-sp8.png',16);

INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (19,'m-dw-sp1.png',17);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (20,'m-dw-sp2.png',18);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (21,'m-dw-sp3.png',19);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (22,'m-dw-sp4.png',20);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (23,'m-dw-sp5.png',21);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (24,'m-dw-sp6.png',22);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (25,'m-dw-sp7.png',23);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (26,'m-dw-sp8.png',24);

INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (27,'m-festina-sp1.png',25);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (28,'m-festina-sp2.png',26);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (29,'m-festina-sp3.png',27);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (30,'m-festina-sp4.png',28);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (31,'m-festina-sp5.png',29);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (32,'m-festina-sp6.png',30);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (33,'m-festina-sp7.png',31);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (34,'m-festina-sp8.png',32);

INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (35,'w-adidas-sp1.png',33);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (36,'w-adidas-sp2.png',34);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (37,'w-adidas-sp3.png',35);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (38,'w-adidas-sp4.png',36);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (39,'w-adidas-sp5.png',37);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (40,'w-adidas-sp6.png',38);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (41,'w-adidas-sp7.png',39);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (42,'w-adidas-sp8.png',40);

INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (43,'w-bulova-sp1.png',41);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (44,'w-bulova-sp2.png',42);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (45,'w-bulova-sp3.png',43);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (46,'w-bulova-sp4.png',44);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (47,'w-bulova-sp5.png',45);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (48,'w-bulova-sp6.png',46);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (49,'w-bulova-sp7.png',47);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (50,'w-bulova-sp8.png',48);

INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (51,'w-danish-sp1.png',49);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (52,'w-danish-sp2.png',50);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (53,'w-danish-sp3.png',51);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (54,'w-danish-sp4.png',52);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (55,'w-danish-sp5.png',53);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (56,'w-danish-sp6.png',54);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (57,'w-danish-sp7.png',55);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (58,'w-danish-sp8.png',56);

INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (59,'w-emporio-sp1.png',57);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (60,'w-emporio-sp2.png',58);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (61,'w-emporio-sp3.png',59);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (62,'w-emporio-sp4.png',60);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (63,'w-emporio-sp5.png',61);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (64,'w-emporio-sp6.png',62);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (65,'w-emporio-sp7.png',63);
INSERT INTO hinhsanpham (`hsp_ma`,`hsp_tentaptin`,`sp_ma`)
	VALUES (66,'w-emporio-sp8.png',64);

-- insert data to chudegopy
INSERT INTO chudegopy (`cdgy_ten`)
	VALUES ('Góp ý về dịch vụ');
INSERT INTO chudegopy (`cdgy_ten`)
	VALUES ('Góp ý về website');
INSERT INTO chudegopy (`cdgy_ten`)
	VALUES ('Góp ý về sản phẩm');
INSERT INTO chudegopy (`cdgy_ten`)
	VALUES ('Góp ý khác');