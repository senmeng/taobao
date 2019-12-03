# taobao
淘宝客

    $obj = new \mengsen\TopClient('key', 'secret');
    $res = $obj->execute('taobao.tbk.item.recommend.get', [
        'num_iid' => '562421078703',
        'fields' => 'num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url',
        'count' => 1
    ]);
    echo '<pre>';
    print_r($res);
