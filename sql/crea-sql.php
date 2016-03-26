-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 23-03-2016 a las 18:00:20
-- Versión del servidor: 5.5.47-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `iptv-es`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canales`
--

DROP TABLE IF EXISTS `canales`;
CREATE TABLE IF NOT EXISTS `canales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `stream_url` text NOT NULL,
  `logo_url` text NOT NULL,
  `categoria` varchar(20) NOT NULL,
  `fecha_alta` date NOT NULL,
  `fecha_ult_mvto` date NOT NULL,
  `ultimo_ip` varchar(255) NOT NULL,
  `numero_visitas` int(11) NOT NULL,
  `autor` varchar(10) NOT NULL,
  `autor_email` varchar(255) NOT NULL,
  `statutos` varchar(2) NOT NULL,
  `idioma` varchar(2) NOT NULL,
  `pais` varchar(255) NOT NULL,
  `me_gusta` int(11) NOT NULL,
  `no_me_gusta` int(11) NOT NULL,
  `compartir` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `canales`
--

<?php
$txt_file    = file_get_contents('../canales.m3u');
$rows        = explode("\n", $txt_file);
array_shift($rows);
$registro=1;
foreach($rows as $row => $data)
{ 
	$row_data = explode(',', $data);
?>
INSERT INTO `canales` (`id`, `nombre`, `descripcion`, `stream_url`, `logo_url`, `categoria`, `fecha_alta`, `fecha_ult_mvto`, `ultimo_ip`, `numero_visitas`, `autor`, `autor_email`, `statutos`, `idioma`, `pais`, `me_gusta`, `no_me_gusta`, `compartir`) VALUES
(<?php echo "$registro";?>, '<?php echo "$row_data[1]";?>', '', '<?php echo "$row_data[3]";?>', '<?php echo "logos/$row_data[2]";?>', '', '2016-03-23', '2016-03-23', '127.0.0.1', 0, 'deb', 'leprechuanese@gmail.com', 'AC', '', '', 0, 0, 0);
<?php
  $registro=$registro + 1;
 echo "\n";
}
