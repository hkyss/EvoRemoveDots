# RemoveDots

## Install
- Copy this repo into your site folder
- Create a plugin with code
```php
/**
 * RemoveDots
 *
 * plugin
 *
 * @category        plugin
 * @version         0.1
 * @author          hkyss
 * @documentation   empty
 * @lastupdate      05.11.2020
 * @internal    	@modx_category Resources
 * @internal    	@events OnDocFormSave
 * @internal    	@properties &include_tpl=ID шаблонов для обработки;string;9 &fields=Названия полей для обработки;string;pagetitle,menutitle,alias
 *
 */

include_once MODX_BASE_PATH.'assets/plugins/RemoveDots/plugin.RemoveDots.php';
```
- Set tpls and fields in configuration tab