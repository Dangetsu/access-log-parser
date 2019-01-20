# Access Log Statistic

Приложение предназначено для парсинга access.log файлов и генерации статистики.

## Требования

*PHP* >= 5.6.0 - на меньших версиях - не тестировалось

## Функционал - по-умолчанию

Формат для обработки:
```$xslt
109.169.248.247 - - [12/Dec/2015:18:25:11 +0100] "GET /administrator/ HTTP/1.1" 200 4263 "-" "Mozilla/5.0 (Windows NT 6.0; rv:34.0) Gecko/20100101 Firefox/34.0"
```

Возвращаемый результат:
```$xslt
[
    'views' => 100, // Кол-во просмотров
    'urls' => 10, // Кол-во уникальных url
    'traffic' => 326654, // Сумма трафика
    'crawlers' => [
        'google' => 5,
    ], // Кол-во просмотров от поисковых систем
    'statusCodes' => [
         100 => 95,
         404 => 5,
     ], // Кол-во запросов в статусах ответов
]
```

## Установка

todo

## Использование

```$xslt
use AccessLogParser\Processor;

require_once 'vendor/autoload.php';

$parser = new AccessLogParser\Application();
$result = $parser->buildStatistic('access.log', Processor\StandardProcessor::getInstance());
```

## Расширение приложения

Если ваш формат файла отличается от стандартного, то необходимо наследовать класс **AccessLogParser\Processor\StandardProcessor** 
и переопределить необходимые методы. 

* **_getAccessLogRegexTemplate** - возвращает строку с регулярным выражением для парсинга access.log
* **_getAccessLogEntityClassName** - возвращает название класса сущности в которой будет содержаться информация из запроса
* **_getExtensionsWithResponseIndex** - возвращает расширения используемые для построения статистики в формате **ключ** => **обработчик**

Примеры расширения приложения находятся в папке **test/Custom** и пример вызова приложения в **test/CustomTest.php**.  
Так же, никто не запрещает написать свои "процессоры" для обработки совершенно других данных.  

El Psy Congroo!