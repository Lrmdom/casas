<?php

/**
 * CButtonColumn class file.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @link http://www.yiiframework.com/
 * @copyright Copyright &copy; 2008-2011 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
Yii::import('zii.widgets.grid.CGridColumn');

/**
 * CButtonColumn represents a grid view column that renders one or several buttons.
 *
 * By default, it will display three buttons, "view", "update" and "delete", which triggers the corresponding
 * actions on the model of the row.
 *
 * By configuring {@link buttons} and {@link template} properties, the column can display other buttons
 * and customize the display order of the buttons.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @version $Id$
 * @package zii.widgets.grid
 * @since 1.1
 */
class ButtonColumnExt extends CButtonColumn {

    public $template = '{view} {update} {delete} {add}';
    public $addButtonLabel;

    /**
     * @var string the image URL for the add button. If not set, an integrated image will be used.
     * You may set this property to be false to render a text link instead.
     */
    public $addButtonImageUrl;

    /**
     * @var string a PHP expression that is evaluated for every add button and whose result is used
     * as the URL for the add button. In this expression, the variable
     * <code>$row</code> the row number (zero-based); <code>$data</code> the data model for the row;
     * and <code>$this</code> the column object.
     */
    public $addButtonUrl = 'Yii::app()->controller->createUrl("create")';

    /**
     * @var array the HTML options for the add button tag.
     */
    public $addButtonOptions = array('class' => 'add');

    public function init() {
        $this->initDefaultButtons();

        foreach ($this->buttons as $id => $button) {
            if (strpos($this->template, '{' . $id . '}') === false)
                unset($this->buttons[$id]);
            else if (isset($button['click'])) {
                if (!isset($button['options']['class']))
                    $this->buttons[$id]['options']['class'] = $id;
                if (!($button['click'] instanceof CJavaScriptExpression))
                    $this->buttons[$id]['click'] = new CJavaScriptExpression($button['click']);
            }
        }

        $this->registerClientScript();
    }

    /**
     * Initializes the default buttons (view, update and delete).
     */
    protected function initDefaultButtons() {
        if ($this->viewButtonLabel === null)
            $this->viewButtonLabel = '<span class="glyphicon glyphicon-eye-open icon-trust" aria-hidden="true"></span>';
        if ($this->updateButtonLabel === null)
            $this->updateButtonLabel = '<span class="glyphicon glyphicon-pencil icon-warning" aria-hidden="true"></span>';
        if ($this->deleteButtonLabel === null)
            $this->deleteButtonLabel = '<span class="glyphicon glyphicon-trash icon-love" aria-hidden="true"></span>';
        if ($this->addButtonLabel === null)
            $this->addButtonLabel = '<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>';
        if ($this->viewButtonOptions['title'] === null)
            $this->viewButtonOptions['title'] = Yii::t('zii', 'View');
        if ($this->updateButtonOptions['title'] === null)
            $this->updateButtonOptions['title'] = Yii::t('zii', 'Update');
        if ($this->deleteButtonOptions['title'] === null)
            $this->deleteButtonOptions['title'] = Yii::t('zii', 'Delete');

        if ($this->addButtonOptions['title'] === null)
            $this->addButtonOptions['title'] = Yii::t('zii', 'Add');
        if ($this->deleteConfirmation === null)
            $this->deleteConfirmation = Yii::t('zii', 'Are you sure you want to delete this item?');

        foreach (array('view', 'update', 'delete', 'add') as $id) {
            $button = array(
                'label' => $this->{$id . 'ButtonLabel'},
                'url' => $this->{$id . 'ButtonUrl'},
                'imageUrl' => $this->{$id . 'ButtonImageUrl'},
                'options' => $this->{$id . 'ButtonOptions'},
            );
            if (isset($this->buttons[$id]))
                $this->buttons[$id] = array_merge($button, $this->buttons[$id]);
            else
                $this->buttons[$id] = $button;
        }

        if (!isset($this->buttons['delete']['click'])) {
            if (is_string($this->deleteConfirmation))
                $confirmation = "if(!confirm(" . CJavaScript::encode($this->deleteConfirmation) . ")) return false;";
            else
                $confirmation = '';

            if (Yii::app()->request->enableCsrfValidation) {
                $csrfTokenName = Yii::app()->request->csrfTokenName;
                $csrfToken = Yii::app()->request->csrfToken;
                $csrf = "\n\t\tdata:{ '$csrfTokenName':'$csrfToken' },";
            } else
                $csrf = '';

            if ($this->afterDelete === null)
                $this->afterDelete = 'function(){}';

            $this->buttons['delete']['click'] = <<<EOD
function() {
	$confirmation
	var th=this;
	var afterDelete=$this->afterDelete;
	$.fn.yiiGridView.update('{$this->grid->id}', {
		type:'POST',
		url:$(this).attr('href'),$csrf
		success:function(data) {
			$.fn.yiiGridView.update('{$this->grid->id}');
			afterDelete(th,true,data);
		},
		error:function(XHR) {
			return afterDelete(th,false,XHR);
		}
	});
	return false;
}
EOD;
        }
    }

    protected function renderButton($id, $button, $row, $data) {
        if (isset($button['visible']) && !$this->evaluateExpression($button['visible'], array('row' => $row, 'data' => $data)))
            return;
        $label = isset($button['label']) ? $button['label'] : $id;
        $url = isset($button['url']) ? $this->evaluateExpression($button['url'], array('data' => $data, 'row' => $row)) : '#';
        $options = isset($button['options']) ? $button['options'] : array();
        if (!isset($options['title']))
            $options['title'] = $label;
        if (isset($button['imageUrl']) && is_string($button['imageUrl']))
            echo CHtml::link(CHtml::image($button['imageUrl'], $label), $url, $options);
        else
            echo CHtml::link($label, $url, $options);
    }

}
