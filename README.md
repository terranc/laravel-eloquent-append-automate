Laravel Eloquent Append Automation
====================

> 撸了个包，解决困扰我很久的一个问题，当给定了 $appends 之后，在某些限定了查询字段的查询时，会因没查询 accessor 中涉及的字段而导致错误，而每次在使用的时候再去动态 append 又很烦，变化时维护起来很心累。

根据 appends 配置的关联字段映射关系，自动维护需要的 appends。

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
        'first_letter',
        'firstname|lastname' => 'fullname',     // firstname 和 lastname 字段缺一不可，否则不返回 fullname
        'gender' => 'gender_text',  // gender 是一个 int 字段，0:女，1:男
        'status' => 'status_text', // status 是一个 int 字段，0:禁用，1:启用
    ];
    public function getFirstLetterAttribute()
    {
        return substr($this->firstname, 0, 1);
    }
    public function getFullnameAttribute()
    {
        return $this->firstname . ' ' . $this->lastname;
    }
    public function getGenderTextAttribute()
    {
        return ['女', '男'][$this->gender];
    }
    public function getStatusTextAttribute()
    {
        return ['启用', '禁用'][$this->status];
    }
}
```

##### Controller
```php
User::select(['id', 'firstname', 'gender'])->firstOrFail();

/***
{
    "id": 1,
    "first_letter": "T",
    "firstname": "Terran",
    "gender": 1,
    "gender_text": "男"
}
*/
```

### 使用 `Lookfeel\AppendAutomate\Database\Eloquent\Model` 替换 `Illuminate\Database\Eloquent\Model`

只需将 Model 继承 `Lookfeel\AppendAutomate\Database\Eloquent\Model` 即可. `Lookfeel\AppendAutomate\Database\Eloquent\Model` 继承自 `Eloquent` 。

### 使用 `Lookfeel\AppendAutomate\AppendAutomateTrait`

如果由于某些原因不能继承 `Lookfeel\AppendAutomation\Database\Model`，那么您可以在已有 Model 中 `use Lookfeel\AppendAutomation\AppendAutomateTrait`。

#### 相关文章:

https://learnku.com/articles/31931

## 单元测试

```bash
$ composer install --dev
```

```bash
$ vendor/bin/phpunit
```

## License

**Laravel Eloquent Append Automation ** is licensed under the [MIT License](http://opensource.org/licenses/MIT).
