<?php
/**
 * 非常规MD5加密方法
 * @param  string $str 要加密的字符串
 * @return string
 */
function str_md5($str){
	return '' === $str ? '' : md5('jm'.$str.'dc');
}

/**---------------------------------------------------------------------------------------
 * 单表批量更新操作
 * @param  [array]  $saveWhere [需要更新的数据主键ID]
 * @param  [array]  &$saveData [需要更新的数据数据]
 * @param  [string] $tableName [更新的数据表名]
 * @return [array]  $saveWhere [已经更新过的数据ID]
 */
function saveAll($saveWhere, &$saveData, $tableName){
    if($saveWhere==null||$tableName==null) return false;

    // 获取更新列表的长度
    $key = array_keys($saveWhere)[0]; //获取键名
    $len = count($saveWhere[$key]);

    $flag=true;
    //实例化数据表模型
    $model = isset($model)?$model:M($tableName);
    //开启事务处理机制
    $model->startTrans();
    // $error记录更新失败ID
    $error = [];
    for($i=0;$i<$len;$i++){
        //预处理sql语句
        $isRight = $model->where($key.'='.$saveWhere[$key][$i])->save($saveData[$i]);
        if($isRight==0){
            //将更新失败的记录下来
            $error[]=$i;
            $flag=false;
        }
        $flag=$flag&&$isRight;
    }
    
    if($flag){
        //如果都成立就提交
        $model->commit();
        return $saveWhere;
    }else if(count($error)>0&count($error)<$len){
        //数据部分出错，先将原先的预处理进行回滚
        $model->rollback();
        for($i=0; $i<count($error); $i++){
            //删除更新失败的ID和Data
            unset($saveWhere[$key][$error[$i]]);
            unset($saveData[$error[$i]]);
        }
        //重新将数组下标进行排序
        $saveWhere[$key] = array_merge($saveWhere[$key]);
        $saveData        = array_merge($saveData);

        //进行第二次递归更新
        saveAll($saveWhere,$saveData,$tableName);
        return $saveWhere;
    }else{
        //数据全部出错，如果都更新就回滚
        $model->rollback();
        return false;
    }
}

/**
 * 检验日期是否有效（格式，有效性）
 * @return [type] [description]
 */
function checkDateIsValid($date, $formats = array("Y-m-d")){
    $unixTime = strtotime($date);

    //strtotime转换不对，日期格式不对。
    if (!$unixTime) {
        return false;
    }

    //校验日期的有效性，只要满足其中一个格式
    foreach ($formats as $format) {
        if (date($format, $unixTime) == $date) {
            return true;
        }
    }

    return false;
}

/**
 * 发送post/get请求
 * @param string $url    请求地址
 * @param json   $data   发送数据
 * @param strng  $method 发送方式
 * @return string $tmpInfo 数据
 */
function request($url,$data = null,$method){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_AUTOREFERER, 1);

    if($data != null){
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $tmpInfo = curl_exec($ch);
    if (curl_errno($ch)) {
        return curl_error($ch);
    }
    curl_close($ch);
    return $tmpInfo;
}

/**
 * 抓取url内容
 * @param  $url 抓取地址
 * @return string $data 抓取的内容
 */
function get_curl($url){
    $ch = curl_init();                              /*初始化*/
    /*针对https抓取*/
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);/*跳过证书检查*/
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true); /*从证书中检查SSL加密算法是否存在*/
    curl_setopt($ch, CURLOPT_URL, $url);            /*设置提交的页面*/
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);    /*返回抓取的内容*/
    $data = curl_exec($ch);
    if(curl_errno($ch)){
        var_dump(curl_error($ch));
    }
    curl_close($ch);
    return $data;
}