<?
class Pagination {
    public int $pagesCount = 1;
    public int $page  = 1;// текущая страница
    public int $requestPage = 1;//целевая страница
    public int $perPage = 2; // элементов на странице
    public int $total = 1; // всего элементов
    public int $middleSize = 1;// соседей у текущей страници
    public int $allLimit = 1;// лимит изменения вида пагинации
    public string $uri = ""; // запрос с другими гет параметрами 

    public function __construct($page = 1, $total = 1)
    {
        $this->page = $page;
        $this->total = $total;
        $this->pagesCount = $this->getPagesCount();
        $this->requestPage = $this->getCurrentPages();
        $this->uri = $this->getParams();
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
        return ($this->requestPage - 1 ) * $this->perPage;
    }

    private function getParams($slice_param = "page"){
        $url = $_SERVER['REQUEST_URI'];
        $url = explode('?',$url);
        $uri = $url[0];
        if(isset($url[1]) && $url[1]!=''){
            $uri.="?";
            $params = explode("&",$url[1]);
            foreach($params as $param){
                if(!str_contains($param,"{$slice_param}=")){
                    $uri .= "{$param}&";
                }
            }
        }
        return $uri;
    }

    private function getLink($page){
        if($page == 1){
            return rtrim($this->uri,'?&');
        }
        if(!str_contains($this->uri,'?')){
            return $this->uri."?page=$page";
        }else{
            return $this->uri."page=$page";
        }
    }

    public function renderPagination(){
        $current = '';
        $prev = '';
        $next = '';
        $first = '';
        $last = '';
        $left_simblings = '';
        $right_simblings = '';
        $paginationHTML = '<nav><ul class="pagination">';
        $current = "<li class='page-item'><a class='page-link' href='{$this->getLink($this->requestPage)}'>{$this->requestPage}</a></li>";
        if($this->requestPage > 1){
            $prev = "<li class='page-item'><a class='page-link' href='{$this->getLink($this->requestPage-1)}'>предыдущая</a></li>";
        }
        if($this->requestPage < $this->pagesCount){
            $prev = "<li class='page-item'><a class='page-link' href='{$this->getLink($this->requestPage+1)}'>следующая</a></li>";
        }
        if($this->requestPage > $this->middleSize + 1){
            $first = "<li class='page-item'><a class='page-link' href='{$this->getLink(1)}'>первая</a></li>";
        }

        if($this->requestPage < ($this->pagesCount - $this->middleSize)){
            $last = "<li class='page-item'><a class='page-link' href='{$this->getLink($this->pagesCount)}'>последняя</a></li>";
        }

        for($i = 1; $i <= $this->middleSize; $i++){
            $page = $this->requestPage + $i;
            if($page <= $this->pagesCount){
                $right_simblings.= "<li class='page-item'><a class='page-link' href='{$this->getLink($page)}'>".$page."</a></li>";
            }
            
        }

        for($i = $this->middleSize; $i > 0; $i--){
            $page = $this->requestPage - $i;
            if($page > 0){
                $left_simblings.= "<li class='page-item'><a class='page-link' href='{$this->getLink($page)}'>".$page."</a></li>";
            }
            
        }

        $paginationHTML.= $first.$left_simblings.$current.$right_simblings.$next.$prev.$last.'</ul></nav>';
        return $paginationHTML;
    }

    function __toString(){
    return $this->renderPagination();
    }
}