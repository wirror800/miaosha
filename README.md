# miaosha(PHP+Redis<watch>)
秒杀/抢购引擎

# 说明
本项目封装了秒杀/抢购的核心逻辑，提供演示程序，具体业务逻辑需要使用者自己补充。

# 依赖环境
php redis扩展

# 使用方法
## 1、初始化数据  
    $ php init.php 
    $ ./gen.sh 

## 2、执行秒杀/抢购 
### [单次请求] 
> $ php run.php 

### [模拟并发请求] 
> $ ./batch.sh 

## 3、执行业务逻辑   
> $ php worker.php 
>> `(这里是从redis队列取出数据，业务逻辑需要自己补充)` 
