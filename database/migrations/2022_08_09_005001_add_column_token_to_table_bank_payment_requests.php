<?php

use App\Models\Bank\PaymentRequest;
use App\Models\Bank\Transaction;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class AddColumnTokenToTableBankPaymentRequests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bank_payment_requests', function (Blueprint $table) {
          $table->string('token')->after('user_room_id');
        });

        $payments_resquests = PaymentRequest::get();

        if (count($payments_resquests) > 0) {
          foreach ($payments_resquests as $key_pr => $pr) {
            $pr->token = Str::upper(md5(time() . '-' . $pr->id)) . $pr->id;
            $pr->update();
          }
        }

        Schema::table('bank_payment_requests', function (Blueprint $table) {
          $table->string('token')->unique()->change();
        });


        Schema::table('bank_transactions', function (Blueprint $table) {
          $table->string('token')->after('user_room_id');
        });

        $transactions = Transaction::get();

        if (count($transactions) > 0) {
          foreach ($transactions as $key_tr => $tr) {
            $tr->token = Str::upper(md5(time() . '-' . $tr->id)) . $tr->id;
            $tr->update();
          }
        }

        Schema::table('bank_transactions', function (Blueprint $table) {
          $table->string('token')->unique()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bank_payment_requests', function (Blueprint $table) {
            $table->dropColumn(['token']);
        });

        Schema::table('bank_transactions', function (Blueprint $table) {
          $table->dropColumn(['token']);
      });
    }
}
