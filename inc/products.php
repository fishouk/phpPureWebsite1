<?php
	include_once("config.php");

	//Функция для отображения футболки по ID и массиву
	function getViewProductList($product) {
		$output = "";
		
		$output = "<li>"
				. '<a href="' . BASE_URL . 'items/' . $product["sku"] . '/">'						  
				. '<img src="' . BASE_URL . $product["img"] . '" alt="' . $product["name"] . '">' 
				. "<p>" . $product["discription"] . "</p>"
				. "<p>Подробнее</p>"
				. "</a>"
				. "</li>";
		return $output; 
	}

	//функция для записи последних 4 футболок в массив
	function getRecentProducts() {
		$recent = array();
		$all = getAllProducts();
		$totalProducts = count($all);
		$position = 0;

		foreach ($all as $product) {
			$position++;
			if($totalProducts - $position < 4){
				$recent[] = $product;
			}
		}
		return $recent;
	}

	//функция поиска нужной футболки
	function getProductsSearch($s){
		mb_internal_encoding("UTF-8");
		$results = array();
		$all = getAllProducts();

		foreach ($all as $product) {
			if (mb_stripos($product["name"], $s) !== false || stripos($product["sku"], $s) !== false){
				$results[] = $product;
			}
		}
		
		return $results;
	}

	//функция возвращает 8 футболок
	function getSubsetProducts($start,$end){
		$subset = array();
		$all = getAllProducts();

		$position = 0;
		foreach ($all as $product) {
			$position += 1;
			if ($position >= $start && $position <=$end) {
				$subset[] = $product;
			}
		}

		return $subset;
	}

	//функция для определения футболки и ее вывода на новую страницу
	function getProduct($productID) {
		$products = getAllProducts();
		if(isset($productID)) {
			$product_id = $productID;
			if (isset($products[$product_id])) {	
				$product = $products[$product_id];
				return $product;
			} else {
				header("Location: " . BASE_URL . "shirts/");
				exit;
			}
		}
	}

	//функция для определения количества товаров в общем массиве
	function getProductsCount() {
		return count(getAllProducts());		
	}

	function getAllProducts() {
		// массив футболок
		$products = array();
		$products[101] = array(
			"name" => "Изучаем HTML, XHTML and CSS",
			"author" => "Элизабет Фримен, Эрик Фримен",
			"discription" => "Устали от чтения книг по HTML, которые понятны только специалистам в этой области?",
			"fullDiscription" => "Устали от чтения книг по HTML, которые понятны только специалистам в этой области? Тогда самое время взять в руки новое издание Изучаем HTML, XHTML и CSS. 2-е изд.. Хотите изучить HTML, чтобы уметь создавать веб-страницы, о которых вы всегда мечтали? Так, чтобы более эффективно общаться с друзьями, семьей и привередливыми клиентами? Тогда эта книга для вас.",
			"price" => 1144,
			"img" => "img/items/book-103.png"			
			);
		$products[102] = array(
			"name" => "Изучаем работу с jQuery",
			"author" => "Эрик Фримен, Элизабет Робсон",
			"discription" => "Хотите добавить интерактивности своему интернет-сайту? Узнайте, как...",
			"fullDiscription" => "Хотите добавить интерактивности своему интернет-сайту? Узнайте, как jQuery позволит вам создать целый набор скриптов, используя всего несколько строчек кода! С помощью этого издания вы максимально быстро научитесь работать с jQuery - этой удивительной библиотекой JavaScript, использование которой сегодня стало необходимостью для разработки современных веб-сайтов и RIA-приложений.",
			"price" => 802,
			"img" => "img/items/book-102.png"
			);
		$products[103] = array(
			"name" => "Изучаем программирование на JavaScript",
			"author" => "Райан Бенедетти, Ронан Крэнли",
			"discription" => "Вы готовы сделать шаг вперед в веб-программировании и перейти от верстки?",
			"fullDiscription" => "Вы готовы сделать шаг вперед в веб-программировании и перейти от верстки в HTML и CSS к созданию полноценных динамических страниц? Тогда пришло время познакомиться с самым горячим языком программирования - JavaScript! С помощью этой книги вы узнаете все о языке JavaScript - от переменных до циклов. Вы поймете, почему разные браузеры по-разному реагируют на код и как написать универсальный код, поддерживаемый всеми браузерами",
			"price" => 860,
			"img" => "img/items/book-105.png"
			);
		$products[104] = array(
			"name" => "Изучаем C#",
			"author" => "Эндрю Стиллмен, Дженнифер Грин",
			"discription" => "В отличие от большинства книг по программированию, построенных на основе",
			"fullDiscription" => "В отличие от большинства книг по программированию, построенных на основе скучного изложения спецификаций и примеров, с этой книгой читатель сможет сразу приступить к написанию собственного кода на языке программирования C# с самого начала. Вы освоите минимальный набор инструментов, а далее примете участие в забавных и интересных программных проектах: от разработки карточной игры до создания серьезного бизнес- приложения.",
			"price" => 1545,
			"img" => "img/items/book-104.png"
			);
		$products[105] = array(
			"name" => "Изучаем SQL",
			"author" => "Линн Бейли",
			"discription" => "В современном мире наивысшую ценность имеет информация, но ......",
			"fullDiscription" => "В современном мире наивысшую ценность имеет информация, но не менее важно уметь этой информацией управлять. Эта книга посвящена языку запросов SQL и управлению базами данных. Материал излагается, начиная с описания базовых запросов и заканчивая сложными манипуляциями с помощью объединений, подзапросов и транзакций. ",
			"price" => 1340,
			"img" => "img/items/book-106.png"		
			);
		$products[106] = array(
			"name" => "Изучаем JavaScript",
			"author" => "Майкл Моррисон",
			"discription" => "Вы готовы сделать шаг вперед в своей практике веб-программирования?",
			"fullDiscription" => "Вы готовы сделать шаг вперед в своей практике веб-программирования и перейти от верстки в HTML и CSS к созданию полноценных динамических страниц? Тогда пришло время познакомиться с самым горячим языком программирования - JavaScript! ",
			"price" => 600,
			"img" => "img/items/book-108.png"		
			);
		$products[107] = array(
			"name" => "Изучаем Java",
			"author" => "Кэти Сиерра, Берт Бейтс",
			"discription" => "Изучаем Java - это не просто книга. Она не только научит вас теории ",
			"fullDiscription" => "Изучаем Java - это не просто книга. Она не только научит вас теории языка Java и объектно-ориентированного программирования, она сделает вас программистом. В ее основу положен уникальный метод обучения на практике. В отличие от классических учебников информация дается не в текстовом, а в визуальном представлении. ",
			"price" => 848,
			"img" => "img/items/book-101.png"	
			);
		$products[108] = array(
			"name" => "PHP 5",
			"author" => "Дмитрий Котеров, Алексей Костарев",
			"discription" => "Рассматриваются основы функционирования Web-серверов, сборка исполняемого",
			"fullDiscription" => "Рассматриваются основы функционирования Web-серверов, сборка исполняемого модуля PHP в ОС UNIX, инструментарий Web-разработчика (в том числе утилиты отладки сценариев), синтаксис и стандартные функции языка. Приведено описание функций PHP для работы с массивами, файлами, СУБД MySQL, регулярными выражениями формата PCRE, графическими примитивами, почтой, сессиями и т. д.  ",
			"price" => 750,
			"img" => "img/items/book-107.png"
			);
		$products[109] = array(
           "name" => "PHP и MySQL. Исчерпывающее руководство",
			"author" => "Бретт Маклафлин",
			"discription" => "Если у вас есть опыт разработки сайтов с помощью CSS и JavaScript, то эта книга",
			"fullDiscription" => "Если у вас есть опыт разработки сайтов с помощью CSS и JavaScript, то эта книга переведет вас на новый уровень - создание динамических сайтов на основе PHP и MySQL. Благодаря практическим примерам в книге вы узнаете все возможности серверного программирования. Вы прочитаете, как выстраивать базу данных, управлять контентом и обмениваться информацией с пользователями, применяя запросы и веб-формы. ",
			"price" => 599,
			"img" => "img/items/book-109.png"
	    );
	    $products[110] = array(
            "name" => "PHP и jQuery для профессионалов",
			"author" => "Джейсон Ленгсторф",
			"discription" => "В этой книге вы найдете все необходимое для того, чтобы приступить к разработке мощных",
			"fullDiscription" => "В этой книге вы найдете все необходимое для того, чтобы приступить к разработке мощных веб-приложений на основе jQuery, AJAX и объектно-ориентированных средств PHP. Следуя приведенным в книге рекомендациям, вы в короткие сроки научитесь применять передовые методы разработки PHP-приложений, сочетая их с инструментами jQuery для создания пользовательских интерфейсов с высокой степенью интерактивности. ",
			"price" => 659,
			"img" => "img/items/book-110.png"
	    );
	    $products[111] = array(
            "name" => "Kingsman: Секретная служба",
			"author" => "Twentieth Century Fox Film Corporation",
			"discription" => "Эггси - молодой парень, который прошел службу в морской пехоте и имеет очень высокий",
			"fullDiscription" => "Эггси - молодой парень, который прошел службу в морской пехоте и имеет очень высокий уровень интеллекта. Он мог бы добиться многого, но выбрал другой путь и стал мелким преступником. Однажды он знакомится с Гарри Хартом, которому его отец когда-то спас жизнь. Этот человек решил сделать все возможное, чтобы сделать жизнь Эггси лучше и открыть для него новые возможности. ",
			"price" => 499,
			"img" => "img/items/video-111.png"
	    );
	    $products[112] = array(
            "name" => "Грань будущего",
			"author" => "Warner Bros.",
			"discription" => "Раса инопланетян, победить которую не способна ни одна армия, начала безжалостную",
			"fullDiscription" => "Раса инопланетян, победить которую не способна ни одна армия, начала безжалостную атаку на Землю, и майору Уильяму Кейджу (Том Круз) приходится участвовать в самоубийственной миссии. Кейдж погибает уже через несколько минут и попадает во временную петлю, вынуждающую его раз за разом переживать жестокую битву, сражаясь и погибая вновь и вновь. ",
			"price" => 560,
			"img" => "img/items/video-112.png"
	    );
	    $products[113] = array(
            "name" => "Грань будущего",
			"author" => "Scott Rudin Productions",
			"discription" => "Фильм рассказывает об увлекательных приключениях легендарного консьержа Густава и его юного друга",
			"fullDiscription" => "Фильм рассказывает об увлекательных приключениях легендарного консьержа Густава и его юного друга, портье Зеро Мустафы. Сотрудники гостиницы становятся свидетелями кражи и поисков бесценных картин эпохи Возрождения, борьбы за огромное состояние богатой семьи и… драматических изменений в Европе между двумя кровопролитными войнами XX века.",
			"price" => 399,
			"img" => "img/items/video-113.png"
	    );
	    $products[114] = array(
            "name" => "Звездные Войны: Полная сага",
			"author" => "Джордж Лукас",
			"discription" => "Назад к далекой-далекой галактике, к началу повествования знаменитой саги о звездных воинах.",
			"fullDiscription" => "Назад к далекой-далекой галактике, к началу повествования знаменитой саги о звездных воинах. События этой части переносят нас на 30 лет назад и знакомят с юным Энакином Скайуокером - мальчиком, наделенным необычной силой и пока еще не осознающим, что путь, на который он встал, превратит его в Дарта Вейдера. Рыцари-джедаи пока еще хранят мир в неспокойной галактике, а молодая королева заботится о безопасности своих подданных, но из тени уже выходит злая сила, ожидающая момента нанесения удара!",
			"price" => 1199,
			"img" => "img/items/video-114.png"
	    );
	    $products[115] = array(
            "name" => "Хоббит: Битва пяти воинств",
			"author" => "New Line Cinema",
			"discription" => "Когда отряд из тринадцати гномов нанимал хоббита Бильбо Бэгинса в качестве взломщика и четырнадцатого",
			"fullDiscription" => "Когда отряд из тринадцати гномов нанимал хоббита Бильбо Бэгинса в качестве взломщика и четырнадцатого, «счастливого», участника похода к Одинокой горе, Бильбо полагал, что его приключения закончатся, когда он выполнит свою задачу — найдет сокровище, которое так необходимо предводителю гномов Торину. Путешествие в Эребор, захваченное драконом Смаугом королевство гномов, оказалось еще более опасным, чем предполагали гномы и даже Гэндальф — мудрый волшебник, протянувший Торину и его отряду руку помощи.",
			"price" => 299,
			"img" => "img/items/video-115.png"
	    );
	    $products[116] = array(
            "name" => "Гравитация",
			"author" => " Warner Bros.",
			"discription" => "Доктор Райан Стоун, блестящий специалист в области медицинского инжиниринга, отправляется в",
			"fullDiscription" => "Доктор Райан Стоун, блестящий специалист в области медицинского инжиниринга, отправляется в свою первую космическую миссию под командованием ветерана астронавтики Мэтта Ковальски, для которого этот полет - последний перед отставкой. Но во время, казалось бы, рутинной работы за бортом случается катастрофа. ",
			"price" => 560,
			"img" => "img/items/video-116.png"
	    );
	    $products[117] = array(
            "name" => "Восхождение Юпитер",
			"author" => "Dune Entertainment",
			"discription" => "Юпитер Джонс родилась под ночным небом, и все знаки предсказывали, что девочке предстоят",
			"fullDiscription" => "Юпитер Джонс родилась под ночным небом, и все знаки предсказывали, что девочке предстоят великие свершения. Юпитер выросла и каждый день видит во сне звезды, но просыпается в жесткой реальности, где она работает уборщицей и моет туалеты. Личная жизнь Юпитер тоже оставляет желать лучшего, пока девушка не встречает Кейна. ",
			"price" => 399,
			"img" => "img/items/video-117.png"
	    );
	    $products[118] = array(
            "name" => "Волк с Уолл-стрит",
			"author" => "Paramount Pictures",
			"discription" => "Безумная, смешная, и невероятно увлекательная история взлета и падения брокера и афериста Белфорта",
			"fullDiscription" => "Безумная, смешная, и невероятно увлекательная история взлета и падения брокера и афериста Белфорта (Леонардо ДоКаприо- «Джанго освобожденный», «Великий Гэтсби», «Начало»), основавшего вместе со своим другом Донни (Джона Хилл- «Мачо и Ботан 1,2», «SuperПерцы»)компанию «Стрэттон Оукмонт» и заработавшего в рекордно короткие сроки миллионы долларов.",
			"price" => 450,
			"img" => "img/items/video-118.png"
	    );
	    $products[119] = array(
            "name" => "Шерлок: Полностью сезоны 1-3",
			"author" => "Бенедикт Камбербэтч",
			"discription" => "Сериал 'Шерлок' от телеканала ВВС основан на работах сэра Артура Конан Дойла, но действие перенесено в",
			"fullDiscription" => "Сериал 'Шерлок' от телеканала ВВС основан на работах сэра Артура Конан Дойла, но действие перенесено в наше время. Военный врач, герой войны, возвращается домой из Афганистана после ранения и знакомится со странным, но харизматическим гением, который ищет соседа по квартире. Дальнейшее события происходят в Лондоне 2010 года. ",
			"price" => 1299,
			"img" => "img/items/video-119.png"
	    );
	    $products[120] = array(
            "name" => "Снайпер",
			"author" => "Warner Bros. Pictures Inc",
			"discription" => "Экранизация мемуаров 'морского котика' из Техаса Криса Кайла, который служил снайпером в Ираке",
			"fullDiscription" => "Экранизация мемуаров 'морского котика' из Техаса Криса Кайла, который служил снайпером в Ираке и стал рекордсменом по числу убитых солдат противника, за что иракцы прозвали его дьяволом. Кроме самой войны, фильм рассказывает о воспоминаниях жены Криса, которая была свидетелем растущей привязанности мужа к его сослуживцам.",
			"price" => 399,
			"img" => "img/items/video-120.png"
	    );
	    $products[121] = array(
            "name" => "Заложница 3",
			"author" => "Лайам Нисон",
			"discription" => "Жизнь бывшего правительственного агента Брайана Миллса рушится, когда его обвиняют в убийстве",
			"fullDiscription" => "Лайам Нисон («Банды Нью-Йорка»), Форест Уитейкер («Возвращение героя»), Фамке Янссен («100 футов») в боевике Оливьера Мегатона «Заложница 3» Жизнь бывшего правительственного агента Брайана Миллса рушится, когда его обвиняют в убийстве, которого он не совершал. Преследуемый опытным инспектором полиции, Миллс пытается отследить настоящего убийцу…",
			"price" => 477,
			"img" => "img/items/video-121.png"
	    );
	    $products[122] = array(
            "name" => "Jamiroquai: Live At Montreux 2003",
			"author" => "Eagle Rock Entertainment",
			"discription" => "Tracklist: <br/>
											01. Use The Force<br/>
											02. Canned Heat<br/>
											03. Cosmic Girl<br/>",
			"fullDiscription" => "Tracklist: <br/>
											01. Use The Force<br/>
											02. Canned Heat<br/>
											03. Cosmic Girl<br/>
											04. Little L<br/>
											05. Blow Your Mind<br/>
											06. High Times<br/>
											07. Travelling Without Moving<br/>
											08. Butterfly<br/>
											09. Shoot The Moon<br/>
											10. Soul Education<br/>
											11. Just Another Story<br/>
											12. Mr Moon<br/>
											13. Alright<br/>
											14. Love Foolosophy<br/>
											15. Deeper Underground",
			"price" => 2137,
			"img" => "img/items/audio-122.png"
	    );
	    $products[123] = array(
            "name" => "Enigma: Seven Lives Many Faces",
			"author" => "EMI Music Germany",
			"discription" => "Tracklist: <br/> 
										01. Encounters <br/> 
										02. Seven Lives <br/> 
										03. Touchness <br/> ",
			"fullDiscription" => "Tracklist: <br/> 
										01. Encounters <br/> 
										02. Seven Lives <br/> 
										03. Touchness <br/> 
										04. The Same Parents<br/>  
										05. Fata Morgana <br/> 
										06. Hell's Heaven <br/> 
										07. La Puerta Del Cielo <br/> 
										08. Distorted Love <br/> 
										09. Je T'aime Till My Dying Day <br/> 
										10. Deja Vu <br/> 
										11. Between Generations <br/> 
										12. The Language Of Sound",
			"price" => 899,
			"img" => "img/items/audio-123.png"
	    );
	    $products[124] = array(
            "name" => "Schiller. Symphonia",
			"author" => "Deutsche Grammophon GmbH",
			"discription" => "Tracklist: <br/> 
										01. Tune In <br/> 
										02. Berlin Bombay <br/> 
										03. Ein schoner Tag with Eva Mali<br/> ",
			"fullDiscription" => "Tracklist: <br/> 
										01. Tune In <br/> 
										02. Berlin Bombay <br/> 
										03. Ein schoner Tag with Eva Mali<br/> 
										04. Hochland <br/> 
										05. Playing With Madness <br/> 
										06. Lichtermeer <br/> 
										07. Schiller <br/> 
										08. Desert <br/> 
										09. Ruhe <br/> 
										10. Sehnsucht <br/> 
										11. Sehnsucht: Reprise <br/> 
										12. Sommernacht <br/> 
										13. Berlin Moskau <br/> 
										14. Tired with Jael<br/> 
										15. Leben...I Feel You <br/> 
										16. Tiefblau <br/> 
										17. Solveig's Song with Eva Mali<br/> 
										18. Let It Rise with Midge Ure<br/> 
										19. White <br/> 
										20. Das Glockenspiel <br/> 
										21. Sonne with Unheilig<br/> 
										22. Nachtflug <br/> 
										23. Vienna with Midge Ure<br/> 
										24. Berlin Berlin<br/> ", 
			"price" => 1477,
			"img" => "img/items/audio-124.png"
	    );
	    $products[125] = array(
            "name" => "Sensation Innerspace",
			"author" => "Open Gate Records",
			"discription" => "For the last twelve years.<br/>
									Sensation has been building its international tour A new show, based around ",
			"fullDiscription" => "For the last twelve years.
									Sensation has been building its international tour A new show, based around the legendary white dress code, premieres in Amsterdam each year before traveling around the world, visiting thirteen countries in 2011 alone. 
									The world premiere of innerspace takes the audience on a spiritual journey to awakening, raising the excitement step by step through seven intense experiences, inspiring visitors to focus on the now, guiding them to a collective awareness of its Beauty and introducing them to their own innerspace. ",
			"price" => 378,
			"img" => "img/items/audio-125.png"
	    );
	    $products[126] = array(
            "name" => "Armin Van Buuren: Armin Only Mirage",
			"author" => "Open Gate Records",
			"discription" => "Tracklist:<br/>
								01. Armin Van Buuren Feat. Ana Criado - Down To Love (Live Performance By Ana Criado)",
			"fullDiscription" => "Tracklist:<br/>
								01. Armin Van Buuren Feat. Ana Criado - Down To Love (Live Performance By Ana Criado) <br/>
								02. Armin Van Buuren - I Don't Own You<br/>
								03. Armin Van Buuren Feat. Susana - Desiderium 207 (Live Performance By Susana) <br/>
								04. Armin Van Buuren - Mirage (Official Opening Armin Only Mirage, Live Performance By Susana, Bagga Bownz, Eller Van Buuren, Benno De Goeij & Orchestra)<br/> 
								05. W&W - Alpha<br/>
								06. Armin Van Buuren Feat. Christian Burns - This Light Between Us (Live Performance By Christian Burns & Orchestra) <br/>
								07. Armin Van Buuren - Full Focus (Live Performance By Benno De Goeij) <br/>
								08. Orjan Nilsen - Go Fast<br/>
								09. World Of Gaia: <br/>
								- Gaia - Aisha<br/>
								- Armin Van Buuren - Orbion (Live Performance By Susana) <br/>
								- Gaia - Tuvan<br/>
								10. Armin Van Buuren Feat. Sophie Ellis-Bextor - Not Giving Up On Love (Dash Berlin 4AM Mix) <br/>
								11. Dave202 Vs Cerf, Mitiska & Jaren - Arrival Vs Beggin' You (Acapella ) (Armin Van Buuren Mashup)<br/> 
								12. W&W - AK47",
			"price" => 243,
			"img" => "img/items/audio-126.png"
	    );
	    $products[127] = array(
            "name" => "Bjork. Medulla",
			"author" => "Wellhart Ltd",
			"discription" => "An intimate behind the scenes documentary that gives a unique insight into the making of Medulla ......",
			"fullDiscription" => "An intimate behind the scenes documentary that gives a unique insight into the making of Medulla the new album by Bjork. Filmed over the course ofia year as Bjork recorded in New York, London, Reykjavik, the Canary Islands and Salvador, Brazil, the film gives a detailed portrait of the creative process behind the recording of Bjork's most daring album to date. The documentary captures some of the raw improvised performances of Bjork and her collaborators as they put together a remarkable album that uses only human voices for instruments.",
			"price" => 1399,
			"img" => "img/items/audio-127.png"
	    );
	    $products[128] = array(
            "name" => "The Chemical Brothers: Singles 93-03",
			"author" => "Virgin Records Ltd.",
			"discription" => "Features the videos for:<br/>
								Life is Sweet<br/>
								Setting Sun<br/>
								Block Rockin' Beats<br/>",
			"fullDiscription" => "								
								Features the videos for:<br/>
								Life is Sweet<br/>
								Setting Sun<br/>
								Block Rockin' Beats<br/>
								Elektrobank<br/>
								Hey Boy Hey Girl<br/>
								Let Forever Be<br/>
								Out of Control<br/>
								Star Guitar<br/>
								The Test<br/>
								The Golden Path<br/>

								Life Performances including:<br/>
								Hey Boy Hey Girl from Red Rocks 1999<br/>
								Hoops from Fuji Festival 2002<br/>
								Setting Sun from Fuji Festival 2002<br/>
								Temptation/Star Guitar from Fuji Festival 2002<br/>
								Chemical Bears from Glastonbury 2000<br/>",
			"price" => 1406,
			"img" => "img/items/audio-128.png"
	    );
	    $products[129] = array(
            "name" => "Swedish House Mafia: Leave The World Behind",
			"author" => "Ridley Scott Associates",
			"discription" => "With breath-taking live moments, huge laughs and dark lows LEAVE THE WORLD BEHIND follows Axwell,  Sebastian Ingrosso",
			"fullDiscription" => "With breath-taking live moments, huge laughs and dark lows LEAVE THE WORLD BEHIND follows Axwell, Sebastian Ingrosso and Steve Angello, members of the successful electronic dance group Swedish House Mafia, as they decide to end the group in order to save their friendship. Experience their final world tour which became the largest worldwide electronic music tour in history with over 1,000,000 tickets sold in just one week. Get a front-row seat in this honest, raw, and emotional showcase of the three DJ's final chapter as electronic dance music's finest.",
			"price" => 1405,
			"img" => "img/items/audio-129.png"
	    );
	    $products[130] = array(
            "name" => "Moby: Live The Hotel Tour 2005",
			"author" => "Mute Records",
			"discription" => "
										01. Opening Sequence (My Weakness)<br/>
										02. Find My Baby<br/>
										03. Raining Again<br/>",
			"fullDiscription" => "Tracklist:<br/>
										01. Opening Sequence (My Weakness)<br/>
										02. Find My Baby<br/>
										03. Raining Again<br/>
										04. Natural Blues<br/>
										05. Spiders<br/>
										06. Where You End<br/>
										07. In My Heart<br/>
										08. Go<br/>
										09. That's When I Reach For My Revolver<br/>
										10. Temptation<br/>
										11. Beautiful<br/>
										12. Very<br/>
										13. Next Is The E<br/>
										14. Porcelain<br/>
										15. Dream About Me<br/>
										16. Why Does My Heart Feel So Bad?<br/>
										17. We Are All Made Of Stars<br/>
										18. Slipping Away<br/>
										19. Honey<br/>
										20. Bodyrock<br/>
										21. Lift Me Up<br/>
										22. Walk On The Wild Side<br/>
										23. Fur Elise<br/>
										24. Feeling So Real<br/>",
			"price" => 477,
			"img" => "img/items/audio-130.png"
	    );
	    $products[131] = array(
            "name" => "Depeche Mode: Random Access Memory",
			"author" => "Chrome Dreams",
			"discription" => "For over a quarter of a century Depeche Mode affecting and ground breaking music in existence. ",
			"fullDiscription" => "For over a quarter of a century Depeche Mode affecting and ground breaking music in existence. From the Synth-Pop innocence of their early eighties New Romanticism to the sombre 'no wave' landscapes of their more recent output, this incredible group has been hailed as godfathers to Techno, Electronica and Industrial Metal. Having not only survived but also flourished, while virtually all of their contemporaries have disappeared, they now command a level of respect, from critics",
			"price" => 897,
			"img" => "img/items/audio-131.png"
	    );
	    $products[132] = array(
            "name" => "A Year With Armin Van Buuren",
			"author" => "Armada",
			"discription" => "An Ordinary Person Living An Extraordinary Life. Armin Van Buuren, Voted The Most Popular Dj In ",
			"fullDiscription" => "An Ordinary Person Living An Extraordinary Life. Armin Van Buuren, Voted The Most Popular Dj In The World Four Years In A Row, Lives The Life That Most Of Us Can Only Dream Of. 
With A Relentless Passion For Music, The Born Perfectionist Strives To Stay At The Top, While Dealing With The Daily Pressure That Comes Along With It. 
This Documentary Will Take You All The Way From Personal Moments At Home To The Heat Of The Moment As 100,000 Clubbers Await Their Hero. Giving You A Closer Look At The Person ",
			"price" => 257,
			"img" => "img/items/audio-132.png"
	    );  

		foreach ($products as $product_id => $product) {
			$products[$product_id]["sku"] = $product_id;
		}
		return $products;
	}


?>