# taobao
淘宝客

工厂类

    namespace app\common\factory;
    use mengsen\taobao\TopClient;

    class Jd
    {
        private static $obj = null;
        public static function getInstance()
        {
            if (self::$obj == null) {
                $conf = config('taobao.union');
                $app = new TopClient($conf['appkey'], $conf['secretKey']);
                self::$obj = $app;
            }
            return self::$obj;
        }
    }


DEMO

    $app = Jindong::getInstance();
    $res = $app->execute('taobao.union.open.promotion.common.get', [
        'promotionCodeReq' => [
            'siteId' => '1937243904',
            'materialId' => $param['material_id'],
            // 'ext1' => 'h5'
        ],
    ]);

