Yii2 Elfinder Extension
=======================
Elfinder file manager for yii2. Supports Local file system, FTP, and uses Flysystem to mount Google Drive when used.

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist tecsin/yii2-elfinder "*"
```

or add

```
"tecsin/yii2-elfinder": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

Controller

```php
class AdminController extends Controller
{
   
  public function actionUpload(){
     $fileManager = new \tecsin\elfinder\FileManager();
      $fileManager->_uploadPath = Yii::getAlias('@webroot').'/files/';
      $fileManager->_uploadUrl = Yii::getAlias('@web').'/files/';
      /*to mount Google Drive with flysystem starts. OPTIONAL*/
      $fileManager->googleDrive = [
                  'clientID' => 'xxxxxx',
                  'clientSecret' => 'xxxxxxx',
                  'refreshToken' => 'xxxxxx',
                  'useCache' => true //optional
                  ]; 
      /*to mount Google Drive ends*/
      $fileManager->connector();
  }

 /**to use only for file manager for web**/
    public function actionFileManager() {
        return $this->render('file-manager');
    }
  
/**to use only for file browser (picker) for tinymce**/
  public function actionFileBrowser(){
      return $this->renderAjax('file-browser');//use ajax not to have a new site load in the file browser window
  }
  
}
```

elFinder File Manager for Web  :
-----
file-manager action view file


```php
    
    /**
     * @var array clientOptions the options for configuration.
     * @see https://github.com/elfinder/wiki For full list of configurable options.
     */
<?= \tecsin\elfinder\ElFinderWidget::widget([
    'id' => 'working',
    'clientOptions' => [
        'url' => '/admin/upload'
    ]
]); ?>
```

elFinder File Browser(Picker) for TinyMCE  :
-----
file-browser action view file


```php
<?= \tecsin\elfinder\ElFinderWidget::widget([
    'id' => 'working',
    'useWithTinyMCE' => true,//REQUIRED
    'clientOptions' => [
        'url' => '/admin/upload'
    ]
]); ?>
```

Contributions are welcome either by bug reporting or in coding more features.