## 状态码

400 请求参数有误
401 当前请求需要用户验证
404 资源未找到
500 服务器内部错误

## 错误码

### 10000 权限不够

### 20000 Token相关错误

### 40000 资源相关错误

#### 41001 请求的Banner不存在
#### 42001 请求的专题不存在
#### 43001 请求的商品不存在
#### 44001 请求的分类不存在


### 50000 参数相关错误

###  80000 订单相关错误

####  80001 订单不存在，请检查ID
####  80002 订单用户与订单用户不匹配
####  80003 订单已支付过啦


### 90000 业务内核错误

#### 91000 微信相关错误

##### 91001  获取session_key及openID时异常，微信内部错误
##### 91002  code可能是无效的
 

