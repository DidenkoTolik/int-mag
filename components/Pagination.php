<?php

/*
 * Клас для генерації навігації по сторінках
 */
class Pagination
{

    /**
     * @var int Посилань навігації на сторінку
     */
    private $max = 10;

    /**
     * @var string Ключ для GET, в який пишеться номер сторінки
     */
    private $index = 'page';

    /**
     * @var - Поточна сторінка
     */
    private $current_page;

    /**
     * @var - Загальна кількість записів
     */
    private $total;

    /**
     * @var
     */
    private $limit;

    /** Запуск необхідних данних для навігації
     * Pagination constructor.
     * @param $total - загальна кількість записів
     * @param $currentPage
     * @param $limit - кількість записів на сторінку
     * @param $index
     * @return
     */
    public function __construct($total, $currentPage, $limit, $index)
    {
        # Встановлює загальну кількість записів
        $this->total = $total;

        # Встановлює кількість записів на сторінку
        $this->limit = $limit;

        # Встановлює ключ в url
        $this->index = $index;

        # Встановлює кількість сторінок
        $this->amount = $this->amount();

        # Встановлює номер поточної сторінки
        $this->setCurrentPage($currentPage);
    }

    /**
     *  Для виведення посилань
     * @return Html-код із посиланнями навігації
     */
    public function get()
    {
        # Для запису посилань
        $links = null;

        # Отримує обмеження для циклу
        $limits = $this->limits();

        $html = '<ul class="pagination">';

        # Генерує посилання
        for($page = $limits[0]; $page <= $limits[1]; $page++){

            # Якщо поточна це поточна сторінка, посилання нема і додається клас active
            if($page == $this->current_page){
                $links .= '<li class="active"><a href="#">' . $page . '</a></li>';
            } else {

                # Інакше генерує посилання
                $links .= $this->generateHtml($page);
            }
        }

        # Якщо посилання створились
        if(!is_null($links)){

            # Якщо поточна сторінка не перша
            if($this->current_page > 1){

                # Створює посилання На першу
                $links = $this->generateHtml(1, '&lt') . $links;
            }

            # Якщо поточна сторінка не перша
            if($this->current_page < $this->amount){

                # Створює посилання На останню
                $links .= $this->generateHtml($this->amount, '&gt');
            }
        }

        $html .= $links . '</ul>';

        return $html;
    }

    /**Для генерації HTML-кода посилання
     * @param $page
     * @param null $text
     * @return string
     */
    private function generateHtml($page, $text = null)
    {
        # Якщо текст посилання не вказаний
        if(!$text){

            # Вказує що текст - цифра сторінки
            $text = $page;
        }

        $currentURI = rtrim($_SERVER['REQUEST_URI'], '/') . '/';
        $currentURI = preg_replace("~/page-[0-9]+~", '', $currentURI);

        # Формує HTML код посилання і повертає
        return '<li><a href="' . $currentURI . $this->index . $page . '">' . $text . '</a></li>';
    }


    /**
     *  Для отримання, звідки стартувати
     *
     * @return масив  із початком і кінцем відліку
     */
    private function limits()
    {
        # Вираховує посилання зліва (щоб активне посилання було всередині)
        $left = $this->current_page - round($this->max / 2);

        # Вираховує початок відліку
        $start = $left > 0 ? $left : 1;

        # Якщо попереду є як мінімум $this->max сторінок
        if ($start + $this->max <= $this->amount)
            # Призначаєм кінець циклу вперед на $this->max сторінок чи просто на мінімум
            $end = $start > 1 ? $start + $this->max : $this->max;
        else {
            # Кінець - загальна кількість сторінок
            $end = $this->amount;

            # Початок - мінус $this->max від кінця
            $start = $this->amount - $this->max > 0 ? $this->amount - $this->max : 1;
        }

        return
            array($start, $end);
    }

    /**
     * Для встановлення поточної сторінки
     *
     * @return
     */
    private function setCurrentPage($currentPage)
    {
        # Отримує номер сторінки
        $this->current_page = $currentPage;

        # якщо поточна сторінка більше нуля
        if ($this->current_page > 0) {
            # Якщо поточна сторінка меньше загальної кількості сторінок
            if ($this->current_page > $this->amount)
                # Встановлює сторінку на останню
                $this->current_page = $this->amount;
        } else
            # Встановлює сторінку на першу
            $this->current_page = 1;
    }

    /**
     * Для отримання загального числа сторінок
     *
     * @return число сторінок
     */
    private function amount()
    {
        # Ділить і повертає
        return round($this->total / $this->limit);
    }

}