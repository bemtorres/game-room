<?php

namespace Database\Seeders;

use App\Models\Account;
use App\Models\Coupon;
use App\Models\LotoCard;
use App\Models\User;
use App\Services\LotoGenerate;
use Illuminate\Database\Seeder;

class LotoBingoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $u = new User();
        $u->email = 'admin@admin.cl';
        $u->password = hash('sha256','123456');
        $u->name = 'Benjamin';
        $u->phone = '5699999999';
        $u->credit = 10000;
        $u->admin = true;
        $u->save();

        $a = new Account();
        $a->user_id = $u->id;
        $a->description = 'ABONO CREACIÓN';
        $a->price = $u->credit;
        $a->save();

        $u = new User();
        $u->email = 'usuario@admin.cl';
        $u->password = hash('sha256','123456');
        $u->name = 'Usuario';
        $u->phone = '5699999999';
        $u->credit = 100;
        $u->admin = true;
        $u->save();

        $a = new Account();
        $a->user_id = $u->id;
        $a->description = 'ABONO CREACIÓN';
        $a->price = $u->credit;
        $a->save();

        $c = new Coupon();
        $c->name = "CUPON GENIAL 123123";
        $c->code = "22222";
        $c->password = "123456";
        $c->price = "1000";
        $c->user_id = $u->id;
        $c->save();

        $c = new Coupon();
        $c->name = "CUPON GENIAL sin pass";
        $c->code = "111111";
        $c->password = "";
        $c->price = "500";
        $c->user_id = $u->id;
        $c->save();

        $c = new Coupon();
        $c->name = "CUPON GENIAL sin pass";
        $c->code = "123123";
        $c->password = "";
        $c->price = "1500";
        $c->user_id = $u->id;
        $c->active = false;
        $c->save();


        $typos = 100;
        $cartones = 100;
        $total = $typos * $cartones;
        $lo = new LotoGenerate($typos,$cartones);
        $lotos = $lo->build();

        for ($i=0; $i < $total; $i++) {
          $loto = $lotos[$i];
          $this->guardar($loto);
        }
    }

    private function guardar($loto) {
      try {
        $l = new LotoCard();
        $l->code = $loto[1];
        $l->numbers = $loto[0];
        $l->save();
      } catch (\Throwable $th) {
        return true;
      }
    }
}
