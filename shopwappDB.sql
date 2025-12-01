-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2025 a las 22:07:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `shopwapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Smartphones'),
(2, 'Plegables');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `promo_linea1` varchar(255) NOT NULL,
  `promo_linea2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `promo_linea1`, `promo_linea2`) VALUES
(1, '-Regalos Sorpresa - Envío Gratis a todo el país niga', '-Hasta 24 MSI - Pagos seguros con PayPal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedido`
--

CREATE TABLE `detalles_pedido` (
  `id_detalle` int(11) NOT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_pedido` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_pedido` decimal(10,2) NOT NULL,
  `estado_pedido` varchar(50) NOT NULL DEFAULT 'Pendiente',
  `direccion_envio_pedido` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `subtitulo` varchar(255) DEFAULT NULL,
  `caracteristicas` text DEFAULT NULL,
  `especificaciones` text DEFAULT NULL,
  `software` text DEFAULT NULL,
  `url_imagen_principal` varchar(255) DEFAULT NULL,
  `url_pagina` varchar(255) DEFAULT 'sugerencia.html',
  `stock` int(11) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `precio`, `subtitulo`, `caracteristicas`, `especificaciones`, `software`, `url_imagen_principal`, `url_pagina`, `stock`) VALUES
(1, 'iPhone 16 Pro Max 13', 29999.00, 'El iPhone definitivo', 'Titanio Grado 5.<br />\r\nBotón de Acción.<br />\r\nZoom Óptico 5x.', 'A18 Pro.<br />\r\n1TB Almacenamiento.<br />\r\nPantalla 6.9&quot;.', 'iOS 18.', 'imgen/pendiente.jpg', 'sugerencia.html', 10),
(3, 'iPhone 16 Plus', 21999.00, 'Grande y ligero', 'Colores vibrantes.<br>Cámara 48MP.<br>USB-C Rápido.', 'A17 Pro.<br>256 GB.<br>Pantalla 6.7\".', 'iOS 18.', 'imgen/pendiente.jpg', 'sugerencia.html', 20),
(4, 'iPhone 15', 17499.00, 'El estándar moderno', 'Diseño de aluminio.<br>Cristal infusionado.<br>Modo Cine.', 'A16 Bionic.<br>128 GB.<br>OLED Super Retina.', 'iOS 17.', 'imgen/pendiente.jpg', 'sugerencia.html', 25),
(5, 'iPhone SE 4', 11499.00, 'El clásico renovado', 'Botón TouchID/FaceID.<br>Compacto.<br>El chip más rápido en su clase.', 'A16 Bionic.<br>64 GB.<br>LCD Liquid Retina.', 'iOS 18.', 'imgen/pendiente.jpg', 'sugerencia.html', 30),
(6, 'Samsung Galaxy S25 Ultra', 27999.00, 'El Rey de Android', 'Marco de Titanio.<br>S-Pen Integrado.<br>Galaxy AI.', 'Snapdragon 8 Gen 4.<br>200MP Zoom 100x.<br>5000 mAh.', 'One UI 7.', 'imgen/pendiente.jpg', 'sugerencia.html', 12),
(7, 'Samsung Galaxy S25+', 23999.00, 'Equilibrio perfecto', 'Pantalla plana QHD+.<br>Batería mejorada.<br>Nightography.', 'Exynos 2500.<br>512 GB.<br>12GB RAM.', 'One UI 7.', 'imgen/pendiente.jpg', 'sugerencia.html', 15),
(8, 'Samsung Galaxy Z Fold 6', 35999.00, 'Productividad en tu bolsillo', 'Doble Pantalla.<br>Multitarea real.<br>Bisagra Flex.', 'Snapdragon 8 Gen 3.<br>1TB.<br>Pantalla 7.6\".', 'Android 14L.', 'imgen/pendiente.jpg', 'sugerencia.html', 8),
(9, 'Samsung Galaxy Z Flip 6', 20999.00, 'Estilo plegable', 'Pantalla externa grande.<br>Modo FlexCam.<br>Compacto.', 'Snapdragon 8 Gen 3.<br>256 GB.<br>IPX8.', 'One UI 6.1.', 'imgen/pendiente.jpg', 'sugerencia.html', 18),
(10, 'Samsung Galaxy A55', 8499.00, 'El rey de la gama media', 'Cuerpo de metal.<br>Resistente al agua.<br>Seguridad Knox.', 'Exynos 1480.<br>128 GB.<br>Cámara 50MP.', 'One UI 6.', 'imgen/pendiente.jpg', 'sugerencia.html', 50),
(11, 'Xiaomi 15 Ultra', 24999.00, 'Leyenda fotográfica', 'Lente Leica 1 pulgada.<br>Cuero vegano.<br>Carga 90W.', 'Snapdragon 8 Gen 4.<br>16GB RAM.<br>Pantalla WQHD+.', 'HyperOS.', 'imgen/pendiente.jpg', 'sugerencia.html', 10),
(12, 'Xiaomi 14T Pro', 13999.00, 'Flagship Killer', 'Cámaras Leica.<br>Carga 120W.<br>Pantalla 144Hz.', 'Dimensity 9300+.<br>512 GB.<br>IP68.', 'HyperOS.', 'imgen/pendiente.jpg', 'sugerencia.html', 20),
(13, 'Redmi Note 14 Pro+', 8999.00, 'Calidad precio insuperable', 'Pantalla curva.<br>Resistencia caídas.<br>Batería 6000mAh.', 'Snapdragon 7s Gen 3.<br>256 GB.<br>Cámara 200MP.', 'HyperOS.', 'imgen/pendiente.jpg', 'sugerencia.html', 35),
(14, 'POCO F6 Pro', 9499.00, 'Potencia pura', 'Snapdragon 8 Gen 2.<br>Pantalla 2K.<br>Carga 120W.', '12 GB RAM.<br>512 GB.<br>Refrigeración Líquida.', 'HyperOS POCO.', 'imgen/pendiente.jpg', 'sugerencia.html', 25),
(15, 'Black Shark 6', 16999.00, 'Gaming Extremo', 'Gatillos magnéticos.<br>Luces RGB.<br>Refrigeración activa.', 'Snapdragon 8 Gen 3.<br>16 GB RAM.<br>Pantalla 165Hz.', 'JoyUI.', 'imgen/pendiente.jpg', 'sugerencia.html', 10),
(16, 'Motorola Edge 50 Ultra', 19999.00, 'Diseño de madera', 'Acabado en madera real.<br>Carga 125W.<br>Zoom Periscopio.', 'Snapdragon 8s Gen 3.<br>1TB Almacenamiento.<br>Pantalla Curva.', 'Hello UI.', 'imgen/pendiente.jpg', 'sugerencia.html', 15),
(17, 'Motorola Razr 50 Ultra', 22999.00, 'Icono de moda', 'Pantalla externa 4.0\".<br>Colores Pantone.<br>Diseño sin pliegue.', 'Snapdragon 8s Gen 3.<br>12 GB RAM.<br>Carga Inalámbrica.', 'Android 14.', 'imgen/pendiente.jpg', 'sugerencia.html', 12),
(18, 'Motorola Edge 50 Pro', 11999.00, 'Elegancia pura', 'Validación Pantone.<br>Carga 125W.<br>Diseño perlado.', 'Snapdragon 7 Gen 3.<br>256 GB.<br>Cámara con IA.', 'Hello UI.', 'imgen/pendiente.jpg', 'sugerencia.html', 20),
(19, 'Moto G85', 5999.00, 'Pantalla infinita', 'Pantalla curva pOLED.<br>Sonido Dolby Atmos.<br>Diseño delgado.', 'Snapdragon 6s Gen 3.<br>256 GB.<br>Cámara 50MP OIS.', 'Android 14.', 'imgen/pendiente.jpg', 'sugerencia.html', 40),
(20, 'ThinkPhone 25', 15999.00, 'Seguridad empresarial', 'Fibra de aramida.<br>Seguridad ThinkShield.<br>Integración con PC.', 'Dimensity 7300.<br>256 GB.<br>Certificación Militar.', 'Android 14 Business.', 'imgen/pendiente.jpg', 'sugerencia.html', 10),
(21, 'Huawei Pura 80 Ultra', 26999.00, 'Fotografía en movimiento', 'Cámara retráctil.<br>Diseño estelar.<br>Cristal Kunlun.', 'Kirin 9010.<br>1TB.<br>Carga 100W.', 'HarmonyOS 4.2.', 'imgen/pendiente.jpg', 'sugerencia.html', 8),
(22, 'Huawei Mate 70 Pro', 24999.00, 'El regreso del Rey', 'Conexión Satelital.<br>Reconocimiento Facial 3D.<br>Diseño simétrico.', 'Kirin 9100.<br>512 GB.<br>Cámara XMAGE.', 'HarmonyOS Next.', 'imgen/pendiente.jpg', 'sugerencia.html', 10),
(23, 'Huawei Nova 13 Ultra', 10999.00, 'Selfie Master', 'Doble cámara frontal.<br>Diseño con monograma.<br>Carga 100W.', 'Kirin 8000.<br>256 GB.<br>Apertura variable.', 'EMUI 14.', 'imgen/pendiente.jpg', 'sugerencia.html', 25),
(24, 'Huawei Pocket S2', 18999.00, 'Joya tecnológica', 'Diseño 3D.<br>Pantalla externa circular.<br>Bisagra gota de agua.', 'Kirin 9000S.<br>12 GB RAM.<br>Cámara Hiperespectral.', 'HarmonyOS 4.', 'imgen/pendiente.jpg', 'sugerencia.html', 15),
(25, 'Huawei P60 Art', 21999.00, 'Arte y Tecnología', 'Diseño de isla.<br>Cámara de Telefoto nocturno.<br>Resistencia al agua.', 'Snapdragon 8+ Gen 1.<br>512 GB.<br>Carga 88W.', 'EMUI 13.1.', 'imgen/pendiente.jpg', 'sugerencia.html', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp(),
  `rol` varchar(20) NOT NULL DEFAULT 'cliente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `password_hash`, `telefono`, `fecha_registro`, `rol`) VALUES
(2, 'orlando molinar', 'orlando21@gmail.com', '575908d5d1595d173b5eb92b6746b311eccd578a', NULL, '2025-11-24 01:58:59', 'cliente'),
(4, 'Meel Pena', 'meelpena6@gmail.com', '204f798435c7ff977025ee3655fbeed65d4b1d37', NULL, '2025-11-24 02:06:15', 'cliente'),
(6, 'Super Admin', 'admin@shopwapp.com', '8cb2237d0679ca88db6464eac60da96345513964', NULL, '2025-11-24 03:39:52', 'admin'),
(7, 'pollito', 'pollito@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', NULL, '2025-11-24 20:54:41', 'cliente'),
(9, 'Luis', 'grijalva@gmail.com', 'a79e806909b891d3ddb38d1a6eba9229ee99fd6a', NULL, '2025-11-26 21:45:39', 'cliente'),
(10, 'grijalva2@gmail.com', 'grijalva2@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL, '2025-11-26 21:46:27', 'cliente'),
(11, 'orlando', 'orla@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', NULL, '2025-11-26 21:47:05', 'cliente'),
(12, 'elian', 'elian@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', NULL, '2025-11-26 21:47:55', 'cliente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD PRIMARY KEY (`id_detalle`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
