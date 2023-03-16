# Session管理组件

session组件用于网站session管理

# 开始使用

#### 安装
使用 composer 命令进行安装或下载源代码使用。

```
composer require letnn/session
```

#### Session配置
```php
\letnn\Session::config([
	'driver' => 'file', //默认驱动
	'name' => 'PHPSESSID', //名称前缀
	'domain' => '', //有效域名
	'expire'=> 1440, //过期时间
	'file' => [
		'path' => './session', //文件类session保存路径
	]
]);
```

#### 调用示例
```php
use letnn\Session;

// 设置
Session::set("app", "LangShen");

// 检测
print Session::has("app") ? "存在" : "不存在";

// 获取
print Session::get("app");

// 删除
Session::delete("app");

// 清空
Session::flush();

// 闪存
Session::flash('app', 'LangShen');

```
