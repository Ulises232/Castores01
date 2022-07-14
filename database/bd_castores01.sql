-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-07-2022 a las 08:23:55
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_castores01`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_noticia` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_noticia`, `descripcion`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `status`) VALUES
(1, 2, 'asasasasasaszxccxc', 1, '2022-07-13 05:18:09', NULL, '2022-07-13 05:18:09', 1),
(2, 1, 'prueba', 1, '2022-07-13 05:41:01', NULL, '2022-07-13 05:41:01', 1),
(3, 2, 'xvxcvxcv', 1, '2022-07-13 05:43:57', NULL, '2022-07-13 05:43:57', 1),
(4, 2, 'ugkjj', 1, '2022-07-13 05:53:49', NULL, '2022-07-13 05:53:49', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id_noticia` int(11) NOT NULL,
  `titulo` varchar(256) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_publicacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id_noticia`, `titulo`, `descripcion`, `fecha_publicacion`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `status`) VALUES
(1, 'El euro llega a su nivel más bajo en 20 años frente al dólar: qué consecuencias tiene la histórica paridad de las monedas', '&lt;div dir=&quot;ltr&quot; class=&quot;bbc-19j92fr essoxwk0&quot; style=&quot;box-sizing: inherit; margin: 0px; width: initial; grid-template-columns: repeat(10, 1fr); grid-column: 5 / span 10; color: rgb(0, 0, 0); font-family: &amp;quot;Times New Roman&amp;quot;; background-color: rgb(253, 253, 253);&quot;&gt;&lt;p dir=&quot;ltr&quot; class=&quot;bbc-bm53ic e1cc2ql70&quot; style=&quot;box-sizing: inherit; font-size: 1rem; line-height: 1.375rem; font-family: ReithSans, Helvetica, Arial, sans-serif; color: rgb(63, 63, 66); padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-right: 2.5rem;&quot;&gt;Las dos monedas llegaron al mismo valor este martes, marcando un simb&oacute;lico 1:1, que supone un descenso de 15% del euro en el &uacute;ltimo a&ntilde;o.&lt;/p&gt;&lt;/div&gt;&lt;div dir=&quot;ltr&quot; class=&quot;bbc-19j92fr essoxwk0&quot; style=&quot;box-sizing: inherit; margin: 0px; width: initial; grid-template-columns: repeat(10, 1fr); grid-column: 5 / span 10; color: rgb(0, 0, 0); font-family: &amp;quot;Times New Roman&amp;quot;; background-color: rgb(253, 253, 253);&quot;&gt;&lt;p dir=&quot;ltr&quot; class=&quot;bbc-bm53ic e1cc2ql70&quot; style=&quot;box-sizing: inherit; font-size: 1rem; line-height: 1.375rem; font-family: ReithSans, Helvetica, Arial, sans-serif; color: rgb(63, 63, 66); padding-bottom: 1.5rem; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-right: 2.5rem;&quot;&gt;Esto ocurre mientras aumenta el temor en los mercados de una&amp;nbsp;&lt;span style=&quot;box-sizing: inherit;&quot;&gt;&lt;b&gt;recesi&oacute;n econ&oacute;mica en Europa&lt;/b&gt;&lt;/span&gt;, en un contexto de alta inflaci&oacute;n y una creciente incertidumbre sobre la continuidad en el suministro de gas ruso.&lt;/p&gt;&lt;/div&gt;', '2022-07-13 05:00:00', 1, '2022-07-13 01:21:58', 1, '2022-07-13 04:05:40', 1),
(2, 'Tuvimos excesiva confianza en que los jefes militares de Venezuela iban a hacer algo para sacar a Maduro', '&lt;p&gt;&lt;span style=&quot;color: rgb(63, 63, 66); font-family: ReithSans, Helvetica, Arial, sans-serif; background-color: rgb(253, 253, 253);&quot;&gt;Ese mismo d&iacute;a,&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;box-sizing: inherit; font-weight: bolder; color: rgb(63, 63, 66); font-family: ReithSans, Helvetica, Arial, sans-serif; background-color: rgb(253, 253, 253);&quot;&gt;Carrie Filipetti&lt;/span&gt;&lt;span style=&quot;color: rgb(63, 63, 66); font-family: ReithSans, Helvetica, Arial, sans-serif; background-color: rgb(253, 253, 253);&quot;&gt;&amp;nbsp;asumi&oacute; el cargo de subsecretaria de Estado de EE.UU. para Venezuela y Cuba, dos de los pa&iacute;ses de Am&eacute;rica Latina que mayor atenci&oacute;n recibieron durante el gobierno del entonces mandatario estadounidense&amp;nbsp;&lt;/span&gt;&lt;span style=&quot;box-sizing: inherit; font-weight: bolder; color: rgb(63, 63, 66); font-family: ReithSans, Helvetica, Arial, sans-serif; background-color: rgb(253, 253, 253);&quot;&gt;Donald Trump&lt;/span&gt;&lt;span style=&quot;color: rgb(63, 63, 66); font-family: ReithSans, Helvetica, Arial, sans-serif; background-color: rgb(253, 253, 253);&quot;&gt;.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', '2022-07-13 05:00:00', 1, '2022-07-13 01:22:36', 1, '2022-07-13 04:06:24', 1),
(3, 'Telescopio James Webb: las asombrosas nuevas imágenes del universo tomadas por el poderoso instrumento espacial', '&lt;p&gt;&lt;span style=&quot;color: rgb(63, 63, 66); font-family: ReithSans, Helvetica, Arial, sans-serif; background-color: rgb(253, 253, 253);&quot;&gt;La entrada en funcionamiento del instrumento de la NASA, de la Agencia Espacial Europea y la Agencia Espacial Canadiense ha revelado las mejores instant&aacute;neas del universo jam&aacute;s vistas.&lt;/span&gt;&lt;br&gt;&lt;/p&gt;', '2022-07-13 05:00:00', 7, '2022-07-13 01:43:06', 1, '2022-07-13 04:06:51', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_comentarios`
--

