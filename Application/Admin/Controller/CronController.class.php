<?php

namespace Admin\Controller;

use Think\Controller;
use Think\Upload;

class CronController
{

    /**
     * 自动备份数据接口，需要服务器写脚本执行
     */
    public function dumpmysql()
    {
        $result = D("Basic")->select();
        if (!$result['dumpmysql']) {
            die("系统没有设置开启自动备份数据库的内容");
        }
        $shell = "mysqldump -u" . C("DB_USER") . " " . C("DB_NAME") . " > /tmp/cms" . date("Ymd") . ".sql";
        exec($shell);
    }

}