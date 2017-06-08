<?php

class HelloWorldController extends BaseController {

    // ...
    public static function sandbox() {
        $pppp = new Player(array('id' => 33,
                'name' => 'a',
                'password' =>'asss',
                'admin' => false,
            ));
        $errors = $pppp->errors();
        Kint::dump($pppp);
        
        Kint::dump($errors);
        
        /*
        $findEle = Element::findByType('potato');
        $allEle = Element::all();
        Kint::dump($findEle);
        Kint::dump($allEle);

        $findCla = Clas::findByName('wallet');
        $allCla = Clas::all();
        Kint::dump($findCla);
        Kint::dump($allCla);

        $allPla = Player::findAll();
        $fPla = Player::findById(1);
        Kint::dump($allPla);
        Kint::dump($fPla);

        $aItem = Item::findAll();
        $fItem = Item::findById(1);
        Kint::dump($aItem);
        Kint::dump($fItem);

        $aship = Ownership::findAvatarOwnerships(1);
        $iship = Ownership::findOwnershipsByItemId(1);
        Kint::dump($aship);
        Kint::dump($iship);

        $aa = Avatar::findAll();
        Kint::dump($aa);
        $ap = Avatar::findByPlayer(2);
        Kint::dump($ap);


        $ai = Avatar::findOne(1);
        Kint::dump($ai);*/
    }

    public static function overview() {
        $avatars = Avatar::findAll();
        $items = Item::findAll();
        $player = BaseController::get_user_logged_in();
        View::make('overview.html', array('avatars' => $avatars, 'items' => $items, 'player' => $player));
    }

    public static function adminPage($error_map) {
        $everything = array(
            'classes' => Clas::all(),
            'elements' => Element::all(),
            'items' => Item::findAll(),
            'players' => Player::findAll(),
            'avatars' => Avatar::findAll());
        
        if(count($error_map != 0)) {
            $everything = array_merge($everything, $error_map);
        }
        
        View::make('admin.html', $everything);
    }

    public static function myPage($id) {
        $player = Player::findById($id);
        $items = Item::findAll();
        $avatars = Avatar::findByPlayer($id);
        $classes = Clas::all();
        $elements = Element::all();
        View::make('mypage.html', array('avatars' => $avatars, 'items' => $items,
            'classes' => $classes, 'elements' => $elements, 'player' => $player));
  }

    public static function character($id) {
        $avatar = Avatar::findOne($id);
        $items = Item::findAll();
        View::make('character.html', array('avatar' => $avatar, 'items' => $items));
    }

}
