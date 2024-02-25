<?php
namespace app\admin\widgets;

use Yii;
use yii\bootstrap5\Widget;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use Exception;

class MenuWidget extends Widget
{

    public $activateParents = true;
    public $defaultIconHtml = '<i class="bi bi-circle"></i> ';
    // public $options = ['class' => 'sidebar-menu', 'data-widget' => 'tree'];

    /**
     * @var string is prefix that will be added to $item['icon'] if it exist.
     * By default uses for Font Awesome (http://fontawesome.io/)
     */
    public static $iconClassPrefix = 'bi bi-';

    private $noDefaultAction;
    private $noDefaultRoute;


    /**
     * @inheritdoc
     * Styles all labels of items on sidebar by AdminLTE
     */
    public $options;
    public $items;
    public $brand;

    public $ulClass = "navbar-nav bg-gradient-primary sidebar sidebar-dark accordion";
    public $ulId = "accordionSidebar";
    public $liClass = "sidebar-item";
    public $brandTemplate = '
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{url}">
            <div class="sidebar-brand-text mx-3">{appName}</div>
        </a>
    ';
    public $defaultBrand = '
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{url}">
        <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{appName}</div>
    </a>
    ';
    public $activeClass = "active";
    public $labelTemplate = '<span>{label}</span>';
    public $dividerTemplate = '<hr class="sidebar-divider">';
    public $sidebarHeadingTemplate = '<div class="sidebar-heading"><h6>{label}</h6></div>';
    public $menuTemplate = '<li class="{liClass}">{link}</li>';
    public $linkTemplate = '<a class="sidebar-link" href="{url}" {linkOptions}><i class="{icon}"></i> <span class="ps-2">{label}</span></a>'; // not sure label use span or not
    public $iconDefault = "bi bi-circle";
    public $subMenuTemplate2 = '
        <li class="{liClass}">
            <a class="sidebar-link {collapsed-arrow}" href="#" data-toggle="collapse" data-target="#collapse{key}" aria-expanded="true" aria-controls="collapse{key}">
                <i class="{icon}"></i>
                <span>{label}</span>
            </a>
            <div id="collapse{key}" class="collapse {active-show}" aria-labelledby="headingTwo" data-parent="#{ulId}">
                <div class="bg-white py-2 collapse-inner rounded">
                    {header}
                    {link}
                </div>
            </div>
        </li>
    ';
    public $subMenuTemplate = '
        <li class="{liClass} has-sub">
            <a class="sidebar-link {collapsed-arrow}" href="#" data-toggle="collapse" data-target="#collapse{key}" aria-expanded="true" aria-controls="collapse{key}">
                <i class="{icon}"></i>
                <span>{label}</span>
            </a>
            <ul class="submenu"> 
                {link} 
            </ul>
        </li>
    ';
   
    public $subMenuHeaderTemplate = '<h6 class="collapse-header">{subMenuTitle}</h6>';
    public $subMenuLinkTemplate = '<li class="submenu-item"><a class="{subMenuClass}" href="{url} {linkOptions}"><i class="{icon}"></i> {label}</a></li>';
    public $subMenuLinkClass = 'submenu-link';
    public $route;


    public function init() {
        parent::init();

        // change default value from options
        if($this->options['ulClass']) $this->ulClass = $this->options['ulClass'];
        if($this->options['ulId']) $this->ulId = $this->options['ulId'];

    }


    /**
     * Renders the menu.
     */
    public function run()
    {
        $return = $this->beginWidget();

        if(!$this->items) throw new Exception("This extensions need items param. Please provide it", 1);

        $return .= $this->renderBrand();

        foreach ($this->items as $key => $value) {
            if(!isset($value['items'])){
                $return .= $this->renderItem($value);
            }else{
                $return .= $this->renderItems($value, $key);
            }
        }

        $return .= $this->endWidget();

        return $return;
    }


    protected function beginWidget(){
        $return = "<ul class=\"{$this->ulClass}\" id=\"{$this->ulId}\">";
        return $return;
    }

    protected function endWidget(){
        return "</ul>";
    }

    /**
     * followed by $this->dividerTemplate
     */
    protected function renderBrand(){
        if(!$this->brand){
            return strtr($this->defaultBrand, ['{url}' => Url::to(['/'], true), '{appName}' => Yii::$app->name]).$this->dividerTemplate;
        }

        $brand = $this->brand;
        $url = Url::to($brand['url'] ?? ['/'], true );
        $appName = $brand['content'] ?? Yii::$app->name;

        return strtr($this->brandTemplate, ['{url}' => $url, '{appName}' => $appName]).$this->dividerTemplate;
    }

