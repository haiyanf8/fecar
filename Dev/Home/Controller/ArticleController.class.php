<?php
namespace Home\Controller;
use Common\Common\Util\Page;

class ArticleController extends BaseController
{
    private $_model = null;
    private $_categoryModel = null;
    private $_appointModel = null;
    private $_sellModel = null;
    protected $pageSize = 20;
    private $_seoModel = null;

    public static $cateArr = array(
                    'article',
                    'dynamic',
                    'know',
                    'knowledge',
                    'news',
                    '',
                    '',
                    '',
                    '',
                    '',
                    'zatan',
                    );

    public function __construct()
    {
        parent::__construct();
        $this->_model = D('article');
        $this->_categoryModel = D('category');
        $this->_appointModel = D('appoint');
        $this->_sellModel = D('auction');
        $this->_seoModel = D('seo');
    }

    public function article()
    {
        $this->display('Index:info-article');
    }
    
    public function index()
    {
        // var_dump($_SERVER);
        // exit;
        $appointCount = $this->_appointModel->appointCount();
        $this->assign('appointCount', $appointCount[0]['number']);
        
        $hotData = $this->_sellModel->getHisSellDataList('', 'auction.create_time desc,bid_times desc', 6);
        $this->assign('hotdata', $hotData);

        //获取资讯类别
        $where['show'] = '1';
        //如果选择了某个类别
        if (I('id')) {
            $this->assign('_active', I('id'));
        } else {
            $this->assign('_active', '0');
        }
        $field = "`cateid`, `category`";
        $order = "`rank` asc";
        $category = $this->_categoryModel->getCategories($where, $field, $order);
        $this->assign('category', $category);

        //echo 'id = ' . I('id');
        //echo json_encode($category);
        //exit;

        if (I('id')) {
            $articleCount = $this->_model->getArticlesCountByCateid(I('id'));
        } else {
            $articleCount = $this->_model->getShowArticlesCount();
        }

        $count = $articleCount[0]['count'];
        $page = new Page($count, $this->pageSize,'&id='.I('id'));
        $page->setConfig('theme', '%upPage%  %linkPage% %downPage%');
        $page->rollPage = 4;
        $limit = $page->firstRow . ", " . $page->listRows;

        //获取资讯列表
        if (I('id')) {
            $_list = $this->_model->getArticleListByCateid(I('id'), $limit);
        } else {
            $_list = $this->_model->getArticleList($limit);
        }

        for ($i = 0; $i < sizeof($_list); $i++) {
            $_list[$i]['prepic'] = $this->img_url . $_list[$i]['prepic'];
            if (mb_strlen($_list[$i]['abstract'], 'utf8') > 120) {
                $_list[$i]['abstract'] = cutString($_list[$i]['abstract'], 0, 120);
            }
        }

        // S('latestArticle', null);
        if (!S('latestArticle')) {
            $riWhere['recomm_list'] = '1';
            $rifield = '`articleid`, `title`, `abstract`, `prepic`';
            $riOrder = '`date` desc';
            $riLimit = '0, 3';
            $riArticle = D('article')->getArticles($riWhere, $rifield, $riOrder, $riLimit);
            foreach ($riArticle as &$value) {
                $value['prepic'] = $this->img_url . $value['prepic'];
            }
            
            $count = count($riArticle);
            if ($count < 3) {
                $awhere = " recomm = '1' ";
                foreach ($riArticle as $key => $value) {
                    $awhere .= "and articleid != '" . $value['articleid'] . "'";
                }
                //$awhere['recomm'] = '1';
                $afield = '`articleid`, `title`, `abstract`, `prepic`';
                $aorder = '`date` desc';
                $limitCount = 3 - $count;
                $alimit = '0, ' . $limitCount;
                $latestArticle = D('article')->getArticles($awhere, $afield, $aorder, $alimit);
                foreach ($latestArticle as &$value) {
                    $value['prepic'] = $this->img_url . $value['prepic'];
                }
                $latestArticle = array_merge($riArticle, $latestArticle);
            } else {
                $latestArticle = $riArticle;
            }

            for ($i = 0; $i < sizeof($latestArticle); $i++) {
                if (mb_strlen($latestArticle[$i]['abstract'], 'utf8') > 80) {
                    $latestArticle[$i]['abstract'] = cutString($latestArticle[$i]['abstract'], 0, 80);
                }
            }

            $where['id'] = '1';
            $field = '`first`, `second`, `third`';
            $extra = D('article_pic')->getPic($where, $field);
            if ($extra) {
                if ($extra[0]['first']) {
                    $latestArticle[0]['prepic'] = $this->img_url . $extra[0]['first'];
                }
                if ($extra[0]['second']) {
                    $latestArticle[1]['prepic'] = $this->img_url . $extra[0]['second'];
                }
                if ($extra[0]['third']) {
                    $latestArticle[2]['prepic'] = $this->img_url . $extra[0]['third'];
                }
            }

            S('latestArticle', $latestArticle, 360);
        }

        $hcwhere['open'] = '1';
        $hotcity = D('gpjcity')->getCities($hcwhere, 'rank desc');
        foreach ($hotcity as &$value) {
            if ($value['city'] == session('opencity')) {
                $value['current'] = 1;
            } else {
                $value['current'] = 0;
            }
        }

        $this->assign('hotcity', $hotcity);

        $this->assign('leftArticle', S('latestArticle')[0]);
        $this->assign('rightTopArticle', S('latestArticle')[1]);
        $this->assign('rightBottomArticle', S('latestArticle')[2]);

        if (I('id')) {
            $seoData = $this->_seoModel->getSeoByIdent(self::$cateArr[I('id')]);
        } else {
            $seoData = $this->_seoModel->getSeoByIdent(self::$cateArr[0]);
        }
        //标题关键字  描述
        $this->assign('title', $seoData[0]['title']);
        $this->assign('keywords', $seoData[0]['keywords']);
        $this->assign('description', $seoData[0]['description']);

        $this->assign('_list', $_list);
        $this->assign('pageStr', $page->show());
        $this->assign('count', ceil($count / $this->pageSize));

        $field = '`site`, `sitename`, `rank`';
        $order = '`rank` desc';
        $links = D('link')->getLinks($field, $order, $limit);
        $this->assign('links', $links);

        $hotSellData = D('auction')->getHisSellDataList('', 'auction.create_time desc,bid_times desc', 6);
        $this->assign('hotSellData', $hotSellData);

        if (strpos($_SERVER['PATH_INFO'], 'article-cate') !== false) {
            $this->assign('level', 'second');
        } else {
            $this->assign('level', 'top');
        }

        $curpage = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF'];

        $this->assign('action_name', 'article-list');
        $this->assign('curpage', $curpage);

        $this->display('Index:article');
    }

