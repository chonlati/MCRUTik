<?php

// comment out the following two lines when deployed to production
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require(__DIR__ . '/../vendor/autoload.php');
require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

$config = require(__DIR__ . '/../config/web.php');

(new yii\web\Application($config))->run();


use PEAR2\Net\RouterOS;

        try {
            $util = new RouterOS\Util($client = new RouterOS\Client('10.31.0.100', 'admin', '=]TbL2003'));
        ?><table>
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Topics</th>
                    <th>Message</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($util->setMenu('/log')->getAll() as $entry) { ?>
                <tr>
                    <td><?php echo $entry('time'); ?></td>
                    <td>
                    <?php foreach (explode(',', $entry('topics')) as $topic) { ?>
                        <span><?php echo $topic; ?></span>
                    <?php } ?>
                    </td>
                    <td><?php echo $entry('message'); ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <?php } catch (Exception $e) { ?>
            <div>Unable to connect to RouterOS.</div>
        <?php } ?>
