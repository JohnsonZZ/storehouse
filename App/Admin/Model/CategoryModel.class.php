<?php
namespace Admin\Model;
use Think\Model;
class CategoryModel extends Model {

	public function getMenu($items, $sid = 'sid', $prid = 'prid', $son = 'children')
    {
        $tree = array();
        $tmpMap = array();

        foreach ($items as $item) {
            $tmpMap[$item[$sid]] = $item;
        }

        foreach ($items as $item) {
            if (isset($tmpMap[$item[$prid]])) {
                $tmpMap[$item[$prid]][$son][] = &$tmpMap[$item[$sid]];
            } else {
                $tree[] = &$tmpMap[$item[$sid]];
            }
        }
        return $tree;
    }
	
}
