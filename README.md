Laravel Eloquent Append Automation
====================

根据 appends 配置的关联字段映射关系，自动将不需要的属性剔除

#### 相关文章:


## 安装
```bash
$ composer require lookfeel/laravel-eloquent-append-automate
```

> **Note:** **Laravel Eloquent Append Automation** requires Laravel 5.6+.

## 使用

### Appends 字段映射配置

如下所见，您仅仅需要给需要做字段映射的 append 添加对应的键名，键名为字映射字段名称，程序将自动根据映射关系，判断是否需要移除这些 append，以避免因查询中缺少该字段而引起的错误。

##### Model:
```php
use Lookfeel\AppendAutomate\Database\Eloquent\Model;

class User extend Modal {
    protected $appends = [
        'fullname',
        'gender' => 'gender_text',
        'status' => 'status_text',
    ];
}
```

##### Controller
```php
User::select(['id', 'firstname', 'lastname', 'gender'])->firstOrFail();

/***
{
    "id": 1,
    "firstname": "Terran",
    "lastname": "Chao",
    "fullname": "Terran Chao",
    "gender": 1,
    "gender_text": "男"
} 
*/
```

### 使用 `Lookfeel\AppendAutomate\Database\Eloquent\Model` 替换 `Illuminate\Database\Eloquent\Model`

只需将 Model 继承 `Lookfeel\AppendAutomate\Database\Eloquent\Model` 即可. `Lookfeel\AppendAutomate\Database\Eloquent\Model` 继承自 `Eloquent` 。

### 使用 `Lookfeel\AppendAutomate\AppendAutomateTrait`

如果由于某些原因不能继承 `Lookfeel\AppendAutomation\Database\Model`，那么您可以在已有 Model 中 `use Lookfeel\AppendAutomation\AppendAutomateTrait`。

## 单元测试

```bash
$ composer install --dev
```

```bash
$ vendor/bin/phpunit
```

## License

**Laravel Eloquent Append Automation ** is licensed under the [MIT License](http://opensource.org/licenses/MIT).
