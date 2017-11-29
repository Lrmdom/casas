<?php

Yii::import('zii.widgets.jui.CJuiInputWidget');

/**
 * XUpload extension for Yii.
 *
 * jQuery file upload extension for Yii, allows your users to easily upload files to your server using jquery
 * Its a wrapper of  http://aquantum-demo.appspot.com/file-upload
 *
 * @author Tudor Ilisoi
 * @author AsgarothBelem <asgaroth.belem@gmail.com>
 * @link http://aquantum-demo.appspot.com/file-upload
 * @link https://github.com/blueimp/jQuery-File-Upload
 * @version 0.1
 *
 */
class XUploadWidget extends CJuiInputWidget {

    /**
     * the url to the upload handler
     * @var string
     */
    public $url;

    /**
     * set to true to use multiple file upload
     * @var boolean
     */
    public $multiple = false;

    /**
     * Publishes the required assets
     */
    public function init() {
        parent::init();
        $this->publishAssets();
    }

    /**
     * Generates the required HTML and Javascript
     */
    public function run() {
        list($name, $id) = $this->resolveNameID();
        $model = $this->model;
        if (!isset($this->options['uploadTable'])) {
            $uploadTable = "files";
            $this->options['uploadTable'] = "#files";
        } else {
            $uploadTable = $this->options['uploadTable'];
            $this->options['uploadTable'] = "#{$uploadTable}";
        }
        if (!isset($this->options['downloadTable'])) {
            $downloadTable = "files";
            $this->options['downloadTable'] = "#files";
        } else {
            $downloadTable = $this->options['downloadTable'];
            $this->options['downloadTable'] = "#{$downloadTable}";
        }
        if (!isset($this->options['buildUploadRow'])) {
            $this->options['buildUploadRow'] = $this->_getBuildUploadRow();
        }
        if (!isset($this->htmlOptions['enctype'])) {
            $this->htmlOptions['enctype'] = 'multipart/form-data';
        }
        if (!isset($this->htmlOptions['class'])) {
            $this->htmlOptions['class'] = 'xupload-form file_upload';
        }
        if (!isset($this->htmlOptions['id'])) {
            $this->htmlOptions['id'] = get_class($model) . "_form";
        }
        $options = CJavaScript::encode($this->options);
        CVarDumper::dumpAsString($options, 10, true);
        Yii::app()->clientScript->registerScript(__CLASS__ . '#' . $this->htmlOptions['id'], "jQuery('#{$this->htmlOptions['id']}').fileUploadUI({$options});", CClientScript::POS_READY);
        echo CHtml::beginForm($this->url, 'post', $this->htmlOptions);
        $htmlOptions = array();
        if ($this->multiple) {
            $htmlOptions["multiple"] = true;
        }
        if ($this->hasModel()) {
            echo CHtml::activeFileField($this->model, $this->attribute, $htmlOptions);
        } else {
            echo CHtml::fileField($name, $this->value, $htmlOptions);
        }
        echo CHtml::tag("button", array(), "Upload", true);
        echo CHtml::tag("div", array(), "Upload file", true);
        echo CHtml::endForm();
        if ($uploadTable == $downloadTable) {
            echo CHtml::tag("table", array("id" => $uploadTable), "", true);
        } else {
            echo CHtml::tag("table", array("id" => $uploadTable), "", true);
            echo CHtml::tag("table", array("id" => $downloadTable), "", true);
        }
    }

    /**
     * Publises and registers the required CSS and Javascript
     * @throws CHttpException if the assets folder was not found
     */
    public function publishAssets() {
        $assets = dirname(__FILE__) . '/assets';
        $baseUrl = Yii::app()->assetManager->publish($assets);
        if (is_dir($assets)) {
            Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.fileupload-ui.js');
            Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.fileupload.js');
            Yii::app()->clientScript->registerCssFile($baseUrl . '/fileupload-ui/jquery.fileupload-ui.css');
            Yii::app()->clientScript->registerCssFile($baseUrl . '/xuploads.css');
        } else {
            throw new CHttpException(500, 'XUpload - Error: Couldn\'t find assets to publish.');
        }
    }

    private function _getBuildUploadRow() {
        $params = $this->multiple ? "file, index" : "file";
        $file = $this->multiple ? "file[index].name" : "file[0].name";
        //$file=str_replace('C:\fakepath\\', "", $file);
        $js = <<<EOD
js:function ($params) {

	return $('<tr class="alert alert-block">'+
		'<td class="filename alert alert-error"> Upload '+$file+'</td>'+

		'<td class="file_upload_progress"><div></div></td>'+
		'<td class="file_upload_start">'+
                '<button type="button" class="btn btn-primary" data-loading-text="Loading...">Enviar</button>'
			+
		'</td>'+
		'<td class="file_upload_cancel">'+

			'<button class="btcancel btn btn-primary">'+
				'<span class="ui-icon ui-icon-cancel">Cancel</span>'+
			'</button>'+
		'</td>'+
	'</tr>');
}
EOD;
        return $js;
    }

}
