-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 17 2015 г., 15:49
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `mydiplom`
--

-- --------------------------------------------------------

--
-- Структура таблицы `id_place`
--

CREATE TABLE IF NOT EXISTS `id_place` (
  `id_place` int(11) NOT NULL AUTO_INCREMENT,
  `name_place` varchar(80) NOT NULL,
  PRIMARY KEY (`id_place`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `id_place`
--

INSERT INTO `id_place` (`id_place`, `name_place`) VALUES
(1, 'Склад'),
(2, 'Магазин');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `discription` text NOT NULL,
  `full_discription` text NOT NULL,
  `price` int(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `id_place` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_place` (`id_place`),
  KEY `id` (`id`),
  KEY `id_supplier_3` (`id_supplier`),
  KEY `id_place_2` (`id_place`),
  KEY `id_supplier_6` (`id_supplier`,`id_place`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `author`, `discription`, `full_discription`, `price`, `img`, `id_supplier`, `count`, `id_place`) VALUES
(1, 'Изучаем HTML, XHTML and CSS', 'Элизабет Фримен, Эрик Фримен', 'Устали от чтения книг по HTML, которые понятны только специалистам в этой области?', 'Устали от чтения книг по HTML, которые понятны только специалистам в этой области? Тогда самое время взять в руки новое издание Изучаем HTML, XHTML и CSS. 2-е изд.. Хотите изучить HTML, чтобы уметь создавать веб-страницы, о которых вы всегда мечтали? Так, чтобы более эффективно общаться с друзьями, семьей и привередливыми клиентами? Тогда эта книга для вас.', 1144, 'img/items/book-103.png', 1, 2, 1),
(2, 'Изучаем работу с jQuery', 'Эрик Фримен, Элизабет Робсон', 'Хотите добавить интерактивности своему интернет-сайту? Узнайте, как...', 'Хотите добавить интерактивности своему интернет-сайту? Узнайте, как jQuery позволит вам создать целый набор скриптов, используя всего несколько строчек кода! С помощью этого издания вы максимально быстро научитесь работать с jQuery - этой удивительной библиотекой JavaScript, использование которой сегодня стало необходимостью для разработки современных веб-сайтов и RIA-приложений.', 802, 'img/items/book-102.png', 1, 1, 2),
(3, 'Изучаем программирование на JavaScript', 'Райан Бенедетти, Ронан Крэнли', 'Вы готовы сделать шаг вперед в веб-программировании и перейти от верстки?', 'Вы готовы сделать шаг вперед в веб-программировании и перейти от верстки в HTML и CSS к созданию полноценных динамических страниц? Тогда пришло время познакомиться с самым горячим языком программирования - JavaScript! С помощью этой книги вы узнаете все о языке JavaScript - от переменных до циклов. Вы поймете, почему разные браузеры по-разному реагируют на код и как написать универсальный код, поддерживаемый всеми браузерами', 860, 'img/items/book-105.png', 1, 0, 1),
(4, 'Изучаем C#', 'Эндрю Стиллмен, Дженнифер Грин', 'В отличие от большинства книг по программированию, построенных на основе', 'В отличие от большинства книг по программированию, построенных на основе скучного изложения спецификаций и примеров, с этой книгой читатель сможет сразу приступить к написанию собственного кода на языке программирования C# с самого начала. Вы освоите минимальный набор инструментов, а далее примете участие в забавных и интересных программных проектах: от разработки карточной игры до создания серьезного бизнес- приложения.', 1545, 'img/items/book-104.png', 1, 4, 2),
(5, 'Изучаем SQL', 'Линн Бейли', 'В современном мире наивысшую ценность имеет информация, но ......', 'В современном мире наивысшую ценность имеет информация, но не менее важно уметь этой информацией управлять. Эта книга посвящена языку запросов SQL и управлению базами данных. Материал излагается, начиная с описания базовых запросов и заканчивая сложными манипуляциями с помощью объединений, подзапросов и транзакций.', 1340, 'img/items/book-106.png', 1, 1, 1),
(6, 'Изучаем JavaScript', 'Майкл Моррисон', 'Вы готовы сделать шаг вперед в своей практике веб-программирования?', 'Вы готовы сделать шаг вперед в своей практике веб-программирования и перейти от верстки в HTML и CSS к созданию полноценных динамических страниц? Тогда пришло время познакомиться с самым горячим языком программирования - JavaScript! ', 600, 'img/items/book-108.png', 1, 2, 2),
(7, 'Изучаем Java', 'Кэти Сиерра, Берт Бейтс', 'Изучаем Java - это не просто книга. Она не только научит вас теории', 'Изучаем Java - это не просто книга. Она не только научит вас теории языка Java и объектно-ориентированного программирования, она сделает вас программистом. В ее основу положен уникальный метод обучения на практике. В отличие от классических учебников информация дается не в текстовом, а в визуальном представлении.', 848, 'img/items/book-101.png', 1, 2, 2),
(8, 'PHP 5', 'Дмитрий Котеров, Алексей Костарев', 'Рассматриваются основы функционирования Web-серверов, сборка исполняемого', 'Рассматриваются основы функционирования Web-серверов, сборка исполняемого модуля PHP в ОС UNIX, инструментарий Web-разработчика (в том числе утилиты отладки сценариев), синтаксис и стандартные функции языка. Приведено описание функций PHP для работы с массивами, файлами, СУБД MySQL, регулярными выражениями формата PCRE, графическими примитивами, почтой, сессиями и т. д.  ', 750, 'img/items/book-107.png', 1, 3, 2),
(9, 'PHP и MySQL. Исчерпывающее руководство', 'Бретт Маклафлин', 'Если у вас есть опыт разработки сайтов с помощью CSS и JavaScript, то эта книга', 'Если у вас есть опыт разработки сайтов с помощью CSS и JavaScript, то эта книга переведет вас на новый уровень - создание динамических сайтов на основе PHP и MySQL. Благодаря практическим примерам в книге вы узнаете все возможности серверного программирования. Вы прочитаете, как выстраивать базу данных, управлять контентом и обмениваться информацией с пользователями, применяя запросы и веб-формы.', 599, 'img/items/book-109.png', 1, 1, 2),
(10, 'PHP и jQuery для профессионалов', 'Джейсон Ленгсторф', 'В этой книге вы найдете все необходимое для того, чтобы приступить к разработке мощных', 'В этой книге вы найдете все необходимое для того, чтобы приступить к разработке мощных веб-приложений на основе jQuery, AJAX и объектно-ориентированных средств PHP. Следуя приведенным в книге рекомендациям, вы в короткие сроки научитесь применять передовые методы разработки PHP-приложений, сочетая их с инструментами jQuery для создания пользовательских интерфейсов с высокой степенью интерактивности.', 659, 'img/items/book-110.png', 1, 0, 1),
(11, 'Kingsman: Секретная служба', 'Twentieth Century Fox Film Corporation', 'Эггси - молодой парень, который прошел службу в морской пехоте и имеет очень высокий', 'Эггси - молодой парень, который прошел службу в морской пехоте и имеет очень высокий уровень интеллекта. Он мог бы добиться многого, но выбрал другой путь и стал мелким преступником. Однажды он знакомится с Гарри Хартом, которому его отец когда-то спас жизнь. Этот человек решил сделать все возможное, чтобы сделать жизнь Эггси лучше и открыть для него новые возможности. ', 499, 'img/items/video-111.png', 2, 5, 2),
(12, 'Грань будущего', 'Warner Bros.', 'Раса инопланетян, победить которую не способна ни одна армия, начала безжалостную', 'Раса инопланетян, победить которую не способна ни одна армия, начала безжалостную атаку на Землю, и майору Уильяму Кейджу (Том Круз) приходится участвовать в самоубийственной миссии. Кейдж погибает уже через несколько минут и попадает во временную петлю, вынуждающую его раз за разом переживать жестокую битву, сражаясь и погибая вновь и вновь. ', 560, 'img/items/video-112.png', 2, 0, 1),
(13, 'Грань будущего', 'Scott Rudin Productions', 'Фильм рассказывает об увлекательных приключениях легендарного консьержа Густава и его юного друга', 'Фильм рассказывает об увлекательных приключениях легендарного консьержа Густава и его юного друга, портье Зеро Мустафы. Сотрудники гостиницы становятся свидетелями кражи и поисков бесценных картин эпохи Возрождения, борьбы за огромное состояние богатой семьи и… драматических изменений в Европе между двумя кровопролитными войнами XX века.', 399, 'img/items/video-113.png', 2, 0, 2),
(14, 'Звездные Войны: Полная сага', 'Джордж Лукас', 'Назад к далекой-далекой галактике, к началу повествования знаменитой саги о звездных воинах.', 'Назад к далекой-далекой галактике, к началу повествования знаменитой саги о звездных воинах. События этой части переносят нас на 30 лет назад и знакомят с юным Энакином Скайуокером - мальчиком, наделенным необычной силой и пока еще не осознающим, что путь, на который он встал, превратит его в Дарта Вейдера. Рыцари-джедаи пока еще хранят мир в неспокойной галактике, а молодая королева заботится о безопасности своих подданных, но из тени уже выходит злая сила, ожидающая момента нанесения удара!', 1199, 'img/items/video-114.png', 2, 1, 2),
(15, 'Хоббит: Битва пяти воинств', 'New Line Cinema', 'Когда отряд из тринадцати гномов нанимал хоббита Бильбо Бэгинса в качестве взломщика и четырнадцатого', 'Когда отряд из тринадцати гномов нанимал хоббита Бильбо Бэгинса в качестве взломщика и четырнадцатого, «счастливого», участника похода к Одинокой горе, Бильбо полагал, что его приключения закончатся, когда он выполнит свою задачу — найдет сокровище, которое так необходимо предводителю гномов Торину. Путешествие в Эребор, захваченное драконом Смаугом королевство гномов, оказалось еще более опасным, чем предполагали гномы и даже Гэндальф — мудрый волшебник, протянувший Торину и его отряду руку помощи.', 299, 'img/items/video-115.png', 2, 3, 2),
(16, 'Гравитация', 'Warner Bros.', 'Доктор Райан Стоун, блестящий специалист в области медицинского инжиниринга, отправляется в', 'Доктор Райан Стоун, блестящий специалист в области медицинского инжиниринга, отправляется в свою первую космическую миссию под командованием ветерана астронавтики Мэтта Ковальски, для которого этот полет - последний перед отставкой. Но во время, казалось бы, рутинной работы за бортом случается катастрофа. ', 560, 'img/items/video-116.png', 2, 4, 1),
(17, 'Восхождение Юпитер', 'Dune Entertainment', 'Юпитер Джонс родилась под ночным небом, и все знаки предсказывали, что девочке предстоят', 'Юпитер Джонс родилась под ночным небом, и все знаки предсказывали, что девочке предстоят великие свершения. Юпитер выросла и каждый день видит во сне звезды, но просыпается в жесткой реальности, где она работает уборщицей и моет туалеты. Личная жизнь Юпитер тоже оставляет желать лучшего, пока девушка не встречает Кейна. ', 399, 'img/items/video-117.png', 2, 2, 2),
(18, 'Волк с Уолл-стрит', 'Paramount Pictures', 'Безумная, смешная, и невероятно увлекательная история взлета и падения брокера и афериста Белфорта', 'Безумная, смешная, и невероятно увлекательная история взлета и падения брокера и афериста Белфорта (Леонардо ДоКаприо- «Джанго освобожденный», «Великий Гэтсби», «Начало»), основавшего вместе со своим другом Донни (Джона Хилл- «Мачо и Ботан 1,2», «SuperПерцы»)компанию «Стрэттон Оукмонт» и заработавшего в рекордно короткие сроки миллионы долларов.', 450, 'img/items/video-118.png', 2, 1, 2),
(19, 'Шерлок: Полностью сезоны 1-3', 'Бенедикт Камбербэтч', 'Сериал ''Шерлок'' от телеканала ВВС основан на работах сэра Артура Конан Дойла, но действие перенесено в', 'Сериал ''Шерлок'' от телеканала ВВС основан на работах сэра Артура Конан Дойла, но действие перенесено в наше время. Военный врач, герой войны, возвращается домой из Афганистана после ранения и знакомится со странным, но харизматическим гением, который ищет соседа по квартире. Дальнейшее события происходят в Лондоне 2010 года. ', 1299, 'img/items/video-119.png', 2, 4, 2),
(20, 'Снайпер', 'Warner Bros. Pictures Inc', 'Экранизация мемуаров ''морского котика'' из Техаса Криса Кайла, который служил снайпером в Ираке', 'Экранизация мемуаров ''морского котика'' из Техаса Криса Кайла, который служил снайпером в Ираке и стал рекордсменом по числу убитых солдат противника, за что иракцы прозвали его дьяволом. Кроме самой войны, фильм рассказывает о воспоминаниях жены Криса, которая была свидетелем растущей привязанности мужа к его сослуживцам.', 399, 'img/items/video-120.png', 2, 0, 1),
(21, 'Заложница 3', 'Лайам Нисон', 'Жизнь бывшего правительственного агента Брайана Миллса рушится, когда его обвиняют в убийстве', 'Лайам Нисон («Банды Нью-Йорка»), Форест Уитейкер («Возвращение героя»), Фамке Янссен («100 футов») в боевике Оливьера Мегатона «Заложница 3» Жизнь бывшего правительственного агента Брайана Миллса рушится, когда его обвиняют в убийстве, которого он не совершал. Преследуемый опытным инспектором полиции, Миллс пытается отследить настоящего убийцу…', 477, 'img/items/video-121.png', 2, 3, 1),
(22, 'Jamiroquai: Live At Montreux 2003', 'Eagle Rock Entertainment', 'Tracklist: <br/>											01. Use The Force<br/>											02. Canned Heat<br/>											03. Cosmic Girl<br/>', 'Tracklist: <br/>											01. Use The Force<br/>											02. Canned Heat<br/>											03. Cosmic Girl<br/>											04. Little L<br/>											05. Blow Your Mind<br/>											06. High Times<br/>											07. Travelling Without Moving<br/>											08. Butterfly<br/>											09. Shoot The Moon<br/>											10. Soul Education<br/>											11. Just Another Story<br/>											12. Mr Moon<br/>											13. Alright<br/>											14. Love Foolosophy<br/>											15. Deeper Underground', 2137, 'img/items/audio-122.png', 2, 2, 1),
(23, 'Enigma: Seven Lives Many Faces', 'EMI Music Germany', 'Tracklist: <br/> 										01. Encounters <br/>										02. Seven Lives <br/>										03. Touchness <br/> ', 'Tracklist: <br/> 										01. Encounters <br/> 										02. Seven Lives <br/> 										03. Touchness <br/> 										04. The Same Parents<br/>									05. Fata Morgana <br/> 										06. Hell''s Heaven <br/> 										07. La Puerta Del Cielo <br/> 										08. Distorted Love <br/> 										09. Je T''aime Till My Dying Day <br/>										10. Deja Vu <br/> 										11. Between Generations <br/> 										12. The Language Of Sound', 899, 'img/items/audio-123.png', 2, 5, 2),
(24, 'Schiller. Symphonia', 'Deutsche Grammophon GmbH', 'Tracklist: <br/> \r\n										01. Tune In <br/> \r\n										02. Berlin Bombay <br/> \r\n										03. Ein schoner Tag with Eva Mali<br/>', 'Tracklist: <br/> \r\n										01. Tune In <br/> \r\n										02. Berlin Bombay <br/> \r\n										03. Ein schoner Tag with Eva Mali<br/> \r\n										04. Hochland <br/> \r\n										05. Playing With Madness <br/> \r\n										06. Lichtermeer <br/> \r\n										07. Schiller <br/> \r\n										08. Desert <br/> \r\n										09. Ruhe <br/> \r\n										10. Sehnsucht <br/> \r\n										11. Sehnsucht: Reprise <br/> \r\n										12. Sommernacht <br/> \r\n										13. Berlin Moskau <br/> \r\n										14. Tired with Jael<br/> \r\n										15. Leben...I Feel You <br/> \r\n										16. Tiefblau <br/> \r\n										17. Solveig''s Song with Eva Mali<br/> \r\n										18. Let It Rise with Midge Ure<br/> \r\n										19. White <br/> \r\n										20. Das Glockenspiel <br/> \r\n										21. Sonne with Unheilig<br/> \r\n										22. Nachtflug <br/> \r\n										23. Vienna with Midge Ure<br/> \r\n										24. Berlin Berlin<br/>', 1477, 'img/items/audio-124.png', 2, 0, 1),
(25, 'Sensation Innerspace', 'Open Gate Records', '"For the last twelve years.<br/>\r\n									Sensation has been building its international tour A new show, based around', 'For the last twelve years.\r\n									Sensation has been building its international tour A new show, based around the legendary white dress code, premieres in Amsterdam each year before traveling around the world, visiting thirteen countries in 2011 alone. \r\n									The world premiere of innerspace takes the audience on a spiritual journey to awakening, raising the excitement step by step through seven intense experiences, inspiring visitors to focus on the now, guiding them to a collective awareness of its Beauty and introducing them to their own innerspace.', 378, 'img/items/audio-125.png', 2, 6, 1),
(26, 'Armin Van Buuren: Armin Only Mirage', 'Open Gate Records', 'Tracklist:<br/>\r\n								01. Armin Van Buuren Feat. Ana Criado - Down To Love (Live Performance By Ana Criado)', 'Tracklist:<br/>\r\n								01. Armin Van Buuren Feat. Ana Criado - Down To Love (Live Performance By Ana Criado) <br/>\r\n								02. Armin Van Buuren - I Don''t Own You<br/>\r\n								03. Armin Van Buuren Feat. Susana - Desiderium 207 (Live Performance By Susana) <br/>\r\n								04. Armin Van Buuren - Mirage (Official Opening Armin Only Mirage, Live Performance By Susana, Bagga Bownz, Eller Van Buuren, Benno De Goeij & Orchestra)<br/> \r\n								05. W&W - Alpha<br/>\r\n								06. Armin Van Buuren Feat. Christian Burns - This Light Between Us (Live Performance By Christian Burns & Orchestra) <br/>\r\n								07. Armin Van Buuren - Full Focus (Live Performance By Benno De Goeij) <br/>\r\n								08. Orjan Nilsen - Go Fast<br/>\r\n								09. World Of Gaia: <br/>\r\n								- Gaia - Aisha<br/>\r\n								- Armin Van Buuren - Orbion (Live Performance By Susana) <br/>\r\n								- Gaia - Tuvan<br/>\r\n								10. Armin Van Buuren Feat. Sophie Ellis-Bextor - Not Giving Up On Love (Dash Berlin 4AM Mix) <br/>\r\n								11. Dave202 Vs Cerf, Mitiska & Jaren - Arrival Vs Beggin'' You (Acapella ) (Armin Van Buuren Mashup)<br/> \r\n								12. W&W - AK47', 243, 'img/items/audio-126.png', 2, 2, 2),
(27, 'Bjork. Medulla', 'Wellhart Ltd', 'An intimate behind the scenes documentary that gives a unique insight into the making of Medulla ......', 'An intimate behind the scenes documentary that gives a unique insight into the making of Medulla the new album by Bjork. Filmed over the course ofia year as Bjork recorded in New York, London, Reykjavik, the Canary Islands and Salvador, Brazil, the film gives a detailed portrait of the creative process behind the recording of Bjork''s most daring album to date. The documentary captures some of the raw improvised performances of Bjork and her collaborators as they put together a remarkable album that uses only human voices for instruments.', 1399, 'img/items/audio-127.png', 2, 2, 2),
(28, 'The Chemical Brothers: Singles 93-03', 'Virgin Records Ltd.', 'Features the videos for:<br/>\r\n								Life is Sweet<br/>\r\n								Setting Sun<br/>\r\n								Block Rockin'' Beats<br/>', 'Features the videos for:<br/>\r\n								Life is Sweet<br/>\r\n								Setting Sun<br/>\r\n								Block Rockin'' Beats<br/>\r\n								Elektrobank<br/>\r\n								Hey Boy Hey Girl<br/>\r\n								Let Forever Be<br/>\r\n								Out of Control<br/>\r\n								Star Guitar<br/>\r\n								The Test<br/>\r\n								The Golden Path<br/>\r\n\r\n								Life Performances including:<br/>\r\n								Hey Boy Hey Girl from Red Rocks 1999<br/>\r\n								Hoops from Fuji Festival 2002<br/>\r\n								Setting Sun from Fuji Festival 2002<br/>\r\n								Temptation/Star Guitar from Fuji Festival 2002<br/>\r\n								Chemical Bears from Glastonbury 2000<br/>', 1406, 'img/items/audio-128.png', 2, 3, 2),
(29, 'Swedish House Mafia: Leave The World Behind', 'Ridley Scott Associates', 'With breath-taking live moments, huge laughs and dark lows LEAVE THE WORLD BEHIND follows Axwell,  Sebastian Ingrosso', 'With breath-taking live moments, huge laughs and dark lows LEAVE THE WORLD BEHIND follows Axwell, Sebastian Ingrosso and Steve Angello, members of the successful electronic dance group Swedish House Mafia, as they decide to end the group in order to save their friendship. Experience their final world tour which became the largest worldwide electronic music tour in history with over 1,000,000 tickets sold in just one week. Get a front-row seat in this honest, raw, and emotional showcase of the three DJ''s final chapter as electronic dance music''s finest.', 1405, 'img/items/audio-129.png', 2, 1, 2),
(30, 'Moby: Live The Hotel Tour 2005', 'Mute Records', '\r\n										01. Opening Sequence (My Weakness)<br/>\r\n										02. Find My Baby<br/>\r\n										03. Raining Again<br/>', 'Tracklist:<br/>\r\n										01. Opening Sequence (My Weakness)<br/>\r\n										02. Find My Baby<br/>\r\n										03. Raining Again<br/>\r\n										04. Natural Blues<br/>\r\n										05. Spiders<br/>\r\n										06. Where You End<br/>\r\n										07. In My Heart<br/>\r\n										08. Go<br/>\r\n										09. That''s When I Reach For My Revolver<br/>\r\n										10. Temptation<br/>\r\n										11. Beautiful<br/>\r\n										12. Very<br/>\r\n										13. Next Is The E<br/>\r\n										14. Porcelain<br/>\r\n										15. Dream About Me<br/>\r\n										16. Why Does My Heart Feel So Bad?<br/>\r\n										17. We Are All Made Of Stars<br/>\r\n										18. Slipping Away<br/>\r\n										19. Honey<br/>\r\n										20. Bodyrock<br/>\r\n										21. Lift Me Up<br/>\r\n										22. Walk On The Wild Side<br/>\r\n										23. Fur Elise<br/>\r\n										24. Feeling So Real<br/>', 477, 'img/items/audio-130.png', 2, 5, 2),
(31, 'Depeche Mode: Random Access Memory', 'Chrome Dreams', 'For over a quarter of a century Depeche Mode affecting and ground breaking music in existence.', 'For over a quarter of a century Depeche Mode affecting and ground breaking music in existence. From the Synth-Pop innocence of their early eighties New Romanticism to the sombre ''no wave'' landscapes of their more recent output, this incredible group has been hailed as godfathers to Techno, Electronica and Industrial Metal. Having not only survived but also flourished, while virtually all of their contemporaries have disappeared, they now command a level of respect, from critics', 897, 'img/items/audio-131.png', 2, 2, 2),
(32, 'A Year With Armin Van Buuren', 'Armada', 'An Ordinary Person Living An Extraordinary Life. Armin Van Buuren, Voted The Most Popular Dj In ', 'An Ordinary Person Living An Extraordinary Life. Armin Van Buuren, Voted The Most Popular Dj In The World Four Years In A Row, Lives The Life That Most Of Us Can Only Dream Of. \r\nWith A Relentless Passion For Music, The Born Perfectionist Strives To Stay At The Top, While Dealing With The Daily Pressure That Comes Along With It. \r\nThis Documentary Will Take You All The Way From Personal Moments At Home To The Heat Of The Moment As 100,000 Clubbers Await Their Hero. Giving You A Closer Look At The Person', 257, 'img/items/audio-132.png', 2, 0, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `supplies`
--

CREATE TABLE IF NOT EXISTS `supplies` (
  `id` int(7) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `agent` varchar(63) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Дамп данных таблицы `supplies`
--

INSERT INTO `supplies` (`id`, `name`, `agent`, `phone`, `address`) VALUES
(1, 'Рога и копыта', 'Влад', '888-88-88', 'Где-то далеко, в области'),
(2, 'Мега диски', 'Боб', '111-11-11', 'Москоу сити');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Alex', 'Alex@alex.ru', '534b44a19bf18d20b71ecc4eb77c572f');

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`id_place`) REFERENCES `id_place` (`id_place`),
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `supplies` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
