SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

CREATE SCHEMA IF NOT EXISTS `ducdongho` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ducdongho` ;

-- -----------------------------------------------------
-- Table `ducdongho`.`khachhang`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ducdongho`.`khachhang` ;

CREATE  TABLE IF NOT EXISTS `ducdongho`.`khachhang` (
  `kh_tendangnhap` VARCHAR(50) NOT NULL ,
  `kh_matkhau` VARCHAR(255) NOT NULL ,
  `kh_ten` VARCHAR(50) NOT NULL ,
  `kh_gioitinh` INT NOT NULL ,
  `kh_diachi` VARCHAR(100) NOT NULL ,
  `kh_dienthoai` VARCHAR(50) NOT NULL ,
  `kh_email` VARCHAR(50) NOT NULL ,
  `kh_ngaysinh` INT NULL ,
  `kh_thangsinh` INT NULL ,
  `kh_namsinh` INT NOT NULL ,
  `kh_cmnd` VARCHAR(50) NULL ,
  `kh_makichhoat` VARCHAR(100) NULL ,
  `kh_trangthai` INT NOT NULL ,
  `kh_quantri` TINYINT NOT NULL ,
  PRIMARY KEY (`kh_tendangnhap`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ducdongho`.`hinhthucthanhtoan`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ducdongho`.`hinhthucthanhtoan` ;

CREATE  TABLE IF NOT EXISTS `ducdongho`.`hinhthucthanhtoan` (
  `httt_ma` INT NOT NULL AUTO_INCREMENT ,
  `httt_ten` VARCHAR(100) NOT NULL ,
  PRIMARY KEY (`httt_ma`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ducdongho`.`dondathang`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ducdongho`.`dondathang` ;

CREATE  TABLE IF NOT EXISTS `ducdongho`.`dondathang` (
  `dh_ma` INT NOT NULL AUTO_INCREMENT ,
  `dh_ngaylap` DATETIME NOT NULL ,
  `dh_ngaygiao` DATETIME NULL ,
  `dh_noigiao` VARCHAR(255) NULL ,
  `dh_trangthaithanhtoan` INT NOT NULL ,
  `httt_ma` INT NOT NULL ,
  `kh_tendangnhap` VARCHAR(50) NOT NULL ,
  PRIMARY KEY (`dh_ma`) ,
  CONSTRAINT `fk_dondathang_khachhang`
    FOREIGN KEY (`kh_tendangnhap` )
    REFERENCES `ducdongho`.`khachhang` (`kh_tendangnhap` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_dondathang_hinhthucthanhtoan1`
    FOREIGN KEY (`httt_ma` )
    REFERENCES `ducdongho`.`hinhthucthanhtoan` (`httt_ma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_dondathang_khachhang_idx` ON `ducdongho`.`dondathang` (`kh_tendangnhap` ASC) ;

CREATE INDEX `fk_dondathang_hinhthucthanhtoan1_idx` ON `ducdongho`.`dondathang` (`httt_ma` ASC) ;


-- -----------------------------------------------------
-- Table `ducdongho`.`loaisanpham`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ducdongho`.`loaisanpham` ;

CREATE  TABLE IF NOT EXISTS `ducdongho`.`loaisanpham` (
  `lsp_ma` INT NOT NULL AUTO_INCREMENT ,
  `lsp_ten` VARCHAR(100) NOT NULL ,
  `lsp_mota` VARCHAR(255) NULL ,
  PRIMARY KEY (`lsp_ma`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ducdongho`.`nhasanxuat`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ducdongho`.`nhasanxuat` ;

CREATE  TABLE IF NOT EXISTS `ducdongho`.`nhasanxuat` (
  `nsx_ma` INT NOT NULL AUTO_INCREMENT ,
  `nsx_ten` VARCHAR(100) NULL ,
  `nsx_mota` VARCHAR(45) NULL ,
  PRIMARY KEY (`nsx_ma`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ducdongho`.`khuyenmai`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ducdongho`.`khuyenmai` ;

CREATE  TABLE IF NOT EXISTS `ducdongho`.`khuyenmai` (
  `km_ma` INT NOT NULL AUTO_INCREMENT ,
  `km_ten` VARCHAR(255) NULL ,
  `km_noidung` TEXT NULL ,
  `km_tungay` DATETIME NULL ,
  `km_denngay` DATETIME NULL ,
  PRIMARY KEY (`km_ma`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ducdongho`.`sanpham`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ducdongho`.`sanpham` ;

CREATE  TABLE IF NOT EXISTS `ducdongho`.`sanpham` (
  `sp_ma` INT NOT NULL AUTO_INCREMENT ,
  `sp_ten` VARCHAR(100) NOT NULL ,
  `sp_gia` DECIMAL(12,2) NULL ,
  `sp_giacu` DECIMAL(12,2) NULL ,
  `sp_mota_ngan` VARCHAR(1000) NOT NULL ,
  `sp_mota_chitiet` TEXT NULL ,
  `sp_ngaycapnhat` DATETIME NOT NULL ,
  `sp_soluong` INT NULL ,
  `lsp_ma` INT NOT NULL ,
  `nsx_ma` INT NOT NULL ,
  `km_ma` INT NULL ,
  PRIMARY KEY (`sp_ma`) ,
  CONSTRAINT `fk_sanpham_loaisanpham1`
    FOREIGN KEY (`lsp_ma` )
    REFERENCES `ducdongho`.`loaisanpham` (`lsp_ma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sanpham_nhasanxuat1`
    FOREIGN KEY (`nsx_ma` )
    REFERENCES `ducdongho`.`nhasanxuat` (`nsx_ma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sanpham_khuyenmai1`
    FOREIGN KEY (`km_ma` )
    REFERENCES `ducdongho`.`khuyenmai` (`km_ma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_sanpham_loaisanpham1_idx` ON `ducdongho`.`sanpham` (`lsp_ma` ASC) ;

CREATE INDEX `fk_sanpham_nhasanxuat1_idx` ON `ducdongho`.`sanpham` (`nsx_ma` ASC) ;

CREATE INDEX `fk_sanpham_khuyenmai1_idx` ON `ducdongho`.`sanpham` (`km_ma` ASC) ;


-- -----------------------------------------------------
-- Table `ducdongho`.`hinhsanpham`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ducdongho`.`hinhsanpham` ;

CREATE  TABLE IF NOT EXISTS `ducdongho`.`hinhsanpham` (
  `hsp_ma` INT NOT NULL AUTO_INCREMENT ,
  `hsp_tentaptin` VARCHAR(255) NULL ,
  `sp_ma` INT NOT NULL ,
  PRIMARY KEY (`hsp_ma`) ,
  CONSTRAINT `fk_hinhsanpham_sanpham1`
    FOREIGN KEY (`sp_ma` )
    REFERENCES `ducdongho`.`sanpham` (`sp_ma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_hinhsanpham_sanpham1_idx` ON `ducdongho`.`hinhsanpham` (`sp_ma` ASC) ;


-- -----------------------------------------------------
-- Table `ducdongho`.`sanpham_donhang`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ducdongho`.`sanpham_donhang` ;

CREATE  TABLE IF NOT EXISTS `ducdongho`.`sanpham_donhang` (
  `sp_ma` INT NOT NULL ,
  `dh_ma` INT NOT NULL ,
  `sp_dh_soluong` INT NOT NULL ,
  `sp_dh_dongia` DECIMAL(12,2) NOT NULL ,
  PRIMARY KEY (`sp_ma`, `dh_ma`) ,
  CONSTRAINT `fk_sanpham_donhang_sanpham1`
    FOREIGN KEY (`sp_ma` )
    REFERENCES `ducdongho`.`sanpham` (`sp_ma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_sanpham_donhang_dondathang1`
    FOREIGN KEY (`dh_ma` )
    REFERENCES `ducdongho`.`dondathang` (`dh_ma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_sanpham_donhang_sanpham1_idx` ON `ducdongho`.`sanpham_donhang` (`sp_ma` ASC) ;

CREATE INDEX `fk_sanpham_donhang_dondathang1_idx` ON `ducdongho`.`sanpham_donhang` (`dh_ma` ASC) ;


-- -----------------------------------------------------
-- Table `ducdongho`.`chudegopy`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ducdongho`.`chudegopy` ;

CREATE  TABLE IF NOT EXISTS `ducdongho`.`chudegopy` (
  `cdgy_ma` INT NOT NULL AUTO_INCREMENT ,
  `cdgy_ten` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`cdgy_ma`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ducdongho`.`gopy`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `ducdongho`.`gopy` ;

CREATE  TABLE IF NOT EXISTS `ducdongho`.`gopy` (
  `gy_ma` INT NOT NULL AUTO_INCREMENT ,
  `gy_hoten` VARCHAR(45) NULL ,
  `gy_tieude` VARCHAR(255) NULL ,
  `gy_noidung` TEXT NULL ,
  `gy_ngaygopy` DATETIME NULL ,
  `cdgy_ma` INT NULL ,
  PRIMARY KEY (`gy_ma`) ,
  CONSTRAINT `fk_gopy_chudegopy1`
    FOREIGN KEY (`cdgy_ma` )
    REFERENCES `ducdongho`.`chudegopy` (`cdgy_ma` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

CREATE INDEX `fk_gopy_chudegopy1_idx` ON `ducdongho`.`gopy` (`cdgy_ma` ASC) ;

USE `ducdongho` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