CREATE TABLE `sub_comentarios` (
  `id_sub_comentario` int(11) NOT NULL,
  `id_comentario` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `usuario_creacion` int(11) NOT NULL,
  `fecha_creacion` timestamp NULL DEFAULT current_timestamp(),
  `usuario_modificacion` int(11) DEFAULT NULL,
  `fecha_modificacion` timestamp NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sub_comentarios`
--

INSERT INTO `sub_comentarios` (`id_sub_comentario`, `id_comentario`, `descripcion`, `usuario_creacion`, `fecha_creacion`, `usuario_modificacion`, `fecha_modificacion`, `status`) VALUES
(1, 3, 'sdsd', 1, '2022-07-13 05:57:29', NULL, '2022-07-13 05:57:29', 1),
(2, 2, 'adasdads', 7, '2022-07-13 06:10:55', NULL, '2022-07-13 06:10:55', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_settings`
--

CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'Castores Prueba', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = Administrador, 2 = Interno, 3 = Externo',
  `avatar` text NOT NULL DEFAULT 'no-image-available.png',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `avatar`, `date_created`) VALUES
(1, 'Administrator', '', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 1, 'no-image-available.png', '2020-11-26 10:57:04'),
(7, 'Ulises', 'Cardona', 'ulises@gmail.com', '079528ee254fb29fa6b7d4308e4c9251', 2, 'no-image-available.png', '2022-07-12 22:42:44');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id_noticia`);

--
-- Indices de la tabla `sub_comentarios`
--
ALTER TABLE `sub_comentarios`
  ADD PRIMARY KEY (`id_sub_comentario`);

--
-- Indices de la tabla `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sub_comentarios`
--
ALTER TABLE `sub_comentarios`
  MODIFY `id_sub_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