    protected function renderItem($item){
        if($this->setVisibility($item) === false) return '';

        if(!isset($item['type'])) $item['type'] = 'menu';

        if($item['type'] === 'divider') return $this->dividerTemplate;

        if($item['type'] === 'sidebar') return strtr($this->sidebarHeadingTemplate, ['{label}' => $item['label']]);

        if($item['type'] === 'menu')
        {
            // generate link
            $url = Url::to($item['url'], true);
            $label = $item['label'];
            $icon = $item['icon'] ?? $this->iconDefault;
            $linkOptions = '';
            if(isset($item['linkOptions']))
            {
                foreach ($item['linkOptions'] as $key => $value) {
                    $linkOptions .= "{$key}=\"{$value}\"";
                }
            }
            $link = strtr($this->linkTemplate, ['{url}' => $url, '{label}' => $label, '{icon}' => $icon, '{linkOptions}' => $linkOptions]);

            // generate nav-item
            $liClass = $this->liClass;
            if($this->isActive($item['url'])) $liClass .= " {$this->activeClass}";

            return strtr($this->menuTemplate, ['{liClass}' => $liClass, '{link}' => $link]);
        }
    }

    protected function renderItems($items, $key){
        if($this->setVisibility($items) === false) return '';

        // return $key."</br>";
        $label = $items['label'];
        $ulId = $this->ulId;
        $subMenuTitle = $items['subMenuTitle'] ?? '';
        $header = $subMenuTitle;
        if(isset($items['subMenuTitle'])) $header = strtr($this->subMenuHeaderTemplate, ['{subMenuTitle}' => $subMenuTitle]);
        $icon = $items['icon'] ?? $this->iconDefault;

        $subMenuClass = $this->liClass;
        $active = false;
        $link = '';
        $collapseShow = '';
        $collapseArrow = "collapsed";

        foreach ($items['items'] as $item) {
            $isActiveThisItem = $this->isActive($item['url']);
            if($isActiveThisItem) $active = true;
            $link .= $this->renderSubItem($item);
        }

        if($active === true)
        {
            $subMenuClass .= " {$this->activeClass}";
            $collapseShow = "show";
            $collapseArrow = '';
        }

        return strtr($this->subMenuTemplate, ['{liClass}' => $subMenuClass, '{key}' => $key, '{label}' => $label, '{active-show}' => $collapseShow, '{collapsed-arrow}' => $collapseArrow,
            '{ulId}' => $ulId, '{header}' => $header, '{link}' => $link, '{icon}' => $icon]);
    }

    protected function renderSubItem($item){
        $subMenuClass = $this->subMenuLinkClass;
        $url = Url::to($item['url'], false);
        $icon = $item['icon'] ?? $this->iconDefault;
        $label = $item['label'];
        $linkOptions = '';
        if(isset($item['linkOptions']))
        {
            foreach ($item['linkOptions'] as $key => $value) {
                $linkOptions .= "{$key}=\"{$value}\"";
            }
        }
        if($this->isActive($item['url'])) $subMenuClass .= " {$this->activeClass}";

        if(!$this->setVisibility($item)) return '';

        return strtr($this->subMenuLinkTemplate, ['{subMenuClass}' => $subMenuClass, '{url}' => $url, '{icon}' => $icon, '{label}' => $label, '{linkOptions}' => $linkOptions]);
    }

    protected function setVisibility($item){
        return $item['visible'] ?? true;
    }

    /**
     * check if any menu item is active
     * @return bool
     * @param array $url, will get $item['url'] from any item
     * @param int $countOfUrlPath use to count how much "/" in given $url
     * this function will check wheter current url have any module
     * when module is exist, we will compare module, controller, and action
     * when module is not exist we will compare controller and action
     */
    function isActive($url)
    {
        $countOfUrlPath = substr_count($url[0], '/');
        $urlExploded = explode('/', $url[0]);
        $isModule = Yii::$app->controller->module->id !== Yii::$app->id;
        if($isModule){
            switch ($countOfUrlPath) {
                case 2:
                    $urlModule = $urlExploded[1];
                    $urlController = $urlExploded[2];
                    if(Yii::$app->controller->module->id == $urlModule && Yii::$app->controller->id == $urlController) return true;
                    break;
                case 3:
                    $urlModule = $urlExploded[1];
                    $urlController = $urlExploded[2];
                    $urlAction = $urlExploded[3];
                    if(Yii::$app->controller->module->id == $urlModule && Yii::$app->controller->id == $urlController && Yii::$app->controller->action->id == $urlAction) return true;
                    break;
                default:
                    # code...
                    break;
            }
        }else{
            switch ($countOfUrlPath) {
                case 1:
                    $urlController = $urlExploded[1];
                    if(Yii::$app->controller->id == $urlController) return true;
                    break;
                case 2:
                    $urlController = $urlExploded[1];
                    $urlAction = $urlExploded[2];
                    if(Yii::$app->controller->id == $urlController && Yii::$app->controller->action->id == $urlAction) return true;
                    break;
                default:
                    # code...
                    break;
            }
        }
        return false;
    }
}