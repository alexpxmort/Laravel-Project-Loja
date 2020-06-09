
CREATE TABLE `produto` (
  `id` int(11)  NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `descricao` varchar(45),
	`codigofabricante` varchar(45),
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
)ENGINE=InnoDB;

CREATE TABLE `produto_embalagem` (
  `id_produto_embalagem` int(11) NOT NULL AUTO_INCREMENT,
  `idProduto` varchar(45),
  `quantidade` varchar(45),
  `tipoEmbalagem` varchar(45),
  `produto_id`int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_produto_embalagem`),
  KEY(`produto_id`),
   CONSTRAINT `produto_emabalagem_fk_1` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`) ON DELETE NO ACTION  ON UPDATE NO ACTION
) ENGINE=InnoDB;
