<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PusatController extends Controller
{
    public function index()
    {
        return view('dashboard.perwakilan');
    }
    public function dashboardperwakilan()
    {
        return view('dashboard.perwakilan.dashboardperwakilan', [

            'posts' =>  DB::table('transactiondeliveries')
                ->join('merchants', 'transactiondeliveries.id_merchant', '=', 'merchants.id_register')
                ->join('users', 'merchants.id_register', '=', 'users.merchant_id')
                ->join('packets', 'transactiondeliveries.id_packet', '=', 'packets.id')
                ->join('shippingtypes', 'transactiondeliveries.id_shippingtype', '=', 'shippingtypes.shipping_type_id')
                ->where('active', '1')
                ->where('users.id_regencies', auth()->user()->id_regencies)
                ->groupBy(
                    'transactiondeliveries.id',
                    'transactiondeliveries.id_transaction_delivery',
                    'transactiondeliveries.name_provinces_sender',
                    'transactiondeliveries.name_regencies_sender',
                    'transactiondeliveries.name_villages_sender',
                    'transactiondeliveries.name_provinces_receiver',
                    'transactiondeliveries.name_regencies_receiver',
                    'transactiondeliveries.name_villages_receiver',
                    'packets.packet_name',
                    'shippingtypes.shipping_type_name',
                    'transactiondeliveries.id_merchant',
                    'transactiondeliveries.weight',
                    'transactiondeliveries.size',
                    'transactiondeliveries.price',
                    'transactiondeliveries.price_asuransi',
                    'transactiondeliveries.price_total',
                    'transactiondeliveries.transaction_status',
                    'merchants.merchant_name'

                )
                ->orderByDesc('transactiondeliveries.id')
                ->select(
                    'transactiondeliveries.id',
                    'transactiondeliveries.id_transaction_delivery',
                    'transactiondeliveries.name_provinces_sender',
                    'transactiondeliveries.name_regencies_sender',
                    'transactiondeliveries.name_villages_sender',
                    'transactiondeliveries.name_provinces_receiver',
                    'transactiondeliveries.name_regencies_receiver',
                    'transactiondeliveries.name_villages_receiver',
                    'packets.packet_name',
                    'shippingtypes.shipping_type_name',
                    'transactiondeliveries.id_merchant',
                    'transactiondeliveries.weight',
                    'transactiondeliveries.size',
                    'transactiondeliveries.price',
                    'transactiondeliveries.price_asuransi',
                    'transactiondeliveries.price_total',
                    'transactiondeliveries.transaction_status',
                    'merchants.merchant_name'
                )
                ->paginate(10)
        ]);
    }
}
