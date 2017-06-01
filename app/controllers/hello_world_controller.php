<?php

class HelloWorldController extends BaseController{
  // ...
  public static function sandbox(){
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
    
    $aship= Ownership::findAvatarOwnerships(1);
    $iship = Ownership::findOwnershipsByItemId(1);
    Kint::dump($aship);
    Kint::dump($iship);
    
    $aa = Avatar::findAll();
    Kint::dump($aa);
    $ap = Avatar::findByPlayer(2);
    Kint::dump($ap);
    
    
    $ai = Avatar::findOne(1);
    Kint::dump($ai);
    
  }

    public static function index(){
      // make-metodi renderöi app/views-kansiossa sijaitsevia tiedostoja
   	  View::make('home.html');
    }
    
    public static function login(){
      View::make('login.html');
    }
    public static function overview(){
        $avatars = Avatar::findAll();
        echo $avatars[0]->name;
      View::make('overview.html', array('avatars' => $avatars));
    }
    
    public static function adminPage(){
      View::make('admin.html');
    }
    
    public static function myPage($id){
        $player = Player::findById($id);
       
        $avatars = Avatar::findByPlayer($id);
      View::make('mypage.html', array('avatars' => $avatars, 'player' => $player));
    }
    
    
    public static function character($id){
        $avatar = Avatar::findOne($id);
      View::make('character.html', array('avatar' => $avatar));
    }
  }
