/*
Navicat MySQL Data Transfer

Source Server         : 127.0.0.1
Source Server Version : 50532
Source Host           : 127.0.0.1:3306
Source Database       : dropship

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2018-07-25 17:05:28
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for category
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `pk_category` int(255) NOT NULL AUTO_INCREMENT,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_category`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'Shawl');
INSERT INTO `category` VALUES ('2', 'Bawal');
INSERT INTO `category` VALUES ('99', '- Choose Category-');

-- ----------------------------
-- Table structure for color
-- ----------------------------
DROP TABLE IF EXISTS `color`;
CREATE TABLE `color` (
  `pk_color` int(255) NOT NULL AUTO_INCREMENT,
  `color` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_color`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of color
-- ----------------------------
INSERT INTO `color` VALUES ('1', 'Black');
INSERT INTO `color` VALUES ('2', 'Orchid');
INSERT INTO `color` VALUES ('3', 'Lavender');
INSERT INTO `color` VALUES ('4', 'Dark Beige');
INSERT INTO `color` VALUES ('5', 'Raw Umber');
INSERT INTO `color` VALUES ('6', 'Coral Blue');
INSERT INTO `color` VALUES ('7', 'Salmon');
INSERT INTO `color` VALUES ('8', 'Dusty Rose');
INSERT INTO `color` VALUES ('9', 'Olive');
INSERT INTO `color` VALUES ('10', 'Sky Blue');
INSERT INTO `color` VALUES ('11', 'Mustard');
INSERT INTO `color` VALUES ('12', 'Marroon');
INSERT INTO `color` VALUES ('13', 'Peach');
INSERT INTO `color` VALUES ('14', 'Soft Yellow');
INSERT INTO `color` VALUES ('15', 'Dark Purple');
INSERT INTO `color` VALUES ('16', 'Mix');
INSERT INTO `color` VALUES ('17', 'Soft Grey');
INSERT INTO `color` VALUES ('18', 'Blue Black');
INSERT INTO `color` VALUES ('99', '- Choose Design -');

-- ----------------------------
-- Table structure for design
-- ----------------------------
DROP TABLE IF EXISTS `design`;
CREATE TABLE `design` (
  `pk_design` int(255) NOT NULL AUTO_INCREMENT,
  `design` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_design`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of design
-- ----------------------------
INSERT INTO `design` VALUES ('1', 'Plain');
INSERT INTO `design` VALUES ('2', 'Land');
INSERT INTO `design` VALUES ('3', 'Pattern');
INSERT INTO `design` VALUES ('4', 'Floral');
INSERT INTO `design` VALUES ('5', 'Abstract');
INSERT INTO `design` VALUES ('6', 'Monochrome');
INSERT INTO `design` VALUES ('7', 'Lace');
INSERT INTO `design` VALUES ('8', 'Beads');
INSERT INTO `design` VALUES ('9', 'Army');
INSERT INTO `design` VALUES ('99', '- Choose Design -');

-- ----------------------------
-- Table structure for material
-- ----------------------------
DROP TABLE IF EXISTS `material`;
CREATE TABLE `material` (
  `pk_material` int(255) NOT NULL AUTO_INCREMENT,
  `material` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_material`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of material
-- ----------------------------
INSERT INTO `material` VALUES ('1', 'Cotton');
INSERT INTO `material` VALUES ('2', 'Chiffon');
INSERT INTO `material` VALUES ('3', 'Bubble Chiffon');
INSERT INTO `material` VALUES ('4', 'Satin');
INSERT INTO `material` VALUES ('5', 'Satin Matte');
INSERT INTO `material` VALUES ('99', '- Choose Material -');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `pk_orders` int(255) NOT NULL AUTO_INCREMENT,
  `oCode` varchar(255) NOT NULL,
  `pk_product` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `priceA` varchar(255) NOT NULL,
  `priceD` varchar(255) NOT NULL,
  `pk_receipt` varchar(255) NOT NULL,
  `pk_users` varchar(255) NOT NULL,
  `indexs` varchar(255) NOT NULL,
  `price1` varchar(255) NOT NULL,
  `priceN` varchar(255) NOT NULL,
  PRIMARY KEY (`pk_orders`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('15', '', '7', '4', '160.00', '180.00', '19', '3', '1', '60', '240.00');
INSERT INTO `orders` VALUES ('16', '', '8', '2', '80.00', '90.00', '20', '2', '1', '50', '100.00');
INSERT INTO `orders` VALUES ('17', '', '11', '2', '80.00', '90.00', '20', '2', '2', '50', '100.00');
INSERT INTO `orders` VALUES ('18', '', '3', '3', '120.00', '135.00', '21', '2', '1', '48', '144.00');
INSERT INTO `orders` VALUES ('19', '', '3', '5', '200.00', '225.00', '21', '2', '2', '48', '240.00');
INSERT INTO `orders` VALUES ('20', '', '5', '3', '120.00', '135.00', '21', '2', '3', '48', '144.00');
INSERT INTO `orders` VALUES ('21', '', '4', '1', '40.00', '45.00', '22', '2', '1', '50', '50.00');
INSERT INTO `orders` VALUES ('22', '', '8', '2', '80.00', '90.00', '22', '2', '2', '50', '100.00');
INSERT INTO `orders` VALUES ('23', '', '26', '3', '45.00', '60.00', '22', '2', '3', '30', '90.00');
INSERT INTO `orders` VALUES ('24', '', '6', '1', '40.00', '45.00', '23', '2', '1', '50', '50.00');
INSERT INTO `orders` VALUES ('25', '', '14', '5', '250.00', '275.00', '24', '2', '1', '63', '315.00');
INSERT INTO `orders` VALUES ('26', '', '15', '1', '50.00', '55.00', '25', '2', '1', '63', '63.00');
INSERT INTO `orders` VALUES ('27', '', '24', '2', '30.00', '40.00', '26', '2', '1', '25', '50.00');
INSERT INTO `orders` VALUES ('28', '', '9', '1', '40.00', '45.00', '27', '4', '1', '50', '50.00');
INSERT INTO `orders` VALUES ('29', '', '21', '1', '50.00', '55.00', '27', '4', '2', '60', '60.00');
INSERT INTO `orders` VALUES ('30', '', '5', '1', '40.00', '45.00', '27', '4', '3', '50', '50.00');
INSERT INTO `orders` VALUES ('31', '', '20', '1', '50.00', '55.00', '27', '4', '4', '60', '60.00');
INSERT INTO `orders` VALUES ('32', '', '14', '1', '50.00', '55.00', '27', '4', '5', '60', '60.00');
INSERT INTO `orders` VALUES ('33', '', '17', '5', '250.00', '275.00', '28', '4', '1', '60', '300.00');
INSERT INTO `orders` VALUES ('34', '', '7', '6', '240.00', '270.00', '29', '4', '1', '55', '330.00');
INSERT INTO `orders` VALUES ('35', '', '18', '3', '150.00', '165.00', '29', '4', '2', '63', '189.00');
INSERT INTO `orders` VALUES ('36', '', '21', '2', '100.00', '110.00', '30', '5', '1', '60', '120.00');
INSERT INTO `orders` VALUES ('37', '', '8', '3', '120.00', '135.00', '31', '5', '1', '50', '150.00');
INSERT INTO `orders` VALUES ('38', '', '11', '3', '120.00', '135.00', '31', '5', '2', '50', '150.00');
INSERT INTO `orders` VALUES ('39', '', '4', '5', '200.00', '225.00', '32', '5', '1', '50', '250.00');
INSERT INTO `orders` VALUES ('40', '', '15', '4', '200.00', '220.00', '33', '5', '1', '63', '252.00');
INSERT INTO `orders` VALUES ('41', '', '7', '1', '40.00', '45.00', '34', '5', '1', '50', '50.00');
INSERT INTO `orders` VALUES ('42', '', '20', '1', '50.00', '55.00', '34', '5', '2', '60', '60.00');
INSERT INTO `orders` VALUES ('43', '', '24', '1', '15.00', '20.00', '34', '5', '3', '30', '30.00');
INSERT INTO `orders` VALUES ('44', '', '3', '4', '160.00', '180.00', '35', '5', '1', '50', '200.00');
INSERT INTO `orders` VALUES ('45', '', '3', '4', '160.00', '180.00', '35', '5', '2', '55', '220.00');
INSERT INTO `orders` VALUES ('46', '', '4', '2', '80.00', '90.00', '36', '2', '1', '50', '100.00');
INSERT INTO `orders` VALUES ('47', '', '3', '2', '80.00', '90.00', '37', '2', '1', '50', '100.00');
