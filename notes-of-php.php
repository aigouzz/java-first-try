<?php
//php  函数
//
    //require('content.php');
    //require 'content.php';
    //require $filename;
//栈：程序入口  入口栈
//寻找函数栈 =》调用函数 =》 返回
//遇到函数：开辟新栈，执行该函数代码，执行完毕返回，接着执行下面的代码

//include('a.php');include_once();
//require('ab.php');//file not found  出现错误会退出程序
//require_once('a.php');//包括了就不在引入，节省资源，避免重复定义错误

//include  页面包含到另一个页面
//include('a.php');//遇到既包含
//include_once('a.php');//判断是否包含

//include和require的区别:include失败触发warning  require出错终止程序
//我们应当使用require_once
//函数执行：php开辟新栈   各个栈间变量相互独立
//函数参数类型：array int float bool string object null 资源类型
//函数开头字母：_ a-z A-Z
//函数名不区分大小写    自定义函数中变量是局部的，函数外不生效
$a = 2;
function setName(){
    global $a;
    $a = 1;
    echo '$a='.$a;
}
setName();
echo $a;

//php中三种提示： notice  warning error
//global全局变量可以使用外部变量
//在函数中，我们不希望使用某个变量，或者是彻底的不在使用某个变量，可以使用unset($a);将该变量彻底删除
//函数默认值的问题：($a = 2){echo $a;}//2
//php默认值传递，需要地址传递可以使用&变量名

//常量：不需要$
//不能修改，需要赋初值，define or const ，全部大写用下划线间隔，不需要值变化，考虑使用常量
define('_NAME_','my name');
const _NAME_ = 'my name';

//数组：关键字和值得组合，值可以使任意类型
//array('1'=>1,'2'=>2);  下标可以自己指定
//$arr['logo'] = 'logo';
$arr[0] = 1;
$arr[1] = 1;

//for循环自定义key的数组会报错，undefined offset

/*foreach($arr as $key=>$val){
    echo $val;
}*/


//位运算：
//最高位符号位：0  正  1 负
//正数原码，反码，补码都一样
//负数的反码：原码符号位不变，其他位取反
//负数补码：负数反码加一
//0的反码，补码都是0
//php没有无符号数，都是有符号的
//计算机运算时，以补码方式运算

//&:都为一才是一
//|:有一就是一
//^:亦或  不同位设置为一
//~：非  取反
//$a<<$b:左移$b次   符号位不变，地位补0
//>>:右移  低位溢出，符号位不变，并以符号位补溢出的高位

//先求补码，再运算，在转成原码，就是得到的结果

//如果创建数组时候，没有给某个元素指定下标，php就会自动使用目前最大的下标，加一即为该元素的下标
//如果我们给某个元素下标一样，则会覆盖原来值

$arr[''] = $arr[null];//$arr[true] ==>$arr[1]    print_r(arr);  var_dump();显示更多的信息
//数组越界访问会出错
//php数组可以动态生长
/*$arr = array(1,2);
$arr[2] = 3;*/

//$arr[bar] = 'name';//引用陷阱
//使用是危险的
count($arr);//个数
is_array($arr);//判断是否数组
$arr1 = explode('a','mmammam');//按照a拆分成数组

//unset()函数允许删除数组某个键，但数组不会重建索引
unset($a);
unset($arr[1]);//unset($a,$B);销毁多个变量
//删除指的：变量   undefined    数组：undefined offset

//数组运算：==判断相同键值对，===类型顺序还要相同
//+:$b数组的键和值加到$a中去

//数组：array();

//php.ini:error_reporting = E_ALL & ~E_NOTICE    非notice错误显示
//page:error_reporting(E_ALL ^ E_NOTICE);       页面级别   非notice错误

//内部排序：交换，选择，插入，快速

//外部排序：合并，直接合并
//因为数据量大，借助外部存储介质来排序

sort($arr);//数组单元进行排序
//冒泡：
//选择：从剩下的数组中选择最小插入到第一位
//插入：
//快速：对半分

function bubbleSort($myArr){
    for($i=0;$i<count($myArr);$i++){
        for($j=0;$j<count($myArr) -1 -$i;$j++){
            if($myArr[$j] > $myArr[$j+1]){
                $temp = $myArr[$j];
                $myArr[$j] = $myArr[$j+1];
                $myArr[$j+1] = $temp;
            }
        }
    }
}


function selectSort(&$arr){
    for($i=0;$i<count($arr);$i++) {
        $minVal = $arr[$i];
        $minIndex = $i;
        for($j=$i+1;$j<count($arr)-1-$i;$j++){
            if($minVal > $arr[$j]){
                $minVal = $arr[$j];
                $minIndex = $j;
            }
        }
        $temp = $arr[$i];
        $arr[$i]=$arr[$minIndex];
        $arr[$minIndex] = $temp;
    }
}

function insertSort(&$arr){
    for($i=1;$i<count($arr);$i++) {
        $insertVal = $arr[$i];
        $insertIndex = $i - 1;
        while($insertIndex>=0 && $insertVal<$arr[$insertIndex]){
            $arr[$insertIndex+1] = $arr[$insertIndex];
            $insertIndex--;
        }
        $arr[$insertIndex+1] = $insertVal;
    }
}
//快速排序法：对半分

function quickSort($left,$right,&$arr){
    $l = $left;
    $r = $right;
    $pivot = $arr[($left + $right)/2];
    $temp = 0;
}











?>