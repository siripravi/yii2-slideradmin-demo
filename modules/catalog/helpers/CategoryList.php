<?php

namespace app\modules\catalog\helpers;

use app\modules\catalog\models\Category;
use yii\helpers\ArrayHelper;

class CategoryList
{
    private static $list = [];

    private static $list_tree = [];

    private static $list_help = null;

    private static $prefix = '- ';

    /**
     * @return \yii\db\ActiveRecord[]
     */
    public static function list()
    {
        if (static::$list) {
            return static::$list;
        }

        return static::$list = Category::find()->indexBy('id')->orderBy(['position' => SORT_ASC])->all();
    }

    /**
     * Category list recursive
     *
     * @param array $params => prefix, parent_id, level, object
     * @return array
     */
    public static function listTree($params = [])
    {
        if (isset($params['prefix'])) {
            static::$prefix = $params['prefix'];
        }
        if (!isset($params['level'])) {
            $params['level'] = 0;
        }
        if (!isset($params['parent_id'])) {
            $params['parent_id'] = null;
        }

        $list_level = [];

        if (static::$list_help === null) {
            foreach (static::list() as $v) {
                static::$list_help[] = [
                    'id' => $v['id'],
                    'parent_id' => $v['parent_id'],
                    'name' => $v['name'],
                ];
            }
        }

        if (!static::$list_help) return [];

        foreach (static::$list_help as $k => $v) {
            if ($v['parent_id'] == $params['parent_id']) {
                $list_level[] = $v;
                unset(static::$list_help[$k]);
            }
        }

        foreach ($list_level as $k => $v) {
            if (!array_key_exists($v['id'], static::$list_tree)) {
                if (static::$prefix) {
                    $v['name'] = str_pad($v['name'],
                        strlen($v['name'])+strlen(static::$prefix)*$params['level'],
                        static::$prefix,
                        STR_PAD_LEFT
                    );
                }
                static::$list_tree[$v['id']] = $v;
                $child = static::listTree([
                    'parent_id' => $v['id'],
                    'object' => true,
                    'level' => $params['level']+1]
                );
                foreach ($child as $lk => $lv) {
                    static::$list_tree[$lv['id']] = $lv;
                }
            }
        }

        if (!empty($params['object'])) {
            return static::$list_tree;
        } else {
            return ArrayHelper::map(static::$list_tree, 'id', 'name');
        }
    }
}