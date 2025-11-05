<?
class Pagination{
    public int $pagesCount = 1;
    public int $page  = 1;// текущая страница
    public int $requestPage = 1;//целевая страница
    public int $perPage = 2; // элементов на странице
    public int $total = 1; // всего элементов
    public int $middleSize = 2;// соседий у текущей страници
    public int $allLimit = 1;// лимит изменения вида пагинации

    public function __construct(
        $page = 1, $total = 1
    )
    {
        $this->page = $page;
        $this->total = $total;
        $this->pagesCount = $this->getPagesCount();
        $this->requestPage = $this->getCurrentPages();
    }

    private function getPagesCount(){
        return ceil($this->total/$this->perPage);
    }

    private function getCurrentPages(){
        $page = (int)$this->page;

        if($this->page < 1){
            $page = 1;
        }
        if($this->page > $this->pagesCount){
            $page = $this->pagesCount;
        }
        return $page;
    }
    public function getStartId(){
        return ($this->requestPage -1) * $this->perPage;
    }

}