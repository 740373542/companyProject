<?php

class CODE
{
    //常用区
    const NO_ERROR = 0;                          //请求成功
    const UNKNOW_ERROR = -1;                     //未知错误
    const PARAMETER_ERROR = 1;                     //未知错误

    const 账号错误 = 1001;
    const 密码错误 = 1002;                           // 密码错误 
    const 任务已存在 = 1003;                         // 给组重复发布任务
    const 任务主题已存在 = 1004;                      // 重复创建任务主题
    const 模板已经存在 = 1005; 
    const 标题为空 = 1006;                           // 标题不能为空
    const 创建条件不足 = 1007;                        // 创建任务条件不足


    static $MSG = [
        //常用区
        self::NO_ERROR => '请求成功',
        self::UNKNOW_ERROR => '未知错误',

        self::账号错误 => '账号错误',
        self::密码错误 => '请输入正确的账号和密码',
        self::任务已存在 => '该分组已经存在这个任务',
        self::任务主题已存在 => '该任务主题已存在',
        self::模板已经存在 => '贵公司已经存在该模板',
        self::标题为空 => '添加标题不能为空',
        self::创建条件不足 => '创建任务的条件不足',

    ];
}
