/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `db_pizzaria` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `db_pizzaria`;

CREATE TABLE IF NOT EXISTS `tb_fornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `telefone` int(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `produto` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_fornecedor` (`id`, `nome`, `telefone`, `email`, `produto`) VALUES
	(1, 'Lanxua', 2147483643, 'lanxua@gmail.com', 'lanche'),
	(5, 'Batatão', 112525852, 'Bigpotato@gmail.com', 'Batata');

CREATE TABLE IF NOT EXISTS `tb_funcionario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_funcionario` (`id`, `nome`, `email`, `telefone`) VALUES
	(3, 'Sarah', 'sarah@gmail.com', '112525855');

CREATE TABLE IF NOT EXISTS `tb_pizza` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sabor` varchar(50) NOT NULL,
  `ingrediente` varchar(200) NOT NULL,
  `tamanho` char(1) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `tb_pizza` (`id`, `sabor`, `ingrediente`, `tamanho`, `valor`) VALUES
	(1, '4 queijos', 'Molho de tomate, mussarela, catupiry, gorgonzola e parmesão', 'G', 59.90),
	(2, 'Calabresa ', 'Molho de tomate, mussarela, calabresa e cebola', 'G', 53.80),
	(3, 'calabresa', 'mussarela e calabresa', 'P', 30.00),
	(5, 'Brocolis', 'mussarela, bacon, molho e brocolis', '', 50.00);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
