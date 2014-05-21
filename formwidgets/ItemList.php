<?php namespace Flynsarmy\Menu\FormWidgets;

use Backend\Classes\FormWidgetBase;
use Flynsarmy\Menu\Classes\MenuManager;

/**
 * Rich Editor
 * Renders a rich content editor field.
 *
 * @package october\backend
 * @author Alexey Bobkov, Samuel Georges
 */
class ItemList extends FormWidgetBase
{
    /**
     * {@inheritDoc}
     */
    public $defaultAlias = 'itemlist';

    /**
     * {@inheritDoc}
     */
    public function render()
    {
        $this->prepareVars();
        return $this->makePartial('itemlist');
    }

    /**
     * Prepares the list data
     */
    public function prepareVars()
    {
        $this->vars['stretch'] = $this->formField->stretch;
        $this->vars['size'] = $this->formField->size;
        $this->vars['name'] = $this->formField->getName();
        $this->vars['value'] = $this->model->{$this->columnName};
    }

    /**
     * {@inheritDoc}
     */
    public function loadAssets()
    {
        $this->addCss('vendor/redactor/redactor.css');
        $this->addCss('css/itemlist.css');
        $this->addJs('vendor/redactor/redactor.js');
        $this->addJs('js/itemlist.js');
    }

    public function onLoadTypeSelection()
    {
        $this->vars['item_types'] = MenuManager::instance()->listItemTypes();
        return $this->makePartial('type_selection');
    }

}