<?php
namespace app\widgets;

use yii\base\Widget;
use app\models\Money;
use app\models\Points;
use app\models\Stuff;

// Рандомно выбираем категорию приза. Затем рандомно выбираем id приза в данной категории.
// Для денежных призов и вещей учтено, что их ограниченное количество (например, 300 рублей мы готовы разыграть всего 5 раз),
// но с условием, что всегда есть доступные призы

class Popup extends Widget
{
    public function init() {
        parent::init();
    }

    public function run() {
        $category = random_int(1, 3);
        switch ($category) {
            case 1:
                $count = Money::find()->count();
                $flag=true;
                while($flag) {
                    $id = random_int(1, $count);
                    $prize = Money::findById($id);
                    if($prize->amt > 0) {
                        $prize->amt = $prize->amt - 1;
                        $prize->save();
                        $flag=false;
                    }
                }
                $text = $prize->val . ' rub';
                $id = $prize->id;
                $alias = 'money';
                break;
            case 2:
                $count = Points::find()->count();
                $id = random_int(1, $count);
                $prize = Points::findById($id);
                $text = $prize->val  . ' points';
                $id = $prize->id;
                $alias = 'points';
                break;
            case 3:
                $count = Stuff::find()->count();
                $flag=true;
                while($flag) {
                    $id = random_int(1, $count);
                    $prize = Stuff::findById($id);
                    if($prize->amt > 0) {
                        $prize->amt = $prize->amt - 1;
                        $prize->save();
                        $flag=false;
                    }
                }
                $text = $prize->val;
                $id = $prize->id;
                $alias = 'stuff';
                break;
        }
        return $this->render('popup', ['text' => $text, 'alias' => $alias, 'id' => $id]);
    }
}