    public function detail()
    {
        $appointCount = $this->_appointModel->appointCount();
        $this->assign('appointCount', $appointCount[0]['number']);

        $hotSellData = D('auction')->getHisSellDataList('', 'auction.create_time desc,bid_times desc', 6);
        $this->assign('hotSellData', $hotSellData);

        $where['articleid'] = I('id');
        $this->_model->updatePageview($where);   //更新访问量

        $where['show'] = '1';
        $article = $this->_model->getOneArticle($where);
        $article[0]['article'] = htmlspecialchars_decode($article[0]['article']);
        $this->assign('_article', $article);

        $where['cateid'] = $article[0]['cateid'];
        $field = '`cateid`, `category`';
        $cate = D('category')->getCategories($where, $field, '');
        $this->assign('cate', $cate);

        $recomm = $this->_model->getRecommArticle();
        $this->assign('_recomm', $recomm);

        $this->assign('title', $article[0]['title']);
        if ($article[0]['page_keywords']) {
            $this->assign('keywords', $article[0]['page_keywords']);
        } else {
            $this->assign('keywords', $article[0]['title']);
        }
        if ($article[0]['page_description']) {
            $this->assign('description', $article[0]['page_description']);
        } else {
            $this->assign('description', $article[0]['abstract']);
        }

        $field = '`site`, `sitename`, `rank`';
        $order = '`rank` desc';
        $links = D('link')->getLinks($field, $order, $limit);
        $this->assign('links', $links);

        $hcwhere['open'] = '1';
        $hotcity = D('gpjcity')->getCities($hcwhere, 'rank desc');
        foreach ($hotcity as &$value) {
            if ($value['city'] == session('opencity')) {
                $value['current'] = 1;
            } else {
                $value['current'] = 0;
            }
        }

        $this->assign('hotcity', $hotcity);

        // $hotSellData = D('sell')->getHisSellData('a.status=3', 'a.bid_times + 7 desc', 6);
        // $this->assign('hotSellData', $hotSellData);

        $this->assign('level', 'second');

        $this->display('Index:article-detail');
    }

    protected function _empty()
    {
        
    }
}
