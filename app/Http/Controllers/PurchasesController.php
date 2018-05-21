<?php

namespace App\Http\Controllers;

use App\Http\Requests\PurchaseRequest;
use DB;

class PurchasesController extends Controller
{
    public function store(PurchaseRequest $request)
    {
        try {
            DB::beginTransaction();

            $request->purchase();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error($e->getMessage());

            return response('Unsuccessful payment', 422);
        }

        return response('Successful payment.', 200);
    }
}
