-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09-Jul-2021 às 17:07
-- Versão do servidor: 10.4.14-MariaDB
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `animeprimera`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `calendario`
--

CREATE TABLE `calendario` (
  `idCalendario` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL,
  `dayOfWeek` int(11) NOT NULL,
  `horas` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentario`
--

CREATE TABLE `comentario` (
  `idUser` int(11) NOT NULL,
  `idEpisodio` int(11) NOT NULL,
  `idComentario` int(11) NOT NULL,
  `texto` varchar(200) NOT NULL,
  `report` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentario`
--

INSERT INTO `comentario` (`idUser`, `idEpisodio`, `idComentario`, `texto`, `report`) VALUES
(3, 27, 1, 'Ola', 0),
(3, 27, 2, 'Comentario 2 ', 0),
(5, 27, 4, 'Muito bom!', 0),
(3, 26, 6, 'Teste', 0),
(3, 45, 10, 'Não funciona!!!', 0),
(3, 44, 11, 'Aiai', 0),
(3, 43, 14, 'Olá\r\n', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentariocompost`
--

CREATE TABLE `comentariocompost` (
  `idComentarioc` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idCompost` int(11) NOT NULL,
  `texto` longtext NOT NULL,
  `reports` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `comentariocompost`
--

INSERT INTO `comentariocompost` (`idComentarioc`, `idUser`, `idCompost`, `texto`, `reports`) VALUES
(3, 3, 6, 'Mesmo muito fixe!', 0),
(5, 3, 11, 'Aahahah muito engraçado!', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `completo`
--

CREATE TABLE `completo` (
  `idUser` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL,
  `idCompleto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `completo`
--

INSERT INTO `completo` (`idUser`, `idSerie`, `idCompleto`) VALUES
(3, 9, 2),
(3, 13, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compost`
--

CREATE TABLE `compost` (
  `idCompost` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `video` longtext NOT NULL,
  `titulo` text NOT NULL,
  `descricao` longtext NOT NULL,
  `img` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `isStaff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `compost`
--

INSERT INTO `compost` (`idCompost`, `idUser`, `video`, `titulo`, `descricao`, `img`, `status`, `votes`, `isStaff`) VALUES
(4, 3, 'resources/vid/Kimetsu_no_YaibaDemon_SlayerO_Filme___O_Trem_Do_Infinito™Trailer_Legendado_PT_BR1.mp4', 'Trailer de Kimetsu No Yaiba Mugen Train', 'Oficialmente anunciado Filme de Kimetsu no Yaiba com Trailer!!!', '', 0, 2, 1),
(6, 3, '', 'Wallpaper da Rog tá bom?', '\"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?\"', '846315d30412a8cf5874e48f67642f80.jpg', 0, 2, 1),
(11, 5, 'resources/vid/video011.mp4', 'Melhor meme(Alerta usar headphones)', ' O que acham?', '', 0, 1, 0),
(13, 3, 'resources/vid/Gojo_Satoru_Domain_Expansion_Immeasurable_Void_Trim.mp4', 'Momento épico de Jujutsu Kaisen', ' BRUTAL AMEI!!!!', 'b98a1dd05276856000c0bd9b38c0a5ba.png', 0, 1, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `compostvotes`
--

CREATE TABLE `compostvotes` (
  `idUser` int(11) NOT NULL,
  `idCompost` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `compostvotes`
--

INSERT INTO `compostvotes` (`idUser`, `idCompost`, `quantidade`) VALUES
(3, 4, 1),
(3, 3, 1),
(3, 6, 0),
(5, 6, 0),
(5, 4, 0),
(3, 11, 0),
(3, 12, 0),
(3, 13, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `dropped`
--

CREATE TABLE `dropped` (
  `idUser` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL,
  `idDropped` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `episodio`
--

CREATE TABLE `episodio` (
  `idEpisodio` int(11) NOT NULL,
  `idTemporada` int(11) NOT NULL,
  `lengthEpisodio` float NOT NULL,
  `dataRelease` date NOT NULL,
  `url` longtext NOT NULL,
  `titulo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `episodio`
--

INSERT INTO `episodio` (`idEpisodio`, `idTemporada`, `lengthEpisodio`, `dataRelease`, `url`, `titulo`) VALUES
(26, 7, 0, '2020-06-03', '', 'Kimetsu No Yaiba S1 | 1'),
(27, 8, 0, '0000-00-00', 'resources/vid/Kimetsu_no_YaibaDemon_SlayerO_Filme___O_Trem_Do_Infinito™Trailer_Legendado_PT_BR.mp4', 'Kimetsu No Yaiba Mugen Train | 1'),
(28, 9, 0, '0000-00-00', 'resources/vid/Video_Editor_Music_Movie_Maker_20201212161618625.mp4', 'Sword Art Online S1 | 1'),
(29, 7, 0, '2020-04-06', 'resources/vid/Video_Editor_Music_Movie_Maker_202012121616186251.mp4', 'Kimetsu No Yaiba S1 | 2'),
(30, 10, 0, '0000-00-00', '', 'Sword Art Online S2 | 1'),
(31, 9, 0, '0000-00-00', 'resources/vid/Video_Editor_Music_Movie_Maker_202012121616186252.mp4', 'Sword Art Online S1 | 2'),
(33, 11, 0, '0000-00-00', 'resources/vid/Just_shot_us_fellow_and_took_his_boots_full_version.mp4', 'JoJo no Kimyou na Bouken Part 1 | 1'),
(34, 16, 0, '0000-00-00', 'resources/vid/video0_1.mp4', 'Kaguya-sama: Love is War S1 | 1'),
(35, 12, 0, '0000-00-00', 'resources/vid/80fb44fa0fecc487e49954df15cd3f09.mp4', 'JoJo no Kimyou na Bouken Part 2 | 1'),
(36, 13, 0, '0000-00-00', '', 'JoJo no Kimyou na Bouken Part 3 | 1'),
(37, 7, 0, '2020-05-07', '', 'Kimetsu No Yaiba Season 1 | 3'),
(38, 16, 0, '0000-00-00', 'resources/vid/VID-20210506-WA0030.mp4', 'Kaguya-sama: Love is War S1 | 2'),
(39, 11, 0, '0000-00-00', 'resources/vid/059991fa9f6e96de0cc38c4bd406a140.mp4', 'JoJo no Kimyou na Bouken Part 1 | 2'),
(40, 11, 0, '0000-00-00', 'resources/vid/video01.mp4', 'JoJo no Kimyou na Bouken Part 1 | 3'),
(41, 9, 0, '0000-00-00', 'resources/vid/Seven_vs_Redtooth.mp4', 'Sword Art Online S1 | 3'),
(42, 9, 0, '0000-00-00', 'resources/vid/video0-5-31.mp4', 'Sword Art Online S1 | 4'),
(43, 9, 0, '0000-00-00', 'resources/vid/gvb.xyz-8Wtp1geHaw2nOjHW-1.mp4', 'Sword Art Online S1 | 5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `favorito`
--

CREATE TABLE `favorito` (
  `idUser` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL,
  `idFavorito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `favorito`
--

INSERT INTO `favorito` (`idUser`, `idSerie`, `idFavorito`) VALUES
(3, 10, 1),
(3, 11, 3),
(3, 12, 4),
(5, 11, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `gostos`
--

CREATE TABLE `gostos` (
  `idGosto` int(11) NOT NULL,
  `idCompost` int(11) NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `modlogs`
--

CREATE TABLE `modlogs` (
  `idModLog` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `info` longtext NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `modlogs`
--

INSERT INTO `modlogs` (`idModLog`, `idUser`, `info`, `status`) VALUES
(1, 3, '0', 0),
(2, 3, '0', 0),
(3, 3, '0', 0),
(4, 3, 'RemovidoKimetsu No Yaiba Season 1 | 4', 0),
(5, 3, 'Removido Kimetsu No Yaiba Season 1 | 4', 0),
(8, 3, 'Adicionado Kimetsu No Yaiba Season 1 | 4', 0),
(9, 3, 'Adicionado Temporada: Season 1', 0),
(10, 3, 'Removido AnotherSeason 1', 0),
(11, 3, 'Adicionado Another Season 1', 0),
(13, 3, 'Removido Comentário de Admin com texto: Alo', 0),
(14, 3, 'Removido Comentário de Admin com texto: Brutal!!\r\n', 0),
(15, 3, 'Removido A minha pfp', 0),
(16, 3, 'Removido Comentário de teste1 com texto: Fixe é dizer pouco pá!', 0),
(17, 3, 'Editado Kimetsu No Yaiba S1 | 1', 0),
(18, 3, 'Editado Kimetsu No Yaiba Season 1 | 3', 0),
(19, 3, 'Editado Kimetsu No Yaiba S1 | 2', 0),
(20, 3, 'Editado Kimetsu No Yaiba S1 | 2', 0),
(21, 3, 'Removido Kimetsu No Yaiba Season 1 | 4', 0),
(22, 3, 'Editado Kimetsu No Yaiba Season 1', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `onhold`
--

CREATE TABLE `onhold` (
  `idUser` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL,
  `idOnHold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rating`
--

CREATE TABLE `rating` (
  `idRating` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `rating`
--

INSERT INTO `rating` (`idRating`, `idSerie`, `idUser`, `rating`) VALUES
(1, 9, 3, 3),
(2, 9, 5, 4),
(3, 10, 3, 5),
(4, 10, 5, 3),
(5, 11, 3, 3),
(6, 12, 3, 4),
(7, 13, 3, 3),
(8, 13, 6, 3),
(9, 12, 6, 3),
(10, 11, 5, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `requestanime`
--

CREATE TABLE `requestanime` (
  `idRequest` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `info` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguir`
--

CREATE TABLE `seguir` (
  `idSeguir` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `seguir`
--

INSERT INTO `seguir` (`idSeguir`, `idUser`, `idSerie`) VALUES
(8, 3, 11),
(9, 6, 13),
(10, 3, 13);

-- --------------------------------------------------------

--
-- Estrutura da tabela `series`
--

CREATE TABLE `series` (
  `idSerie` int(11) NOT NULL,
  `Autor` varchar(100) NOT NULL,
  `nTemporadas` int(11) NOT NULL,
  `nEpisodios` int(11) NOT NULL,
  `Titulo` varchar(150) NOT NULL,
  `DataRelease` date NOT NULL,
  `Tipo` varchar(200) NOT NULL,
  `Photo` longtext NOT NULL,
  `Descricao` text NOT NULL,
  `rating` float NOT NULL,
  `idUser` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `series`
--

INSERT INTO `series` (`idSerie`, `Autor`, `nTemporadas`, `nEpisodios`, `Titulo`, `DataRelease`, `Tipo`, `Photo`, `Descricao`, `rating`, `idUser`) VALUES
(9, 'Tsutomu Mizushima ', 4, 0, 'Another', '2009-10-29', 'Terror', 'c27fae695d9a55722367db957c977fdb.png', '  In 1972, a popular student in Yomiyama North Middle School\'s class 3-3 named Misaki passed away during the school year. Since then, the town of Yomiyama has been shrouded by a fearful atmosphere, from the dark secrets hidden deep within.  Twenty-six years later, 15-year-old Kouichi Sakakibara transfers into class 3-3 of Yomiyama North and soon after discovers that a strange, gloomy mood seems to hang over all the students. He also finds himself drawn to the mysterious, eyepatch-wearing student Mei Misaki; however, the rest of the class and the teachers seem to treat her like she doesn\'t exist. Paying no heed to warnings from everyone including Mei herself, Kouichi begins to get closer not only to her, but also to the truth behind the gruesome phenomenon plaguing class 3-3 of Yomiyama North.  Another follows Kouichi, Mei, and their classmates as they are pulled into the enigma surrounding a series of inevitable, tragic events—but unraveling the horror of Yomiyama may just cost them the ultimate price.  ', 3.5, 3),
(10, ' ufotable', 2, 0, 'Kimetsu No Yaiba', '0000-00-00', 'Ação, Drama, Shounen', '1051e4868d8185ec7e178ac4019e20ae.png', 'Ever since the death of his father, the burden of supporting the family has fallen upon Tanjirou Kamado\'s shoulders. Though living impoverished on a remote mountain, the Kamado family are able to enjoy a relatively peaceful and happy life. One day, Tanjirou decides to go down to the local village to make a little money selling charcoal. On his way back, night falls, forcing Tanjirou to take shelter in the house of a strange man, who warns him of the existence of flesh-eating demons that lurk in the woods at night.  When he finally arrives back home the next day, he is met with a horrifying sight—his whole family has been slaughtered. Worse still, the sole survivor is his sister Nezuko, who has been turned into a bloodthirsty demon. Consumed by rage and hatred, Tanjirou swears to avenge his family and stay by his only remaining sibling. Alongside the mysterious group calling themselves the Demon Slayer Corps, Tanjirou will do whatever it takes to slay the demons and protect the remnants of his beloved sister\'s humanity.', 4, 3),
(11, 'Reki Kawahara', 2, 0, 'Sword Art Online', '0000-00-00', 'Ação, Drama, Shounen', '6999da6dc7f9ad0ad60618e1126ff607.png', 'In the year 2022, virtual reality has progressed by leaps and bounds, and a massive online role-playing game called Sword Art Online (SAO) is launched. With the aid of \"NerveGear\" technology, players can control their avatars within the game using nothing but their own thoughts.  Kazuto Kirigaya, nicknamed \"Kirito,\" is among the lucky few enthusiasts who get their hands on the first shipment of the game. He logs in to find himself, with ten-thousand others, in the scenic and elaborate world of Aincrad, one full of fantastic medieval weapons and gruesome monsters. However, in a cruel turn of events, the players soon realize they cannot log out; the game\'s creator has trapped them in his new world until they complete all one hundred levels of the game.  In order to escape Aincrad, Kirito will now have to interact and cooperate with his fellow players. Some are allies, while others are foes, like Asuna Yuuki, who commands the leading group attempting to escape from the ruthless game. To make matters worse, Sword Art Online is not all fun and games: if they die in Aincrad, they die in real life. Kirito must adapt to his new reality, fight for his survival, and hopefully break free from his virtual hell.', 3.5, 3),
(12, 'Hirohiko Araki', 5, 0, 'JoJo no Kimyo na Boken', '0000-00-00', 'Ação, Aventura, Supernatural, Vampiro, Shounen', '2ab5c2d336d1049c6e918f2acbcc0782.png', 'In 1868, Dario Brando saves the life of an English nobleman, George Joestar. By taking in Dario\'s son Dio when the boy becomes fatherless, George hopes to repay the debt he owes to his savior. However Dio, unsatisfied with his station in life, aspires to seize the Joestar house for his own. Wielding an Aztec stone mask with supernatural properties, he sets out to destroy George and his son, Jonathan \"JoJo\" Joestar, and triggers a chain of events that will continue to echo through the years to come.  Half a century later, in New York City, Jonathan\'s grandson Joseph Joestar discovers the legacy his grandfather left for him. When an archeological dig unearths the truth behind the stone mask, he realizes that he is the only one who can defeat the Pillar Men, mystical beings of immeasurable power who inadvertently began everything.  Adapted from the first two arcs of Hirohiko Araki\'s outlandish manga series, JoJo no Kimyou na Bouken follows the many thrilling expeditions of JoJo and his descendants. Whether it\'s facing off with the evil Dio, or combatting the sinister Pillar Men, there\'s always plenty of bizarre adventures in store.', 3.5, 3),
(13, 'Aniplex', 1, 0, 'Kaguya-sama: Love is War', '0000-00-00', 'Comédia, Psicológico, Romance, Escola, Seinen', 'dfbbf0ff780fbe1608374f2f043a0743.png', 'At the renowned Shuchiin Academy, Miyuki Shirogane and Kaguya Shinomiya are the student body\'s top representatives. Ranked the top student in the nation and respected by peers and mentors alike, Miyuki serves as the student council president. Alongside him, the vice president Kaguya—eldest daughter of the wealthy Shinomiya family—excels in every field imaginable. They are the envy of the entire student body, regarded as the perfect couple.  However, despite both having already developed feelings for the other, neither are willing to admit them. The first to confess loses, will be looked down upon, and will be considered the lesser. With their honor and pride at stake, Miyuki and Kaguya are both equally determined to be the one to emerge victorious on the battlefield of love!', 4, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `temporadas`
--

CREATE TABLE `temporadas` (
  `idTemporada` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL,
  `Titulo` text NOT NULL,
  `nEpisodios` int(11) NOT NULL,
  `DataRelease` date NOT NULL,
  `Thumbnail` longtext NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `temporadas`
--

INSERT INTO `temporadas` (`idTemporada`, `idSerie`, `Titulo`, `nEpisodios`, `DataRelease`, `Thumbnail`, `Status`) VALUES
(7, 10, 'Season 1', 3, '2021-01-01', '414cef9b182ee4850b1f353e121ea910.png', 0),
(8, 10, 'Movie', 1, '0000-00-00', '65975effba369dfca2cc4e3d387240a5.png', 0),
(9, 11, 'Season 1', 5, '0000-00-00', 'b60af060fc3b62423b47859f4aed9c13.png', 0),
(10, 11, 'Season 2', 1, '0000-00-00', '470c54ee4b1fdcb5606c43e930500ac7.png', 0),
(11, 12, 'Part 1', 3, '0000-00-00', 'dc4e17f2f79c2a796d5b43f8419e4cd4.png', 0),
(12, 12, 'Part 2', 1, '0000-00-00', 'e40c6478f5b225ddf43914c883aa2c28.png', 0),
(13, 12, 'Part 3', 1, '0000-00-00', 'bc0e0a1e402b3a29bb9a894a16cf5ee8.png', 0),
(14, 12, 'Part 4', 0, '0000-00-00', '825750b7056acc78c3c94b5f6181ee21.png', 0),
(15, 12, 'Part 5', 0, '0000-00-00', '7ec0e4f08a46a0866061a961bd8408da.png', 0),
(16, 13, 'Season 1', 2, '0000-00-00', 'f40cdcf4b565a23d8168b991ff3be73d.png', 0),
(20, 9, 'Season 1', 0, '2021-07-19', '8bcde120d24fb88e334c648016143a5a.png', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Password` longtext NOT NULL,
  `tipoConta` int(11) NOT NULL,
  `Permissoes` longtext NOT NULL,
  `dataCriacao` date NOT NULL,
  `FotoPerfil` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`idUser`, `Username`, `Email`, `Password`, `tipoConta`, `Permissoes`, `dataCriacao`, `FotoPerfil`) VALUES
(3, 'Admin', 'admin@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 0, '5', '2021-06-04', '4a56b28dc5d59c3d17eca8fe28bd5b2d.png'),
(4, 'teste', 'teste', '46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5', 0, '1', '2021-06-04', '9e264a0ed2c9d19aa4b4dfeffa6064b4.png'),
(5, 'teste1', 'teste1', '46070d4bf934fb0d4b06d9e2c46e346944e322444900a435d7d9a95e6d7435f5', 0, '0', '2021-06-06', '8330a40007a53a00ee01c44adb8ceb02.png'),
(6, 'T2Editado', 't2@gmail.com', 'c44474038d459e40e4714afefa7bf8dae9f9834b22f5e8ec1dd434ecb62b512e', 0, '1', '2021-06-23', '325b412fbfd742f295a2cc387fed7bf2.png'),
(7, 'thebest', 'jose20fernandes03@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 0, '1', '2021-06-24', '3f4b9514a55a500de9379c81d711faa6.jpg'),
(8, 'Marko_el_gay', 'markinhot2003@gmail.com', '817da1821fa41ce81af4e8db8be100530e9e5c8c6e6ea656a0d23a19d7090c6a', 0, '1', '2021-06-25', '66d7ef526cd7dc6e68cb8bf56c76b75d.jpg'),
(9, 'OGrande', 'batata@gmail.com', '7e95b2d38324e13a282aba0b8a4964ecb1d6d90487af3c13bdb8425d9b85dae7', 0, '1', '2021-06-25', 'a326a003cccddb6cbdefb3614ac1088c.jpg'),
(10, 'testeuser22', 'batata@gmail.com', 'aa773255e208215bca42a87e3ec0c01cea76f3ccc7ffced35634d7d353c0c07b', 0, '1', '2021-06-25', '4d59b6c16dd2dfc5ea683ec4e1e359b4.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `watching`
--

CREATE TABLE `watching` (
  `idUser` int(11) NOT NULL,
  `idSerie` int(11) NOT NULL,
  `idWatching` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `watching`
--

INSERT INTO `watching` (`idUser`, `idSerie`, `idWatching`) VALUES
(3, 10, 3),
(3, 13, 4),
(6, 13, 5),
(7, 11, 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `calendario`
--
ALTER TABLE `calendario`
  ADD PRIMARY KEY (`idCalendario`);

--
-- Índices para tabela `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`idComentario`);

--
-- Índices para tabela `comentariocompost`
--
ALTER TABLE `comentariocompost`
  ADD PRIMARY KEY (`idComentarioc`);

--
-- Índices para tabela `completo`
--
ALTER TABLE `completo`
  ADD PRIMARY KEY (`idCompleto`);

--
-- Índices para tabela `compost`
--
ALTER TABLE `compost`
  ADD PRIMARY KEY (`idCompost`);

--
-- Índices para tabela `dropped`
--
ALTER TABLE `dropped`
  ADD PRIMARY KEY (`idDropped`);

--
-- Índices para tabela `episodio`
--
ALTER TABLE `episodio`
  ADD PRIMARY KEY (`idEpisodio`);

--
-- Índices para tabela `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`idFavorito`);

--
-- Índices para tabela `gostos`
--
ALTER TABLE `gostos`
  ADD PRIMARY KEY (`idGosto`);

--
-- Índices para tabela `modlogs`
--
ALTER TABLE `modlogs`
  ADD PRIMARY KEY (`idModLog`);

--
-- Índices para tabela `onhold`
--
ALTER TABLE `onhold`
  ADD PRIMARY KEY (`idOnHold`);

--
-- Índices para tabela `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`idRating`);

--
-- Índices para tabela `requestanime`
--
ALTER TABLE `requestanime`
  ADD PRIMARY KEY (`idRequest`);

--
-- Índices para tabela `seguir`
--
ALTER TABLE `seguir`
  ADD PRIMARY KEY (`idSeguir`);

--
-- Índices para tabela `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`idSerie`);

--
-- Índices para tabela `temporadas`
--
ALTER TABLE `temporadas`
  ADD PRIMARY KEY (`idTemporada`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- Índices para tabela `watching`
--
ALTER TABLE `watching`
  ADD PRIMARY KEY (`idWatching`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `calendario`
--
ALTER TABLE `calendario`
  MODIFY `idCalendario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `comentario`
--
ALTER TABLE `comentario`
  MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `comentariocompost`
--
ALTER TABLE `comentariocompost`
  MODIFY `idComentarioc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `completo`
--
ALTER TABLE `completo`
  MODIFY `idCompleto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `compost`
--
ALTER TABLE `compost`
  MODIFY `idCompost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `dropped`
--
ALTER TABLE `dropped`
  MODIFY `idDropped` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `episodio`
--
ALTER TABLE `episodio`
  MODIFY `idEpisodio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de tabela `favorito`
--
ALTER TABLE `favorito`
  MODIFY `idFavorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `gostos`
--
ALTER TABLE `gostos`
  MODIFY `idGosto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `modlogs`
--
ALTER TABLE `modlogs`
  MODIFY `idModLog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `onhold`
--
ALTER TABLE `onhold`
  MODIFY `idOnHold` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `rating`
--
ALTER TABLE `rating`
  MODIFY `idRating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `requestanime`
--
ALTER TABLE `requestanime`
  MODIFY `idRequest` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `seguir`
--
ALTER TABLE `seguir`
  MODIFY `idSeguir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `series`
--
ALTER TABLE `series`
  MODIFY `idSerie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `temporadas`
--
ALTER TABLE `temporadas`
  MODIFY `idTemporada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `watching`
--
ALTER TABLE `watching`
  MODIFY `idWatching` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
